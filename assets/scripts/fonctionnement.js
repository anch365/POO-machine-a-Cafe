class MachineACafe {
  constructor(marque = "Senseo") {
    this.marque = marque;
    this.cafe = false; // Dosette présente ?
    this.enFonction = false; // Allumée ?
    this.sucre = 0;
    this.solde = 0;
    this.prixCafe = 1.5;

    this.afficherMessage("☕ Prêt à servir");
    this.mettreAJourAffichage();
  }

  // ============ MÉTIER ============

  onOff() {
    this.enFonction = !this.enFonction;
    const message = this.enFonction
      ? `✅ Machine ${this.marque} allumée`
      : `⏻ Machine ${this.marque} éteinte`;

    this.afficherMessage(message);
    this.mettreAJourAffichage();
    return message;
  }

  mettreUneDosette() {
    if (this.cafe) {
      const msg = "⚠️ Une dosette est déjà présente";
      this.afficherMessage(msg);
      return msg;
    }

    this.cafe = true;
    const msg = "✅ Dosette insérée";
    this.afficherMessage(msg);
    this.mettreAJourAffichage();
    return msg;
  }

  ajouterSucre(nb) {
    if (nb > 0) {
      this.sucre += nb;
      const msg = `🧂 +${nb} sucre(s)`;
      this.afficherMessage(msg);
    } else if (nb < 0 && this.sucre > 0) {
      // On ne peut pas retirer plus que ce qu'on a
      const retrait = Math.min(Math.abs(nb), this.sucre);
      this.sucre -= retrait;
      const msg = `🧂 -${retrait} sucre(s)`;
      this.afficherMessage(msg);
    } else if (nb < 0 && this.sucre <= 0) {
      this.afficherMessage("⚠️ Aucun sucre à retirer");
    }

    this.mettreAJourAffichage();
  }

  insererPiece(montant) {
    this.solde += montant;
    const msg = `💰 ${montant.toFixed(2)}€ inséré. Solde : ${this.solde.toFixed(2)}€`;
    this.afficherMessage(msg);
    this.mettreAJourAffichage();
  }

  faireDuCafe() {
    // Vérifications
    if (!this.enFonction) {
      this.afficherMessage("⚠️ La machine est éteinte. Allumez-la d'abord.");
      return;
    }

    if (!this.cafe) {
      this.afficherMessage("⚠️ Ajoutez une dosette d'abord.");
      return;
    }

    if (this.solde < this.prixCafe) {
      const manque = (this.prixCafe - this.solde).toFixed(2);
      this.afficherMessage(`⚠️ Insuffisant. Il manque ${manque}€`);
      return;
    }

    // ✅ Tout est bon, on prépare le café !
    const monnaie = this.solde - this.prixCafe;
    this.solde = 0;
    this.cafe = false;

    // Animation de la tasse
    this.animerCafe();

    // Message de succès
    let message = "☕ Café en préparation...";
    if (this.sucre > 0) {
      message += ` (${this.sucre} sucre(s))`;
    }

    this.afficherMessage(message);
    this.mettreAJourAffichage();

    // Après 2 secondes, on finalise
    setTimeout(() => {
      let finalMsg = "☕ Votre café est prêt ! Bonne dégustation !";
      if (monnaie > 0) {
        finalMsg += ` 🪙 Monnaie : ${monnaie.toFixed(2)}€`;
      }
      this.afficherMessage(finalMsg);
      this.sucre = 0;
      this.mettreAJourAffichage();
    }, 2000);
  }

  // ============ AFFICHAGE ============

  afficherMessage(texte) {
    document.getElementById("message").textContent = texte;
  }

  mettreAJourAffichage() {
    // LED allumage
    const powerLed = document.getElementById("led-power");
    if (this.enFonction) {
      powerLed.classList.add("active");
    } else {
      powerLed.classList.remove("active");
    }

    // LED dosette
    const dosetteLed = document.getElementById("dosette-led");
    if (this.cafe) {
      dosetteLed.classList.add("active");
    } else {
      dosetteLed.classList.remove("active");
    }

    // Texte dosette
    const dosetteStatut = document.getElementById("dosette-statut");
    // optionnel: on peut laisser le texte statique

    // Solde et sucre sur l'écran
    document.getElementById("solde-ecran").textContent =
      this.solde.toFixed(2) + "€";
    document.getElementById("sucre-ecran").textContent = this.sucre;

    // Valeur sucre dans la molette
    const sucreValeur = document.getElementById("sucre-valeur");
    if (sucreValeur) {
      sucreValeur.textContent = this.sucre;
    }

    // Affichage du sucre dans l'écran
    const sucreEcran = document.getElementById("sucre-ecran");
    if (sucreEcran) {
      sucreEcran.textContent = this.sucre;
    }
  }

  animerCafe() {
    // Goutte qui coule
    const goutte = document.getElementById("goutte");
    goutte.classList.add("active");

    // Remplissage de la tasse
    const tasse = document.getElementById("tasse-contenu");
    tasse.classList.add("pleine");

    // 👇 AJOUTE ÇA : Activation de la fumée
    const fumee = document.getElementById("fumee");
    fumee.classList.add("active");

    // Après 2 secondes, on arrête l'animation de la goutte
    setTimeout(() => {
      goutte.classList.remove("active");
    }, 2000);

    // Après 3 secondes, on vide la tasse
    setTimeout(() => {
      tasse.classList.remove("pleine");
    }, 4000);

    // 👇 AJOUTE ÇA : Après 5 secondes, la fumée disparaît
    setTimeout(() => {
      fumee.classList.remove("active");
    }, 5000);
  }
  // ============ RESET ============

  reinitialiser() {
    this.cafe = false;
    this.enFonction = false;
    this.sucre = 0;
    this.solde = 0;

    // Reset visuel
    document.getElementById("goutte").classList.remove("active");
    document.getElementById("tasse-contenu").classList.remove("pleine");

    this.afficherMessage("🔄 Machine réinitialisée");
    this.mettreAJourAffichage();
  }
}

const machine = new MachineACafe();
