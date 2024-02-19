<?php

class ArticleModel {
    private $articlesFile;

    public function __construct($articlesFile) {
        $this->articlesFile = $articlesFile;
    }

    public function getAllarticles() {
        $press_a = [];
        // Inclure le fichier contenant les articles de presse
        include_once($this->articlesFile);
        if (isset($press_a) && is_array($press_a)) {
            return $press_a;
        } else {
            return [];
        }
    }

    public function getArticleById($id) {
        $press_a = $this->getAllarticles();
        foreach ($press_a as $article) {
            if ($article['id'] == $id) {
                return $article;
            }
        }
        return null;
    }
}
?>




