<?php
namespace app\core;

class Controller 
{
    public string $layout = 'main';
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    // Render function to shorten the render coding
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}
?>