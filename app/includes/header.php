<?php
require_once 'functions.php'; // Assurez-vous que le chemin d'accès est correct

// Supposons que vous ayez une logique pour déterminer si un utilisateur est connecté
$isUserLoggedIn = false; // Changez ceci en fonction de l'état de connexion de votre utilisateur

generateHead("LN24 - Accueil"); // Modifiez le titre de la page selon vos besoins
generateNav($isUserLoggedIn);
?>


