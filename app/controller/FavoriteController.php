<?php

session_start(); // Assurez-vous de démarrer la session en haut de votre script

include_once '../model/FavoriteModel.php'; // Chemin correct vers le modèle

class FavoriteController {
    private $favoriteModel;

    public function __construct() {
        $this->favoriteModel = new FavoriteModel();
    }

    // Ajouter un article aux favoris
    public function addToFavorites() {
        if (isset($_POST['articleId'])) {
            $articleId = $_POST['articleId'];
            $result = $this->favoriteModel->addFavorite($articleId);

            if ($result) {
                $_SESSION['success_message'] = 'Article ajouté aux favoris avec succès.';
            } else {
                $_SESSION['error_message'] = 'Erreur lors de l\'ajout de l\'article aux favoris.';
            }
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Supprimer un article des favoris
    public function removeFavorite() {
        if (isset($_POST['articleId'])) {
            $articleId = $_POST['articleId'];
            $result = $this->favoriteModel->removeFavorite($articleId);

            if ($result) {
                $_SESSION['success_message'] = 'Article retiré des favoris avec succès.';
            } else {
                $_SESSION['error_message'] = 'Erreur lors de la suppression de l\'article des favoris.';
            }
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Afficher la page des favoris
    public function showFavorites() {
        $favorites = $this->favoriteModel->getFavorites();
        $totalFavorites = $this->favoriteModel->getTotalFavorites();
        include_once('../views/favorites.php'); // Assurez-vous que le chemin est correct
    }
}

$favoriteController = new FavoriteController();

if (isset($_POST['addToFavorites'])) {
    $favoriteController->addToFavorites();
} elseif (isset($_POST['removeFromFavorites'])) {
    $favoriteController->removeFavorite();
}





