<?php
class PatternRouter
{

    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri)
    {
        // Path algorithm
        // pattern = /controller/method

        // check if we are requesting an api route
        $api = false;
        if (str_starts_with($uri, "api/")) {
            $uri = substr($uri, 4);
            $api = true;
        }

        // set default controller/method
        $defaultcontroller = 'visithaarlem';
        $defaultmethod = 'index';

        // ignore query parameters
        $uri = $this->stripParameters($uri);

        // read controller/method names from URL
        $explodedUri = explode('/', $uri);

        if (!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = $defaultcontroller;
        }
        $controllerName = $explodedUri[0] . "controller";

        if (!isset($explodedUri[1]) || empty($explodedUri[1])) {
            $explodedUri[1] = $defaultmethod;
        }
        $methodName = $explodedUri[1];

        // load the file with the controller class
        $filename = __DIR__ . '/../controllers/' . $controllerName . '.php';
        if ($api) {
            $filename = __DIR__ . '/../api/controllers/' . $controllerName . '.php';
        }
        if (file_exists($filename)) {
            require $filename;
        } else {
            require __DIR__ . '/../views/notfound.php';
            die();
        }
        // dynamically call relevant controller method
        try {
            $controllerObj = new $controllerName;
            $controllerObj->{$methodName}();
        } catch (Exception $e) {
            require __DIR__ . '/../views/notfound.php';
            die();
        }
    }
}
