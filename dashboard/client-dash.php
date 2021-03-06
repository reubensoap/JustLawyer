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
                <a href="?action=clientEdit" class="clicked dash-btn">User Info</a>
                <a href="?action=createNew" class="dash-btn">Create New Listing</a>
                <a href="?action=creationStatus" class="dash-btn">Uncompleted Listings</a>
                <a href="?action=moreClaimed" class="dash-btn">Manage Listings</a>
                <div class="dash-spacer"></div>
            </div>
            <div class="right-dash">
                <div class="note-box">
                    <p>Edit Your Info</h4>
                </div>
                <div class="dashboard-wrap">
                    <div class="wrapped">
                        <div class="wrapped-item">
                            <div class="header"><h4>User: </h4></div>
                            <p><?php echo $userInfo['firstName']; ?> <?php echo $userInfo['lastName']; ?></p>
                        </div>
                        <div class="wrapped-item">
                            <div class="header"><h4>Phone: </h4></div>
                            <p><?php echo $userInfo['phone']; ?></p>
                        </div>
                        <div class="wrapped-item">
                            <div class="header"><h4>Email: </h4></div>
                            <p><?php echo $userInfo['email']; ?></p>
                        </div>
                        <div class="wrapped-item">
                            <div class="header"><h4>Password: </h4></div>
                            <p>Hidden</p>
                        </div>
                        <div class="wrapped-item">
                            <div class="header"><h4></h4></div>
                            <a href="?action=clientEditer" class="thirdBtn">Edit</a>
                        </div>
                    </div>
                    <div class="wrapped wrapped2">
                        <h4>Lawyer Favorites: </h4>
                        <div class="tube">
                            <?php if ($userInfo['favorites'] == NULL || $userInfo['favorites'] == "" ) { ?>
                                <div class="favorites-non">
                                    <p>You have no favorites as this time.</p>
                                </div>
                            <?php } else { ?>
                            <?php foreach($favorites as $f) :?>
                            <div class="inner-tube">
                                <div class="left">
                                    <img src="../images/lawyer-profiles/<?php echo $f['profilePhoto']; ?>" alt="">
                                </div>
                                <div class="right">
                                    <h4><?php echo $f['name']; ?></h4>
                                    <a href="../?action=lawyer-profile&lawyerID=<?php echo $f['lawyerID']; ?>" class="thirdBtn">Visit Listing</a>
                                    <a href="?action=favRemove&lawyerID=<?php echo $f['lawyerID']; ?>" class="thirdBtn">Remove</a>
                                </div>
                            </div>
                            <?php endforeach; 
                            }?>
                        </div>
                    </div>
                </div>
                <div class="dash-spacer"></di>
            </div>  
        </div>
    </div>
    <?php include('../views/main-footer.php'); ?>
</body>
</html>