<?php

class ContentEditor
{
    private  $id;
    private  $pageName;
    private  $content;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id 
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of username
     */
    public function getPageName()
    {
        return $this->pageName;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setPageName($pageName)
    {
        $this->pageName = $pageName;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
