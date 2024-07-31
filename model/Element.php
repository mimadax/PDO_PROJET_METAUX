<?php

// --------------------------------
// Classe des éléments chimiques
// --------------------------------

class Element {

    private int $id;
    private string $nom;
    private string $symbole;
    private string $famille;
    private float $pointFusion;
    private float $masseAtomique;
    private int $numeroAtomique;
    private ?string $imageUrl;

    public function hydrate(string $nom, string $symbole, string $famille, float $pointFusion, float $masseAtomique, int $numeroAtomique, ?string $imageUrl) {
        $this->setNom($nom);
        $this->setSymbole($symbole);
        $this->setFamille($famille);
        $this->setPointFusion($pointFusion);
        $this->setMasseAtomique($masseAtomique);
        $this->setNumeroAtomique($numeroAtomique);
        $this->setImageUrl($imageUrl);
    }
    
    public function getId() : int {
        return $this->id;
    }
    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getNom() : string {
        return $this->nom;
    }
    public function setNom(string $nom) : void {
        $this->nom = $nom;
    }

    public function getSymbole() : string {
        return $this->symbole;
    }
    public function setSymbole(string $symbole) : void {
        $this->symbole = $symbole;
    }

    public function getFamille() : string {
        return $this->famille;
    }
    public function setFamille(string $famille) : void {
        $this->famille = $famille;
    }

    public function getPointFusion() : float {
        return $this->pointFusion;
    }
    public function setPointFusion(float $pointFusion) : void {
        $this->pointFusion = $pointFusion;
    }

    public function getMasseAtomique() : float {
        return $this->masseAtomique;
    }
    public function setMasseAtomique(float $masseAtomique) : void {
        $this->masseAtomique = $masseAtomique;
    }

    public function getNumeroAtomique() : int {
        return $this->numeroAtomique;
    }
    public function setNumeroAtomique(int $numeroAtomique) : void {
        $this->numeroAtomique = $numeroAtomique;
    }

    public function getImageUrl() : ?string {
        return $this->imageUrl;
    }
    public function setImageUrl(?string $imageUrl) : void {
        $this->imageUrl = $imageUrl;
    }
}
?>
