<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Law Finder | Directory</title>
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
            <a href="#">Justia</a>
            <p><</p>
            <a href="#">Lawyer Directory</a>
        </div>
        <div class="directory-page-main page-box">
            <div class="filter-section">
                <form action="." method="GET">
                    <input type="hidden" name="action" value="directoryMain">
                    <select name="area">
                        <option value="cityOnly">Any Categorie</option>
                        <?php foreach($allCategories as $allCate) :?>
                            <?php if ($allCate['cateName'] == NULL) {
                                continue;
                            } ?>
                            <option value="<?php echo $allCate['cateName']; ?>" <?php if($areaFilter == $allCate['cateName']){echo "selected";} ?>><?php echo $allCate['cateName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select name="city">
                        <option value="areaOnly">Any City</option>
                        <?php foreach($cities as $cities) : ?>
                        <option value="<?php echo $cities['city']; ?>" <?php if($cityFilter == $cities['city']){echo "selected";} ?>><?php echo $cities['city']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit">
                </form>
            </div>
            <div class="listings-wrapper">
            <?php
                $currentdate = date('Y', time());
                $intCurrentDate = (INT)$currentdate;
            ?>
                <?php foreach($Filtered as $Fil) : ?>
                    <?php
                    $intProfileYears = (INT)$Fil['years'];
                    $YWorth = $intCurrentDate - $intProfileYears;
                    ?>
                    <?php
                    $FilPhone = $Fil['phoneNum'];
                    $phone1 = substr($FilPhone, 0, 3);
                    $phone2 = substr($FilPhone, 3, 3);
                    $phone3 = substr($FilPhone, 6, 4);
                    $FilPhoneF = "(". $phone1 .") ". $phone2 ."-". $phone3;
                    ?>
                    <?php
                    if ($Fil['cate2'] == NULL) {
                        $cateList = $Fil['cate1'];
                    } else if ($Fil['cate3'] == NULL){
                        $cateList = $Fil['cate1']. " and ". $Fil['cate2'];
                    } else if ($Fil['cate4'] == NULL) {
                        $cateList = $Fil['cate1']. ", ". $Fil['cate2']. " and ". $Fil['cate3'];
                    } else if ($Fil['cate5'] == NULL) {
                        $cateList = $Fil['cate1']. ", ". $Fil['cate2']. ", ". $Fil['cate3']. " and ". $Fil['cate4'];
                    } else {
                        $cateList = $Fil['cate1']. ", ". $Fil['cate2']. ", ". $Fil['cate3']. ", ". $Fil['cate4']. " and ". $Fil['cate5'];
                    }
                    ?>
                    <a href="?action=lawyer-profile&lawyerID=<?php echo $Fil['lawyerID']; ?>">
                    <div class="listing">
                        <div class="listing-top">
                            <div class="left">
                                <img src="./images/lawyer-profiles/<?php echo $Fil['profilePhoto']; ?>" alt="">
                            </div>
                            <div class="right">
                                <div class="top">
                                    <h3><?php echo $Fil['name']; ?></h3>
                                    <p><?php echo $Fil['placeOfWork'];?> with <?php echo $YWorth; ?> years experience</p>
                                    <h4><?php echo $FilPhoneF;?></h4>
                                </div>
                                <div class="bottom">
                                    <div class="inner-left">
                                        <p><?php echo $Fil['address'];?> <?php echo $Fil['city'];?> TX, <?php echo $Fil['zipcode']; ?></p>
                                    </div>
                                    <div class="inner-right">
                                        <p><?php echo $cateList; ?></p>
                                    </div>     
                                </div>
                            </div>
                        </div>
                        <div class="listing-bottom">
                        
                        </div>
                    </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
        <div class="directory-spacer">
            
        </div>
    </div>
    <?php include('views/main-footer.php'); ?>
</body>
</html>