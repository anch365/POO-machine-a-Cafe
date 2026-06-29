<?php
require_once "../utils/autoloader.php";

session_start();
// session_destroy();

// Créer la machine si elle n'existe pas
if (!isset($_SESSION['machine'])) {
    $_SESSION['machine'] = new MachineACafe("Senseo");
}

/**
 * @var MachineACafe $machine
 */
$machine = $_SESSION['machine'];

// var_dump($machine);


// $machine = new MachineACafe("Senseo");
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
    <title>Machine à Café</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body>

    <div class="machine">

        <!-- TÊTE / CAPOT -->
        <div class="tete">
            <div class="marque"><?= $machine->getMarque() ?></div>
            <div class="tete-boutons">
                <button class="btn-rond" id="btn-dosette" onclick="machine.mettreUneDosette()">
                    <span class="btn-led <?= $machine->getCafe() === true ? "active" : "" ?>" id="led-dosette"></span>
                    <span class="btn-icon">+</span>
                    <span class="btn-label">dosette</span>
                </button>
                <button class="btn-rond btn-cafe" onclick="machine.faireDuCafe()">
                    <span class="btn-icon">+</span>
                    <span class="btn-label">cafe</span>
                </button>
            </div>
        </div>

        <!-- CORPS -->
        <div class="corps">
            <div class="zone-infusion">
                <div class="buse"></div>
                <div class="goutte" id="goutte"></div>
                <div class="tasse">
                    <div class="tasse-contenu" id="tasse-contenu"></div>
                    <div class="fumee" id="fumee"> <!-- ← AJOUTE ÇA -->
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div> <!-- ← JUSQU'ICI -->
                    <div class="tasse-anse"></div>
                </div>
                <div class="grille"></div>
            </div>

            <button class="btn-power <?= $machine->getEnFonction() ? 'allume' : '' ?>" id="btn-power" onclick="machine.onOff()">
                <span class="power-led <?= $machine->getEnFonction() ? 'allume' : '' ?>" id="led-power"></span>
                <span class="power-label" id="power-label">Allumer</span>
            </button>
        </div>

    </div>

    <script src="../assets/scripts/fonctionnement.js"></script>
</body>

</html>