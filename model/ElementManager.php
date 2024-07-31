<?php

// --------------------------------
// Manager des éléments chimiques
// --------------------------------

require_once 'Element.php';
require_once 'connectbdd.php';

class ElementManager {

    public static function getAll() : array {
        global $bd;
        $stmt = $bd->query('SELECT * FROM elements'); // Remplacez 'monument' par 'elements'
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Element'); // Remplacez 'monument' par 'Element'
        return $results;
    }

    public static function getOne(int $elementId) : Element {
        global $bd;
        $stmt = $bd->prepare('SELECT * FROM elements WHERE id=?'); // Remplacez 'monument' par 'elements'
        $stmt->execute([$elementId]);
        $result = $stmt->fetchObject('Element'); // Remplacez 'monument' par 'Element'
        if($result == false) {
            throw new Exception("Élément non trouvé");
        } else {
            return $result;
        }
    }

    public static function create(Element $element) : void {
        global $bd;
        $stmt = $bd->prepare('INSERT INTO elements (nom, symbole, famille, pointFusion, masseAtomique, numeroAtomique, imageUrl) VALUES (?,?,?,?,?,?,?)');
        $stmt->execute([
            $element->getNom(), 
            $element->getSymbole(), 
            $element->getFamille(), 
            $element->getPointFusion(), 
            $element->getMasseAtomique(), 
            $element->getNumeroAtomique(), 
            $element->getImageUrl()
        ]);
    }

    public static function update(Element $element) : void {
        global $bd;
        $stmt = $bd->prepare('UPDATE elements SET nom=?, symbole=?, famille=?, pointFusion=?, masseAtomique=?, numeroAtomique=?, imageUrl=? WHERE id=?');
        $stmt->execute([
            $element->getNom(), 
            $element->getSymbole(), 
            $element->getFamille(), 
            $element->getPointFusion(), 
            $element->getMasseAtomique(), 
            $element->getNumeroAtomique(), 
            $element->getImageUrl(), 
            $element->getId()
        ]);
    }

    public static function delete(Element $element) : void {
        global $bd;
        $stmt = $bd->prepare('DELETE FROM elements WHERE id=?');
        $stmt->execute([$element->getId()]);
    }

    public static function search(string $term) : array {
        global $bd;
        $stmt = $bd->prepare('SELECT * FROM elements WHERE nom LIKE ? OR symbole LIKE ?');
        $term = '%' . $term . '%';
        $stmt->execute([$term, $term]);
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Element');
        return $results;
    }

    // Nouvelle méthode pour obtenir les métaux
    public static function getMetals() : array {
        global $bd;
        $stmt = $bd->query("SELECT * FROM elements WHERE famille LIKE '%métal%'");
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Element');
        return $results;
    }

    // Nouvelle méthode pour trier les éléments par point de fusion
    public static function getElementsByPointFusion() : array {
        global $bd;
        $stmt = $bd->query("SELECT * FROM elements ORDER BY pointFusion DESC");
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Element');
        return $results;
    }
    
}
?>