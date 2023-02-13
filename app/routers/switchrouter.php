<?php
class SwitchRouter
{
    public function route($uri)
    {

        $uri = $this->stripParameters($uri);

        switch ($uri) {
            case '':
            case 'visithaarlem/index':
                require_once __DIR__ . '/../controllers/visithaarlemcontroller.php';
                $controller = new VisitHaarlemController();
                $controller->index();
                break;
            case 'visithaarlem/food':
                require_once __DIR__ . '/../controllers/visithaarlemcontroller.php';
                $controller = new VisitHaarlemController();
                $controller->food();
                break;

            default:
                http_response_code(404);
                break;
        }
    }

    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
}
