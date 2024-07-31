<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des éléments chimiques</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <p><a href="?" class="btn btn-primary">Revenir à l'accueil</a></p>
        <h1 class="my-4">Liste des éléments chimiques</h1>
        
        <!-- Formulaire de recherche -->
        <form method="get" action="" class="form-inline mb-4">
            <input type="hidden" name="page" value="element">
            <input type="text" name="search" placeholder="Rechercher un élément" value="<?= htmlentities($_GET['search'] ?? '') ?>" class="form-control mr-2">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        <!-- Boutons de navigation -->
        <p>
            <a href="?page=element" class="btn btn-secondary">Tous les éléments</a>
            <a href="?page=element&view=metaux" class="btn btn-secondary">Afficher les métaux</a>
            <a href="?page=element&view=pointFusion" class="btn btn-secondary">Trier par point de fusion</a>
        </p>

        <!-- Boutons ajout element -->
        <p><a href="?page=element&action=create" class="btn btn-success">Ajouter un élément</a></p>

        <ul class="list-group">
            <?php foreach ($elements as $element) : ?>
                <li class="list-group-item"><h2><a href="?page=element&element_id=<?= $element->getId() ?>"><?= htmlentities($element->getNom()) ?></a></h2></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
