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
                    <p>Depth Editor for <?php echo $lawyerMainInfo['name']; ?></h4>
                </div>
                <div class="create-wrapper">
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="lawyerDepthEdit">
                        <input type="hidden" name="lawyerID" value="<?php echo $lawyerID; ?>">
                        <div class="wrapped-item">
                            <label for="name">Lawyer Name</label>
                            <input type="text" name="name" value="<?php echo $lawyerMainInfo['name']; ?>">
                        </div>
                        <div class="wrapped-item">
                            <label for="workPlace">Place of Work</label>
                            <input type="text" name="workPlace" value="<?php echo $lawyerMainInfo['placeOfWork']; ?>">
                        </div>
                        <div class="wrapped-item">
                            <label for="startDate">Years of Work</label>
                            <input type="text" name="startDate" value="<?php echo $lawyerMainInfo['years']; ?>">
                        </div>
                        <div class="wrapped-item">
                            <label for="barID">Bar Identification</label>
                            <input type="text" name="barID" value="<?php echo $lawyerMainInfo['barID']; ?>">
                        </div>
                        <div class="wrapped-item">
                            <label for="barDate">Bar Completion Date</label>
                            <input type="text" name="barDate" value="<?php echo $lawyerMainInfo['barDate']; ?>">
                        </div>
                        <div class="wrapped-item">
                            <label for="cate1">Primary Field of Study</label>
                            <select name="cate1">
                            <?php foreach($allCategories as $allCate) :?>
                                <option value="<?php echo $allCate['cateName']; ?>" <?php if($lawyerMainInfo['cate1'] == $allCate['cateName']){echo "selected";} ?>><?php echo $allCate['cateName']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="wrapped-item">
                            <label for="cate2">Secondary Field of Study</label>
                            <select name="cate2">
                            <?php foreach($allCategories as $allCate2) :?>
                                <option value="<?php echo $allCate2['cateName']; ?>" <?php if($lawyerMainInfo['cate2'] == $allCate2['cateName']){echo "selected";} ?>><?php echo $allCate2['cateName']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="wrapped-item">
                            <label for="cate3">+ Field of Study</label>
                            <select name="cate3">
                            <?php foreach($allCategories as $allCate3) :?>
                                <option value="<?php echo $allCate3['cateName']; ?>" <?php if($lawyerMainInfo['cate3'] == $allCate3['cateName']){echo "selected";} ?>><?php echo $allCate3['cateName']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="wrapped-item">
                            <label for="cate4">+Field of Study</label>
                            <select name="cate4">
                            <?php foreach($allCategories as $allCate4) :?>
                                <option value="<?php echo $allCate4['cateName']; ?>" <?php if($lawyerMainInfo['cate4'] == $allCate4['cateName']){echo "selected";} ?>><?php echo $allCate4['cateName']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="wrapped-item">
                            <label for="cate5">+ Field of Study</label>
                            <select name="cate5">
                            <?php foreach($allCategories as $allCate5) :?>
                                <option value="<?php echo $allCate5['cateName']; ?>" <?php if($lawyerMainInfo['cate5'] == $allCate5['cateName']){echo "selected";} ?>><?php echo $allCate5['cateName']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <?php echo $experienceThis; ?>
                        <?php echo $educationThis; ?>
                        <?php echo $addressThis; ?>
                        <div class="wrapped-item">
                            <label for=""></label>
                            <input type="submit" value="Apply">
                        </div>
                        <p><?php echo $lawyerID; ?></p>
                    </form>
                </div>
                <div class="dash-spacer"></di>
            </div>  
        </div>
    </div>
    <?php include('../views/main-footer.php'); ?>
</body>
</html>