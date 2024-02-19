<?php
session_start();
include_once '../model/FavoriteModel.php';
include_once '../includes/functions.php';
include_once '../includes/header.php';

$favoriteModel = new FavoriteModel();
$press = include '../asset/press.php'; // Récupère les données des articles
$favoritesIds = $favoriteModel->getFavorites();

$favoritesArticles = [];
foreach ($favoritesIds as $id) {
    $articleDetails = getArticleDetailsById($id, $press);
    if ($articleDetails) {
        $favoritesArticles[] = $articleDetails;
    }
}

// Code de gestion des messages de session...
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles Favoris</title>

</head>
<body>
<div class="favorites-basket">
    <img src="../public/assets/media/panier.jpg" alt="Panier des favoris" />
    <h3>Panier des favoris</h3>
    <p>Nombre d'articles: <?= count($favoritesArticles) ?></p>
</div>
<div class="favorites-container">
    <?php if (!empty($_SESSION['success_message'])): ?>
        <p class="success-message"><?= $_SESSION['success_message']; ?></p>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error_message'])): ?>
        <p class="error-message"><?= $_SESSION['error_message']; ?></p>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

    <h2>Articles Favoris</h2>
    <table>
        <thead>
        <tr>
            <th>Supprimer</th>
            <th>Titre</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($favoritesArticles as $article): ?>
            <tr>
                <td>
                    <!-- Utilisation d'un formulaire pour chaque bouton de suppression -->
                    <form method="post" action="home.php">
                        <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
                        <button type="submit" name="removeFromFavorites" class="btn-remove">Supprimer</button>
                    </form>
                </td>
                <td><?= htmlspecialchars($article['title']) ?></td>
                <td><img src="<?= $article['image'] ?>" alt="Image de <?= htmlspecialchars($article['title']) ?>"></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include_once '../includes/footer.php'; ?>

</body>
</html>


