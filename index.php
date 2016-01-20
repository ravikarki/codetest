<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en-US"> 
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<link rel="shortcut icon" href="favicon.ico">
<meta content="Sankalan 2015, Annual technical festival of Department of Computer Science, University of Delhi, Event Details" name="description"/>
<meta content="events, event list, Sankalan, DUCSS, DUCS, Delhi University Computer Science Society, Sankalan 2015, annual fest, Department of Computer Science, University of Delhi, Annual fest of DUCS, Conference Centre, North Campus" name="keywords"/>
<title> Sankalan 2015 - Annual Technical Festival of Department of Computer Science, University of Delhi</title>  



<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>   

<link href="_include/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<!-- Bootstrap -->
<link href="_include/css/bootstrap.min.css" rel="stylesheet">

<!-- Main Style -->
<link href="_include/css/main.css" rel="stylesheet">
<link href="_include/css/styles.css" rel="stylesheet">

<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">

<!-- FancyBox -->
<link href="_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">

<!-- Font Icons -->
<link href="_include/css/fonts.css" rel="stylesheet">

<!-- Responsive -->
<link href="_include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="_include/css/responsive.css" rel="stylesheet">




<!-- Google Font -->
<link href='_include/css/titillium.css' rel='stylesheet' type='text/css'>
<link href='_include/css/indie_flower.css' rel='stylesheet' type='text/css'>
<!-- Modernizr -->
<script src="_include/js/modernizr.js"></script>

<body>

<!-- This section is for Splash Screen -->
<div class="ole">
<section id="jSplash">
    <div id="circle"></div>
</section>
</div>
<!-- End of Splash Screen -->
<!-- Header -->
<header>
    <div class="sticky-nav">
        <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">


            <a  href="http://www.du.ac.in/du/"  target="blank" title="University of Delhi"><img src="dulogo.png" height="55px" width="55px"></a>
        </div>
        <div id="logo">

            <a href="https://www.facebook.com/DUCS.Sankalan"  target="blank" title="Like us on facebook" ><img src="_include/img/facebook.png" width="62px" height="62px"></a>

        </div>
        <div id="logo">
            <a href="http://www.sankalan.info/downloads/sankalan2015.apk"  target="blank" title="Sankalan'15 Android  App" ><img src="_include/img/android.png" width="63px" height="63px"></a>
        </div>
        <div id="logo">
            <a href="http://www.windowsphone.com/s?appid=3d41b707-5d4f-4d6f-924b-d0aa0348b795"  target="blank" title="Sankalan'15 Windows App" ><img src="_include/img/windows.png" width="63px" height="63px"></a>
        </div>
        <div id="welcome">
            <?php                 
                if(isset($_SESSION['t_id']) && isset($_SESSION['t_name']) && isset($_SESSION['logged_in']))
                {
                    echo " Welcome <a href='./regis/teampage.php'>".$_SESSION['t_name']."</a> ";
                }
            ?>
        </div>
        
        <nav id="menu">
            <ul id="menu-nav">
                <li class="current"><a href="#home-page">Home</a></li>
                <li><a href="#home-slider">About Us</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="./downloads/rules.pdf" target="_blank" class="external" >Rules</a></li>
                <li><a href="./downloads/schedule.pdf" target="_blank" class="external" >Schedule</a></li>
                <li><a href="#sponsor">Sponsors</a></li>
                <li><a href="#contact">Contact Us </a></li>
                <li>
                    <?php                 
                        if(isset($_SESSION['t_id']) && isset($_SESSION['t_name']) && isset($_SESSION['logged_in']))                        
                            echo"<a href='./regis/backend/logoutbk.php' class='external'>Logout</a>";                        
                        else
                            echo"<a href='./regis/index.php' class='external'>Register/Login</a>";
                    ?>
                </li>
                                
            </ul>
        </nav>
        
    </div>
</header>
<!-- End Header -->






