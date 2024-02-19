<?php
class AproposController {
    public function index() {
        // Inclure le modèle
        include_once 'app/model/AproposModel.php';
        // Créer une instance du modèle
        $aproposModel = new AproposModel();
        // Récupérer les données nécessaires à la vue (si nécessaire)
        // Passer les données à la vue
        include_once 'app/view/apropos.php';
    }
}
?>
