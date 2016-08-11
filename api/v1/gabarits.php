<?php
class gabarits{

    //**** D�claration des variables ****
    private $_id            = null;
    private $_description   = null;
    private $_id_modelmetier= null;
    private $_src           = null;
    private $_type          = 0;

    private static $SELECT = "SELECT * FROM GABARITS";

    //**** Constructeur ****
    private $conn;

    function __construct() {
        require_once 'dbConnect.php';
        // opening db connection
        $db = new dbConnect();
        $this->conn = $db->connect();
    }

    //**** D�claration des setters *****
    public function setId($id) {
        $this->_id = $id;
    }

    public function setDescription($libelle) {
        $this->_description = $libelle;
    }

    public function setIdModelMetier($id) {
        $this->_id_modelmetier = $id;
    }

    public function setSrc($src) {
        $this->_src = $src;
    }

    public function setType($type) {
        $this->_type = $type;
    }

    //**** D�claration des getters ****
    public function getId() {
        return $this->_id;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getIdModelMetier() {
        return $this->_id_modelmetier;
    }

    public function getSrc() {
        return $this->_src;
    }

    public function getType() {
        return $this->_type;
    }
    //**** Fonction de suppression ****
    public function delete($id) {
        $requete = "DELETE FROM GABARITS WHERE ID=" . $id;
        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
    }

    //***** fonction de modification/cr�ation *****
    public function save() {
        if ($this->_id > 0) {
            $requete = "UPDATE GABARITS SET DESCRIPTION='" . ($this->_description) . "'";
            $requete .= ",ID_MODELMETIER='" . $this->_id_modelmetier . "'";
            $requete .= ",SRC='" . $this->_src . "'";
            $requete .= ",TYPE='" . $this->_type . "'";
            $requete .= " WHERE ID=" . $this->_id;

        } else {
            $requete = "INSERT INTO GABARITS (";
            $requete .= "DESCRIPTION,";
            $requete .= "ID_MODELMETIER,";
            $requete .= "SRC,";
            $requete .= "TYPE";
            $requete .= ") VALUES (";
            $requete .= "'" . $this->_description . "',";
            $requete .= "'" . $this->_id_modelmetier . "',";
            $requete .= "'" . $this->_src . "',";
            $requete .= "'" . $this->_type . "')";
        }

        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        return $r;
    }


    //***** Fonction de passege sql->objet *****
    private function mapSqlToObject($rs) {
        $metier = new gabarits();
        $metier->_id = $rs->fields["ID"];
        $metier->_description = $rs->fields["DESCRIPTION"];
        $metier->_id_modelmetier = $rs->fields["ID_MODELMETIER"];
        $metier->_src = $rs->fields["SRC"];
        $metier->_type = $rs->fields["TYPE"];
        return $metier;
    }

    public function rechercher() { // Recherche de toutes

        $listMetier = array();
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
}