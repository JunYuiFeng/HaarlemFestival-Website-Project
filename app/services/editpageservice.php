<?php
include_once("../repositories/contenteditorrepository.php");

class EditPageService
{
    private $repository;

    function __construct()
    {
        $this->repository = new ContentEditorRepository();
    }

    public function getPageContent(string $pageName): string
    {
        return $this->repository->getPageContent($pageName);
    }

    public function setNewPageContent(string $pageName, string $content): bool
    {
        return $this->repository->setNewPageContent($pageName, $content);
    }
}
