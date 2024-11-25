<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="<?=ROOT?>/assets/images/happy-paws-logo.png">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/pharmdash.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/nav.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/components/footer.css">


</head>
<body>
    <?php include ('components/nav.php'); ?>
    <div class="dashboard-container">
        <!-- Sidebar for vet functionalities -->
        <div class="sidebar">
            <h3>Pharmacy Dashboard</h3>
            <ul>
                <li><a href="<?=ROOT?>/pharmacy/profile">My Profile</a></li>
                <li><a href="<?=ROOT?>/requestmed">Request Medicine</a></li>
                <li><a href="<?=ROOT?>/orders">Orders</a></li>    
                <li><a href="<?=ROOT?>/pharmacy/transactions">Transcation History</a></li>
                <li><a href="<?=ROOT?>/pharmacy/settings">Settings</a></li>
            </ul>
        </div>

    

<div class="orders-container">
    <h1>Pharmacy Orders</h1>
    
    <div class="orders-filter">
        <input type="text" id="searchOrder" placeholder="Search orders...">
        <select id="statusFilter">
            <option value="all">All Status</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <div class="orders-list">
        <?php if(!empty($data['orders'])) : ?>
            <?php foreach($data['orders'] as $order) : ?>
                <div class="order-card">
                    <div class="order-header">
                        <h3>Order #<?php echo $order->order_id; ?></h3>
                        <span class="order-date"><?php echo date('M d, Y', strtotime($order->created_at)); ?></span>
                    </div>
                    <div class="order-details">
                        <p><strong>Patient:</strong> <?php echo $order->patient_name; ?></p>
                        <p><strong>Prescription:</strong> <?php echo $order->prescription; ?></p>
                        <p><strong>Status:</strong> 
                            <span class="status-badge <?php echo strtolower($order->status); ?>">
                                <?php echo $order->status; ?>
                            </span>
                        </p>
                    </div>
                    <div class="order-actions">
                        <button class="btn view-btn" data-id="<?php echo $order->order_id; ?>">View Details</button>
                        <button class="btn update-btn" data-id="<?php echo $order->order_id; ?>">Update Status</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="no-orders">
                <p>No orders found</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php include ('components/footer.php'); ?>
</body>
</html>
