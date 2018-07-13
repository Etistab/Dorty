<?php
require_once ('config.php');

if(isset($_POST['modele']) && isset($_POST['marque']) && isset($_POST['size']) && isset($_POST['res']) && isset($_POST['price']) && isset($_POST['quantity'])) {
    $req = $db->prepare('INSERT INTO tv(modele, marque, size, res, price, quantity, stock) VALUES(:modele, :marque, :size, :res, :price, :quantity, 1)');
    $req->execute(array(
        "modele" => $_POST['modele'],
        "marque" => $_POST['marque'],
        "size" => $_POST['size'],
        "res" => $_POST['res'],
        "price" => $_POST['price'],
        "quantity" => $_POST['quantity']
    ));
    echo '1';
}
