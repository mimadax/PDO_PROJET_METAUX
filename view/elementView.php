<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlentities($element->getNom()) ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <p><a href="?page=element" class="btn btn-primary">Revenir à la liste des éléments chimiques</a></p>
        <h1 class="my-4"><?= htmlentities($element->getNom()) ?></h1>
        <ul class="list-group">
            <li class="list-group-item"><b>Symbole</b> : <?= htmlentities($element->getSymbole()) ?></li>
            <li class="list-group-item"><b>Famille</b> : <?= htmlentities($element->getFamille()) ?></li>
            <li class="list-group-item"><b>Point de Fusion</b> : <?= htmlentities($element->getPointFusion()) ?> °C</li>
            <li class="list-group-item"><b>Masse Atomique</b> : <?= htmlentities($element->getMasseAtomique()) ?> g/mol</li>
            <li class="list-group-item"><b>Numéro Atomique</b> : <?= htmlentities($element->getNumeroAtomique()) ?></li>
            <?php if ($element->getImageUrl()): ?>
                <li class="list-group-item"><b>Image</b> : <img src="<?= htmlentities($element->getImageUrl()) ?>" alt="<?= htmlentities($element->getNom()) ?>" class="img-fluid"></li>
            <?php endif; ?>
        </ul>

        <p><a href="?page=element&action=update&element_id=<?= $element->getId() ?>" class="btn btn-warning mt-3">Modifier un élément</a></p>
        <p><a href="?page=element&action=delete&element_id=<?= $element->getId() ?>" class="btn btn-danger mt-1">Supprimer un élément</a></p>
    </div>
</body>
</html>
