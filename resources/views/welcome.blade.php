<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    	<title>SynopticXpress - Synops control</title>
    
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontAwesome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/hero-slider.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl-carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('css/tooplate-style.css') }}" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="img/logoWB.png" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <style>
        #retourHaut {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            cursor: pointer;
            color:yellowgreen;
            }
            body{
                background: white;
            }

    </style>
<body>

    
    <section class="banner" id="top">
        
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="left-side">
                        <div class="logo">
                            <img src="img/Logoc.png" alt="logoapp">
                        </div>
                        <div class="tabs-content">

                            <h4>Synoptic formula:</h4>
                            <ul class="social-links">
                                <li><a href="http://aero.marocmeteo.ma/">Find us on <em>AeroWeb</em><i style="overflow:hidden; background-image:url('http://aero.marocmeteo.ma/themes/aero/assets/images/logo-dmn.jpg');background-repeat:no-repeat;background-size:cover;"></i></a></li>
                                <li><a href="http://extranet.marocmeteo.ma/">Our <em>DGM</em> Site<i style="overflow:hidden; background-image:url('http://aero.marocmeteo.ma/themes/aero/assets/images/logo-dmn.jpg');background-repeat:no-repeat;background-size:cover;"></i></a></li>
                                <li><a href="http://vigilance.marocmeteo.ma/">Follow us on <em>MMV</em><i style="overflow:hidden; background-image:url('http://aero.marocmeteo.ma/themes/aero/assets/images/logo-dmn.jpg');background-repeat:no-repeat;background-size:cover;"></i></a></li>
                            </ul>
                        </div>
                        <div>
                                    @if (Route::has('login'))
                                        <div class="justify-content-center ">
                                           
                                                <div class="page-direction-button d-flex">
                                                    @auth
                                                    <a href="{{ url('/home') }}" >Dashboard</a>
                                                    @else
                                                    <a href="/contact"><i class="fa fa-phone"></i>Contact Us Now</a>
                                                    <br><br><a href="{{ route('login') }}"></i>Log in</a><br><br>
                                                </div>
                                               
                                                <!-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> -->
                                                <!-- @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                                @endif -->
                                            @endauth
                                        </div>
                                    @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5 col-md-offset-1">

                    <section id="first-tab-group" class="tabgroup">
                        
                        <div id="tab1">
                            <!-- <div class="logo">
                                <img src="img/Logoc.png" alt="logocpm">
                            </div> -->
                            <div class="submit-form">
                                <h4>Message <em>formula</em>:</h4>
                                 <div class="formula">
                                    <large>
                                    <strong>
                                    (SYNOP) MiMiMjMj YYGGiw IIiii
                                    iRixhVV Nddff (00fff) 1snTTT 2snTdTdTd 3P0P0P0P0 4PPPP (4a3hhh) 5appp 6RRRtR
                                    7wwW1W2 8NhCLCMCH 9GGgg
                                    222// (0ssTwTwTw) (1PwaPwaHwaHwa) (2PwPwHwHw) (3dw1dw1dw2dw2) (4Pw1Pw1Hw1Hw1)
                                    (5Pw2Pw2Hw2Hw2)
                                    333 1snTxTxTx 2snTnTnTn (3EsnTgTg) (4E’sss) 55SSS j5F24F24F24F24 6RRRtR
                                    7R24R24R24R24 8NsChshs 910ff 911ff 950Nmn3 951Nvn4 960ww
                                    444 N’C’H’H’Ct
                                    555 00UUU 1snTxTxTx 2snTnTnTn 33SSS 4EEEiE (54g0sndT) 553SS j5FFFF 6RRRtR
                                    7dxdxfxfx (00fxfxfx) 77HhHhHh 8UmUmUnUn 931ss=
                                    </strong>
                                    </large>
                                 </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>



    <div class="tabs-content" id="weather">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Check Weather For 5 NEXT Days</h2>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="col-md-12">
                        <div class="weather-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="tabs clearfix" data-tabgroup="second-tab-group">
                                        <li><a href="#monday" class="active">Monday</a></li>
                                        <li><a href="#tuesday">Tuesday</a></li>
                                        <li><a href="#wednesday">Wednesday</a></li>
                                        <li><a href="#thursday">Thursday</a></li>
                                        <li><a href="#friday">Friday</a></li>
                                    </ul>    
                                </div>
                                <div class="col-md-12">
                                    <section id="second-tab-group" class="weathergroup">
                                        <div id="monday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item casablanca-monday">
                                                        <h6>Casablanca</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>32&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>26&deg;</span></li>
                                                            <li>12PM <span>32&deg;</span></li>
                                                            <li>6PM <span>28&deg;</span></li>
                                                            <li>12AM <span>22&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item essaouira-monday">
                                                        <h6>Essaouira</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>20&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>26&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item marrakech-monday">
                                                        <h6>Marrakech</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>33&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>26&deg;</span></li>
                                                            <li>12PM <span>33&deg;</span></li>
                                                            <li>6PM <span>29&deg;</span></li>
                                                            <li>12AM <span>27&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tuesday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item casablanca-tuesday">
                                                        <h6>Casablanca</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>18&deg;</span></li>
                                                            <li>12PM <span>27&deg;</span></li>
                                                            <li>6PM <span>25&deg;</span></li>
                                                            <li>12AM <span>17&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item essaouira-tuesday">
                                                        <h6>Essaouira</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>31&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>19&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item marrakech-tuesday">
                                                        <h6>Marrakech</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>26&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>19&deg;</span></li>
                                                            <li>12PM <span>26&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>20&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="wednesday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item casablanca-wednesday">
                                                        <h6>Casablanca</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>31&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>19&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item essaouira-wednesday">
                                                        <h6>Essaouira</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>34&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>28&deg;</span></li>
                                                            <li>12PM <span>34&deg;</span></li>
                                                            <li>6PM <span>30&deg;</span></li>
                                                            <li>12AM <span>29&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item marrakech-wednesday">
                                                        <h6>Marrakech</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>18&deg;</span></li>
                                                            <li>12PM <span>27&deg;</span></li>
                                                            <li>6PM <span>25&deg;</span></li>
                                                            <li>12AM <span>17&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="thursday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item casablanca-thursday">
                                                        <h6>Casablanca</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>27&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>21&deg;</span></li>
                                                            <li>12PM <span>27&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item essaouira-thursday">
                                                        <h6>Essaouira</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>18&deg;</span></li>
                                                            <li>12PM <span>27&deg;</span></li>
                                                            <li>6PM <span>25&deg;</span></li>
                                                            <li>12AM <span>17&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item marrakech-thursday">
                                                        <h6>Marrakech</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>31&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>19&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="friday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item casablanca-friday">
                                                        <h6>Casablanca</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>33&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>28&deg;</span></li>
                                                            <li>12PM <span>33&deg;</span></li>
                                                            <li>6PM <span>29&deg;</span></li>
                                                            <li>12AM <span>27&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item essaouira-friday">
                                                        <h6>Essaouira</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>31&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>24&deg;</span></li>
                                                            <li>12PM <span>31&deg;</span></li>
                                                            <li>6PM <span>26&deg;</span></li>
                                                            <li>12AM <span>23&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item marrakech-friday">
                                                        <h6>Marrakech</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>24&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>26&deg;</span></li>
                                                            <li>12AM <span>22&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="services">
        <div class="container">
             <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Check Our Services</h2>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item first-service">
                        <div class="service-icon"></div>
                        <h4>Weather prediction</h4>
                        <p>Displaying real-time weather conditions, such as temperature, humidity, wind speed, and atmospheric pressure, for a specific location.</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item second-service">
                        <div class="service-icon"></div>
                        <h4>Message controll</h4>
                        <p>Detection of anomalies in messages.This capability identifies messages that are out of the ordinary or have unusual characteristics.</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item third-service">
                        <div class="service-icon"></div>
                        <h4><a href="/Documentation" style="text-decoration:none;color:inherit;">Documentation</a></h4>
                        <p>About Synop messages that are a standardized format used to transmit weather observations from surface weather stations around the world.<a href="{{ asset('CODE_SYNOP_DMN_2019.pdf') }}" download><span style="color:yellowgreen;text-decoration:none;"><b>Tape to dowload.</b></span></a></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <br><br>
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
                        <li><a href="https://www.facebook.com/tooplate"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
                 <!--  -->
                <!-- <div class="social-icons">
                    <a href="/chatbot" id="retourHaut">
                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                    </svg>
                    </a>
                </div> -->
                 <!--  -->
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
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <script>
    var botmanWidget = {
        aboutText: 'SynoptiXpress',
        introMessage: "✋ Hello! How can I help you !",
        userAvatar: 'https://tse2.mm.bing.net/th?id=OIP.e1KNYwnuhNwNj7_-98yTRwHaF7&pid=Api&P=0&h=180',
        placeholderText: "Ask me something...",
        title: "Chat with SynoptiXpress Botman",
        mainColor: '#3498db',
        bubbleBackground: '#f2f2f2',
        bubbleAvatarUrl: 'https://media.istockphoto.com/vectors/chat-bot-ai-and-customer-service-support-concept-vector-flat-person-vector-id1221348467?k=20&m=1221348467&s=612x612&w=0&h=hp8h8MuGL7Ay-mxkmIKUsk3RY4O69MuiWjznS_7cCBw=',
        timeFormat: 'h:mm A'
    };
    </script>
   
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

  <script>
  // Remplacez "VOTRE_CLE_API" par votre clé d'API météo d'OpenWeatherMap
  const apiKey = "4065d550b6b35237a3fc15b7db6420d0";

  // Fonction pour récupérer les données météo pour une ville spécifique
  async function getWeatherData(city) {
    try {
      const response = await fetch(
        `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`
      );
      const data = await response.json();
      return data;
    } catch (error) {
      console.error("Erreur lors de la récupération des données météo :", error);
    }
  }

  // Fonction pour mettre à jour le contenu HTML avec les données météo pour une ville spécifique
  async function updateWeatherContent(city, day) {
    const data = await getWeatherData(city);
    console.log(data)
    console.log(data.weather)
    const temperature = data.main.temp;
    const weatherIcon = data.weather[0].icon;

    const weatherItem = document.querySelector(`.${city}-${day}`);
    weatherItem.querySelector("span").textContent = `${temperature}°C`;
    weatherItem.querySelector("img").setAttribute("src", `https://openweathermap.org/img/w/${weatherIcon}.png`);
  }

  // Fonction pour mettre à jour les données météo pour chaque jour et chaque ville
  async function updateAllWeatherContent() {
    const days = ["monday", "tuesday", "wednesday", "thursday", "friday"]; // Les jours de la semaine
    const cities = ["casablanca", "essaouira", "marrakech"]; // Les villes que vous souhaitez afficher

    for (const day of days) {
      for (const city of cities) {
        await updateWeatherContent(city, day);
      }
    }
  }

  // Appel initial pour mettre à jour les données météo pour toutes les villes et tous les jours
  updateAllWeatherContent();
</script>

</body>
</html>