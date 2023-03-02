<?php
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/editPageService.php';


class VisitHaarlemController
{
    private $restaurantService;
    private $contentEditorService;
    private $content;

    function __construct()
    {
        $this->restaurantService = new RestaurantService();
        $this->contentEditorService = new EditPageService();
    }

    public function index()
    {
        $this->content = $this->contentEditorService->getPageContent("Home");
        require __DIR__ . '/../views/visithaarlem/index.php';
    }

    public function food()
    {
        $restaurants = $this->restaurantService->getAll();
        require __DIR__ . '/../views/visithaarlem/food.php';
    }

    public function history()
    {
        require __DIR__ . '/../views/visithaarlem/history.php';
    }

    public function Culture()
    {
        require __DIR__ . '/../views/visithaarlem/culture.php';
    }
    public function Theatre()
    {
        require __DIR__ . '/../views/visithaarlem/theatre.php';
    }
    public function FestivalCulture()
    {
        require __DIR__ . '/../views/visithaarlem/festival.php';
    }
    public function Museum()
    {
        require __DIR__ . '/../views/visithaarlem/museum.php';
    }
    public function kids()
    {
        require __DIR__ . '/../views/visithaarlem/kids.php';
    }
}
