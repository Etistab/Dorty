<?php
require_once ('config.php');

if(isset($_GET['id']) && $_GET['id'] > 0) {
    $req = $db->prepare('SELECT quantity FROM tv WHERE id = :id');
    $req->execute(array("id" => $_GET['id']));
    $quantity = $req->fetch();
    $req->closeCursor();

    if ($quantity['quantity'] == 0){
        $req = $db->prepare('UPDATE tv SET stock = 0 WHERE id = :id');
        $req->execute(array("id" => $_GET['id']));
        $req->closeCursor();
        echo 'done';
    }
}