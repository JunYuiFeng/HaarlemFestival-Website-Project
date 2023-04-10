<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/contenteditor.php';

class ContentEditorRepository extends Repository
{

    function getPageContent($pageName)
    {
        try {
            $sql = 'SELECT * FROM `ContentEditor` WHERE `pageName`=:pageName';

            $statement = $this->connection->prepare($sql);

            $statement->execute([
                ':pageName' => $pageName,
            ]);

            $statement->setFetchMode(PDO::FETCH_CLASS, "ContentEditor");
            $pageContent = $statement->fetch();
            if ($pageContent == false)
                return false;
            return htmlspecialchars_decode($pageContent->getContent());
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function setNewPageContent($pageName, $content): bool
    {
        try {
            $sql = 'UPDATE `ContentEditor` SET `content`=:content WHERE `pageName`=:pageName ';

            $statement = $this->connection->prepare($sql);

            return $statement->execute([
                ':content' => $content,
                ':pageName' => $pageName,
            ]);
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
