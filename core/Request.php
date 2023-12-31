<?php
namespace app\core;

class Request
{
    public function getPath()
    {
        // If REQUEST_URI not present take the default root path
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        // Check if argument is passed. If so, strip path
        $pos = strpos($path, '?');

        if ($pos === false) {
            return $path;
        }
        return $path = substr($path, 0, $pos);

    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet() {
        return $this->method() === 'get';
    }

    public function isPost() {
        return $this->method() === 'post';
    }

    // getBody function to sanitize the data
    public function getBody()
    {
        $body = [];

        if ($this->method() == 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() == 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
?>