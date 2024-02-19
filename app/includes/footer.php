<?php include_once 'functions.php'; ?>

<footer class="footer">
    <hr class="line-top">
    <div class="footer-header">
        <p class="signup-text">Inscrivez-vous gratuitement à LN24</p>
        <?= generateSocialIcons(); ?>
    </div>
    <hr class="line-top">
    <div class="footer-content">
        <?= generateFooterColumn("Les catégories", ["Politique", "Sport", "Immobilier", "Sciences", "Justice", "Technologie", "International", "Concours", "Les voyages LN24"]); ?>
        <?= generateFooterColumn("Revoir les émissions", ["Doc Prime", "Il faut qu'on parle", "Les visiteurs du soir", "Météo", "On saura tout", "Success Stories", "Partenaires"]); ?>
        <?= generateFooterColumn("Les autres sites IPM", ["LN RADIO", "Paris Match Belgique", "Gourmandise", "Cinebel", "La Libre", "Moustique", "Continents Insolites", "Les Voyages de la Libre"]); ?>
    </div>
    <section class="mfooter">
        <div class="mfooter__contact mfooter__contact--left">
            <div class="hide--desktop pusher-medium">
                <?= generateFooterContactInfo(); ?>
            </div>
            <hr class="divider">
        </div>
        <div class="mfooter__menu">
            <div class="region region-footer">
                <?= generateLegalLinks(); ?>
            </div>
        </div>
    </section>
</footer>
<!-- Bootstrap et jQuery via CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Votre script.js personnalisé -->
<script src="/path/to/your/js/script.js"></script>

