<?php

class PetsitterReviews {
    use Controller;
    
    private $reviewModel;
    
    public function __construct() {
        $this->reviewModel = $this->loadModel('Review');
    }

    public function index($sitter_id = null, $sitterName = null) {
        // if (!$sitter_id) {
        //     redirect('home');
        // }
        
        // Get user's unique identifier from cookie or create new one
        if (!isset($_COOKIE['reviewer_id'])) {
            echo "No reviewer ID found, creating new one";
            $reviewer_id = uniqid();
            setcookie('reviewer_id', $reviewer_id, time() + (86400 * 30), "/");
        } else {
            $reviewer_id = $_COOKIE['reviewer_id'];
            echo "Reviewer ID found: $reviewer_id";
        }
    
        // Get reviews from database
        $reviews = $this->reviewModel->getReviewsBySitterId(1);
    
        $data = [
            'sitterName' => $sitterName, // You might want to get this from a petsitter table
            'sitter_id' => $sitter_id,
            'reviews' => $reviews ? $reviews : [], // Return empty array if no reviews
            'current_reviewer_id' => $reviewer_id
        ];
        error_log("This is a test error message");
        $this->view('petsitterreviews', $data);
        
    }
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'owner_id' => $_POST['reviewer_id'],
                'sitter_id' => $_POST['sitter_id'],
                'comment' => $_POST['reviewText'],
                'date_posted' => date('Y-m-d H:i:s')
            ];

            if (!empty($_POST['reviewId'])) {
                // Update existing review
                $this->reviewModel->update($_POST['reviewId'], $data);
            } else {
                // Add new review
                $this->reviewModel->insert($data);
            }
            redirect('petsitterreviews/index/' . $_POST['sitter_id']);
        }
    }

    public function delete($id) {
        if (isset($_GET['action']) && $_GET['action'] === 'delete') {
            $this->reviewModel->delete($id);
            redirect('petsitterreviews/index/' . $_GET['sitter_id']);
        }
    }

    
}
