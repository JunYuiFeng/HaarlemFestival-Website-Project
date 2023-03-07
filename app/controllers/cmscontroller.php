<?php
require_once __DIR__ . '/../services/editPageService.php';
require_once __DIR__ . '/../services/userservice.php';

class CmsController
{
    private $content;
    private $contentEditorService;
    private $userService;
    function __construct()
    {
        $this->contentEditorService = new EditPageService();
        $this->userService = new UserService();
    }

    public function usermanagement()
    {        
        $users = $this->userService->getAll();
        require __DIR__ . '/../views/cms/usermanagement.php';
    }
    public function create()
    {
        require __DIR__ . '/../views/cms/create.php';
    }
    public function delete()
    {
        $id = $_GET["id"];
        $this->userService->delete($id);
        header("location: index");
    }

    public function editpagecontent()
    {
        if (isset($_GET["webPage"])) {
            $webPage = $_GET["webPage"];

            $this->content = $this->contentEditorService->getPageContent($webPage);
            if (isset($_POST['editor'])) {
                $editor_data = $_POST['editor'];
                $this->contentEditorService->setNewPageContent($webPage, $editor_data);
            }
            require __DIR__ . '/../views/cms/editpagecontent.php';
        } else {
            require __DIR__ . '/../views/notfound.php';
        }
    }

    function usermanagement()
    {
        require __DIR__ . '/../views/cms/usermanagement.php';
    }
}
