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
    <title>Machine à Café Senseo</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>

<div class="machine">

    <!-- TÊTE / CAPOT -->
    <div class="tete">
        <div class="marque"> senseo</div>
        <div class="tete-boutons">
            <button class="btn-rond" id="btn-dosette" onclick="machine.mettreUneDosette()">
                <span class="btn-icon">🫘</span>
                <span class="btn-label">Dosette</span>
                <span class="btn-led" id="led-dosette"></span>
            </button>
            <button class="btn-rond btn-cafe" onclick="machine.faireDuCafe()">
                <span class="btn-icon">☕</span>
                <span class="btn-label">Café</span>
            </button>
        </div>
    </div>

    <!-- CORPS -->
        <div class="zone-infusion">
            <div class="buse"></div>
            <div class="goutte" id="goutte"></div>
            <div class="tasse">
                <div class="tasse-contenu" id="tasse-contenu"></div>
                <div class="fumee" id="fumee">
                    <span></span><span></span><span></span><span></span><span></span>
                </div>
                <div class="tasse-anse"></div>
            </div>
            <div class="grille"></div>
        </div>


        <button class="btn-power" id="btn-power" onclick="machine.onOff()">
            <span class="power-led" id="led-power"></span>
            <span class="power-label" id="power-label">ALLUMER</span>
        </button>
    </div>

</div>

<script src="../assets/scripts/fonctionnement.js"></script>
</body>
</html>