<!-- Our Home-Page Section -->
<div id="home-page" class="page1">

    <!-- Homepage Effect -->
    <div id="theme-effect"> 
        <div class="effect-text">
            <div id="etext">
                <p>Celebrating Enigma.Coders vs Decoders. Plain Text + Key= Cipher Text=Plain Text + Key= Cipher Text. Vigenere cipher.Caesar cipher.Beale Ciphers.Gronsfeld cipher.Beaufort.cipher.autokey cipher.Playfair cipher.Hill cipher.Feistel cipher.trifid cipher.four-square ciphers .running key cipher.Celebrating Enigma.Coders vs Decoders. Plain Text + Key= Cipher Text=Plain Text + Key= Cipher Text. Vigenere cipher.Caesar cipher.Beale Ciphers.Gronsfeld cipher.Beaufort.cipher.autokey cipher.Playfair cipher.Hill cipher.Feistel cipher.trifid cipher.four-square ciphers .running key cipher.Celebrating Enigma.Coders vs Decoders. Plain Text + Key= Cipher Text=Plain Text + Key= Cipher Text. Vigenere cipher.Caesar cipher.Beale Ciphers.Gronsfeld cipher.Beaufort.cipher.autokey cipher.Playfair cipher.Hill cipher.Feistel cipher.trifid cipher.four-square ciphers .running key cipherCelebrating Enigma.Coders vs Decoders. Plain Text + Key= Cipher Text=Plain Text + Key= Cipher Text. Vigenere cipher.Caesar cipher.Beale Ciphers.Gronsfeld cipher.Beaufort.cipher.autokey cipher.Playfair cipher.Hill cipher.Feistel cipher.trifid cipher.four-square ciphers .running key cipher. </p>
                
            </div>
        </div>
    </div>   

    <script src="_include/js/jquery-1.10.2.min.js"></script>
    <script>
    $(function() {

        $('#notification').textition({
        speed: 1.0,
        animation: 'ease-out',
        map: {
            x: 10,
            y: 10,
            z: 10
        },
                autoplay: true,
        interval: 2.7
    })
         
    });
    </script>
    
   <!-- End Homepage effect -->

    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="notification-section">

                    <div id="notification">
                        <p> Sankalan'15 concluded successfully! Congratulations to all the winners! </p>
                        <p> See you next year @ Sankalan'16</p>
                    </div>
                </div>
            </div>
        </div>  
        <!-- Title Page -->
        <div class="row">

            <div class="span12">

                <div class="title-page1">
                    <div class="title-description"><a href="http://cs.du.ac.in/" target="blank">Department of Computer Science</a>,<a href="http://www.du.ac.in/du/" target="blank"> University of Delhi </a><br>presents</div>

                        <div class="title">SANKALAN 2015</div>
                        <div class="title-description">COMPILING INNOVATIONS<br><b>28<sup>th</sup> February-1<sup>st</sup> March 2015</b><br>Venue: Conference Centre, North Campus, University of Delhi </div>      
                </div>
            </div>
        </div>        
        <!-- End Title Page -->      
    </div>    
</div>
<!-- Our Home-Page Section -->
<!-- Homepage Slider -->
<div id="home-slider">  
    <div class="overlay"></div>

    <div class="slider-text">
        <div id="slidecaption1">
            Established in the year 1922, the University of Delhi is one of the prestigious institutions of India. Since its inception, it has been a center of academic excellence. <br />
            The Department of Computer Science was established in the University of Delhi in the year 1981, with the objective of imparting quality education in the field of Computer Science. 
            <b>The Master of Computer Applications (MCA) program </b> started in the Department in 1982-83 was among the first such programs in India. <b>The M.Sc. Computer Science program </b>, introduced in the year 2004, aims to develop core competence in Computer Science and to prepare the students to carry out research and development work, as well as take up a career in the IT industry. <br />
            The Department is proud of its nearly 1000+ alumni at important positions in IT industry in India and abroad.<br />
            The students of the Department established the <b> Delhi University Computer Science Society (DUCSS)</b> in the year 2004. The society conducts technical events to enrich student's academic skills and also provides a common meeting ground for students pursuing different courses within the Department. As its first endeavour, DUCSS started <b>Sankalan-Compiling Innovations </b> in 2005, a two-day technical festival as its annual technical fest.
            Growing from its very humble beginning, Sankalan today has established itself as one of the top technical fests of the country. Sankalan has always lived up to its expectations and has been much appreciated by many for its growing success each passing year. It provides an unparalleled platform where participants from various universities and colleges  from all over the country compete and explore their potential through various events. Now its time for Sankalan once again.<br />                     
            <b>Sankalan 2015</b> to be held on<b> 28<sup>th</sup> February-1<sup>st</sup> March 2015 </b> will be a two-day festival, encompassing workshops and several technical and non-technical events. The festival will be organized in the <b>Delhi University Conference Centre, North Campus, University of Delhi</b>.

        </div>
    </div>       
    <div class="control-nav">
        <a id="nextsection" href="#events"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
