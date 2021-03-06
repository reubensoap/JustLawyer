<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Law Finder | Signup</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="../css/reset.css" type="text/css">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <link rel="stylesheet" href="dist-aos/aos.css" type="text/css">
    <script src="https://kit.fontawesome.com/974871ddab.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <?php include('../views/inner-header.php'); ?>
    <div class="page-section">
        <div class="max-w side-space">
            <div class="directory-page-main page-box">
                <div class="written-page">
                    <h2>New Password</h2>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="passResetComplete">
                        <h3>Password:</h3>
                        <input type="text" name="pass" placeholder="Password Here">
                        <input type="submit" value="Submit">
                    </form>
                    <p><?php echo $data; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php include('../views/main-footer.php'); ?>
</body>
</html>