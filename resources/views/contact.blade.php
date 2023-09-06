<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    	<title>SynopticXpress - Synops control</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/tooplate-style.css">
        <link rel="icon" type="image/x-icon" href="img/logoWB.png" />

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>


    <section class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <img src="img/logoWB.png" alt="Flight Template">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-direction-button">
                        <a href="/"><i class="fa fa-home"></i>Go Back Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Contact Information</h2>
                        <p> The Essaouira Provincial Meteorological Center is part of the DGM (Direction Générale de la Meteorologie Nationale - National Meteorological Directorate), whose aim is to ensure the development of meteorological warning systems, the quality of forecasts, and the improvement of meteorological observation. The Essaouira CPM is one of the subordinates of the WMO (World Meteorological Organization), which enables meteorological measurements to be standardized, exchanged internationally and archived.</p>
                    </div>
                </div>
                
                <div class="col-md-6 p-5">
                    <div  class="itemcontactinfo p-5">
                        <div>
                            <div class="row-md-12">
                                <i class="fas fa-clock display-4"></i>
                                &nbsp;&nbsp;<i><b>Availability Hours</b></i>
                            </div>
                            <div class="row-md-12">
                                <ul>
                                    <li><pre>Monday      9 AM - 12 PM.</pre></li>
                                    <li><pre>Thursday    9 AM - 12 PM.</pre></li>
                                    <li><pre>Wednesday   9 AM - 12 PM.</pre></li>
                                    <li><pre>Tuesday     9 AM - 12 PM.</pre></li>
                                    <li><pre>Friday      9 AM - 12 PM.</pre></li>
                                </ul>
                                   
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-5">
                <div  class="itemcontactinfo">
                        <div>
                        <div class="row-md-12">
                                <i class="fa fa-info display-4" aria-hidden="true"></i>
                                &nbsp;&nbsp;<i><b>Contact information</b></i>
                            </div>
                            <div class="row-md-12">
                                <ul>
                                    <hr>
                                    <li>
                                        Email Adress: <br><br>
                                        <i class="fa fa-envelope" ></i>
                                        mogadoraero@gmail.com
                                    </li>
                                    
                                    <li>
                                        Phone Number: <br><br>
                                        <i class="fa fa-phone" ></i>
                                        0529475403
                                    </li>
                                   <hr>
                                </ul>
                            </div> 
                        </div>
                    </div>                
                </div>
                
            </div>
        </div>
    </section>



    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Leave us a message</h2>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <form id="contact" action="{{ route('submit.contact') }}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Submit Your Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <section class="map">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1028.958229091005!2d-9.773429770842068!3d31.50956155904558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdad9bcbefe37435%3A0xb957d168758128c2!2sSTATION%20METEOROLOGIQUE%20ESSAOUIRA!5e0!3m2!1sen!2sma!4v1689940554868!5m2!1sen!2sma" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="primary-button">
                        <a href="#" class="scroll-top">Back To Top</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <p>Copyright &copy; 2023 SynoptiXpress
                
                | By: <a href="#" target="_parent"><em>OULAKBIR</em></a></p>
                </div>
            </div>
        </div>
    </footer>


    


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>