</div>
<!-- End Homepage Slider -->



<!-- Events Section -->
<div id="events" class="page">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <div class="title">EVENTS</div>
                </div>
                <!-- Filter -->
                 <nav id="options" class="event-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                        <li><a href="#filter" data-option-value="*" class="selected">All Events</a></li>
                        <li><a href="#filter" data-option-value=".tech">Tech Events</a></li>
                        <li><a href="#filter" data-option-value=".nontech">Non Tech Events</a></li>
                        <li><a href="#filter" data-option-value=".workshop">Workshop</a></li>


                    </ul>
                </nav>
                <!-- End Filter -->
            </div>
        </div>
        <!-- End Title Page -->
             <div class="row">
            <div class="span12">
                <div class="row">
                    <section id="projects">
                        <ul id="thumbs">      
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
<a class="hover-wrap fancybox" data-fancybox-group="gallery"  

title=""
 href="_include/img/work/full/4.jpg">
                                    <span class="overlay-img">ALGOHOLICS</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/image-01-full.jpg" alt="<center>
<b>Introduction</b>:<br></center>
Look around the world. If all you can see is puzzles and algorithms to solve them, then this is right place for you. Here at algoholics we get you the most exiciting problems<br>
<center>
<b>Team Size:  2</b> <br></center><center>
<b>Round 1 (Prelims)</b>:<br></center>
Multiple-choice questions based on Algorithms and Analysis.<br>
<center>
<b>Round 2 (Mains)</b>:<br></center>
The teams qualifying will be given a set of problems for algorithm/pseudo-code to be developed, followed by a presentation.<br>

<center>
<b>Event Coordinators</b>:<br>
Isha Singhal (+91-9968248351 )<br>                        
Megha Bansal  (+91-9953668583)
</center>

">
           </li>
                            <!-- End Item Project -->
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head2.jpg">
                                    <span class="overlay-img">BRAINSPARK</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/brainspark1.jpg" alt="<center>

<b>
Introduction:</b><br></center>The mind is the limit. As long as the mind can envision the fact that you can do something, you can do it.
Get ready to face brain racking puzzles.<br>
<center><b>
Team size:  2</b><br></center>
<center><b>
Round 1 (Prelims)</b>:<br></center>

Questions based on Logical reasoning, Quantitative aptitude and basic Intelligence<br>

<center><b>Round 2 (Mains)</b>:<br></center>
The teams qualifying would be given a set of puzzles to solve.<br>

<center>
<b>Event Coordinators</b>:<br>
Aakanksha Sureka (+91-9811460989)  <br>            
   Megha Bansal (+91-9953668583)
</center>


">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head3.jpg">
                                    <span class="overlay-img">CIPHER-O-MORE</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                 <img width="140" height="140" src="_include/img/work/full/cipheromone_icon1.jpg" alt="<center>

<b>
Introduction:</b><br></center>
In this event, participants will be tested for their acumen in cryptoscience. It will be an Android based game. Participating teams must race against time to decrypt all clues to unlock the title of 'Titans of Cryptology' <br>
<center>
 <b>Team size:  2</b><br>

<b>Rules</b>: To be disclosed in the app itself.</center><br>
<center>
<b>Event Coordinators</b>:<br>
Akriti Gupta (+91-9811084375)<br>                        
Rohit Arora  (+91-9899234669)
</center>


">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 nontech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head15.jpg">
                                    <span class="overlay-img">JUST A MINUTE</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/just a min.jpg" alt="
<center>
<b>
Introduction</b>:<br></center>
You got to fight every second, every minute and every round. Get ready for simple and fun-filled games to be played in a minute.<br>
Games would have to be completed in a minute period.<br>
<center><b>Team size: 2</b><br></center>
A maximum of 72 teams will be allowed.<br>
<center>
<b>Event Coordinator</b>:<br>
Shivangi Rastogi (+91-9910984264) 
</center>
">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head6.jpg">
                                    <span class="overlay-img">DEBUG++</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/debug.png" alt="
