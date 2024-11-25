<?php

require_once '../app/core/Model.php';

class Review {
    use Model;

    protected $table = 'sitter_reviews';

    public function getReviewsBySitterId($sitter_id) {
        $query = "SELECT r.*, o.f_name as owner_name 
                 FROM sitter_reviews r 
                 LEFT JOIN pet_owner o ON r.owner_id = o.owner_id 
                 WHERE r.sitter_id = :sitter_id 
                 ORDER BY r.date_posted DESC 
                 LIMIT 50";
        
        echo "Query executed with sitter_id: " . $sitter_id . "\n";
        
        $params = [
            'sitter_id' => $sitter_id
        ];

        return $this->query($query, $params);
    }

    public function insert($data) {
        return $this->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->update($this->table, $id, $data, 'review_id');
    }

    public function delete($id) {
        return $this->delete($this->table, $id, 'review_id');
    }
}