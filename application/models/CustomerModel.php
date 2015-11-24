<?php

/**
 * @package     MVC4PHP
 * @version     1.1.0
 * @link        http://www.mvc4php.com
 * @license     GPL/GNU 3.0 - http://mvc4php.com/license.txt
 * @author      Vedat Yildirim <info@vedatyildirim.com>
 */

/**
 * Class CustomerModel
 * This is for Database Layer.
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
class CustomerModel extends DefaultModel {
    /* All Customer Fiels/Attribunts */

    private $id = 'id';
    private $firma = 'firma';
    private $firstname = 'firstname';
    private $lastname = 'lastname';
    private $status = 'status';
    private $contact = 'contact';

    /* Get all contact from database
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     * @param int $data_id Id
     */

    public function getAllData() {
        $sql = "SELECT {$this->id}, {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} FROM Customer";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * For Search a customer
     */
    public function search() {
        $sql = "SELECT {$this->id}, {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} FROM Customer WHERE {$this->lastname} LIKE '%{$_POST["lastname"]}%'";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        return $query->fetchAll();
    }

    /**
     * For Amount a customer
     */
    public function getAmountOfData() {

        $sql = "SELECT COUNT({$this->id}) AS amount_of_data FROM Customer";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_data;
    }

    /**
     * Add a customer to database
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     * @param int $data_id Id
     */
    public function addData($firma, $firstname, $lastname, $status, $contact) {
        $sql = "INSERT INTO Customer ({$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact}) VALUES (:firma, :firstname, :lastname, :status, :contact)";
        $query = $this->db->prepare($sql);
        $parameters = array(':firma' => $firma, ':firstname' => $firstname, ':lastname' => $lastname, ':status' => $status, ':contact' => $contact);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a contract in the database
     * @param int $data_id Id of data
     */
    public function deleteData($data_id) {
        $sql = "DELETE FROM Customer WHERE {$this->id} = :data_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':data_id' => $data_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a customer from database
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     * @param int $data_id Id
     */
    public function getData($data_id) {
        $sql = "SELECT {$this->id}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} {$this->firma}, {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} {$this->firstname}, {$this->lastname}, {$this->status}, {$this->contact} FROM Customer WHERE {$this->id} = :data_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':data_id' => $data_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a data in database
     * @param string $firma Firma
     * @param string $firstname Firstname
     * @param string $lastname Lastname
     * @param string $status Status
     * @param string $contact Contact
     * @param int $data_id Id
     */
    public function updateData($firma, $firstname, $lastname, $status, $contact, $data_id) {
        $sql = "UPDATE Customer SET {$this->firma} = :firma, {$this->firstname} = :firstname, {$this->lastname} = :lastname, {$this->status} = :status, {$this->contact} = :contact WHERE {$this->id} = :data_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':firma' => $firma, ':firstname' => $firstname, ':lastname' => $lastname, ':status' => $status, ':contact' => $contact, ':data_id' => $data_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }

}
