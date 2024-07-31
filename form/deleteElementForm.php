<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un élément chimique</title>
</head>
<body>
    <h1>Supprimer un élément chimique</h1>

    <?php if (isset($success)): ?>
        <p style="color: green;"><?= htmlentities($success) ?></p>
        <p><a href="?page=element">Retour à la liste des éléments chimiques</a></p>
    <?php else: ?>
        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?= htmlentities($errorMessage) ?></p>
        <?php endif; ?>
        <h2>Êtes-vous sûr de vouloir supprimer <strong><?= htmlentities($element->getNom()) ?></strong> ?</h2>
        <form method="post">
            <input type="submit" name="confirm" value="OUI">
            <input type="submit" name="confirm" value="NON">
        </form>
    <?php endif; ?>
</body>
</html>