<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
    include "header.html";
    ?>
    <div class="bodycont">

    <section class="sec1">
        <img src="images/architect1.jpg" height="800" width="1500" alt="">
        <p class="p-sec1"><span class="sp">BR</span>Architect</p>
    </section>
    <section class="sec2">
        <h1>Projects</h1>
        <!-- <div class="line"></div> -->
        <div class="sec2imgcont">
        <div class="sec2imgcontA">
            <div class="ha">
                <img src="images/house2 (1).jpg" width="300" alt="">
                <p class="p-ha">Summer House</p>
            </div>
            <div class="hb">
                <img src="images/house3 (1).jpg" width="300" alt="">
                <p class="p-hb">Brick House</p>
            </div>
            <div class="hc">
                <img src="images/house4 (1).jpg" width="300" alt="">
                <p class="p-hc">Renovated</p>
            </div>
            <div class="hd">
                <img src="images/house5 (1).jpg" width="300" alt="">
                <p class="p-hd">Barn House</p>
            </div>
        </div>
        <div class="sec2imgcontB">
            <div class="ha1">
                <img src="images/house2.jpg" width="300" height="350" alt="">
                <p class="p-ha1">Summer House</p>
            </div>
            <div class="hb1">
                <img src="images/house3.jpg" width="300" height="350" alt="">
                <p class="p-hb1">Brick House</p>
            </div>
            <div class="hc1">
                <img src="images/house4.jpg" width="300" height="350" alt="">
                <p class="p-hc1">Renovated</p>
            </div>
            <div class="hd1">
                <img src="images/house5 (2).jpg" width="300" height="350" alt="">
                <p class="p-hd1 ">Barn House</p>
            </div>
        </div>
    </section>


    <section class="sec3" id="contact">
        <h2>Contact</h2>
        <div class="line2"></div>
        <p>Lets get in touch and talk about your next project</p>
        <form action="" class="form">
            <input type="text" placeholder="Name" name="" id="">
            <input type="email" placeholder="Email" name="" id="">
            <input type="text" placeholder="Subject" name="" id="">
            <input type="text" placeholder="Comment" name="" id="">
            <button>Send Message</button>
        </form>
        
    </section>

    <section class="sec4">
        <img src="images/map.jpg" width="1500" alt="">
    </section>
</div>

<?php
include "footer.html";
?>
</body>
</html>