<?php

class PetsitterSearch
{
    use Controller;

    public function index()
    {
        // Initialize with default pet sitters
        $petSitters = [
            [
                'name' => 'Lisitha Dissanayake',
                'location' => 'Colombo',
                'rating' => 4.5,
                'image' => 'default-petsitter.jpg',
                'description' => 'I am a pet sitter who is specialised in dog and cat care.',
                'experience' => '5 years',
                'availability' => 'Weekdays & Weekends',
                'price' => 'Rs. 1000/day',
                'services' => 'Dog Walking, Cat Sitting, Pet Feeding, Medication Administration'
            ],
            [
                'name' => 'Sarah Silva',
                'location' => 'Kandy',
                'rating' => 4.0,
                'image' => 'default-petsitter.jpg',
                'description' => 'Professional pet sitter with expertise in handling multiple pets.',
                'experience' => '3 years',
                'availability' => 'Weekends only',
                'price' => 'Rs. 1200/day',
                'services' => 'Overnight Pet Sitting, Dog Walking, Home Visits, Pet Grooming'
            ],
            [
                'name' => 'Kamal Perera',
                'location' => 'Galle',
                'rating' => 4.8,
                'image' => 'default-petsitter.jpg',
                'description' => 'Experienced in caring for both young and senior pets.',
                'experience' => '7 years',
                'availability' => 'Full-time available',
                'price' => 'Rs. 1500/day',
                'services' => 'Pet Sitting, Dog Training, Pet Transportation, Emergency Pet Care'
            ],
        ];

        // Handle search functionality
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['clear'])) {
                // Keep the default results when clearing
            } 
            elseif (isset($_POST['search'])) {
                $name = strtolower(trim($_POST['name'] ?? ''));
                $location = strtolower(trim($_POST['location'] ?? ''));

                // Filter results based on search criteria
                $petSitters = array_filter($petSitters, function($sitter) use ($name, $location) {
                    $nameMatch = empty($name) || str_contains(strtolower($sitter['name']), $name);
                    $locationMatch = empty($location) || str_contains(strtolower($sitter['location']), $location);
                    return $nameMatch && $locationMatch;
                });
            }
        }

        // Load the view with data
        $this->view('petsittersearch', [
            'petSitters' => $petSitters
        ]);
    }
}
