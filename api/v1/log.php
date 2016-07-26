<?php
/**
 * Created by PhpStorm.
 * User: Trisha
 * Date: 13/07/2016
 * Time: 22:43
 */
/*

-- Table structure for table `log`
--

CREATE TABLE `log` (
`id_log` int(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) NOT NULL,
  `module` varchar(500) NOT NULL,
  `created_by` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT;
 */

class log {
    //**** Variables declarations ****
    private $_id_log = null;
    private $_date_created = null;
    private $_description = null;
    private $_module = null;
    private $_created_by = null;

   private static $SELECT="SELECT * FROM LOG";
    //**** Constructeur ****
    public function __construct() {
        require_once 'dbConnect.php';
        // opening db connection
        $db = new dbConnect();
        $this->conn = $db->connect();
    }

    //**** Setters *****
    public function setId_log($id_log) {
        $this->_id_log= $id_log;
    }

    public function setDate_created($date_created) {
        $this->_date_created= $date_created;
    }

    public function setDescription($description) {
        $this->_description= $description;
    }

    public function setModule($module) {
        $this->_module= $module;
    }

    public function setCreated_by($created_by) {
        $this->_created_by= $created_by;
    }

    //**** Getters *****

    public function getId_log() {
        return $this->_id_log;
    }

    public function getDate_created() {
        return $this->_date_created;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getModule() {
        return $this->_module;
    }

    public function getCreated_by() {
        return $this->_created_by;
    }

    public function delete($id_log) {
        $requete = "DELETE FROM LOG WHERE id_log=" . $id_log ;
        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
    }


    //***** fonction de modification/cr�ation *****
    public function save() {
        // $this->_date_modified = date('Y/m/d H:i:s', time());
        if ($this->_date_created == null) {
            $this->_date_created = date('Y/m/d H:i:s', time());
        }
        if ($this->_id_log > 0) {
            $requete = "UPDATE LOG SET DATE_CREATED='" . ($this->_date_created) . "'";
            $requete .= ",DESCRIPTION='" . $this->_description . "',";
            $requete .= ",MODULE='" . $this->_module . "',";
            $requete .= ",CREATED_BY='" . $this->_created_by . "',";
            $requete .= " WHERE ID_LOG=" . $this->_id_log;

        } else {
            $requete = "INSERT INTO LOG (";
            $requete .= "ID_LOG,";
            $requete .= "DATE_CREATED,";
            $requete .= "DESCRIPTION,";
            $requete .= "MODULE,";
            $requete .= "CREATED_BY";
            $requete .= ") VALUES (";
            $requete .= "'" . $this->_id_log . "',";
            $requete .= "'" . $this->_date_created . "',";
            $requete .= "'" . $this->_description . "',";
            $requete .= "'" . $this->_module . "',";
            $requete .= "'" . $this->_created_by . "')";
        }

        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        return $r;
    }



    //***** Fonction de passege sql->objet *****
    private function mapSqlToObject($rs) {
        $log = new log();
        $log->_id_log = $rs->fields["ID_LOG"];
        $log->_date_created = $rs->fields["DATE_CREATED"];
        $log->_description = $rs->fields["DESCRIPTION"];
        $log->_module = $rs->fields["MODULE"];
        $log->_created_by = $rs->fields["CREATED_BY"];
        return $log;
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
        $requete = self::$SELECT . " WHERE ID_LOG=" . $key;
        $rs = $this->conn->query($requete);
        if ($rs->EOF) {
            return null;
        }
        return $this->mapSqlToObject($rs);
    }




} 