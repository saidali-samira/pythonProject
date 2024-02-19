<?php
// Fonction pour générer le début du document HTML, incluant le <head>
//header.php
function generateHead($pageTitle) {
    echo "<!DOCTYPE html>\n";
    echo "<html lang='fr'>\n";
    echo "<head>\n";
    echo "    <meta charset='UTF-8'>\n";
    echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
    echo "    <title>$pageTitle</title>\n";
    echo "    <link href='/app/public/assets/css/bootstrap/bootstrap.min.css' rel='stylesheet' crossorigin='anonymous'>\n";
    echo "    <link rel='stylesheet' href='/app/public/assets/css/main.css'>\n";
    echo "    <link rel='icon' type='image/jpg' href='/app/public/assets/media/icon.jpg'>\n";
    echo "</head>\n";
}

// Fonction pour générer la barre de navigation
function generateNav($isUserLoggedIn) {
    $loginLink = $isUserLoggedIn ? '/app/public/logout.php' : '/app/public/login.php';
    $loginText = $isUserLoggedIn ? 'Déconnexion' : 'Identifiez-vous';
    $registerLink = $isUserLoggedIn ? '#' : '/app/view/user.php';
    $registerText = 'Inscrivez-vous';
    // Navigation principale
    echo "<body>\n";
    echo "<header>\n";
    echo "<nav>\n";
    echo "    <a href='/app/view/home.php'><img src='/app/public/assets/media/LogoLN24.jpg' alt='Logo LN24'></a>\n";
    echo "    <ul>\n";
    echo "        <li><a href='#' class='direct'>Direct</a></li>\n";
    echo "        <li><a href='#'>Vidéos</a></li>\n";
    echo "        <li><a href='#'>Replay</a></li>\n";
    echo "        <li><a href='#'>Fil Info</a></li>\n";
    echo "        <li><a href='#'>LN Radio</a></li>\n";
    echo "        <li><a href='#'>Louez nos studios & more</a></li>\n";
    echo "    </ul>\n";
    echo "    <ul class='right-align'>\n";
    echo "        <li><a href='$loginLink'>$loginText</a></li>\n";
    if (!$isUserLoggedIn) {
        echo "        <li><a href='$registerLink'>$registerText</a></li>\n";
    }
    echo "    </ul>\n";
    // Menu déroulant ici si nécessaire
    generateMenuDropdown();
    echo "</header>\n";
}

// Fonction pour générer le menu déroulant
function generateMenuDropdown() {
    // Définition des éléments du menu déroulant
    $menuItems = [
        "Accueil" => "/app/view/home.php",
        "Historique" => "/app/view/historique.php",
        "Rechercher des articles" => "/app/view/formulaire.php",
        "À propos" => "/app/view/apropos.php",
        "Les catégories" => "/app/view/categories.php",
        "Liste des favoris" => "/app/view/favorites.php",
        "Revoir les émissions" => "#",
        "Vidéos" => "#"
        // Ajoutez d'autres liens de menu ici selon vos besoins
    ];

    echo '<div class="menu-hamburger-container">';
    echo '    <input type="checkbox" id="menuToggle" class="menu-checkbox">';
    echo '    <label for="menuToggle" class="menu-icon">';
    echo '        <span class="menu-icon-bar"></span>';
    echo '        <span class="menu-icon-bar"></span>';
    echo '        <span class="menu-icon-bar"></span>';
    echo '    </label>';
    echo '    <ul class="menu-dropdown">';
    foreach ($menuItems as $itemName => $itemLink) {
        echo "        <li><a href='$itemLink'>$itemName</a></li>";
    }
    echo '    </ul>';
    echo '</div>';
    echo "</nav>\n"; // Ferme la balise <nav>
}





//footer.php

function generateSocialIcons() {
    return <<<HTML
        <div class="social-icons">
            <img src="/app/public/assets/media/Facebook.jpg" alt="Facebook">
            <img src="/app/public/assets/media/Twitter.jpg" alt="Twitter">
            <img src="/app/public/assets/media/Instagram.jpg" alt="Instagram">
        </div>
HTML;
}

function generateFooterColumn($title, $items) {
    $listItems = "";
    foreach ($items as $item) {
        $listItems .= "<li>$item</li>\n";
    }
    return <<<HTML
        <div class="column">
            <h3>$title</h3>
            <ul>$listItems</ul>
        </div>
HTML;
}

function generateFooterContactInfo() {
    return <<<HTML
        <p class="mfooter__contact-text">
            <strong>© LN24 2023</strong><br>
            LN24 - Les News 24 SA • Rue des Francs, 79 - 1040 Bruxelles • <a href="mailto:info@ln24.be">info@ln24.be</a><br>
            N° d’entreprise BE0711723741
        </p>
HTML;
}

function generateLegalLinks() {
    return <<<HTML
        <nav role="navigation" aria-labelledby="block-mmw-footer-menu" id="block-mmw-footer">
            <ul class="menu menu--footer">
                <li class="menu__list-item"><a href="#">Conditions générales d’utilisation</a></li>
                <li class="menu__list-item"><a href="#">Mentions légales</a></li>
                <li class="menu__list-item"><a href="#">Politique de Protection Vie privée</a></li>
                <li class="menu__list-item"><a href="#">Politique de cookies</a></li>
                <li class="menu__list-item"><a href="#">Conditions générales de vente</a></li>
                <li class="menu__list-item"><a href="#">Paramètres des cookies</a></li>
            </ul>
        </nav>
HTML;
}



//home.php

// Fonction pour lire les données du fichier PHP des press
function readPress($filePath)
{
    return include $filePath;
}

//favorites dans une base de donnée

/*function getArticleDetailsById($id) {
    // Supposons que vous avez déjà une connexion à la base de données établie ($db)
    global $db;

    $stmt = $db->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // Retourne les détails de l'article
    } else {
        return false; // Aucun article trouvé avec cet ID
    }
}
*/

//favorites dans une base de donnée temporaire press.php
function getArticleDetailsById($id, $press) {
    foreach ($press as $article) {
        if ($article['id'] == $id) {
            return $article;
        }
    }
    return false; // Retourne false si aucun article correspondant n'est trouvé
}

