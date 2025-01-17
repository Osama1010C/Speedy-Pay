<?php
include '../Pages/header.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Our Team</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Our Team Page HTML Template" name="keywords">
        <meta content="Our Team Page HTML Template" name="description">
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

        <style>
            
        *,
*::before,
*::after {
    box-sizing: border-box;
}

html {
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

body {
    font-family: 'Lato', sans-serif;
    color: #454545;
    font-weight: 300;
    background: #ffffff;
    margin-top: 80px;
}

a {
    color: #333333;
    font-weight: 400;
    outline: none;
    text-decoration: none;
    transition: 0.5s;
}

a:hover,
a:active,
a:focus {
    outline: none;
    text-decoration: none;
}

p {
    padding: 0;
    margin: 0 0 15px 0;
    color: #454545;
    font-weight: 300;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    padding: 0;
    margin: 0 0 15px 0;
    color: #333333;
    font-weight: 700;
    
}

h1 {
    font-weight: 900;
}

img {
    width: 100%;
    height: auto;
}



/**********************************/
/***** Layout & Section Title *****/
/**********************************/
.container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

@media (min-width: 576px) {
    .container {
        max-width: 540px;
    }
}

@media (min-width: 768px) {
    .container {
        max-width: 720px;
    }
}

@media (min-width: 992px) {
    .container {
        max-width: 960px;
    }
}

@media (min-width: 1200px) {
    .container {
        max-width: 1140px;
    }
}

.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    justify-content: center;
}

.column {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
}

@media (min-width: 576px) {
    .column {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (min-width: 768px) {
    .column {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }
}

@media (min-width: 992px) {
    .column {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }
}

.section-title {
    width: 100%;
    text-align: center;
    padding: 45px 0 30px 0;
}

.section-title::after {
    position: absolute;
    content: "";
    width: 50px;
    height: 5px;
    left: calc(50% - 25px);
    background: #353535;
}

.section-title h1 {
    color: #353535;
    font-size: 50px;
    letter-spacing: 5px;
    margin-bottom: 5px;
}

@media(max-width: 767.98px) {
    .section-title h1 {
        font-size: 40px;
        letter-spacing: 3px;
    }
}

@media(max-width: 567.98px) {
    .section-title h1 {
        font-size: 30px;
        letter-spacing: 2px;
    }
}







/**********************************/
/********* Team #3 Style **********/
/**********************************/
.team-3 {
    margin-bottom: 30px;
}

.team-3 .team-img {
    position: relative;
    font-size: 0;
    clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
    -webkit-clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
}

.team-3 .team-img img {
    width: 100%;
    height: auto;
}

.team-3 .team-social {
    position: absolute;
    width: 100%;
    height: 100%;
    padding: 20px;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, .5);
    transition: all .3s;
    font-size: 0;
    z-index: 1;
    opacity: 0;
}

.team-3:hover .team-social {
    opacity: 1;
}

.team-3 .team-social a {
    display: inline-block;
    width: 40px;
    height: 40px;
    margin-right: 5px;
    padding: 11px 0 10px 0;
    font-size: 16px;
    font-weight: 300;
    line-height: 16px;
    text-align: center;
    color: #ffffff;
    transition: all .3s;
    margin-top: 50px;
    clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
    -webkit-clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
}

.team-3 .team-social a.social-tw {
    background: #00acee;
}

.team-3 .team-social a.social-fb {
    background: #3b5998;
}

.team-3 .team-social a.social-li {
    background: #0e76a8;
}

.team-3 .team-social a.social-in {
    background: #3f729b;
}

.team-3 .team-social a.social-yt {
    background: #c4302b;
}

.team-3 .team-social a:last-child {
    margin-right: 0;
}

.team-3:hover .team-social a {
    margin-top: 0;
}

.team-3 .team-social a:hover {
    color: #222222;
    background: #ffffff;
}

.team-3 .team-content {
    padding: 70px 20px 20px 20px;
    margin-top: -50px;
    text-align: center;
    background: #f3f4fa;
    transition: all .5s;
}

.team-3:hover .team-content {
    background: #222222;
}

.team-3:hover .team-content h2,
.team-3:hover .team-content h3,
.team-3:hover .team-content h4,
.team-3:hover .team-content p {
    color: #ffffff;
}

.team-3 .team-content h2 {
    font-size: 25px;
    font-weight: 400;
    letter-spacing: 2px;
}

.team-3 .team-content h3 {
    font-size: 16px;
    font-weight: 300;
}

.team-3 .team-content h4 {
    font-size: 16px;
    font-weight: 300;
    font-style: italic;
    letter-spacing: 1px;
    margin-bottom: 0;
}

.team-3 .team-content p {
    font-size: 16px;
    font-weight: 400;
    line-height: 22px;
}




       </style>
    </head>

    <body>
        
        
        
        <!-- Team #3 Start -->
        <div class="container">
            <div class="section-title">
                <h1>Meet Our Team</h1>
            </div>
            <div class="row">
                <div class="column">
                    <div class="team-3">
                        <div class="team-img">
                            <img src="../imgs/osama.jpg" alt="Team Image">
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h2>Osama Ahmed</h2>
                            <h3>Team Leader</h3>
                            <p>Some text goes here that describes about team member</p>
                            <h4>example@example.com</h4>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="team-3">
                        <div class="team-img">
                            <img src="../imgs/adham.jpg" alt="Team Image">
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h2>Adham Bassem</h2>
                            <h3>Software Engineer</h3>
                            <p>Some text goes here that describes about team member</p>
                            <h4>example@example.com</h4>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="team-3">
                        <div class="team-img">
                            <img src="../imgs/ramez.jpg" alt="Team Image">
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h2>Ramez Emad</h2>
                            <h3>Software Engineer</h3>
                            <p>Some text goes here that describes about team member</p>
                            <h4>example@example.com</h4>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="team-3">
                        <div class="team-img">
                            <img src="../imgs/alaa.jpg" alt="Team Image">
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h2>Ahmed Alaa</h2>
                            <h3>Software Engineer</h3>
                            <p>Some text goes here that describes about team member</p>
                            <h4>example@example.com</h4>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="team-3">
                        <div class="team-img">
                            <img src="../imgs/hamdy.jpg" alt="Team Image">
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h2>Ahmed Hamdy</h2>
                            <h3>Software Engineer</h3>
                            <p>Some text goes here that describes about team member</p>
                            <h4>example@example.com</h4>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="team-3">
                        <div class="team-img">
                            <img src="../imgs/nadi.jpg" alt="Team Image">
                            <div class="team-social">
                                <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                                <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                                <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                                <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h2>Ahmed Nadi</h2>
                            <h3>Software Engineer</h3>
                            <p>Some text goes here that describes about team member</p>
                            <h4>example@example.com</h4>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Team #3 End -->
        
        
        
    </body>
</html>