<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Law Finder | Home</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <link rel="stylesheet" href="dist-aos/aos.css" type="text/css">
    <script src="https://kit.fontawesome.com/974871ddab.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <?php include('../views/inner-header.php'); ?>
    <div class="page-section x-y-padding">
        <div class="max-w dashboard-wrap">
            <div class="left-dash">
                <h4><?php echo $userInfo['firstName']; ?> <?php echo $userInfo['lastName']; ?></h4>
                <div class="line"></div>
                <a href="?action=home" class="dash-btn clicked">Claimed Lawyers</a>
                <a href="?action=clientEdit" class="dash-btn">User Info</a>
                <a href="?action=createNew" class="dash-btn">Create New Listing</a>
                <a href="?action=creationStatus" class="dash-btn">Uncompleted Listings</a>
                <a href="?action=moreClaimed" class="dash-btn">Manage Listings</a>
                <div class="dash-spacer"></div>
            </div>
            <div class="right-dash">
                <div class="note-box">
                    <p>You Have <?php echo $userInfo['claimed']; ?> Claimed Lawyers</h4>
                </div>
                <?php foreach($claimedListing as $c) : ?>
                <div class="claim-wrapper">
                    <div class="left">
                        <img src="../images/lawyer-profiles/<?php echo $c['profilePhoto']; ?>" alt="">
                    </div>
                    <div class="right">
                        <h3><?php echo $c['name'];?></h3>
                        <p><?php echo $c['placeOfWork'];?></p>
                        <div class="bottom">
                        <a href="?action=depthEdit&lawyerID=<?php echo $c['lawyerID']; ?>" class="thirdBtn">Edit Lawyer Listing</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php echo $createNewSection; ?>
                <div class="dash-spacer"></di>
            </div>  
        </div>
    </div>
    <?php include('../views/main-footer.php'); ?>
</body>
</html>