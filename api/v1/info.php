<?php
include_once 'listmetier.php';
include_once 'modelmetier.php';
$mode = $_GET['mode'];
if($mode == 0) {
    $metier = new listmetier();
    $metier = $metier->rechercher();

    print json_encode($metier);
    return;
}
else if($mode == 1) {
    $metier = new listmetier();
    $metier->setLibelle($_GET["desig"]);
    $metier->setSubLibelle($_GET["sub_desig"]);
    $metier->setActive(1);
   $re= $metier->save();
    print $re;
    return;
}
else if($mode == 2) {
    $metier = new modelmetier();
    $metier = $metier->rechercher();
    print json_encode($metier);
    return;
}