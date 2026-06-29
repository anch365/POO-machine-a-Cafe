const machine = {

    async appelerAPI(action, params = {}) {
        const query = new URLSearchParams({ action, ...params });
        try {
            const reponse = await fetch(`../public/api.php?${query}`);
            const donnees = await reponse.json();
            this.mettreAJourAffichage(donnees);
            console.log("✅ API :", donnees);
            return donnees;
        } catch (erreur) {
            console.error("❌ Erreur API :", erreur);
        }
    },

    onOff() { this.appelerAPI('on_off'); },
    mettreUneDosette() { this.appelerAPI('dosette'); },
    faireDuCafe() { this.appelerAPI('cafe'); },

    mettreAJourAffichage(donnees) {
        const m = donnees.machine;

        

        // LED dosette (rouge → vert)
        const ledDosette = document.getElementById("led-dosette");
        ledDosette.classList.toggle("active", m.cafe);

        // Bouton allumage (rouge → vert)
        const btnPower = document.getElementById("btn-power");
        const ledPower = document.getElementById("led-power");
        const labelPower = document.getElementById("power-label");

        if (m.enFonction) {
            btnPower.classList.add("allume");
            ledPower.classList.add("allume");
            labelPower.textContent = "ALLUMÉ";
        } else {
            btnPower.classList.remove("allume");
            ledPower.classList.remove("allume");
            labelPower.textContent = "ALLUMER";
        }

        // Animation café
        if (donnees.message.includes("prêt") || donnees.message.includes("dégustation")) {
            this.animerCafe();
        }
    },

    animerCafe() {
        const goutte = document.getElementById("goutte");
        const tasse = document.getElementById("tasse-contenu");
        const fumee = document.getElementById("fumee");

        if (goutte) {
            goutte.classList.add("active");
            setTimeout(() => goutte.classList.remove("active"), 2000);
        }
        if (tasse) {
            tasse.classList.add("pleine");
            setTimeout(() => tasse.classList.remove("pleine"), 4000);
        }
        if (fumee) {
            fumee.classList.add("active");
            setTimeout(() => fumee.classList.remove("active"), 5000);
        }
    }
};