<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Law Finder | Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="dist-aos/aos.css" type="text/css">
    <script src="https://kit.fontawesome.com/974871ddab.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <?php include($header); ?>
    <div class="page-section">
        <div class="max-w side-space">
            <div class="badge-section">
                <a href="index.php">Lawyer Finder</a>
                <p><</p>
                <a href="?action=directoryName&sectionLetter=<?php echo $directoryIndex; ?>">Lawyer Directory</a>
                <p><</p>
                <a href="#">Names</a>
            </div>
            <div id="big-profile-role">
                <div class="profile-wrap">
                    <div class="profile-header">
                        <div class="left">
                            <img src="./images/lawyer-profiles/<?php echo $profile['profilePhoto']; ?>" alt="">
                        </div>
                        <div class="right">
                            <h2><?php echo $profile['name']; ?></h2>
                            <p id="placeOfWork"><?php echo $profile['placeOfWork']; ?></p>
                            <div class="header-tag">
                                <i class="fas fa-balance-scale"></i>
                                <p><?php echo $YWorth. " Years of experience"; ?></p>
                            </div>
                            <div class="header-tag">
                                <i class="fas fa-balance-scale"></i>
                                <p><?php echo $finalList; ?></p>
                            </div>
                            <div class="header-tag">
                                <?php echo $favDiv; ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile-body">
                        <div id="practice-areas">
                            <div class="profile-body-wrapper">
                                <div class="profile-body-header">
                                    <i class="fas fa-balance-scale"></i>
                                    <h3>Practice Areas</h3>
                                </div>
                                    <p><?php echo $finalList2; ?></p>
                            </div>
                        </div>
                        <div id="city-served">
                            <div class="profile-body-wrapper">
                                <div class="profile-body-header">
                                    <i class="fas fa-balance-scale"></i>
                                    <h3>Jurisdiction Admitted to Practice</h3>
                                </div>
                                <p>Texas</p>
                                <p>Since <?php echo $profile['years']; ?></p>
                                <p>Bar ID:</p><p><?php echo $profile['barID']; ?></p>
                                <p>Completed on:</p><p><?php echo $profile['barDate']; ?></p>
                            </div>
                        </div>
                        <div id="experience">
                            <div class="profile-body-wrapper">
                                <div class="profile-body-header">
                                    <i class="fas fa-balance-scale"></i>
                                    <h3>Professional Experience</h3>
                                </div>
                                <?php foreach ($lawyerExperience as $lawyerEx) : ?>
                                <p><?php echo $lawyerEx['projectTitle']; ?></p>
                                <p><?php echo $lawyerEx['projectDuration']; ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="education">
                            <div class="profile-body-wrapper">
                                <div class="profile-body-header">
                                    <i class="fas fa-balance-scale"></i>
                                    <h3>Education</h3> 
                                </div>
                                <?php foreach ($lawyerEducation as $lawyerEdu) : ?>
                                <p><?php echo $lawyerEdu['eduTitle']; ?></p>
                                <p> -<?php echo $lawyerEdu['eduContent']; ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="address-section">
                            <div class="profile-body-wrapper">
                                <div class="profile-body-header">
                                    <i class="fas fa-balance-scale"></i>
                                    <h3>Contact & Map</h3>   
                                </div>
                                <?php foreach($address as $add) : ?>
                                <p>Address:</p>
                                <p><?php echo $add['address']; ?> <?php echo $add['city']; ?> TX, <?php echo $add['zipcode']; ?></p>
                                <p>Phone Number:</p>
                                <p><?php echo $add['phoneNum'] ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-lane">
                    <div class="right-lane-header">
                        <p>Sponsored Listings</p>
                    </div>
                    <?php foreach ($claimedDisplay as $s) : ?>
                    <div class="right-lane-profile">
                        <img src="./images/lawyer-profiles/<?php echo $s['profilePhoto']; ?>" alt="">
                        <p><?php echo $s['name']; ?></p>
                        <a href="?action=lawyer-profile&lawyerID=<?php echo $s['lawyerID']; ?>" class="primary-btn">Visit Listing</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('views/main-footer.php'); ?>
</body>
</html>