<?php
require_once "../utils/autoloader.php";

header('Content-Type: application/json');

session_start();

// Créer la machine si elle n'existe pas
if (!isset($_SESSION['machine'])) {
    $_SESSION['machine'] = new MachineACafe("Senseo");
}

$machine = $_SESSION['machine'];
$action = $_GET['action'] ?? '';
$message = '';

switch ($action) {
    case 'on_off':
        $message = $machine->on_off();
        break;

    case 'dosette':
        $message = $machine->mettreUneDosette();
        break;

    case 'sucre':
        $nb = (int)($_GET['nb'] ?? 0);
        $message = $machine->ajouterSucre($nb);
        break;

    case 'piece':
        $montant = (float)($_GET['montant'] ?? 0);
        $message = $machine->insererPiece($montant);
        break;

    case 'cafe':
        $message = $machine->faireDuCafe();
        break;

    default:
        $message = "Action inconnue";
}

$_SESSION['machine'] = $machine;

echo json_encode([
    'message' => $message,
    'machine' => $machine->getEtat()
]);