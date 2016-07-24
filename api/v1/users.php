<?php
/**
 * Created by PhpStorm.
 * User: Trisha
 * Date: 13/07/2016
 * Time: 22:50
 */

/*
 * --
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
 */

class users {
    //**** Variables declarations ****
    private $_uid = null;
    private $_name = null;
    private $_email = null;
    private $_phone = null;
    private $_password = null;
    private $_address = null;
    private $_city = null;
    private $_created = null;

    private static $SELECT = "SELECT uid,name,email,phone,password,address,city,TO_CHAR(DATE_CREATION,'DD/MM/RRRR HH24:MI:SS') as created FROM USERS ";


    //**** Constructeur ****
    public function __construct() {
        require_once 'dbConnect.php';
        // opening db connection
        $db = new dbConnect();
        $this->conn = $db->connect();
    }

    //**** Setters *****
    public function setUid($uid) {
        $this->_uid= $uid;
    }

    public function setName($name) {
        $this->_name = $name;
    }

    public function setEmail($email) {
        $this->_email = $email;
    }

    public function setPhone($phone) {
        $this->_phone = $phone;
    }

    public function setPassword($password) {
        $this->_password = $password;
    }

    public function setAddress($address) {
        $this->_address = $address;
    }

    public function setCity($city) {
        $this->_city = $city;
    }

    public function setCreated($created) {
        $this->_created = $created;
    }

    //**** Getters *****

    public function getUid() {
        return $this->_uid;
    }

    public function getName() {
        return $this->_name;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function getPhone(){
        return $this->_phone;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function getAddress(){
        return $this->_address;
    }

    public function getCity(){
        return $this->_city;
    }

    public function getCreated(){
        return $this->_created;
    }

    public function delete($uid) {
        $requete = "DELETE FROM USERS WHERE uid=" . $uid ;
        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
    }


    //***** fonction de modification/cr�ation *****
    public function save() {
        // $this->_date_modified = date('Y/m/d H:i:s', time());
        if ($this->_created == null) {
            $this->_created = date('Y/m/d H:i:s', time());
        }
        if ($this->_uid > 0) {
            $requete = "UPDATE USERS SET NAME='" . ($this->_name) . "'";
            $requete .= ",EMAIL='" . $this->_email . "',";
            $requete .= ",PHONE='" . $this->_phone . "',";
            $requete .= ",PASSWORD='" . $this->_password . "',";
            $requete .= ",ADDRESS='" . $this->_address . "',";
            $requete .= ",CITY='" . $this->_city . "',";
            $requete .= ",CREATED='" . $this->_created . "',";
            $requete .= " WHERE UID=" . $this->_uid;

        } else {
            $requete = "INSERT INTO USERS (";
            $requete .= "UID,";
            $requete .= "NAME,";
            $requete .= "EMAIL,";
            $requete .= "PHONE,";
            $requete .= "PASSWORD,";
            $requete .= "ADDRESS,";
            $requete .= "CITY,";
            $requete .= "CREATED";
            $requete .= ") VALUES (";
            $requete .= "'" . $this->_uid . "',";
            $requete .= "'" . $this->_name . "',";
            $requete .= "'" . $this->_email . "',";
            $requete .= "'" . $this->_phone . "',";
            $requete .= "'" . $this->_password . "',";
            $requete .= "'" . $this->_address . "',";
            $requete .= "'" . $this->_city . "',";
            $requete .= "'" . $this->_created . "')";
        }

        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        return $r;
    }



    //***** Fonction de passege sql->objet *****
    private function mapSqlToObject($rs) {
        $user = new users();
        $user->_uid = $rs->fields["UID"];
        $user->_name = $rs->fields["NAME"];
        $user->_email = $rs->fields["EMAIL"];
        $user->_phone = $rs->fields["PHONE"];
        $user->_password = $rs->fields["PASSWORD"];
        $user->_address = $rs->fields["ADDRESS"];
        $user->_city = $rs->fields["CITY"];
        $user->_created = $rs->fields["CREATED"];
        return $user;
    }

    public function rechercher() { // Recherche de toutes les adresses
        $listUSERS = array();
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
        $requete = self::$SELECT . " WHERE UID=" . $key;
        $rs = $this->conn->query($requete);
        if ($rs->EOF) {
            return null;
        }
        return $this->mapSqlToObject($rs);
    }


} 