<?php
require_once ('config.php');

$req = $db->query('SELECT * FROM tv WHERE stock = 1 ORDER BY sold DESC');
$tvs = $req->fetchAll();

echo json_encode($tvs);