<center>
<b>Introduction</b>:<br></center>
Teams will be tested for their dexterity in spotting and fixing bugs in the source code. <br>
<center>
<b>Team Size: 2</b><br>
<b>Operating System: Ubuntu</b><br>
<b>Platform: gcc/g++</b><br>
<b>Round 1 (Prelims)</b>:<br></center>
Multiple-choice questions based on standard C/C++ concepts.<br>

<center><b>Round 2 (Mains)</b>:<br></center>
The teams qualifying would be given a set of certain C/C++ codes to debug.<br>
<center>
<b>Event Coordinators</b>:<br>
Radhika Dhingra (+91-9013655145)<br>
Tulika Singh (+91-9650791272)
</center>
">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head7.jpg">
                                    <span class="overlay-img">JAVA JUGGLING</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/javajuggeling.png" alt="<center>

<b>Introduction</b>:<br></center>
This event focuses on Java programming. Participating teams will be required to prove their coding expertise in the language. <br>
<center><b>
Team Size: 2<br>
Operating System: Windows<br>
Platform: Netbeans<br></b></center>
<center><b>
Round 1 (Prelims)</b>:<br></center>
Multiple-choice questions based on concepts of Java<br>
<center><b>
Round 2 (Mains)</b>:<br></center>
The teams qualifying would be given a set of programming problems to code in Java.<br>
<center><b>
Event Coordinators</b>:<br>
Krishma Kochhar (+91-9899925315 )<br>
                  Megha Bansal ( +91-9953668583)
</center>
                  
">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head8.jpg">
                                    <span class="overlay-img">MAKE APP</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/makeapp.png" alt="
<center>
<b>Introduction</b>:<br>
</center>
Skilled as an android developer, Test and compete to prove your android development skills with an application development.<br>
<center><b>
Team size: 2<br>
Operating System: Windows 7 <br>
Platform: Android Studio with latest android platform<br></b></center>

<b>Prelims</b>: MCQs based on concepts related to android.<br>
<b>Mains</b>: Android Application Development<br>
<center>
<b>Event Coordinators</b>:<br>
Manish Vishwakrama (+91-9810785493)<br>
Himanshu Mehta (+91-9811671651)<br>
Vikas Bek (+91-9971833948)
</center>
">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head9.jpg">
                                    <span class="overlay-img">MIND MATTERS</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/mindmatters.png" alt="<center>

<b>Introduction</b>:<br></center>
Think you are Mr.Know-it-All of the silicon world, Come and participate in this event, test your knowledge, let the world know that and walk away as a champion.<br>
<center><b>
Team Size: 2<br>    
Round 1 (Prelims)</b>:<br></center>
Multiple-choice questions based on Computer Science and IT world.<br>

<center><b>Round 2 (Mains)</b>:<br></center>
The teams qualifying would compete in the Event's Main Quiz.<br>

<center><b>
 Event Coordinators</b>:<br>
Ravi Mehta (+91-9910679017)<br>
Tamanna Gupta (+91-9560098685)
</center>

">
                            </li>
                            <!-- End Item Project -->
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head10.jpg">
                                    <span class="overlay-img">SELECT * FROM BRAIN</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/selectstar.png" alt="

<center><b>
Introduction</b>:<br></center>
Fire the Query..... Ignite the SQL.... Prove that you have got the brightest Spark!!!!<br>
<center><b>
Team Size: 2<br>
Operating System: Windows<br>
Platform: Oracle 10g<br>

Round 1 (Prelims)</b>:<br></center>
Multiple-choice questions based on standard SQL, XQuery and DBMS concepts.<br>
<center><b>
Round 2 (Mains)</b>:<br></center>
The teams qualifying would be given a set of queries, that would have to be solved using SQL.<br>

<center><b>
Event Coordinators</b>:<br>
Ravi Mehta (+91-9910679017)<br>
Heena Dhankani (+91-9999141147)<br>

</center>
">
                            </li>
                            <!-- End Item Project -->                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head11.jpg">
                                    <span class="overlay-img">SPIN A WEB</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/spinaweb.png" alt="
