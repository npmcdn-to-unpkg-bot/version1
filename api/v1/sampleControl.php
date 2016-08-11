<?php
include_once 'listmetier.php';
include_once 'modelmetier.php';
include_once 'gabarits.php';
$mode = $_GET['mode'];
if($mode == 0) {
    $id = $_GET["id"];
    $sample = new gabarits();
    $sample = $sample->findByIdModel($id);
    print json_encode($sample);
    return;
}