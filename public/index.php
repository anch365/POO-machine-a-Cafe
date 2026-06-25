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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machine à café</title>
</head>

<body>
    <!-- Faire fonctionner la machine -->
    <p><?= $machine->on_off() ?></p>
    <button>Allumer</button>
    <?php var_dump($machine); ?>
    <p><?= $machine->on_off() ?></p>
    <?php var_dump($machine); ?>

    <!-- L'ajout d'une dosette -->
    <p><?= $machine->mettreUneDosette() ?></p>
    <?php var_dump($machine); ?>
    <p><?= $machine->mettreUneDosette() ?></p>
    <?php var_dump($machine); ?>

    <!-- Pour faire du café, il faut :-->

    <!-- Allumer la machine -->
    <p><?= $machine->on_off() ?></p>
    <?php var_dump($machine); ?>

    <!-- Ajouter une dosette -->
    <p><?= $machine->mettreUneDosette() ?></p>
    <?php var_dump($machine); ?>

    <!-- Ajouter du sucre -->
    <p><?= $machine->ajouterSucre(3) ?></p>
    <?php var_dump($machine); ?>

    <!-- Paiement du café -->
    <p><?= $machine->insererPiece(2) ?></p>

    <!-- Lancer la machine pour faire le café -->
    <p><?= $machine->faireDuCafe() ?></p>
    <?php var_dump($machine); ?>
    
</body>

</html>