<center><b>
Introduction</b>:<br></center>
Have you been bitten by the creative bug, Then here is the medicine. Give wings to your imagination and design a website on a given topic.<br> 
<center><b>
Team Size: 2<br>
Operating System: Windows<br>
Platform: Apache 2.4.x / PHP / MySQL 5.6.x<br>


Round 1 (Prelims)</b>:<br></center>
Multiple-choice questions based on internet, Web Servers, Web Development, HTML, CSS , Javascript and PHP.<br>
<center><b>Round 2 (Mains)</b>:<br></center>
The teams qualifying would have to develop a website using HTML, CSS, PHP and MySQL, in a span of 4 hours.<br>
<center><b>
Event Coordinators</b>:<br>
Divya Nigam (+91-8744037873)<br>
Sushmita Roy (+91-9953717142)


</center>
">
                            </li>
                            <!-- End Item Project -->
                            
 <li class="item-thumbs span2 workshop">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="workshop.html#events">
                                    <span class="overlay-img">TECHNOSPEAK</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/ts.jpg" alt="

">
                            </li>
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head13.jpg">
                                    <span class="overlay-img">TEXPERT</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/texpert.jpg" alt="
<center><b>Introduction</b>:<br></center>
Testing every facet of your technical knowledge!!!<br>
<center><b>
Team Size: 2<br>
Domains</b>: </center>DBMS, Software Engineering, Operating Systems, Data communication and Networking, Data Structures and Algorithms, C/C++, Java and general Computer Science.<br>
<center><b>
Round 1 (Prelims)</b>:<br></center>
Multiple-choice questions based on the above mentioned domains.<br>
<center><b>
Round 2 (Mains)</b>:<br></center>
The teams qualifying would participate in Technical Q&A session. The audience or any of the judges will ask questions on the above mentioned domains.<br>


<center><b>
Event Coordinator</b>:<br>
Ravi Mehta
(+91-9910679017)

</center>

">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 tech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head5.jpg">
                                    <span class="overlay-img">CODE A THON</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/code-a-thon.png" alt="
<center><b>
Introduction</b>:<br></center>
Do you have what it takes to survive marathon programming sessions, Then we have just the thing for you...<br>
<center><b>
Team Size: 2<br>
Operating System: Ubuntu<br>
Platform: gcc/g++<br>
Prelims </b>:</center>
Multiple-choice questions based on concepts of C / C++ including topics like file handling, output formatting, graphics, etc.<br>
<center><b>
Mains</b>:</center>
The teams qualifying would be given a multi-modular project to be developed in a span of 5 hours.<br>
<center><b>
Event Coordinators</b>:<br>
Radhika Dhingra (+91-9013655145)<br>
Shruti Singhal (+91-8802735298)
</center>
">

 </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
           <li class="item-thumbs span2 nontech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head17.jpg">
                                    <span class="overlay-img">TURNCOAT</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/turncoat1.jpg" alt="
<center><b>
Introduction</b>:<br></center>
The battle of thoughts...shift of allegiance...flip of faith<br>
<center><b>
Individual Event<br>

Round 1</b>:</center>
Each participant will be given 2 minutes to speak on a debatable topic, with alternative durations of 30 seconds each in favor or against the issue.<br>
<center><b>
Round 2</b>:</center>
Two participants will be given the same topic to speak. Alternatively, they will have to speak in favour and against.<br>
<center><b>
Round 3</b>:</center>
All qualifying participants will be given the same topic to speak. They would randomly be asked to present their views in contradiction to the previous speaker.<br>


<center><b>
Event Coordinators</b>:<br>
Rohit Arora
(+91-9899234669)<br>
Barkha Khatri
(+91-9015374659)<br>

</center>
">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 nontech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head.png">
                                    <span class="overlay-img">THIRD DIMENSION </span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/3d.jpg" alt="
                                <center>
