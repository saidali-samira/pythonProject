<?php
// HomeController.php

require_once '../app/model/ArticleModel.php';

class HomeController {
    public function index() {
        // Créer une instance de ArticleModel avec le chemin vers le fichier press.php
        $articleModel = new ArticleModel('../asset/press.php');

        // Récupérer tous les articles
        $press_a = $articleModel->getAllarticles();

        // Inclure la vue de la page d'accueil avec les articles récupérés
        include_once('../views/home.php');
    }
}
?>


