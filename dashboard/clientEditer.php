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
                <a href="?action=clientEdit" class="dash-btn clicked">User Info</a>
                <a href="?action=createNew" class="dash-btn">Create New Listing</a>
                <a href="?action=creationStatus" class="dash-btn">Uncompleted Listings</a>
                <div class="dash-spacer"></div>
            </div>
            <div class="right-dash">
                <div class="note-box">
                    <p>Edit Your Info</h4>
                </div>
                <div class="dashboard-wrap">
                    <div class="wrapped">
                        <form action="." method="POST">
                        <input type="hidden" name="action" value="clientEdited">
                        <div class="wrapped-item">
                            <div class="header"><h4>User: </h4></div>
                            <input type="text" name="name" value="<?php echo $userInfo['firstName']; ?> <?php echo $userInfo['lastName']; ?>">
                        </div>
                        <div class="wrapped-item">
                            <div class="header"><h4>Phone: </h4></div>
                            <input type="text" name="phone" value="<?php echo $userInfo['phone']; ?>">
                        </div>
                        <div class="wrapped-item">
                            <div class="header"><h4>Email: </h4></div>
                            <input type="text" name="email" value="<?php echo $userInfo['email']; ?>">
                        </div>
                        <div class="wrapped-item">
                            <div class="header"><h4>Password: </h4></div>
                            <input type="text" name="pass" value="New Password">
                        </div>
                        <input type="submit" value="submit">
                        </form>
                    </div>
                    <div class="wrapped wrapped2">
                        <div class="wrapped-item">
                            <h4>Lawyer Favorites: </h4>
                            <p>Examples</p>
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