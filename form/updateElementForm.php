<?php
// --------------------------------
// Formulaire pour la mise à jour des éléments chimiques
// --------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour un élément chimique</title>
</head>

<body>
    <h1>Mettre à jour un élément chimique</h1>

    <?php
    if(isset($success)){
        echo "<p style ='color:green'>$success</p>";
    }else{
        if(isset($error)){
            echo'<p style="color:red">' .$error->getMessage().'</p>';
        }?>
        <form method="post">
            <label for="nom">Nom de l'élément :</label>
            <input type="text" name="nom" id="nom" placeholder="Nom de l'élément" value="<?=htmlentities($_POST['nom']?? $element->getNom() ??'')?>"><br><br>

            <label for="symbole">Symbole :</label>
            <input type="text" name="symbole" id="symbole" placeholder="Symbole" value="<?=htmlentities($_POST['symbole']?? $element->getSymbole() ??'')?>"><br><br>

            <label for="famille">Famille :</label>
            <input type="text" name="famille" id="famille" placeholder="Famille" value="<?=htmlentities($_POST['famille']?? $element->getFamille() ??'')?>"><br><br>

            <label for="pointFusion">Point de Fusion (°C) :</label>
            <input type="number" step="0.01" name="pointFusion" id="pointFusion" placeholder="Point de Fusion" value="<?=htmlentities($_POST['pointFusion']?? $element->getPointFusion() ??'')?>"><br><br>

            <label for="masseAtomique">Masse Atomique (g/mol) :</label>
            <input type="number" step="0.01" name="masseAtomique" id="masseAtomique" placeholder="Masse Atomique" value="<?=htmlentities($_POST['masseAtomique']?? $element->getMasseAtomique() ??'')?>"><br><br>

            <label for="numeroAtomique">Numéro Atomique :</label>
            <input type="number" name="numeroAtomique" id="numeroAtomique" placeholder="Numéro Atomique" value="<?=htmlentities($_POST['numeroAtomique']?? $element->getNumeroAtomique() ??'')?>"><br><br>

            <label for="imageUrl">URL de l'Image :</label>
            <input type="url" name="imageUrl" id="imageUrl" placeholder="URL de l'Image" value="<?=htmlentities($_POST['imageUrl']?? $element->getImageUrl() ??'')?>"><br><br>

            <input type="submit" value="Mettre à jour">
        </form>
    <?php
    }
    ?>

    <p><a href="?page=element">Revenir à la liste des éléments chimiques</a></p>

</body>
</html>
