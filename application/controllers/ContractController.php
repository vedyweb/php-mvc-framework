<?php

/**
 * @package     MVC4PHP
 * @version     1.1.0
 * @link        http://www.mvc4php.com
 * @license     GPL/GNU 3.0 - http://mvc4php.com/license.txt
 * @author      Vedat Yildirim <info@vedatyildirim.com>
 */

/**
 * Class CustomerController
 * This is for Customer.
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
class ContractController {

    // @var contractModel is null and for Class Model
    public $contractModel = null;
    // @var $customerModel is null and for aggregation to Class ContractModel
    public $customerModel = null;

    /**
     * Whenever controllers is created, open a database connection too and load "the model".
     * Start aggregation to Class ContractModel
     */
    function __construct() {
        // include this File
        require APP . 'models/ContractModel.php';
        // create new "model" (and pass the database connection)
        $this->contractModel = new ContractModel();
    }

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourdomain/ContractController/index
     * Diese Method funktuniert beim aufruf  http://yourdomain/ContractController/index
     */
    public function index() {
        // Show and Amount from Database for CustomerController/index.php mit $data
        $data = $this->contractModel->getAllData();

        // FOR SELECT AS A OPTION VALUE WITH CUSTOMDER ID    
        // Composition for Relationsship from Database( contract.fk_customer with customer.id )
        require APP . 'models/CustomerModel.php';
        // create new "model" (and pass the database connection with class Customer)
        $this->customerModel = new CustomerModel();
        $relationsship_fk_customer_id = $this->customerModel->getAllData();

        // $amount_of_data in ContractController/index.php
        // $amount_of_data = $this->model->getAmountOfData();
        // load views. within the views we can echo out $data and $amount_of_data easily
        require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
        require APP . 'view/contract/index.php';
        require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
    }

    /**
     * ACTION: search
     * This method handles what happens when you move to http://yourdomain/ContractController/search
     * This is an example of how to handle a GET request.
     */
    public function search() {
        // if we have POST contract to create a new contract entry
        if (isset($_POST["submit_add_data"])) {
            // do add() in models/ContractModel.php
            $data = $this->contractModel->search($_POST["package"]);
        }
        // load views. within the views we can echo out $data and $amount_of_data easily
        require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
        require APP . 'view/contract/search.php';
        require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
    }

    /**
     * ACTION: add
     * This method handles what happens when you move to http://yourdomain/ContractController/add
     * This is an example of how to handle a POST request.
     */
    public function add() {
        // do not add() in models/CustomerModel.php
        if (!isset($_POST["submit_add_data"])) {

            // FOR SELECT AS A OPTION VALUE WITH CUSTOMDER ID    
            // Composition for Relationsship from Database( contract.fk_customer with customer.id )
            require APP . 'models/CustomerModel.php';
            // create new "model" (and pass the database connection with class Customer)
            $this->customerModel = new CustomerModel();
            $relationsship_fk_customer_id = $this->customerModel->getAllData();

            // if we have POST contract to create a new contract entry    
            require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
            require APP . 'view/contract/add.php';
            require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';

            // do add() in models/CustomerModel.php
        } else if (isset($_POST["submit_add_data"])) {
            $this->contractModel->addData($_POST["package"], $_POST["service"], $_POST["price"], $_POST["fk_customer"]);
            header('location: ' . URL . 'ContractController/index');
        }
    }

    /**
     * ACTION: delete
     * This method handles what happens when you move to http://yourdomain/ContractController/delete
     * This is an example of how to handle a GET request.
     * @param int $data_id Id of the to-delete contract
     */
    public function delete($data_id) {
        // if we have an id of a data that should be deleted
        if (isset($data_id)) {
            // do delete() in models/ContractModel.php
            $this->contractModel->deleteData($data_id);
        }

        // where to go after contact has been deleted
        header('location: ' . URL . 'ContractController/index');
    }

    /**
     * ACTION: edit
     * This method handles what happens when you move to http://yourdomain/ContractController/edit
     * @param int $data_id Id of the to-edit contract
     */
    public function edit($data_id) {
        // if we have an id of a contract that should be edited
        if (isset($data_id)) {
            // do getData() in models/ContractModel.php
            $data = $this->contractModel->getData($data_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar
            // load views. within the views we can echo out $data easily
            require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
            require APP . 'view/contract/edit.php';
            require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
        } else {
            // redirect user to contract index page (as we don't have a data_id)
            header('location: ' . URL . 'ContractController/index');
        }
    }

    /**
     * ACTION: update
     * This method handles what happens when you move to http://yourdomain/ContractController/update
     * This is an example of how to handle a POST request.
     */
    public function update() {
        // if we have POST contract to create a new contract entry
        if (isset($_POST["submit_update_data"])) {
            // do update() from models/ContractModel.php
            $this->contractModel->updateData($_POST["package"], $_POST["service"], $_POST["price"], $_POST["fk_customer"], $_POST['data_id']);
        }

        // where to go after data has been added
        header('location: ' . URL . 'ContractController/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentation
     */
    public function ajaxGetStats() {
        $amount_of_data = $this->contractModel->getAmountOfData();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_data;
    }

}