<b>Individual Event
Topic: “Reality Beyond Imagination”</b></center>
A 3D poster making on your Imagination i.e.” Think beyond the realms of monotony. Let your imagination fly. Believe in the unbelievable and let it show on the poster you create.”<br>
1.   Submit .jpeg or .jpg file of your work. Mail us at <b>sankalanthirddimension@sankalan.info</b> with the subject as <b>SANKALAN’15 THIRD DIMENSION</b>. Do Mention your <b>NAME, COLLEGE NAME and CONTACT NUMBER</b> in your mails.<br>
2.  To be submitted before 27th FEBUARY 2015, 12:00 pm.<br>
3.   Each participant can submit at most 2 entries.<br>
<b>Note</b>:<br>
1. Copyright or animated (.gif) images will not be accepted. Entries having copyright material will be disqualified.<br>
2. The decisions of judges will be final and binding and will not be subject to questioning at any level of the competition.<br>
3. 2 posters will be selected.<br>
4. Result will be announced on <b>01st MARCH 2105 at <a href='http://www.sankalan.info'>SANKALAN 2015</a></b> .<br>

<center>
<b>Event Coordinators</b>:<br>
Sandeep Kumar (+91-9312761198)<br>
Manish (+91-9810785493)
</center>
">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 nontech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="_include/img/work/full/head4.png">
                                    <span class="overlay-img">CHAKRAVYUH</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<BR>  here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/chakravyuh1.jpg" alt="


Step inside it, Make friends with Google to unravel the mystery
                and be a part of the hunt of the treasure !!!<br>
                <center><b>
Introduction</b>:<br></center>
<b>Chakravyuh</b> – The online treasure hunt is an online quiz which focuses on testing your mental ability.  Navigate your way through hidden clues, with your knowledge, presence of mind, and an attitude of not giving up at any cost.<br>
<b>Remember </b>- Google is your best friend.<br>

Waited for it long enough?
Hold on to the wait a little more!<br>

As we're reaching out to you guys on 20th February midnight and will stay with you for a week's time.<br>

So, get ready for sleepless nights, yet again !!<br>

Sankalan '15 brings to you, the event that blew your brains last year!<br>
CHAKRAVYUH - RELOADED!<br>
Stay Connected for more updates!<br>
Website : <a class='external' target='_blank' href='http://www.sankalan.info/chakravyuh'>www.sankalan.info/chakravyuh</a><br>
@ Sankalan '15 - Annual Technical Fest<br>

<center><b>
Event Coordinators<b>:<br>
Nikita Chopra (n1992c@gmail.com)<br>
Kriti Gupta (guptakriti351992@gmail.com)<br>


</center>
">
                            </li>
                            <!-- End Item Project -->
                            
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span2 nontech">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="" href="lan.html">
                                    <span class="overlay-img">LAN GAMING</span>
                                    <span class="overlay-img-thumb font-icon-plus">click<br>here</span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img width="140" height="140" src="_include/img/work/full/langaming.jpg" alt="
<center>
Introduction:<br>

</center>

">
                            </li>
                            <!-- End Item Project -->
                            <!-- Item Project and Filter Name -->
                           
                            <!-- End Item Project -->

                        </ul>
                    </section>
                    
                </div>
            </div>
        </div>
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->


<!-- Sponsor Section -->
<div id="sponsor" class="page-alternate">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title">SPONSORS</h2>
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    <!-- sponsor -->
    <div class="row"> 
        <!-- Start List -->
        <div class="span12">
            <div class="sponsor-list">
            <center>
            <ul >
                <li><a href="http://www.idfootwear.com/" title=" ID Footwear" target="blank"><img width="140" height="140" src="_include/img/sponsor/leeid.png" alt="ID Footwear"></a></li>
                <li><a href="http://www.nagarro.com/" title=" Nagarro" target="blank"><img width="140" height="140" src="_include/img/sponsor/nagarro.png" alt="Nagarro"></a></li>
                <li><a href="http://www.drdo.gov.in/" title="Defence Research and Development Organisation" target="blank"><img width="140" height="140" src="_include/img/sponsor/drdo.jpg" alt="DRDO"></a></li>
                <li><a href="https://www.facebook.com/LifeAtJosh" title=" Josh Technology Group" target="blank"><img width="140" height="140" src="_include/img/sponsor/josh.png" alt="Josh Technology Group"></a></li>
                <li><a href="https://www.itemvan.com/" title=" Item Van" target="blank"><img width="140" height="140" src="_include/img/sponsor/itemvan1.jpg" alt="Item Van"></a></li>
                <li><a href="http://www.webblitz.in/" title=" WebBlitz" target="blank"><img width="140" height="140" src="_include/img/sponsor/webblitz.jpg" alt="WebBlitz"></a></li>
                <li><a href="http://www.makemykart.com" title=" Make My Kart" target="blank"><img width="140" height="140" src="_include/img/sponsor/mmk.png" alt="Make My Kart"></a></li>
                <li><a href="http://www.lenskart.com/" title="Lenskart" target="blank"><img width="140" height="140" src="_include/img/sponsor/lenskart.jpg" alt="Lenskart"></a></li>
                <li><a href="" title=" Krishna Jewellers"><img width="140" height="140" src="_include/img/sponsor/krishnajewellers.png" alt="Krishna Jewellers"></a></li>
                <li><a href="http://www.chipyard.in" title=" Chipyard" target="blank"><img width="140" height="140" src="_include/img/sponsor/chipyard.png" alt="Chipyard"></a></li>                
                <li><a href="http://www.dubeat.com" title=" DU Beat" target="blank"><img width="140" height="140" src="_include/img/sponsor/dubeat.jpg" alt="DU Beat"></a></li>
                <li><a href="http://www.coca-colaindia.com/"  title=" Coca Cola" target="blank"><img width="140" height="140" src="_include/img/sponsor/cocacola.jpg" alt="Coca Cola"></a></li>
                
            </ul>
            </center>
        </div>
        </div>
        <!-- End List -->
    </div>
    <!-- End sponsor -->
