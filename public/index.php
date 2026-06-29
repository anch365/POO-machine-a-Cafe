<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senseo - Machine à Café</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>

<div class="machine">

    <!-- TÊTE / CAPOT (boutons du haut) -->
    <div class="tete">
        <div class="marque">☕ senseo</div>
        <div class="tete-boutons">

            <!-- Bouton DOSETTE -->
            <button class="btn-rond" id="btn-dosette" onclick="machine.mettreUneDosette()">
                <span class="btn-icon">🫘</span>
                <span class="btn-label">Dosette</span>
                <span class="btn-led" id="led-dosette"></span>
            </button>

            <!-- Bouton CAFÉ -->
            <button class="btn-rond btn-cafe" onclick="machine.faireDuCafe()">
                <span class="btn-icon">☕</span>
                <span class="btn-label">Café</span>
            </button>

        </div>
    </div>

    <!-- CORPS -->
    <div class="corps">

        <!-- SUCRE -->
        <div class="zone-sucre">
            <button class="btn-sucre" onclick="machine.ajouterSucre(-1)">−</button>
            <div class="sucre-valeur" id="sucre-valeur">0</div>
            <button class="btn-sucre" onclick="machine.ajouterSucre(1)">+</button>
            <span class="sucre-icon">🧂</span>
        </div>

        <!-- ZONE INFUSION -->
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

        <!-- MESSAGE -->
        <div class="message-bar" id="message-bar">Prêt à servir</div>

        <!-- BOUTON ALLUMAGE (en bas) -->
        <button class="btn-power" id="btn-power" onclick="machine.onOff()">
            <span class="power-led" id="led-power"></span>
            <span class="power-icon">🔌</span>
            <span class="power-label" id="power-label">ALLUMER</span>
        </button>

    </div>

</div>

<script src="../assets/scripts/fonctionnement.js"></script>
</body>
</html>