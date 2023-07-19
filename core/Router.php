<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;

    // $routes array is an associative array storing both GET and POST method routes
    protected array $routes = [];

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }
    
    // GET route handler
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    // POST route handler
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        
        // Handle callback function
        $callback = $this->routes[$method][$path] ?? false;

        // 404 if not exists
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
        
        // If string, a view is requested
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        // If array, the first element is the controller, let's call it
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        // Otherwise call function
        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = []) 
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    public function renderContent($viewContent) 
    {
        $layoutContent = $this->layoutContent();
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }


    protected function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params) 
    {
        // Generate the parameter(s) used by the view
        foreach ($params as $key => $value) {
            // $$key means i.e. $'name', so this declares the properly named variable
            $$key = $value;  // This is now available for the include_once below
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}

?>