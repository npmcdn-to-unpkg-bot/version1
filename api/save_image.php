<?php
require_once 'v1/dbHandler.php';
include_once 'v1/include_all.php';
include_once 'chromePHP.php';
/*
*
* An example php that gets the 64 bit encoded PNG URL and creates an image of it
*
*/
chromePHP::log("TESTING 1 2 3");
$db = new DbHandler();
$session = $db->getSession();
chromePHP::log("SESSION VALUES HOPEFULLY ".$session['uid'] . "  ---  " . $session['email'] . "  ::  " . $session['name'] . "  --  " . $session['admin']);
chromePHP::log(json_encode($session));
chromePHP::log(($session));
chromePHP::log("------------------------");
//get the base-64 from data
$base64_str = substr($_POST['base64_image'], strpos($_POST['base64_image'], ",")+1);

//decode base64 string

chromePHP::log(json_encode($_POST["metiers"]));

$decoded = base64_decode($base64_str);
$strTime = strtotime('now').".png";
$png_url = "../images/flat_images/product_".$strTime;
//create png from decoded base 64 string and save the image in the parent folder
$result = file_put_contents($png_url, $decoded);
$cata = new cata();
$cata->setLibelle($_POST["libelle"]);
$cata->setDescription($_POST["description"]);
$cata->setSrc("images/flat_images/product_".$strTime);
$cata->setIdFront(0);
$cata->setIdBack(0);
$cata->setReference($_POST["ref"]);
$cata->setCreatedBy($session['uid']);
$cata->setModifiedBy($session['uid']);
$cata->save();

$lastID = $cata->getLastId();

$cata = $cata->findByPrimaryKey($lastID);

foreach($_POST["metiers"] as $ligne){
    chromePHP::log($ligne);
    $cata_metier = new cata_metier();
    $cata_metier->setId_Cata($lastID);
    $cata_metier->setId_Metier($ligne);
    $cata_metier->setActive(1);
    $cata_metier->save();
}
$contents = $_POST["data"];
$count=0;
foreach($contents as $ligne){
    $cata_ligne = new cata_ligne();
    $cata_ligne->setSrc($ligne["thumbnail"]);
    $cata_ligne->setTitle($ligne["title"]);
    $cata_ligne->save();
    $last_id = $cata_ligne->getLastId();
    if($count == 0) {
        $cata->setIdFront($last_id);
        foreach($ligne['elements'] as $sub_ligne){
            $cata_ligne_params = new cata_ligne_params();
            $cata_ligne_params->setTitle($sub_ligne["title"]);
            $cata_ligne_params->setSrc($sub_ligne["source"]);
            $cata_ligne_params->setType($sub_ligne["type"]);
            $cata_ligne_params->setParams(serialize($sub_ligne["parameters"]));
            $cata_ligne_params->setIdCataLigne($last_id);
            $cata_ligne_params->save();
        }
    }
    else{
        $cata->setIdBack($last_id);
        foreach($ligne['elements'] as $sub_ligne){
            $cata_ligne_params = new cata_ligne_params();
            $cata_ligne_params->setTitle($sub_ligne["title"]);
            $cata_ligne_params->setSrc($sub_ligne["source"]);
            $cata_ligne_params->setType($sub_ligne["type"]);
            $cata_ligne_params->setParams(serialize($sub_ligne["parameters"]));
            $cata_ligne_params->setIdCataLigne($last_id);
            $cata_ligne_params->save();
        }
    }
    $count++;
}

$cata->save();

$cata_ligne_params = new cata_ligne_params();
$test = $cata_ligne_params->findByPrimaryKey(1);

//send result - the url of the png or 0
header('Content-Type: application/json');
header_remove('Set-Cookie');
if($result) {
    print "product_".$strTime;
    die();
	//$png_url = get_folder_url().$png_url;
	//echo ($png_url);
}
else {
	echo json_encode(0);
}

//returns the current folder URL
function get_folder_url() {
	$url = $_SERVER['REQUEST_URI']; //returns the current URL
	$parts = explode('/',$url);
	$dir = $_SERVER['SERVER_NAME'];
    $dir = "";
	for ($i = 0; $i < count($parts) - 1; $i++) {
		$dir .= $parts[$i] . "/";
	}
	//return 'http://'.$dir;
	return $dir;
}