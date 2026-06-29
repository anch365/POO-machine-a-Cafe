<?php
class MachineACafe
{
    private string $marque;
    private bool $cafe;
    private bool $enFonction;
    private int $sucre;
    private float $solde;
    private float $prixCafe;

    public function __construct(string $marque = "Senseo")
    {
        $this->marque = $marque;
        $this->cafe = false;
        $this->enFonction = false;
        $this->sucre = 0;
        $this->solde = 0;
        $this->prixCafe = 1.50;
    }

    // Getters & Setters
    public function getCafe(): bool
    {
        return $this->cafe;
    }

    public function getMarque(): string
    {
        return $this->marque;
    }

    public function getEnFonction(): bool
    {
        return $this->enFonction;
    }

    /**
     * Si la machine est éteinte, elle s'allume ($enFonction passe à true). Sinon elle s'éteint
     */
    public function on_off(): string
    {
        $this->enFonction = !$this->enFonction;

        return "La machine $this->marque est " . ($this->enFonction ? 'allumée' : 'éteinte');
    }

    /**
     * Si il n'y a pas de dosette on en ajoute une ($café passe à true)
     */
    public function mettreUneDosette(): string
    {
        if ($this->cafe) {
            return "Une dosette est déjà présente.";
        }

        $this->cafe = true;

        return "La dosette est ajoutée.";
    }

    /**
     * Permets à la machine de faire du café. Pour ça il faut que la machine soit allumée ($enFonction doit être true) et qu'il y a une dosette ($cafe doit être true).
     * Si les conditions sont réunis la machine affiche un message à l'utilisateur comme quoi le café est prêt. De plus, la dosette est consommée donc $café passe à faux
     */
    public function faireDuCafe(): string
    {
        // Allumer la machine

        if (!$this->enFonction) {
            return "La machine est éteinte.";
        }

        // Ajout d'une dosette de café

        if (!$this->cafe) {
            return "Veuillez ajouter une dosette.";
        }

        // Paiement du café

        // Préparation du café avec ou sans sucre

        $this->cafe = false;

        // Phrase à afficher
        $message = "Le café est prêt avec " . $this->sucre . " sucre(s)☕ " ;


        return $message;
    }

    
    /**
     * Insertion de la pièce
     */
    public function insererPiece(float $montant): string
    {
        $this->solde += $montant;

        return "Vous avez inséré {$montant} €. Solde : {$this->solde} €";
    }


    /**
     * Retourne l'état complet de la machine (pour l'API JSON)
     */
    public function getEtat(): array
    {
        return [
            'marque'      => $this->marque,
            'enFonction'  => $this->enFonction,
            'cafe'        => $this->cafe,
            'prixCafe'    => $this->prixCafe,
        ];
    }
}
