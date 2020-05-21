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
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="createNewSubmit">
                        <div class="wrapped-item">
                            <label for="name">Lawyer Name</label>
                            <input type="text" name="name" placeholder="Mathew Parry">
                        </div>
                        <div class="wrapped-item">
                            <label for="workplace">Place of Work</label>
                            <input type="text" name="workplace" placeholder="Chase Bank Attorneys">
                        </div>
                        <div class="wrapped-item">
                            <label for="startDate">Years of Work</label>
                            <input type="text" name="startDate" placeholder="2003">
                        </div>
                        <div class="wrapped-item">
                            <label for="barID">Bar Identification</label>
                            <input type="text" name="barID" placeholder="123456789">
                        </div>
                        <div class="wrapped-item">
                            <label for="barDate">Bar Completion Date</label>
                            <input type="text" name="barDate" placeholder="2002">
                        </div>
                        <div class="wrapped-item">
                            <label for=""></label>
                            <input type="submit" value="Create">
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