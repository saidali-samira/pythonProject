<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';
include_once '../controller/FavoriteController.php'; // Assurez-vous que le chemin est correct

// Chemin vers le fichier PHP contenant les données des press
$pressFilePath = '../asset/press.php';

// Instance du contrôleur
$favoriteController = new FavoriteController();

// Récupérer les données des press depuis le fichier PHP
$press = readPress($pressFilePath);

// Traiter l'ajout ou la suppression des favoris
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addToFavorites'])) {
        $articleId = $_POST['articleId'];
        $favoriteController->addToFavorites($articleId);
        // Pas de redirection ici pour permettre de voir le résultat sans rechargement
    } elseif (isset($_POST['removeFromFavorites'])) {
        $articleId = $_POST['articleId'];
        $favoriteController->removeFavorite($articleId);
        // Pas de redirection ici pour permettre de voir le résultat sans rechargement
    }
}

// Vérifier si des cookies de favoris existent
$favoritesIds = [];
if (isset($_COOKIE['favorites'])) {
    // Déserialiser les cookies des favoris
    $favoritesIds = json_decode($_COOKIE['favorites'], true);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - LN24</title>
    <!-- Ajoutez vos liens vers les feuilles de style et les scripts ici -->
</head>
<body>

<section class="container news">
    <?php
    if (!empty($press)):
    $counter = 0; // Initialiser le compteur
    foreach ($press as $key => $press_a):
    $counter++; // Incrémenter le compteur à chaque itération
    ?>
    <!-- Boucle pour afficher les articles avec des boutons d'ajout/suppression des favoris -->
    <article class="col-md-3 article">
        <div class="media-container">
            <a href="article.php?id=<?= $press_a['id'] ?>" class="image-link">
                <?php if (isset($press_a['image'])): ?>
                    <img src="<?= $press_a['image'] ?>" alt="<?= $press_a['title'] ?>" class="img-fluid">
                <?php endif; ?>
                <?php if (isset($press_a['date'])): ?>
                    <figcaption><?= $press_a['date'] ?></figcaption>
                <?php endif; ?>
            </a>
            <?php if (isset($press_a['title'])): ?>
                <h2 class="article-title"><?= $press_a['title'] ?></h2>
            <?php endif; ?>
            <!-- Contenu -->
            <?php if (isset($press_a['content'])): ?>
                <p><?= $press_a['content'] ?></p>
            <?php endif; ?>
            <!-- Formulaire pour ajouter/supprimer des favoris -->
            <form method="post" action="">
                <input type="hidden" name="articleId" value="<?= $press_a['id'] ?>" />
                <?php
                // Vérifier si l'article est déjà dans les favoris
                $isFavorite = in_array($press_a['id'], $favoritesIds);
                // Déterminer le texte du bouton en fonction de l'état de l'article dans les favoris
                $buttonText = $isFavorite ? 'Retirer des favoris' : 'Ajouter aux favoris';
                $buttonClass = $isFavorite ? 'addToFavorites remove' : 'addToFavorites';
                ?>
                <!-- Bouton pour ajouter/supprimer des favoris avec classe personnalisée -->
                <button type="submit" name="<?= $isFavorite ? 'removeFromFavorites' : 'addToFavorites' ?>" class="<?= $buttonClass ?>"><?= $buttonText ?></button>
            </form>

        </div>
    </article>
    <?php
    if ($counter % 3 === 0 || $counter === count($press)): ?>
</section>
<?php if ($counter !== count($press)): ?>
<div class="tab">
    <p class="plus-news"><?= ($counter === 3) ? "Plus de news" : "Fil d'actualité" ?></p>
</div>
<section class="container news">
    <?php endif;
    endif;
    endforeach;
    ?>
    <?php else: ?>
        <p>Aucun article disponible pour le moment.</p>
    <?php endif; ?>


    <aside>
        <h2>Le fil info LN24</h2>
        <h3>Voir tout le fil info LN24</h3>
        <div class="grid-container">
            <p>18:10  Vladimir Poutine réagit à la mort présumée de Prigojine </p>
            <p>15:34 Après un premier rendez-vous manqué, le roi Charles III en France du 20 au 22 septembre</p>
            <p>15:22 Baiser forcé : la pression croît sur Rubiales, dans le viseur de la Fifa </p>
            <p>14:15  Zelensky affirme que l'Ukraine n'a "rien à voir" avec le crash d'avion de Prigojine </p>
            <p>14:12  L'Ukraine se félicite d'une rare opération commando en Crimée annexée </p>
            <p>13:48  Saint-Gilles : l’homme armé et retranché s’est rendu Justice</p>
        </div>
    </aside>

    <?php require_once '../includes/footer.php'; ?>
</body>
</html>
















