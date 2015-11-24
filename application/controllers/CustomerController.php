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
class CustomerController {

    // @var customerModel is null and for Class Model
    public $customerModel = null;
    // @var contractModel is is null and for aggregation to Class ContractModel
    public $contractModel = null;

    /**
     * Whenever controllers is created, open a database connection too and load "the model".
     * Start aggregation to Class CustomerModel
     */
    function __construct() {
        // include this File
        require APP . 'models/CustomerModel.php';
        // create new "model" (and pass the database connection)
        $this->customerModel = new CustomerModel();
    }

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourdomain/CustomerController/index
     * Diese Method funktuniert beim aufruf  http://yourdomain/CustomerController/index
     */
    public function index() {
        // Show and Amount from Database for CustomerController/index.php mit $data
        $data = $this->customerModel->getAllData();

        // FOR SELECT AS A OPTION VALUE ALL CONTRACTS FROM CUSTOMER
        // Composition for Relationsship from Database( contract.fk_customer with customer.id )
        require APP . 'models/ContractModel.php';
        // create new "model" (and pass the database connection with class Customer)
        $this->contractModel = new ContractModel();
        $list_all_contracts_from_customer = $this->contractModel->getAllData();

        // $amount_of_data = $this->model->getAmountOfData();
        // load views. within the views we can echo out $data and $amount_of_data easily
        require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
        require APP . 'view/customer/index.php';
        require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
    }

    /**
     * ACTION: search
     * This method handles what happens when you move to http://yourdomain/ContractController/search
     * This is an example of how to handle a GET request.
     */
    public function search() {
        // if we have POST customer to create a new customer entry
        if (isset($_POST["submit_add_data"])) {
            // do add() in models/CustomerModel.php
            $data = $this->customerModel->search($_POST["lastname"]);
        }
        // load views. within the views we can echo out $data and $amount_of_data easily
        require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
        require APP . 'view/customer/search.php';
        require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
    }

    /**
     * ACTION: addData
     * This method handles what happens when you move to http://yourdomain/CustomerController/add
     * This is an example of how to handle a POST request.
     */
    public function add() {
        // do not add() in models/CustomerModel.php
        if (!isset($_POST["submit_add_data"])) {
            // if we have POST contract to create a new contract entry    
            require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
            require APP . 'view/customer/add.php';
            require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';

            // do add() in models/CustomerModel.php
        } else if (isset($_POST["submit_add_data"])) {
            $this->customerModel->addData($_POST["firma"], $_POST["firstname"], $_POST["lastname"], $_POST["status"], $_POST["contact"]);
            header('location: ' . URL . 'CustomerController/index');
        }
    }

    /**
     * ACTION: delete
     * This method handles what happens when you move to http://yourdomain/CustomerController/delete
     * This is an example of how to handle a GET request.
     * @param int $data_id Id of the to-delete customer
     */
    public function delete($data_id) {
        // if we have an id of a customer that should be deleted
        if (isset($data_id)) {
            // do delete() in models/CustomerModel.php
            $this->customerModel->deleteData($data_id);
        }

        // where to go after customer has been deleted
        header('location: ' . URL . 'CustomerController/index');
    }

    /**
     * ACTION: edit
     * This method handles what happens when you move to http://yourdomain/CustomerController/edit
     * @param int $data_id Id of the to-edit customer
     */
    public function edit($data_id) {
        // if we have an id of a customer that should be edited
        if (isset($data_id)) {
            // do get() in models/CustomerModel.php
            $data = $this->customerModel->getData($data_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar
            // load views. within the views we can echo out $data easily
            require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
            require APP . 'view/customer/edit.php';
            require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
        } else {
            // redirect user to data index page (as we don't have a data_id)
            header('location: ' . URL . 'CustomerController/index');
        }
    }

    /**
     * ACTION: update
     * This method handles what happens when you move to http://yourdomain/CustomerController/update
     * This is an example of how to handle a POST request.
     */
    public function update() {
        // if we have POST customer to create a new customer entry
        if (isset($_POST["submit_update_data"])) {
            // do update() from models/CustomerModel.php
            $this->customerModel->updateData($_POST["firma"], $_POST["firstname"], $_POST["lastname"], $_POST["status"], $_POST["contact"], $_POST['data_id']);
        }

        // where to go after customer has been added
        header('location: ' . URL . 'CustomerController/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentation
     */
    public function ajaxGetStats() {
        $amount_of_data = $this->customerModel->getAmountOfData();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_data;
    }

}
