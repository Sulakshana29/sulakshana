<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/petsitterreviews.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/footer.css">
    <title>Pet Sitter Reviews</title>
</head>
<body>
    <?php include ('components/nav.php'); ?>
    <div class="container">
        <h1>Reviews for <?php echo $sitterName; ?></h1>
        
        <div class="reviews">
            <?php if (empty($reviews)): ?>
                <div class="no-reviews">
                    <p>No reviews found for this pet sitter. Be the first to write a review!</p>
                </div>
            <?php else: ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="review-card">
                        <p class="review-text"><?php echo $review->comment; ?></p>
                        <p class="review-owner">- <?php echo $review->owner_name; ?></p>
                        <?php if ($review->owner_id === $current_reviewer_id): ?>
                            <div class="actions">
                                <button onclick="editReview(<?php echo $review->id; ?>)">Edit</button>
                                <button onclick="deleteReview(<?php echo $review->id; ?>)">Delete</button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <form id="reviewForm" method="POST" action="<?=ROOT?>/petsitterreviews/save">
            <textarea name="reviewText" placeholder="Write your review here..." required></textarea>
            <input type="hidden" name="reviewId" id="reviewId" value="">
            <input type="hidden" name="sitter_id" value="<?php echo $sitter_id; ?>">
            <input type="hidden" name="reviewer_id" value="<?php echo $current_reviewer_id; ?>">
            <button type="submit">Submit Review</button>
        </form>
    </div>
    <?php include ('components/footer.php'); ?>
    <script>
        function editReview(id) {
            const reviews = <?php echo json_encode($reviews); ?>;
            const review = reviews.find(r => r.id === id);
            if (review.reviewer_id === '<?php echo $current_reviewer_id; ?>') {
                document.getElementById('reviewId').value = id;
                document.querySelector('[name="reviewText"]').value = review.text;
            }
        }

        function deleteReview(id) {
            const reviews = <?php echo json_encode($reviews); ?>;
            const review = reviews.find(r => r.id === id);
            if (review.reviewer_id === '<?php echo $current_reviewer_id; ?>') {
                if (confirm('Are you sure you want to delete this review?')) {
                    window.location.href = 'petsitterreviews?action=delete&id=' + id;
                }
            }
        }
    </script>
</body>
</html>
