<?php
class sample{

    //**** D�claration des variables ****
    private $_id            = null;
    private $_description   = null;
    private $_id_modelmetier= null;
    private $_src           = null;
    private $_content       = null;

    private static $SELECT = "SELECT * FROM SAMPLE";

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

    public function setContent($content) {
        $this->_content = $content;
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

    public function getContent() {
        return $this->_content;
    }

    //**** Fonction de suppression ****
    public function delete($id) {
        $requete = "DELETE FROM SAMPLE WHERE ID=" . $id;
        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
    }

    //***** fonction de modification/cr�ation *****
    public function save() {
        if ($this->_id > 0) {
            $requete = "UPDATE SAMPLE SET DESCRIPTION='" . ($this->_description) . "'";
            $requete .= ",ID_MODELMETIER='" . $this->_id_modelmetier . "'";
            $requete .= ",SRC=" . $this->_src;
            $requete .= ",CONTENT=" . $this->_content;
            $requete .= " WHERE ID=" . $this->_id;

        } else {
            $requete = "INSERT INTO SAMPLE (";
            $requete .= "DESCRIPTION,";
            $requete .= "ID_MODELMETIER,";
            $requete .= "SRC,";
            $requete .= "CONTENT";
            $requete .= ") VALUES (";
            $requete .= "'" . $this->_description . "',";
            $requete .= "'" . $this->_id_modelmetier . "',";
            $requete .= "'" . $this->_src . "',";
            $requete .= "'" . $this->_content . "')";
        }

        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        return $r;
    }


    //***** Fonction de passege sql->objet *****
    private function mapSqlToObject($rs) {
        $metier = new sample();
        $metier->_id = $rs->fields["ID"];
        $metier->_description = $rs->fields["DESCRIPTION"];
        $metier->_id_modelmetier = $rs->fields["ID_MODELMETIER"];
        $metier->_src = $rs->fields["SRC"];
        $metier->_content = $rs->fields["CONTENT"];
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