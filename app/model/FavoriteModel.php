<?php

class FavoriteModel {
    // Ajouter un article aux favoris
    public function addFavorite($articleId) {
        // Vérifier si le cookie des favoris existe déjà
        $favorites = isset($_COOKIE['favorites']) ? json_decode($_COOKIE['favorites'], true) : [];

        // Vérifier si l'article est déjà dans les favoris pour éviter les doublons
        if (!in_array($articleId, $favorites)) {
            // Ajouter l'article à la liste des favoris
            $favorites[] = $articleId;

            // Mettre à jour le cookie des favoris avec la nouvelle liste
            setcookie('favorites', json_encode($favorites), time() + (86400 * 30), "/"); // 86400 = 1 jour
        }

        // Retourner true pour indiquer que l'opération s'est bien déroulée
        return true;
    }

    // Supprimer un article des favoris
    public function removeFavorite($articleId) {
        if (isset($_COOKIE['favorites'])) {
            $favorites = json_decode($_COOKIE['favorites'], true);

            // Trouver l'index de l'article dans le tableau des favoris
            $index = array_search($articleId, $favorites);

            // Si l'article est trouvé, le supprimer du tableau
            if ($index !== false) {
                unset($favorites[$index]);
                $favorites = array_values($favorites); // Réindexer le tableau

                // Mettre à jour le cookie des favoris
                setcookie('favorites', json_encode($favorites), time() + (86400 * 30), "/");

                return true;
            }
        }

        // Retourner false si l'article n'a pas été trouvé ou si le cookie n'existe pas
        return false;
    }

    // Récupérer la liste des articles favoris
    public function getFavorites() {
        if (isset($_COOKIE['favorites'])) {
            return json_decode($_COOKIE['favorites'], true);
        }

        // Retourner un tableau vide si aucun favori n'est défini
        return [];
    }

    // Obtenir le nombre total d'articles favoris
    public function getTotalFavorites() {
        if (isset($_COOKIE['favorites'])) {
            $favorites = json_decode($_COOKIE['favorites'], true);
            return count($favorites);
        }

        // Retourner 0 si aucun favori n'est défini
        return 0;
    }
}



