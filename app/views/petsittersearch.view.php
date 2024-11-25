<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/petsittersearch.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/footer.css">
    <title>Pet Sitter Search</title>
</head>
<body>
    <?php include ('components/nav.php'); ?>
    <div class="search-container">
        <h1 class="search-heading">Search for Pet Sitters</h1>
        <form action="<?=ROOT?>/PetsitterSearch" method="POST">
            <input type="text" name="name" placeholder="Search by name" class="search-bar">
            <input type="text" name="location" placeholder="Search by location" class="search-bar">
            <button type="submit" name="search" class="search-button">Search</button>
            <button type="submit" name="clear" class="clear-button">Clear</button>
        </form>
    </div>

    <div class="results-container">
    <?php if (!empty($petSitters)): ?>
        <?php foreach ($petSitters as $petSitter): ?>
            <div class="petsitter-card">
                <div class="petsitter-image">
                    <img src="<?=ROOT?>/assets/images/<?=$petSitter['image']?>" alt="<?=htmlspecialchars($petSitter['name'])?>">
                </div>
                    <div class="petsitter-info">
                    <h2><?=htmlspecialchars($petSitter['name'])?></h2>
                    <p><i class="fas fa-map-marker-alt"></i> <?=htmlspecialchars($petSitter['location'])?></p>
                    
                    <!-- Rating -->
                    <div class="rating">
                        <p>Rating: <span class="rating-stars"><?php echo str_repeat("⭐", $petSitter['rating']); ?></span></p>
                        <?php 
                            $sitterId = $petSitter['id'] ?? $petSitter['sitter_id'] ?? null;
                        ?>
                        <a href="<?php echo ROOT . '/petsitterreviews' . $sitterId; ?>" class="view-reviews-btn">
                            View Reviews
                        </a>
                    </div>
                    
                    <!-- Description -->
                    <p class="description"><?=htmlspecialchars($petSitter['description'])?></p>
                    
                    <!-- Details -->
                    <div class="sitter-details">
                        <p><strong>Experience:</strong> <?=htmlspecialchars($petSitter['experience'])?></p>
                        <p><strong>Availability:</strong> <?=htmlspecialchars($petSitter['availability'])?></p>
                        <p><strong>Price:</strong> <?=htmlspecialchars($petSitter['price'])?></p>
                    </div>
                    
                    <!-- Services -->
                    <div class="services">
                        <h4>Services:</h4>
                        <p><?=htmlspecialchars($petSitter['services'])?></p>
                    </div>
                    
                    <button class="book-button">Book Now</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-results">No results found.</p>
    <?php endif; ?>
    </div>

    <?php include ('components/footer.php'); ?>
</body>
</html>
