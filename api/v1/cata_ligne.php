<?php
/**
 * Created by PhpStorm.
 * User: Trisha
 * Date: 13/07/2016
 * Time: 22:43
 */
include_once '../chromePHP.php';

class cata_ligne {
    //**** Variables declarations ****
    private $_id = null;
    private $_title = null;
    private $_src = null;

   private static $SELECT="SELECT * FROM CATA_LIGNE";
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

    public function setTitle($title) {
        $this->_title= $title;
    }
    public function setSrc($src) {
        $this->_src= $src;
    }


    //**** Getters *****

    public function getId() {
        return $this->_id;
    }

    public function getSrc() {
        return $this->_src;
    }


    public function getTitle() {
        return $this->_title;
    }

    public function delete($id) {
        $requete = "DELETE FROM CATA_LIGNE WHERE id=" . $id ;
        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
    }


    //***** fonction de modification/cr�ation *****
    public function save() {

        if ($this->_id > 0) {
            $requete = "UPDATE CATA_LIGNE SET TITLE='" . ($this->_title) . "'";
            $requete .= ",SRC='" . $this->_src . "'";
            $requete .= " WHERE ID=" . $this->_id;

        } else {
            $requete = "INSERT INTO CATA_LIGNE (";
            $requete .= "TITLE,";
            $requete .= "SRC";
            $requete .= ") VALUES (";
            $requete .= "'" . $this->_title . "',";
            $requete .= "'" . $this->_src . "')";
        }

        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        return $r;
    }



    //***** Fonction de passege sql->objet *****
    private function mapSqlToObject($rs) {
        $cata_ligne = new cata_ligne();
        $cata_ligne->_id = $rs->fields["ID"];
        $cata_ligne->_title = $rs->fields["TITLE"];
        $cata_ligne->_src = $rs->fields["SRC"];
        return $cata_ligne;
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
        return $this->mapSqlToObject($rs);
    }

    public function getLastId(){
        $requete = "SELECT MAX(ID) AS ID FROM CATA_LIGNE";
        $rs = $this->conn->query($requete);
        $result = mysqli_fetch_array($rs);
        return $result["ID"];
    }
} 