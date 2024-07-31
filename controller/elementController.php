<?php

// --------------------------------
// Contrôleur des éléments chimiques
// --------------------------------

require_once 'model/ElementManager.php';

if (!empty($_GET['action'])) {

    if ($_GET['action'] == 'create') {
        if (!empty($_POST)) {
            // Vérification des champs obligatoires
            if (!empty($_POST['nom']) && 
                !empty($_POST['symbole']) && 
                !empty($_POST['famille']) && 
                isset($_POST['pointFusion']) && 
                isset($_POST['masseAtomique']) && 
                isset($_POST['numeroAtomique'])) { 
                
                try {
                    // Création de l'objet
                    $element = new Element();

                    // Hydratation de l'objet
                    $element->hydrate(
                        $_POST['nom'], 
                        $_POST['symbole'], 
                        $_POST['famille'], 
                        floatval($_POST['pointFusion']), 
                        floatval($_POST['masseAtomique']), 
                        intval($_POST['numeroAtomique']), 
                        $_POST['imageUrl'] ?? null
                    );

                    // Insertion dans la base de données
                    ElementManager::create($element);

                    // Message de succès
                    $success = 'Les informations obligatoires ont bien été reçues';
                } catch (Exception $error) {
                    // Capture des exceptions et stockage du message d'erreur
                    $errorMessage = $error->getMessage();
                }

            } else {
                $errorMessage = 'Tous les champs sont obligatoires';
            }
        }
        require_once 'form/createElementForm.php';

    } elseif ($_GET['action'] == 'update') {
        if (!empty($_GET['element_id'])) {
            try {
                $element = ElementManager::getOne(intval($_GET['element_id']));
                if (!empty($_POST)) {
                    if (!empty($_POST['nom']) && 
                        !empty($_POST['symbole']) && 
                        !empty($_POST['famille']) && 
                        isset($_POST['pointFusion']) && 
                        isset($_POST['masseAtomique']) && 
                        isset($_POST['numeroAtomique'])) {
                        
                        try {
                            // Hydratation de l'objet
                            $element->hydrate(
                                $_POST['nom'], 
                                $_POST['symbole'], 
                                $_POST['famille'], 
                                floatval($_POST['pointFusion']), 
                                floatval($_POST['masseAtomique']), 
                                intval($_POST['numeroAtomique']), 
                                $_POST['imageUrl'] ?? null
                            );

                            // Mise à jour dans la base de données
                            ElementManager::update($element); 
                            $success = 'Élément trouvé dans la base de données et mis à jour avec succès';  
                        } catch (Exception $error) {
                            $errorMessage = $error->getMessage();
                        }
                    } else {
                        $errorMessage = 'Tous les champs sont obligatoires';
                    }
                }
                // Traitement du formulaire se fera ici
                require_once 'form/updateElementForm.php';
            } catch (Exception $error) {
                require_once 'view/404View.php';
            }
        } else {
            require_once 'view/404View.php';
        }

    } elseif ($_GET['action'] == 'delete') {
        if (!empty($_GET['element_id'])) {
            try {
                $element = ElementManager::getOne(intval($_GET['element_id']));
                if (!empty($_POST['confirm'])) {
                    if ($_POST['confirm'] == 'OUI') {
                        try {
                            ElementManager::delete($element);
                            $success = 'Élément supprimé';
                        } catch (Exception $error) {
                            $errorMessage = $error->getMessage();
                        }
                    } else {
                        header('Location: ?page=element&element_id=' . $element->getId());
                        exit;
                    }
                }
                require_once 'form/deleteElementForm.php';
            } catch (Exception $error) {
                require_once 'view/404View.php';
            }
        } else {
            require_once 'view/404View.php';
        }

    } else {
        require_once 'view/404View.php';
    }

} elseif (!empty($_GET['element_id'])) {
    try {
        // Récupération de l'élément chimique avec l'identifiant donné
        $element = ElementManager::getOne(intval($_GET['element_id']));
        // Inclusion de la vue pour afficher les détails de l'élément
        require_once 'view/elementView.php';
    } catch (Exception $error) {
        // Inclusion de la vue d'erreur 404 si l'élément n'est pas trouvé ou une autre erreur se produit
        require_once 'view/404View.php';
    }
} else {
    if (!empty($_GET['search'])) {
        // Recherche des éléments chimiques
        $elements = ElementManager::search($_GET['search']);
    } elseif (!empty($_GET['view'])) {
        // Gestion des différentes vues
        if ($_GET['view'] == 'metaux') {
            $elements = ElementManager::getMetals();
        } elseif ($_GET['view'] == 'pointFusion') {
            $elements = ElementManager::getElementsByPointFusion();
        } else {
            $elements = ElementManager::getAll();
        }
    } else {
    // Récupération de tous les éléments chimiques
    $elements = ElementManager::getAll();
}
// Inclusion de la vue pour afficher la liste des éléments
require_once 'view/elementsView.php';
}
?>
