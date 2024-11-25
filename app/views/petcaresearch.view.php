<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/petcaresearch.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/footer.css">

    <title>Pet Care Search</title>
    <link rel="stylesheet" href="../css/petcaresearch.css">
</head>
<body>
    <?php include ('components/nav.php'); ?>
    <div class="search-container">
        <h1 class="search-heading">Search for Pet-Care Centers</h1>
        <form action="<?=ROOT?>/PetcareSearch" method="POST">
    <input type="text" name="name" placeholder="Search by name" class="search-bar">
    <input type="text" name="location" placeholder="Search by location" class="search-bar">
    <button type="submit" name="search" class="search-button">Search</button>
    <button type="submit" name="clear" class="clear-button">Clear</button>
</form>

    </div>

    <div class="results-container">
    <?php if (!empty($petCareCenters)): ?>
        <?php foreach ($petCareCenters as $petCareCenter): ?>
            <div class="petCareCenter-card">
                <div class="petCareCenter-image">
                    <img src="<?=ROOT?>/assets/images/default-petcare.jpg" alt="<?php echo htmlspecialchars($petCareCenter['name']); ?>">
                </div>
                <div class="petCareCenter-info">
                    <h2><?php echo htmlspecialchars($petCareCenter['name']); ?></h2>
                    <p>Location: <?php echo htmlspecialchars($petCareCenter['location']); ?></p>
                    <p>Rating: <span class="rating-stars"><?php echo str_repeat("⭐", $petCareCenter['rating']); ?></span></p>
                    <p>Experienced in: Dogs, Cats, Birds</p>
                    <p>Services: <?php echo htmlspecialchars($petCareCenter['services']); ?></p>
                       
                    
                    <button class="book-button">Book</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="color: black;">No results found.</p>
    <?php endif; ?>
</div>



    
    <?php include ('components/footer.php'); ?>
</body>
</html>
