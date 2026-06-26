<?php
require_once "../utils/autoloader.php";

$machine = new MachineACafe("Senseo");
// var_dump($machine);
// $machine->mettreUneDosette();
// var_dump($machine);
// $machine->faireDuCafe();
// var_dump($machine);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine à café</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <script src="../assets/scripts/fonctionnement.js" defer></script>
</head>

<body>
    <div class="machine">

        <!-- ÉCRAN LCD -->
        <div class="ecran" id="ecran">
            <div class="message" id="message">Prêt à servir</div>
            <div class="infos-ecran">
                💰 <span id="solde-ecran">0.00€</span>
                &nbsp; 🧂 <span id="sucre-ecran">0</span>
            </div>
        </div>

        <!-- ZONE PAIEMENT - Fentes à pièces -->
        <div class="zone-paiement">
            <div class="fente" onclick="machine.insererPiece(0.50)">
                <div class="fente-trou"></div>
                <span>0.50€</span>
            </div>
            <div class="fente" onclick="machine.insererPiece(1.00)">
                <div class="fente-trou"></div>
                <span>1.00€</span>
            </div>
            <div class="fente" onclick="machine.insererPiece(2.00)">
                <div class="fente-trou"></div>
                <span>2.00€</span>
            </div>
        </div>

        <!-- BOUTON DOSETTE -->
        <div class="zone-dosette" onclick="machine.mettreUneDosette()">
            <div class="dosette-led" id="dosette-led"></div>
            <span>🫘 DOSETTE</span>
        </div>

        <!-- MOLETTE SUCRE -->
        <div class="zone-sucre">
            <button class="btn-moins" onclick="machine.ajouterSucre(-1)">−</button>
            <div class="sucre-valeur" id="sucre-valeur">0</div>
            <button class="btn-plus" onclick="machine.ajouterSucre(1)">+</button>
            <span>🧂</span>
        </div>

<!-- ZONE TASSE AVEC SUPPORT -->
<div class="zone-tasse">
    <div class="buse"></div>
    <div class="goutte" id="goutte"></div>
    
    <!-- Support + tasse -->
    <div class="support-tasse">

        <!-- La tasse -->
        <div class="tasse">
            <div class="tasse-contenu" id="tasse-contenu"></div>
            <div class="fumee" id="fumee">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="tasse-anse"></div>
        </div>
        
        <!-- Grille d'égouttoir -->
        <div class="grille-support"></div>
        <div class="pied-support"></div>
    </div>
</div>
        <!-- BOUTONS PRINCIPAUX -->
        <div class="boutons-principaux">
            <button class="btn-power" onclick="machine.onOff()">
                <div class="led-power" id="led-power"></div>
                <span>🔌</span>
                <small>Allumer</small>
            </button>

            <button class="btn-brew" onclick="machine.faireDuCafe()">
                <span>☕</span>
                <small>Café</small>
            </button>
        </div>

    </div>

</body>

</html>