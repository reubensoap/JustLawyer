<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Law Finder | Signup</title>
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
            <div class="directory-page-main page-box">
                <div class="written-page">
                    <h2>Create Your Lawyer Finder Directory Profile</h2>
                    <p>Leverage the high traffic volume and visibility of the Justia Lawyer Directory to expand your online presence and increase your leads. Best of all, it’s free! To get listed in the Justia Lawyer Directory please fill out the form below:</p>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="signupSubmit">
                        <h3>Email Address</h3>
                        <input type="email" name="email" placeholder="Your Email">
                        <input type="submit" value="Submit">
                    </form>
                    <p> Each profile must have unique login credentials. Justia does not create or allow master logins for multiple profiles. If you are a marketing manager or a marketing consultant and wish to create multiple profiles for your firm or client, please click here and follow the instructions.</p>
                    <p>By creating your profile, you agree to abide by the Justia Terms of Service. You may read more about our privacy policy here.</p>
                </div>
            </div>
        </div>
    </div>
    <?php include('views/main-footer.php'); ?>
</body>
</html>