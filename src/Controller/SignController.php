<?php

namespace App\Controller;

use App\Model\Blog;
use App\Utils\Base\Controller;
use JetBrains\PhpStorm\ArrayShape;
use RedBeanPHP\RedException\SQL;

class SignController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->nameModal = new Blog();
    }

    // Sign In
    public function signIn(): void
    {
//        var_dump($_POST);
        // Validation
        $result = $this->validation($_POST);
//        var_dump($result);
        // If there is an error in the validation, then we write it to the log and display a message, if not, we go further
        if (!isset($result['errors'])) {
            // Starting email verification
            $email = $this->nameModal->emailCheck($result['email']);
//            var_dump($email);
            // If null is received, we issue an error and write it to the log, if not, we move on
            if (is_null($email)) {
                error_log("[" . date('Y-m-d H:i:s') . "] Error text: " . $result['email'] . " no such user exists. Method in signIn \n=================\n", 3, ROOT . '/tmp/errors.log');
                echo $result['email'] . ' This user does not exist, please register';
            } else {
                // Checking the password match, write to the log and display
                if (!password_verify($result['password'], $email['password'])) {
                    error_log("[" . date('Y-m-d H:i:s') . "] Error text: Wrong password in signIn \n=================\n", 3, ROOT . '/tmp/errors.log');
                    echo 'An error was made in the login or password';
                } else {
                    // If all the checks passed, we put it in the session and display a message on the screen
                    $_SESSION['isLogin'] = $email['email'];
                    echo 'You are logged in';
                }
            }
        } else {
            error_log("[" . date('Y-m-d H:i:s') . "] Error text: Validation failed in SinController method signIn \n=================\n", 3, ROOT . '/tmp/errors.log');
            echo 'An error was made in the login or password';
        }
    }

    // Register
    #[ArrayShape(['email' => "mixed|string", 'password' => "mixed|string", 'errors' => "array"])]
    public function validation(array $post): array
    {
//        var_dump($post);
        $errors = [];
        $email = $post['email'] ?? '';
        $password = $post['password'] ?? '';

        // Email must be, Next check for format compliance
        if (!$email) {
            $errors['email'] = 'Email cannot be empty';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be in format';
            }
        }

        // Checking that there is a password, and for the number of characters
        if (!$password) {
            $errors['password'] = 'Password cannot be empty';
        } else {
            $passLN = strlen($password);
            if (!$passLN || $passLN < 5 || $passLN > 12) {
                $errors['password'] = 'Password to long or short';
            }
        }

        // If there are errors, then we put them in an array for sending
        $validationData = ['errors' => $errors];

        // If there are no errors, then we send the data for further work.
        if (!$errors) {
            $validationData = [
                'email' => $email,
                'password' => $password
            ];
        }

        return $validationData;
    }

    /**
     * @throws SQL
     */
    // Validation
    public function signUp(): void
    {
//        var_dump($_POST);
        $result = $this->validation($_POST);
//        var_dump($result);
        // We check if there are errors during validation, if not, we move on
        if (isset($result['errors'])) {
            $errors = '';
            // We go through the errors and form the output string
            foreach ($result['errors'] as $v) {
                $errors .= $v . ' ';
            }
            error_log("[" . date('Y-m-d H:i:s') . "] Error text: Validation failed in SinController " . $errors . "\n=================\n", 3, ROOT . '/tmp/errors.log');
            // Displaying an error on the screen
            echo $errors . ', try again';

        } else {
            $id = 0;
            // Checking if there is such an email
            $email = $this->nameModal->emailCheck($result['email']);
            // If such email null is not found, then we create a new user
            if (is_null($email)) {
                // Encrypting the password
                $passwordHash = password_hash($result['password'], PASSWORD_DEFAULT);
                $id = $this->nameModal->createUser($result['email'], $passwordHash);
            }
            // New user entry
            // If id is not equal to 0, then the user is registered, otherwise not
//            var_dump($id);
            if ($id !== 0) {
                echo 'Registration was successful, you can log in';
            } else {
                echo $result['email'] . ' such user exists';
            }
        }
    }

    // Delete session (logout)
    public function logOut(): void
    {
        // Delete session
        unset($_SESSION['isLogin']);
        // Page reload
        redirect($http = false);
    }

}