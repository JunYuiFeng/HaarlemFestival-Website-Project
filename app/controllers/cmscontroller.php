<?php
require_once __DIR__ . '/../services/editPageService.php';

class CmsController
{
    private $content;
    private $contentEditorService;

    function __construct()
    {
        $this->contentEditorService = new EditPageService();
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
