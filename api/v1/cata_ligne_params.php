<?php
/**
 * Created by PhpStorm.
 * User: Trisha
 * Date: 13/07/2016
 * Time: 22:43
 */
include_once '../chromePHP.php';

class cata_ligne_params {
    //**** Variables declarations ****
    private $_id = null;
    private $_id_cata_ligne = null;
    private $_title = null;
    private $_src = null;
    private $_type = null;
    private $_params = null;

   private static $SELECT="SELECT * FROM CATA_LIGNE_PARAMS";
    //**** Constructeur ****
    public function __construct() {
        require_once 'dbConnect.php';
        // opening db connection
        $db = new dbConnect();
        $this->conn = $db->connect();
    }

    //**** Setters *****
    public function setId($id) {
        $this->_id= $id;
    }
    public function setIdCataLigne($id) {
        $this->_id_cata_ligne= $id;
    }

    public function setTitle($title) {
        $this->_title= $title;
    }

    public function setSrc($src) {
        $this->_src= $src;
    }

    public function setType($type) {
        $this->_type= $type;
    }

    public function setParams($params) {
        $this->_params= $params;
    }
    //**** Getters *****

    public function getId() {
        return $this->_id;
    }

    public function getIdCataLigne() {
        return $this->_id_cata_ligne;
    }

    public function getSrc() {
        return $this->_src;
    }


    public function getTitle() {
        return $this->_title;
    }

    public function getType() {
        return $this->_type;
    }

    public function getParams() {
        return $this->_params;
    }

    public function delete($id) {
        $requete = "DELETE FROM CATA_LIGNE_PARAMS WHERE id=" . $id ;
        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
    }


    //***** fonction de modification/cr�ation *****
    public function save() {

        if ($this->_id > 0) {
            $requete = "UPDATE CATA_LIGNE_PARAMS SET TITLE='" . ($this->_title) . "'";
            $requete .= ",SRC='" . $this->_src . "'";
            $requete .= ",ID_CATA_LIGNE='" . $this->_id_cata_ligne . "'";
            $requete .= ",TYPE='" . $this->_type . "'";
            $requete .= ",PARAMS='" . $this->_params . "'";
            $requete .= " WHERE ID=" . $this->_id;

        } else {
            $requete = "INSERT INTO CATA_LIGNE_PARAMS (";
            $requete .= "TITLE,";
            $requete .= "SRC,";
            $requete .= "ID_CATA_LIGNE,";
            $requete .= "TYPE,";
            $requete .= "PARAMS";
            $requete .= ") VALUES (";
            $requete .= "'" . $this->_title . "',";
            $requete .= "'" . $this->_src . "',";
            $requete .= "'" . $this->_id_cata_ligne . "',";
            $requete .= "'" . $this->_type . "',";
            $requete .= "'" . $this->_params . "')";
        }

        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        return $r;
    }



    //***** Fonction de passege sql->objet *****
    private function mapSqlToObject($rs) {
        $cata_ligne_params = new cata_ligne_params();
        $cata_ligne_params->_id = $rs["id"];
        $cata_ligne_params->_title = $rs["title"];
        $cata_ligne_params->_src = $rs["src"];
        $cata_ligne_params->_id_cata_ligne = $rs["id_cata_ligne"];
        $cata_ligne_params->_type = $rs["type"];
        $cata_ligne_params->_params = $rs["params"];
        return $cata_ligne_params;
    }

    public function rechercher() { // Recherche de toutes les adresses
        $listLOG =	 array();
        $requete = self::$SELECT;
        $rs = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        $rows = [];
        while($row = mysqli_fetch_array($rs))
        {
            $rows[] = $row;
        }
        return $rows;
    }

    public function findByPrimaryKey($key) { // Recherche d'une adresse par id
        $requete = self::$SELECT . " WHERE ID=" . $key;
        $rs = $this->conn->query($requete);
        if ($rs->EOF) {
            return null;
        }
        return $this->mapSqlToObject(mysqli_fetch_array($rs));
    }

    public function getLastId(){
        $requete = "SELECT MAX(ID) AS ID FROM CATA_LIGNE_PARAMS";
        $rs = $this->conn->query($requete);
        $result = mysqli_fetch_array($rs);
        return $result["ID"];
    }

    public function findByIdCata($id){
        $requete = "SELECT * FROM CATA_LIGNE_PARAMS WHERE ID_CATA_LIGNE=".$id;
        $rs = $this->conn->query($requete);
        $rows = [];
        while($row = mysqli_fetch_array($rs))
        {
            //$rows[] = array("id_cata_ligne"=>$rs["id_cata_ligne"], "params"=>unserialize($rs["params"]), "src"=>$rs["src"] , "title" => $rs["title"] , "type" => $rs["type"]);
            array_push($rows,array("id_cata_ligne"=>$row["id_cata_ligne"], "parameters"=>(unserialize($row["params"])), "source"=>$row["src"] , "title" => $row["title"] , "type" => $row["type"]) );
        }

        return $rows;
    }

} 