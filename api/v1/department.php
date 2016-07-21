<?php
/**
 * Created by PhpStorm.
 * User: Trisha
 * Date: 13/07/2016
 * Time: 22:22
 */

class department {
    //**** Variables declarations ****
    private $_id_dept = null;
    private $_name = null;
    private $_description = null;

    //**** Constructeur ****
    public function __construct() {
        require_once 'dbConnect.php';
        // opening db connection
        $db = new dbConnect();
        $this->conn = $db->connect();
    }

    private static $SELECT="SELECT * FROM DEPARTMENT";
    //**** Setters *****
    public function setId_dept($id_dept) {
        $this->_id_dept= $id_dept;
    }

    public function setName($name) {
        $this->_name= $name;
    }

    public function setDescription($description) {
        $this->_description= $description;
    }

    //**** Getters *****

    public function getId_dept() {
        return $this->_id_dept;
    }


    public function getName() {
        return $this->_name;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function delete($id_dept) {
        $requete = "DELETE FROM DEPARTMENT WHERE id_dept=" . $id_dept ;
        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
    }


    //***** fonction de modification/cr�ation *****
    public function save() {
        // $this->_date_modified = date('Y/m/d H:i:s', time());
        /* if ($this->_created == null) {
             $this->_created = date('Y/m/d H:i:s', time());
         }*/
        if ($this->_id_dept > 0) {
            $requete = "UPDATE DEPARTMENT SET NAME='" . ($this->_name) . "'";
            $requete .= ",DESCRIPTION='" . $this->_description . "',";
            $requete .= " WHERE ID_DEPT=" . $this->_id_dept;

        } else {
            $requete = "INSERT INTO DEPARTMENT (";
            $requete .= "ID_DEPT,";
            $requete .= "NAME,";
            $requete .= "DESCRIPTION,";
            $requete .= ") VALUES (";
            $requete .= "'" . $this->_id_dept . "')";
            $requete .= "'" . $this->_name . "')";
            $requete .= "'" . $this->_description . "',";
        }

        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        return $r;
    }



    //***** Fonction de passege sql->objet *****
    private function mapSqlToObject($rs) {
        $dept = new department();
        $dept->_uid = $rs->fields["ID_DEPT"];
        $dept->_name = $rs->fields["NAME"];
        $dept->_email = $rs->fields["DESCRIPTION"];
        return $dept;
    }

    public function rechercher() { // Recherche de toutes les adresses
        $listdept = array();
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
        $requete = self::$SELECT . " WHERE ID_DEPT=" . $key;
        $rs = $this->conn->query($requete);
        if ($rs->EOF) {
            return null;
        }
        return $this->mapSqlToObject($rs);
    }


} 