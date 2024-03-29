<?php
require_once __DIR__ . '/../services/restaurantservice.php';
require_once __DIR__ . '/../services/editpageservice.php';


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
        $this->content = $this->contentEditorService->getPageContent("Food");
        $restaurants = $this->restaurantService->getAll();
        require __DIR__ . '/../views/visithaarlem/food.php';
    }

    public function history()
    {
        $this->content = $this->contentEditorService->getPageContent("History");
        require __DIR__ . '/../views/visithaarlem/history.php';
    }

    public function culture(){   
        $this->content = $this->contentEditorService->getPageContent("Culture");
        require __DIR__ . '/../views/visithaarlem/culture.php';
    }

    public function theatre(){
        $this->content = $this->contentEditorService->getPageContent("Theatre");
        require __DIR__ . '/../views/visithaarlem/theatre.php';
    }

    public function festivalculture(){
        $this->content = $this->contentEditorService->getPageContent("CultureFestival");
        require __DIR__ . '/../views/visithaarlem/culturefestival.php';
    }

    public function museum(){
        $this->content = $this->contentEditorService->getPageContent("Museum");
        require __DIR__ . '/../views/visithaarlem/museum.php';
    }

    public function kids()
    {
        $this->content = $this->contentEditorService->getPageContent("Kids");
        require __DIR__ . '/../views/visithaarlem/kids.php';
    }
}
