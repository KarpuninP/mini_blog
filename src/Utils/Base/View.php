<?php

namespace App\Utils\Base;

class View
{
    // view folder name
    public string $template;
    // template = fixed parts (navbar, footer and sidebar)
    public string $layout;
    // data that needs to be passed to the frontend
    public array $data = [];
    // metadata
    public array $meta = [];

    public function __construct(string $layout, string $template, array $meta)
    {
        // View folder name
        $this->template = $template;
        // array with metadata
        $this->meta = $meta;
        // If a template is passed, we will take it. Otherwise, if a string is passed then we will take the default template
        $this->layout = $layout ?: LAYOUT;
    }

    /**
     * @throws \Exception
     */
    // Here start the make of the page
    public function show(array $data): void
    {
        // work with the data that came
        // converting from an array to a set of variables
        extract($data, EXTR_OVERWRITE);

        // Working with a view
        // If nothing came to the template (it is equal to an empty string) and we are in development mode, then in the form
        if(($this->template == '') && DEBUG == 1) {
            $template = 'giglet_main';
        } elseif ($this->template) {
             $template = $this->template;
        } else {
            throw new \Exception("No view", 500);
        }

        // We break, instead of a point we put '/'
        $templatePath = str_replace('.', '/', $template);
        // Creating a Dynamic View Path
        $viewFile = VIEW  . '/' . $templatePath . '.template.php';
//       var_dump( $viewFile);

        // Check if such file exists
        if(is_file($viewFile)){
            ob_start();
            // Include this file
            require_once $viewFile;
             $content = ob_get_clean();
//            echo $content;
        }else{
            throw new \Exception("On the found view {$viewFile}", 500);
        }

        // Работа с layout
        // We check if there is something here, that is, an empty string is false. We throw an error
        if($this->layout) {
            // form the path to the layout
            // Since we have a dynamically created path and file name, we can change the layout at our discretion
            // Specifying in the controller reassigning the layout variable as in the example $this->layout = 'test';
            $layoutFile = VIEW . "/layouts/{$this->layout}.template.php";
//            var_dump($layoutFile);

            // Checking if file. If there is, then connect, if not, then we throw out an error
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Template not found {$this->layout}", 500);
            }
        }else {
            throw new \Exception("Template name not received ", 500);
        }
    }

    // Add metadata (<title>,description,content)
    public function getMeta() : string
    {
        $output = '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;
        $output .= '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        return $output;
    }

    public function getJsAjax($data)
    {
        //debug($data);
    }
}