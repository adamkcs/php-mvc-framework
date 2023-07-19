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

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}
?>