</div>
</div>
<!-- End sponsor Section -->







<!-- Contact Section -->
<div id="contact" class="page">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <div class="title">CONTACT US</div>

            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    <!-- Contact Form -->
    <div class="row">
        <div class="span4">
        
            <form id="contact-form" class="contact-form" action="">
                <p class="contact-email">
                    <input id="contact_email" type="text" placeholder="Your Email Address" value="" name="email" />
                </p>
                <p class="contact-message">
                    <textarea id="contact_message" placeholder="Your Message" name="message" rows="10" cols="40"></textarea>
                </p>
                <p class="contact-submit">

                    <input type="button" id="contact_submit" class="submit" value="Send">
                    <input type="reset" name="clear" value=" Clear "  class="submit">
                </p>
            </form>
         
        </div>
        
        <div class="span4">
            <div class="contact-details">
                <div id="panel-info">Panel Members</div>
                <ul>
                    <li>Vandana Jain-8860400097<br>(President)</li>
                    <li>Alisha Agarwal-9711402741<br>(Vice President)</li>
                    <li>Muskan Dhanda-9811135606<br>(General Secretary)</li>
                    <li>Palak Ahuja-7827478707<br>(Joint Secretary)</li>
                    <li>Akriti Gupta-9811084375<br>(Treasurer)</li>

 
                </ul>
            </div>
        </div>
        <div class="span4">
            <div class="contact-details">
                <div id="panel-info">Accommodation Coordinators</div>
                <ul>
                    <li>Vineet Jangid-7827356742</li>
                    <li>Ravi Mehta-9910679017</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Contact Form -->
    <div class="row">
        <div class="span12">
            <p>you can also email us your queries at contactus@sankalan.info</p> 
        </div>
    </div>

</div>
</div>
<!-- End Contact Section -->


<!-- Footer -->
<footer>
    <p class="credits">Copyright &copy; 2015 |  Department of computer Science, University of Delhi </p>
</footer>
<!-- End Footer -->

<!-- Back To Top -->
<a id="back-to-top" href="#">
    <i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->


<!-- Js -->



<script src="_include/js/jquery.min.js"></script> <!-- jQuery Core -->
<script src="_include/js/script.js"></script> <!-- App store drop down -->
<script src="_include/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="_include/js/waypoints.js"></script> <!-- WayPoints -->
<script src="_include/js/supersized.3.2.7.min.js"></script> <!-- Slider -->
<script src="_include/js/waypoints-sticky.js"></script> <!-- Waypoints for Header -->
<script src="_include/js/jquery.isotope.js"></script> <!-- Isotope Filter -->
<script src="_include/js/jquery.fancybox.pack.js"></script> <!-- Fancybox -->
<script src="_include/js/plugins.js"></script> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<script src="_include/js/main.js"></script> <!-- Default JS -->
<!-- End Js -->

</body>
</html>