<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Élément Chimique</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Créer un Élément Chimique</h1>

        <?php
        if(isset($success )){
            echo "<p style ='color:green'>$success </p>";
        }else{
            if(isset($error)){
                echo'<p style="color:red">' .$error->getMessage().'</p>';
        }?>

        <form method="post">
            <label for="nom">Nom de l'élément :</label>
            <input type="text" id="nom" name="nom" value="<?= htmlentities($_POST['nom'] ?? '') ?>" class="form-control" required><br>

            <label for="symbole">Symbole :</label>
            <input type="text" id="symbole" name="symbole" value="<?= htmlentities($_POST['symbole'] ?? '') ?>" class="form-control" required><br>

            <label for="famille">Famille :</label>
            <input type="text" id="famille" name="famille" value="<?= htmlentities($_POST['famille'] ?? '') ?>" class="form-control" required><br>

            <label for="pointFusion">Point de Fusion (°C) :</label>
            <input type="number" step="0.01" id="pointFusion" name="pointFusion" value="<?= htmlentities($_POST['pointFusion'] ?? '') ?>" class="form-control" required><br>

            <label for="masseAtomique">Masse Atomique (g/mol) :</label>
            <input type="number" step="0.01" id="masseAtomique" name="masseAtomique" value="<?= htmlentities($_POST['masseAtomique'] ?? '') ?>" class="form-control" required><br>

            <label for="numeroAtomique">Numéro Atomique :</label>
            <input type="number" id="numeroAtomique" name="numeroAtomique" value="<?= htmlentities($_POST['numeroAtomique'] ?? '') ?>" class="form-control" required><br>

            <label for="imageUrl">URL de l'Image :</label>
            <input type="url" id="imageUrl" name="imageUrl" value="<?= htmlentities($_POST['imageUrl'] ?? '') ?>" class="form-control"><br>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <?php
        }
        ?>
    </div>

    <p><a href="?page=element" class="btn btn-primary">Revenir à la liste des element</a></p>
    
</body>
</html>

