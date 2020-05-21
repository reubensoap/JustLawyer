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
                <a href="?action=home" class="dash-btn">Claimed Lawyers</a>
                <a href="?action=clientEdit" class="dash-btn">User Info</a>
                <a href="?action=createNew" class="dash-btn">Create New Listing</a>
                <a href="?action=creationStatus" class="dash-btn">Uncompleted Listings</a>
                <a href="?action=moreClaimed" class="dash-btn clicked">Manage Listings</a>
                <div class="dash-spacer"></div>
            </div>
            <div class="right-dash">
                <div class="note-box">
                    <p>Claim More Listings</h4>
                </div>
                <div class="more-claim-wrapper">
                    <div class="note-box">
                        <p>Your Claimed</p>
                    </div>
                    <?php foreach($allYourClaimed as $m) : ?>
                    <div class="claim-wrap">
                        <div class="top">
                            <img src="../images/lawyer-profiles/<?php echo $m['profilePhoto']; ?>" alt="">
                        </div>
                        <div class="bottom">
                            <p><?php echo $m['name'];?></p>
                            <a href="?action=moreClaimedRemove&lawyerID=<?php echo $m['lawyerID']; ?>">Remove Lawyer</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="green-line"></div>
                    <div class="note-box">
                        <p>Not Claimed</p>
                    </div>
                    <?php foreach($allUnClaimed as $s) : ?>
                    <div class="claim-wrap">
                        <div class="top">
                            <img src="../images/lawyer-profiles/<?php echo $s['profilePhoto']; ?>" alt="">
                        </div>
                        <div class="bottom">
                            <p><?php echo $s['name'];?></p>
                            <a href="?action=moreClaimedAdd&lawyerID=<?php echo $s['lawyerID']; ?>">Add Lawyer</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="dash-spacer"></di>
            </div>  
        </div>
    </div>
    <?php include('../views/main-footer.php'); ?>
</body>
</html>