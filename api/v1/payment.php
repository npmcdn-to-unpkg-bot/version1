<?php
/**
 * Created by PhpStorm.
 * User: Trisha
 * Date: 13/07/2016
 * Time: 22:46
 */
/*
 * --
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_order` int(10) NOT NULL,
  `amount_total` float NOT NULL,
  `amount_paid` float NOT NULL,
  `amount_remaining` float NOT NULL,
  `payment_method` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);


--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(10) NOT NULL AUTO_INCREMENT;
 */

class payment {

    //**** Variables declarations ****
    private $_id_payment = null;
    private $_date_created = null;
    private $_date_modified = null;
    private $_id_order = null;
    private $_amount_total = null;
    private $_amount_paid = null;
    private $_amount_remaining = null;
    private $_payment_method = null;

    private static $SELECT="SELECT * FROM PAYMENT";
    //**** Constructeur ****
    public function __construct() {
        require_once 'dbConnect.php';
        // opening db connection
        $db = new dbConnect();
        $this->conn = $db->connect();
    }

    //**** Setters *****
    public function setId_payment($id_payment) {
        $this->_id_payment= $id_payment;
    }

    public function setDate_created($date_created) {
        $this->_date_created= $date_created;
    }

    public function setDate_modified($date_modified) {
        $this->_date_modified= $date_modified;
    }

    public function setId_order($id_order) {
        $this->_id_order= $id_order;
    }

    public function setAmount_total($amount_total) {
        $this->_amount_total= $amount_total;
    }

    public function setAmount_paid($amount_paid) {
        $this->_amount_paid= $amount_paid;
    }

    public function setAmount_remaining($amount_remaining) {
        $this->_amount_remaining= $amount_remaining;
    }

    public function setPayment_method($payment_method) {
        $this->_payment_method= $payment_method;
    }

    //**** Getters *****

    public function getId_payment() {
        return $this->_id_payment;
    }

    public function getDate_created() {
        return $this->_date_created;
    }

    public function getDate_modified() {
        return $this->_date_modified;
    }

    public function getId_order() {
        return $this->_id_order;
    }

    public function getAmount_total() {
        return $this->_amount_total;
    }

    public function getAmount_paid() {
        return $this->_amount_paid;
    }

    public function getAmount_remaining() {
        return $this->_amount_remaining;
    }

    public function getPayment_method() {
        return $this->_payment_method;
    }

    public function delete($id_payment) {
        $requete = "DELETE FROM PAYMENT WHERE id_payment=" . $id_payment ;
        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
    }


    //***** fonction de modification/cr�ation *****
    public function save() {
        $this->_date_modified = date('Y/m/d H:i:s', time());
        if ($this->_date_created == null) {
            $this->_date_created = date('Y/m/d H:i:s', time());
        }
        if ($this->_id_order > 0) {
            $requete = "UPDATE PAYMENT SET DATE_CREATED='" . ($this->_date_created) . "'";
            $requete .= ",DATE_MODIFIED='" . $this->_date_modified . "',";
            $requete .= ",ID_ORDER='" . $this->_id_order . "',";
            $requete .= ",AMOUNT_TOTAL='" . $this->_amount_total . "',";
            $requete .= ",AMOUNT_PAID='" . $this->_amount_paid . "',";
            $requete .= ",AMOUNT_REMAINING='" . $this->_amount_remaining . "',";
            $requete .= ",PAYMENT_METHOD='" . $this->_payment_method . "'";
            $requete .= " WHERE ID_PAYMENT=" . $this->_id_payment;

        } else {
            $requete = "INSERT INTO PAYMENT (";
            $requete .= "ID_PAYMENT,";
            $requete .= "DATE_CREATED,";
            $requete .= "DATE_MODIFIED,";
            $requete .= "ID_ORDER,";
            $requete .= "AMOUNT_TOTAL,";
            $requete .= "AMOUNT_PAID,";
            $requete .= "AMOUNT_REMAINING,";
            $requete .= "PAYMENT_METHOD";
            $requete .= ") VALUES (";
            $requete .= "'" . $this->_id_payment . "',";
            $requete .= "'" . $this->_date_created . "',";
            $requete .= "'" . $this->_date_modified . "',";
            $requete .= "'" . $this->_id_order . "',";
            $requete .= "'" . $this->_amount_total . "',";
            $requete .= "'" . $this->_amount_paid . "',";
            $requete .= "'" . $this->_amount_remaining . "',";
            $requete .= "'" . $this->_payment_method . "')";
        }

        $r = $this->conn->query($requete) or die($this->conn->error.__LINE__);
        return $r;
    }



    //***** Fonction de passege sql->objet *****
    private function mapSqlToObject($rs) {
        $PAYMENT = new payment();
        $PAYMENT->_id_payment = $rs->fields["ID_PAYMENT"];
        $PAYMENT->_date_created = $rs->fields["DATE_CREATED"];
        $PAYMENT->_date_modified = $rs->fields["DATE_MODIFIED"];
        $PAYMENT->_id_order = $rs->fields["ID_ORDER"];
        $PAYMENT->_amount_total = $rs->fields["AMOUNT_TOTAL"];
        $PAYMENT->_amount_paid = $rs->fields["AMOUNT_PAID"];
        $PAYMENT->_amount_remaining = $rs->fields["AMOUNT_REMAINING"];
        $PAYMENT->_payment_method = $rs->fields["PAYMENT_METHOD"];
        return $PAYMENT;
    }

    public function rechercher() { // Recherche de toutes les adresses
        $listPAYMENT =	 array();
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
        $requete = self::$SELECT . " WHERE ID_PAYMENT=" . $key;
        $rs = $this->conn->query($requete);
        if ($rs->EOF) {
            return null;
        }
        return $this->mapSqlToObject($rs);
    }

} 