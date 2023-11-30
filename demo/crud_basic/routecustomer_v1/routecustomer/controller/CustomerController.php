<?php

namespace Controller;

require_once BASE_PATH . '/core/Controller.php';
require_once BASE_PATH . '/model/CustomerModel.php';


use Model\CustomerModel;
use Controller\Controller;

class CustomerController extends Controller
{
    private CustomerModel $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel("customers");
    }
    public function index()
    {
        $customers = $this->customerModel->getAll();

        $this->loadView('list.php', compact('customers'));
    }
    public function createCustomer()
    {
        $this->loadView('create.php');
    }
    public function saveCustomer()
    {
        $data = array(
            'name' => filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING),
            'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING),
            'address' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL)
        );
        $errors = $this->validateCustomer($data);

        if (empty($errors)) {
            $this->customerModel->insert($data);
            header('Location: ' . contexPath . "/customer");
        } else {
            $customer = $data;
            $this->loadView('create.php', compact('customer'), compact('errors'));
        }
    }
    public function editCustomer()
    {
        if (isset($_GET['id'])) {
            $customer = $this->customerModel->getById($_GET['id']);
            $this->loadView('edit.php', compact('customer'));
        } else {
            // $this->loadView('create.php', $customer);
        }
    }
    public function validateCustomer($data)
    {
        $errors = array();

        // Kiểm tra tên không được để trống
        if (empty($data['name'])) {
            $errors['name'] = "Name is required.";
        }

        // Kiểm tra định dạng email hợp lệ
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }

        // Kiểm tra địa chỉ không được để trống
        if (empty($data['address'])) {
            $errors['address'] = "Address is required.";
        }
        return $errors;
    }
    public function updateCustomer()
    {
        if (isset($_GET['id'])) {
            $customer = $this->customerModel->getById($_GET['id']);
            $data = array(
                'name' => filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING),
                'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING),
                'address' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                'id' => $_GET['id']
            );
            $errors = $this->validateCustomer($data);

            if (empty($errors)) {
                $customer = $this->customerModel->update($data);
                header('Location: ' . contexPath . "/customer");
            } else {
                $customer = $data;
                $this->loadView('edit.php', compact('customer'), compact('errors'));
            }
        } else {
            $this->loadView('not_found.php');
        }
    }

    public function deleteCustomer()
    {
        if (isset($_GET['id'])) {
            $customer = $this->customerModel->getById($_GET['id']);
            $result = $this->customerModel->delete($_GET['id']);

            header('Location: ' . contexPath . "/customer");
        } else {
            $this->loadView('not_found.php');
        }
    }
}
