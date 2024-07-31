<?php 

// --------------------------------
// Routeur
// --------------------------------

if( !empty($_GET['page']) ) {

    if($_GET['page'] == 'element'){
        require_once('controller/elementController.php');
    } else { 
        require_once('view/404View.php');
    }

} else {
    require_once('view/homeView.php');
}
?>
