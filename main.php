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
    <div class="main-header">
        <div class="header-box side-space">
            <h2>Helping You With Your Legal Needs</h2>
            <div class="search-bar">
                <a href="?action=directoryMain&area=cityOnly&city=areaOnly" class="thirdBtn">Find A Lawyer Now</a>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="max-w side-space site-section-wrapper">
            <div class="section middle">
                <a href="?action=faq" class="primary-btn">FAQ</a>
            </div>
            <div class="section">
                <div class="section-header">
                    <p>Find Lawyers by</p>
                    <h2>PRACTICE AREA</h2>
                </div>
                <div class="inner-spacing section-list">
                    <ul>
                        <?php foreach($listCate as $list) : ?>
                            <?php if ($list['cateName'] == NULL) {
                                continue;
                            } 
                            $listValue = $list['cateName'];
                            /*$listValue = str_replace("&", "WHAT", $listValue);*/
                            ?>
                            <a href="?action=directoryMain&area=<?php echo $listValue; ?>&areaOnly=1"><?php echo $list['cateName']; ?></a>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="big-photo" id="main-first-photo">

        </div>
        <div class="max-w side-space">
        <div class="section">
            <div class="section-header">
                <p>Find Lawyers by</p>
                <h2>City</h2>
            </div>
            <div class="inner-spacing section-list">
                <ul>
                    <a href="?action=directoryMain&city=Houston&cityOnly=1">Houston</a>
                    <a href="?action=directoryMain&city=Dallas&cityOnly=1">Dallas</a>
                    <a href="?action=directoryMain&city=Austin&cityOnly=1">Austin</a>
                    <a href="?action=directoryMain&city=San+Antonio&cityOnly=1">San Antonio</a>
                    <a href="?action=directoryMain&city=El+Paso&cityOnly=1">El Paso</a>
                    <a href="?action=directoryMain&city=Fort+Worth&cityOnly=1">Fort Worth</a>
                    <a href="?action=directoryMain&city=Arlington&cityOnly=1">Arlington</a>
                    <a href="?action=directoryMain&city=Odessa&cityOnly=1">Odessa</a>
                    <a href="?action=directoryMain&city=Waco&cityOnly=1">Waco</a>
                    <a href="?action=directoryMain&city=Lubbock&cityOnly=1">Lubock</a>
                    <a href="?action=directoryMain&city=Corpus+Christi&cityOnly=1">Corpus Christi</a>
                    <a href="?action=directoryMain&city=Plano&cityOnly=1">Plano</a>
                    <a href="?action=directoryMain&city=Amarillo&cityOnly=1">Amarillo</a>
                    <a href="?action=directoryMain&city=Laredo&cityOnly=1">Laredo</a>
                    <a href="?action=directoryMain&city=McAllen&cityOnly=1">McAllen</a>
                    <a href="?action=directoryMain&city=Irving&cityOnly=1">Irving</a>
                    <a href="?action=directoryMain&city=Galveston&cityOnly=1">Galveston</a>
                    <a href="?action=directoryMain&city=Katy&cityOnly=1">Katy</a>
                    <a href="?action=directoryMain&city=Frisco&cityOnly=1">Frisco</a>
                    <a href="?action=directoryMain&city=Abilene&cityOnly=1">Abilene</a>
                    <a href="?action=directoryMain&city=Beaumont&cityOnly=1">Beaumont</a>
                    <a href="?action=directoryMain&city=Denton&cityOnly=1">Denton</a>
                    <a href="?action=directoryMain&city=Killeen&cityOnly=1">Killeen</a>
                    <a href="?action=directoryMain&city=McKinney&cityOnly=1">McKinney</a>
                    <a href="?action=directoryMain&city=Brownsville&cityOnly=1">Brownsville</a>
                    <a href="?action=directoryMain&city=College+Station&cityOnly=1">College Station</a>
                    <a href="?action=directoryMain&city=San+Marcos&cityOnly=1">San Marcos</a>
                    <a href="?action=directoryMain&city=New+Braunfels&cityOnly=1">New Braunfels</a>
                    <a href="?action=directoryMain&city=Garland&cityOnly=1">Garland</a>
                    <a href="?action=directoryMain&city=Round+Rock&cityOnly=1">Round Rock</a>
                </ul>
            </div>
        </div>
        </div>
        <div class="big-photo" id="main-second-photo">

        </div>
        <div id="main-info-1"> 
            <div class="max-w side-space">
                <div class="info-wrapper">
                    <div class="left">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="right">
                        <h2>JUSTIA LAWYER DIRECTORY</h2>
                        <p>The Justia Lawyer Directory provides lawyer, legal aid & services profiles by practice area and location. Whatever your legal issue, our lawyer directory will simplify researching, comparing, and contacting attorneys that best fit your legal needs in your city, county or state. </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-info-2"> 
            <div class="max-w side-space">
                <div class="info-wrapper">
                    <div class="left">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="right">
                        <h2>CONSIDERATIONS WHEN CHOOSING A LAWYER</h2>
                        <h3>Response and Communication</h3>
                        <ul>
                            <li>Did the attorney or law firm respond promptly?</li>
                            <li>Did you get to speak to an attorney directly or with a receptionist?</li>
                        </ul>
                        <h3>Trustworthiness and Compatibility</h3>
                        <ul>
                            <li>Is the lawyer telling you what you want to hear or being straight forward and honest?</li>
                            <li>Do you trust his/her advice?</li>
                            <li>Are you compatible?</li>
                        </ul>
                        <h3>Professional Experience, Academics, and Community Service</h3>
                        <ul>
                            <li>Has the lawyer handled your specific issue before? If so, what were the results?</li>
                            <li>What association and affiliations does the attorney have?</li>
                            <li>Which law school did the attorney attend?</li>
                            <li>Is the lawyer involved in his or her community?</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-info-3"> 
            <div class="max-w side-space">
                <div class="info-wrapper">
                    <div class="left">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="right">
                        <h2>LAWYERS, CLAIMED AND KEEP YOUR PROFILE UPDATED</h2>
                        <p>If you are an attorney and have found your profile, claiming, verifying and updating it is highly recommended. It is free and easy to do. Every lawyer profile can have extensive listing information, including full contact information, education, associations, practice areas, and links to their online presences, such as website, blog and social media profiles.</p>
                        <a href="dashboard/?action=moreClaimed" class="primary-btn">Claim Your Profile Now!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="big-photo" id="main-third-photo">

        </div>
        <div id="main-info-4" class="section">
            <div class="max-w side-space">
                <div>
                    <h2>Free Legal Information</h2>
                    <p>Can help you make an educated decision when hirings an attorney.</p>
                </div>
                <div class="badge-wrapper">
                    <div class="badge">
                        <i class="far fa-comment-alt"></i>
                        <h3>Questions & Answers</h3>
                    </div>
                    <div class="badge">
                        <i class="fas fa-file-contract"></i>
                        <h3>Legal Practice Centers</h3>
                    </div>
                    <div class="badge">
                        <i class="fas fa-book"></i>
                        <h3>Codes & Regulations</h3>
                    </div>
                </div>
                <div id="alpha-box">
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
    </div>
    <?php include('views/main-footer.php'); ?>
</body>
</html>