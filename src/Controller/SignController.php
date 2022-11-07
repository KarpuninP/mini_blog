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
        // если нужно в конструкторе, что-то добавить пишем это
        parent::__construct();
        // Подключаем название модельки
        $this->nameModal = new Blog();
    }

    // Войти
    public function signIn(): void
    {
//        var_dump($_POST);
        // валидация
        $result = $this->validation($_POST);
//        var_dump($result);
        // Если есть ошибка в валидации, то записываем в лог и выводим сообщение, если нет идем дальше
        if (!isset($result['errors'])) {
            // Запускаем проверку email
            $email = $this->nameModal->emailCheck($result['email']);
//            var_dump($email);
            // Если пришло null, выдаем ошибку и записываем в лог, если нет идем дальше
            if (is_null($email)) {
                error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: " . $result['email'] . " такого пользователя не существует. Метод в signIn \n=================\n", 3, ROOT . '/tmp/errors.log');
                echo $result['email'] . ' такого пользователя не существует, пожалуйста зарегистрируйтесь';
            } else {
                // Проверка совпадение пароля, записываем в лог и выводим
                if (!password_verify($result['password'], $email['password'])) {
                    error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: Неправедный пароль в signIn \n=================\n", 3, ROOT . '/tmp/errors.log');
                    echo 'Допущена ошибка в логина или пароля';
                } else {
                    // Если все проверки прошил, помешаем в сесию и выводим сообшение на экран
                    $_SESSION['isLogin'] = $email['email'];
                    echo 'Вы вошли в систему';
                }
            }
        } else {
            error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: Не пройдена валидация в SinController метод signIn \n=================\n", 3, ROOT . '/tmp/errors.log');
            echo 'Допущена ошибка в логина или пароля';
        }
    }

    // Зарегистрироваться
    #[ArrayShape(['email' => "mixed|string", 'password' => "mixed|string", 'errors' => "array"])]
    public function validation(array $post): array
    {
//        var_dump($post);
        $errors = [];
        // Если нечего нет, то будет пустая строка
        $email = $post['email'] ?? '';
        $password = $post['password'] ?? '';

        // Email должен быть, Далее проверка на соответствие формата
        if (!$email) {
            $errors['email'] = 'Email cannot be empty';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be in format';
            }
        }

        // Проверка, что пароль есть, и на количество символов
        if (!$password) {
            $errors['password'] = 'Password cannot be empty';
        } else {
            $passLN = strlen($password);
            if (!$passLN || $passLN < 5 || $passLN > 12) {
                $errors['password'] = 'Password to long or short';
            }
        }

        // Если есть ошибки, то кладем их в массив для отправки
        $validationData = ['errors' => $errors];

        // Если нет ошибок, то отправляем данные для дальнейшей работы
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
    // валидация
    public function signUp(): void
    {
//        var_dump($_POST);
        $result = $this->validation($_POST);
//        var_dump($result);
        // Проверяем есть ли ошибки при валидации, если не ту идем дальше
        if (isset($result['errors'])) {
            $errors = '';
            // Проходимся по ошибкам и формируем строку вывода
            foreach ($result['errors'] as $v) {
                $errors .= $v . ' ';
            }
            // Запись в лог
            error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: Не пройдена валидация в SinController " . $errors . "\n=================\n", 3, ROOT . '/tmp/errors.log');
            // Вывод ошибки на экран
            echo $errors . ', try again';

        } else {
            $id = 0;
            // Проверяем есть ли такой email
            $email = $this->nameModal->emailCheck($result['email']);
            // Если не найден такой email null, значит создаем нового пользователя
            if (is_null($email)) {
                // Шифруем пароль
                $passwordHash = password_hash($result['password'], PASSWORD_DEFAULT);
                $id = $this->nameModal->createUser($result['email'], $passwordHash);
            }
            // запись нового пользователя
            // Если id неравно 0 значит пользователь записан, иначе нет
//            var_dump($id);
            if ($id !== 0) {
                echo 'Регистрация прошла успешно, можете войти в систему';
            } else {
                echo $result['email'] . ' такой пользователь существует';
            }
        }
    }

    // Удаляем сессию (выход из системы)
    public function logOut(): void
    {
        // удаляем сессию пользователя
        unset($_SESSION['isLogin']);
        // Перезагрузка страницы, что бы избежать ошибки (костыль)
        redirect($http = false);
    }

}