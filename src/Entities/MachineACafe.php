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

    /**
     * Si la machine est éteinte, elle s'allume ($enFonction passe à true). Sinon elle s'éteint
     */
    public function on_off(): string
    {
        // if (!$this->enFonction) {

        //     $this->enFonction = true;
        //     return "La machine $this->marque est allumée";
        // } else {
        //     $this->enFonction = false;
        //     return "La machine $this->marque est éteinte";
        // }

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

        if ($this->solde < $this->prixCafe) {
            return "Le montant est insuffisant";
        }

        $monnaie = $this->solde - $this->prixCafe;

        $this->solde = 0;


        // Préparation du café avec ou sans sucre

        $this->cafe = false;

        // Phrase à afficher
        $message = "Le café est prêt avec " . $this->sucre . " sucre(s)☕ " . "Monnaie rendue : " . "{$monnaie} €";

        $this->sucre = 0;

        return $message;
    }

    /**
     * Fonction d'ajout du sucre
     */
    public function ajouterSucre(int $quantite = 0): string
    {
        // Calcul du nouveau total
        $nouveauSucre = $this->sucre + $quantite;

        // Vérifier les limites
        if ($nouveauSucre < 0) {
            return "Vous ne pouvez pas retirer plus de {$this->sucre} sucre(s).";
        }
        if ($nouveauSucre > 5) {
            return "Maximum 5 sucres atteint.";
        }

        // Ajouter (ou retirer) le sucre
        $this->sucre += $quantite;

        if ($quantite > 0) {
            return "+{$quantite} sucre(s). Total : {$this->sucre}";
        } elseif ($quantite < 0) {
            $retrait = abs($quantite);
            return "-{$retrait} sucre(s). Total : {$this->sucre}";
        } else {
            return "Aucun changement. Sucre : {$this->sucre}";
        }
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
            'sucre'       => $this->sucre,
            'solde'       => $this->solde,
            'prixCafe'    => $this->prixCafe,
        ];
    }
}
