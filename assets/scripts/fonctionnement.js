const machine = {

    async appelerAPI(action, params = {}) {
        const query = new URLSearchParams({ action, ...params });
        try {
            const reponse = await fetch(`../public/api.php?${query}`);
            const donnees = await reponse.json();
            this.mettreAJourAffichage(donnees);
            console.log("✅ API réponse :", donnees); // ← Pour voir dans la console !
            return donnees;
        } catch (erreur) {
            console.error("❌ Erreur API :", erreur);
        }
    },

    // =========== MÉTHODES ===========

    onOff() {
        this.appelerAPI('on_off');
    },

    mettreUneDosette() {
        this.appelerAPI('dosette');
    },

    ajouterSucre(nb) {
        this.appelerAPI('sucre', { nb });
    },

    insererPiece(montant) {
        this.appelerAPI('piece', { montant });
    },

    faireDuCafe() {
        this.appelerAPI('cafe');
    },

    // =========== AFFICHAGE ===========

    mettreAJourAffichage(donnees) {
        // Message sur l'écran
        document.getElementById("message").textContent = donnees.message;

        const m = donnees.machine;

        // Solde et sucre
        document.getElementById("solde-ecran").textContent = m.solde.toFixed(2) + "€";
        document.getElementById("sucre-ecran").textContent = m.sucre;
        document.getElementById("sucre-valeur").textContent = m.sucre;

        // LED allumage
        const powerLed = document.getElementById("led-power");
        powerLed.classList.toggle("active", m.enFonction);

        // LED dosette
        const dosetteLed = document.getElementById("dosette-led");
        dosetteLed.classList.toggle("active", m.cafe);

        // Animation si le café a été préparé
        if (donnees.message.includes("prêt") || donnees.message.includes("Monnaie")) {
            this.animerCafe();
        }
    },

    animerCafe() {
        const goutte = document.getElementById("goutte");
        const tasse = document.getElementById("tasse-contenu");
        const fumee = document.getElementById("fumee");

        goutte.classList.add("active");
        tasse.classList.add("pleine");
        fumee.classList.add("active");

        setTimeout(() => goutte.classList.remove("active"), 2000);
        setTimeout(() => tasse.classList.remove("pleine"), 4000);
        setTimeout(() => fumee.classList.remove("active"), 5000);
    }
};