<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Law Finder | Home</title>
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
            <a href="index.php">Law Finder</a>
            <p><</p>
            <a href="?action=directoryName&sectionLetter=<?php echo $sectionLetterHead; ?>">Lawyer Directory</a>
            <p><</p>
            <a href="#">Names</a>
            <p>< <?php echo $sectionLetterHead; ?></p>
        </div>
        <div class="directory-page-main page-box">
            <h2>Lawyer Directory For Last Names Filtered By <?php echo $sectionLetterHead; ?></h2>
            <ul>
                <?php foreach($section as $sect) : ?>
                    <li><a href="?action=lawyer-profile&lawyerID=<?php echo $sect['lawyerID']; ?>"><?php echo $sect['name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div id="alpha-box" class="other-alpha">
                <h3>Browse Lawyers Alphabetically</h3>
                <div id="alpha-row">
                    <a href="?action=directoryName&sectionLetter=A">A</a>
                    <a href="?action=directoryName&sectionLetter=B">B</a>
                    <a href="?action=directoryName&sectionLetter=C">C</a>
                    <a href="?action=directoryName&sectionLetter=D">D</a>
                    <a href="?action=directoryName&sectionLetter=E">E</a>
                    <a href="?action=directoryName&sectionLetter=F">F</a>
                    <a href="?action=directoryName&sectionLetter=G">G</a>
                    <a href="?action=directoryName&sectionLetter=H">H</a>
                    <a href="?action=directoryName&sectionLetter=I">I</a>
                    <a href="?action=directoryName&sectionLetter=J">J</a>
                    <a href="?action=directoryName&sectionLetter=K">K</a>
                    <a href="?action=directoryName&sectionLetter=L">L</a>
                    <a href="?action=directoryName&sectionLetter=M">M</a>
                    <a href="?action=directoryName&sectionLetter=N">N</a>
                    <a href="?action=directoryName&sectionLetter=O">O</a>
                    <a href="?action=directoryName&sectionLetter=P">P</a>
                    <a href="?action=directoryName&sectionLetter=Q">Q</a>
                    <a href="?action=directoryName&sectionLetter=R">R</a>
                    <a href="?action=directoryName&sectionLetter=S">S</a>
                    <a href="?action=directoryName&sectionLetter=T">T</a>
                    <a href="?action=directoryName&sectionLetter=U">U</a>
                    <a href="?action=directoryName&sectionLetter=V">V</a>
                    <a href="?action=directoryName&sectionLetter=W">W</a>
                    <a href="?action=directoryName&sectionLetter=X">X</a>
                    <a href="?action=directoryName&sectionLetter=Y">Y</a>
                    <a href="?action=directoryName&sectionLetter=Z">Z</a>
                </div>
            </div>
        </div>
        </div>
        <div class="directory-spacer">
            
        </div>
    </div>
    <?php include('views/main-footer.php'); ?>
</body>
</html>