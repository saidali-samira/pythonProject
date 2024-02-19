<?php
include_once '../includes/functions.php';
include_once '../includes/header.php';
?>

<main class="container mt-5 mb-5">
    <section class="bg-light p-4 rounded">
        <h2 class="text-center mb-4">Thème du projet : Le site de presse</h2>
        <article class="text-dark">
            <h3>Livrable 1 : Maquette du site de presse (HTML, CSS)</h3>
            <p class="date-limite mb-3">Date limite : jeudi 14/12/2023</p>
            <p>Ce site est une imitation de site de presse qui propose des articles de presse, des vidéos qui tournent autour de l'actualité. Il est composé de 3 pages faites l'année passée: index.html, article.html et user.html.</p>
            <p>Pour ce livrable 1, il sera composé de 6 pages statiques :</p>
            <ul>
                <li>Accueil sur le site de presse avec 9 articles de presse et 2 vidéos (index.html)</li>
                <li>Un article complet avec sélection possible (article.html)</li>
                <li>Présentation de tous les articles sélectionnés (historique.html)</li>
                <li>Outil de recherche d’articles (formulaire.html)</li>
                <li>Page “à propos” avec spécifications et notes techniques (Apropos.html)</li>
                <li>La page que j'ai réalisée, dont on avait le choix, est une page de présentation par catégorie. (categorie.html)</li>
            </ul>
            <p>Le site comprend également un fichier user.php de l'année passée, un fichier CSS avec l'utilisation de Bootstrap.</p>
            <p>Une liste déroulante dans le menu hamburger (dans le header) permet d'accéder à l'historique, la recherche d'articles, à propos, et la présentation par catégorie.</p>
        </article>
    </section>
</main>

<?php
include_once '../includes/footer.php';
?>
