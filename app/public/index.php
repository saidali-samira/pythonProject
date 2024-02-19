<?php
// Inclure les fichiers communs
include_once 'includes/functions.php';
include_once 'includes/header.php';

// Déterminer quelle action doit être prise en fonction de la requête de l'utilisateur
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Traiter les différentes actions
switch ($action) {
    case 'article':
        // Inclure le contrôleur d'articles
        include_once 'app/controller/ArticleController.php';
        $articleController = new ArticleController();
        $articleController->show($_GET['id']);
        break;
    case 'category':
        // Inclure le contrôleur de catégories
        include_once 'app/controller/CategorieController.php';
        $categoryController = new CategorieController();
        $categoryController->show($_GET['id']);
        break;
    case 'login':
        // Inclure le contrôleur d'authentification
        include_once 'app/controller/UserController.php';
        $userController = new UserController();
        $userController->login();
        break;
    case 'register':
        // Inclure le contrôleur d'inscription
        include_once 'app/controller/UserController.php';
        $userController = new UserController();
        $userController->register();
        break;
    default:
        // Afficher la page d'accueil par défaut
        include_once 'app/controller/HomeController.php';
        $homeController = new HomeController();
        $homeController->index();
        break;
}

// Inclure le pied de page commun
require_once 'includes/footer.php';
?>
