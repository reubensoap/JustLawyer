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
                <a href="?action=createNew" class="dash-btn clicked">Create New Listing</a>
                <a href="?action=creationStatus" class="dash-btn">Uncompleted Listings</a>
                <a href="?action=moreClaimed" class="dash-btn">Manage Listings</a>
                <div class="dash-spacer"></div>
            </div>
            <div class="right-dash">
                <div class="note-box">
                    <p>Create a Lawyer Listing</h4>
                </div>
                <div class="create-wrapper">
                    <form action="." method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="finishCreate">
                        <input type="hidden" name="lawyerID" value="<?php echo $lawyerID; ?>">
                        <input type="hidden" name="claimedNumOri" value="<?php echo $userInfo['claimed']; ?>">
                        <div class="wrapped-item">
                            <label for="expTitle">Experience Title</label>
                            <input type="text" name="expTitle" placeholder="Charles & Sacks">
                        </div>
                        <div class="wrapped-item">
                            <label for="expDur">Duration</label>
                            <input type="text" name="expDur" placeholder="Write Here">
                        </div>
                        <div class="wrapped-item">
                            <label for="expCheck">Two Experiences?</label>
                            <input type="checkbox" name="expCheck">
                        </div>
                        <div class="wrapped-item">
                            <label for="eduSchool">School</label>
                            <input type="text" name="eduSchool" placeholder="Charles & Sacks">
                        </div>
                        <div class="wrapped-item">
                            <label for="eduContent">School Merits</label>
                            <input type="text" name="eduContent" placeholder="Write Here">
                        </div>
                        <div class="wrapped-item">
                            <label for="eduCheck">Two Schools?</label>
                            <input type="checkbox" name="eduCheck">
                        </div>
                        <div class="wrapped-item">
                            <label for="addressCheck">Two Locations?</label>
                            <input type="checkbox" name="addressCheck">
                        </div>
                        <div class="wrapped-item">
                            <label for="fileToUpload">Profile Photo</label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="wrapped-item">
                            <label for=""></label>
                            <input type="submit" value="Apply">
                        </div>
                    </form>
                </div>
                <div class="dash-spacer"></di>
            </div>  
        </div>
    </div>
    <?php include('../views/main-footer.php'); ?>
</body>
</html>