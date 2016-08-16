<?php
include_once 'include_all.php';
$mode = $_GET['mode'];
if($mode == 0) {
    $id = $_GET["id"];
    $sample = new gabarits();
    $sample = $sample->findByIdModel($id);
    print json_encode($sample);
    return;
}
else if($mode == 1) {
    $type = $_GET["type"];
    $sample = new gabarits();
    $sample = $sample->findByType($type);
    $arrData = [];
    foreach($sample as $ligne) {
        $img_src = [];
        $img_src[] =array('id'=>$ligne["id"], "src"=>$ligne["src"]);
        $arrData[] = array('id'=>$ligne["id"], 'title'=>$ligne["description"], 'thumbnail_src'=>$ligne["src"], 'img_src'=>$img_src);
    }
    print json_encode($arrData);
    //print json_encode($sample);
    return;
}
else if($mode == 2){
    $data = json_encode($_GET["data"]);
    $sample = new sample();
    $sample->setIdModelMetier(2);
    $sample->setDescription("1324568");
    $sample->setContent(($data));
    $sample->save();
    print json_decode($data);
}