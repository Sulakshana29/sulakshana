<?php

class Orders {
    private $orderModel;
    use Controller;
    public function __construct() {
        $this->orderModel = $this->model('OrderModel');
    }

    public function index() {
        echo "index";
        $_SESSION['user_type'] = 'pharmacy';  // or 'customer'
        $_SESSION['pharmacy_ID'] = 123;
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'pharmacy') {
            echo "pharmacy";
            $orders = $this->orderModel->getPharmacyOrders($_SESSION['pharmacy_ID']);
        } else {
            $orders = $this->orderModel->getUserOrders($_SESSION['owner_ID']);
            // $orders = $this->orderModel->getUserOrders(123);


        }
        
        $data = ['orders' => $orders];
        $this->view('orders/index', $data);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Add file validation
            if (!isset($_FILES['prescription']) || $_FILES['prescription']['error'] !== UPLOAD_ERR_OK) {
                // flash('order_error', 'Invalid prescription file');
                redirect('orders/create');
                return;
            }

            // Validate file type
            $allowed = ['image/jpeg', 'image/png', 'application/pdf'];
            if (!in_array($_FILES['prescription']['type'], $allowed)) {
                // flash('order_error', 'Invalid file type. Please upload JPG, PNG or PDF');
                redirect('orders/create');
                return;
            }

            // Create upload directory if it doesn't exist
            $uploadDir = 'uploads/prescriptions/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $prescription = $_FILES['prescription'];
            $fileName = time() . '_' . htmlspecialchars($prescription['name']);
            
            move_uploaded_file($prescription['tmp_name'], 'uploads/prescriptions/' . $fileName);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'pharmacy_id' => $_POST['pharmacy_id'],
                'medicine_type' => $_POST['medicine_type'],
                'prescription' => $fileName
            ];

            if ($this->orderModel->createOrder($data)) {
                // flash('order_success', 'Order submitted successfully');
                redirect('orders');
            }
        }
        
        // Get pharmacies for dropdown
        $pharmacies = $this->model('PharmacyModel')->getAllPharmacies();
        $this->view('orders/create', ['pharmacies' => $pharmacies]);
    }

    public function updateStatus($order_ID, $medicine_type) {
        // Add input validation
        if (!is_numeric($order_ID) || empty($medicine_type)) {
            // flash('order_error', 'Invalid order details');
            redirect('orders');
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && 
            isset($_SESSION['user_type']) && 
            $_SESSION['user_type'] == 'pharmacy') {
            
            $status = $_POST['status'];
            if ($this->orderModel->updateStatus($order_ID, $medicine_type, $status)) {
                // flash('order_updated', 'Order status updated successfully');
            }
            redirect('orders');
        }
    }
}
