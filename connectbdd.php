<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=elementchimique', 'mima', '!WnpRtkpdmJ*Wyqp');
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>