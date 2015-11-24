<?php

/**
 * @package     MVC4PHP
 * @version     1.1.0
 * @link        http://www.mvc4php.com
 * @license     GPL/GNU 3.0 - http://mvc4php.com/license.txt
 * @author      Vedat Yildirim <info@vedatyildirim.com>
 */

/**
 * Class ContractModel
 * This is for Database Layer.
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
class ContractModel extends DefaultModel {

    private $id = 'id';
    private $package = 'package';
    private $service = 'service';
    private $price = 'price';
    private $fk_customer = 'fk_customer';

    /* Get all contact from database
     * @param string $package Package
     * @param string $service Service
     * @param string $price Price
     * @param int $fk_customer Fk_customer - customer.id
     * @param int $data_id Id
     */

    public function getAllData() {
        $sql = "SELECT {$this->id}, {$this->package}, {$this->service}, {$this->price}, {$this->fk_customer} FROM Contract";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * For Search a contract
     */
    public function search() {
        $sql = "SELECT {$this->id}, {$this->package}, {$this->service}, {$this->price}, {$this->fk_customer} FROM Contract WHERE {$this->package} LIKE '%{$_POST["package"]}%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in.
        return $query->fetchAll();
    }

    /**
     * For Amount a contracts
     */
    public function getAmountOfData() {

        $sql = "SELECT COUNT({$this->id}) AS amount_of_data FROM Contract";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_data;
    }

    /**
     * Add a contract to database
     * @param string $package Package
     * @param string $service Service
     * @param string $price Price
     * @param int $fk_customer Fk_customer - customer.id
     * @param int $data_id Id
     */
    public function addData($package, $service, $price, $fk_customer) {
        $sql = "INSERT INTO Contract ({$this->package}, {$this->service}, {$this->price}, {$this->fk_customer}) VALUES (:package, :service, :price, :fk_customer)";
        $query = $this->db->prepare($sql);
        $parameters = array(':package' => $package, ':service' => $service, ':price' => $price, ':fk_customer' => $fk_customer);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a contract in the database
     * @param int $data_id Id of data
     */
    public function deleteData($data_id) {
        $sql = "DELETE FROM Contract WHERE {$this->id} = :data_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':data_id' => $data_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a contract from database
     * @param string $package Package
     * @param string $service Service
     * @param string $price Price
     * @param int $fk_customer Fk_customer - customer.id
     * @param int $data_id Id
     */
    public function getData($data_id) {
        $sql = "SELECT {$this->id}, {$this->package}, {$this->service}, {$this->price}, {$this->fk_customer} FROM Contract WHERE {$this->id} = :data_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':data_id' => $data_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a contract in database
     * @param string $package Package
     * @param string $service Service
     * @param string $price Price
     * @param int $fk_customer Fk_customer - customer.id
     * @param int $data_id Id
     */
    public function updateData($package, $service, $price, $fk_customer, $data_id) {
        $sql = "UPDATE Contract SET {$this->package} = :package, {$this->service} = :service, {$this->price} = :price, {$this->fk_customer} = :fk_customer WHERE id = :data_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':package' => $package, ':service' => $service, ':price' => $price, ':fk_customer' => $fk_customer, ':data_id' => $data_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

}
