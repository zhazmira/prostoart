<?
define('EMAIL', 'zhazmirab@gmail.com');
// Валидация данных
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}


function sendMessage()
{
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $tel = clean($_POST['tel']);
    $message = clean($_POST['message']);
    $image = clean($_POST['image']);
    $socials = clean($_POST['socials']);
    $service = clean($_POST['service']);
    $task = clean($_POST['task']);

    if (empty($email)) $email = '';
    if (empty($socials)) $socials = '';
    // Проверка на пустоту данных
    if (empty($name) && empty($tel) && empty($message))
    {
        $return = array('unsuccess', 'Укажите пожалуйста ваше имя, телефон и описание проекта!');
        return $return;
    }

    // Проверка email
    $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email_validate != $email)
    {
        $return = array('unsuccess', 'Введите электронную почту!');
        return $return;
    }

    $message = "
        От кого: $name
        Почта: $email
        Телефон: $tel
        Описание проекта: $message
        Социальные сети: $socials
        Что мы можем сделать для вас?(выберете необходимую услугу): $service
        Какую задачу вы хотели бы решить вместе с нами?: $task
        ";
    mail(EMAIL, 'Сообщение из сайта prosto', $message);

    $return = array('success', 'Ваше сообщение успешно отправлено! В скором времени мы с Вами свяжемся!');
    return $return;


}

if (!empty($_POST['sendmessage']))
{
    $result = sendMessage($_POST);
}


?>
<!doctype html>
<html lang="en">





<head>
    <title>PROSTO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/select.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/style2.css">
<!--    <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">-->

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7/dist/sweetalert2.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7/dist/sweetalert2.css">


</head>
<body data-spy = "scroll" data-target = ".site-navbar-target" data-offset ="300" >



<?php

if (!empty($result['0']))
{
    if($result['0'] == "unsuccess")
    {
        echo '<script language=javascript> swal("Упс!", "'.$result['1'].'", "error"); </script>';
    }
    else echo '<script language=javascript> swal("Поздравляем!", "'.$result['1'].'", "success"); </script>';
}

?>

<div class="page_load" id="page_load" >
    <div class="load-text">
        <span class="logo_load">PROSTO</span>
        <span class="logo_load2" >не просто агенство</span>
    </div>
    <div class="load-bar">
        <img src="images/loader.gif" alt="">
    </div>
</div>


<div id="home" class="site-wrap" id="home-section">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar site-navbar-target" role="banner">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-3 ">
                    <div class="site-logo">
                        <a href="#home" id="" class="font-weight-bold"> <p style="font-weight: 400">PROSTO</p> <p  style="font-size: 15px; margin-top: -5px;letter-spacing: 1px; text-transform: none"> контент-агенство</p> </a>
                    </div>
                </div>
                <div class="col-9  text-right">
                        <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><i class="fas fa-bars"></i></a>
                        </span>
                    <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu js-clone-nav ml-auto">
                            <li class="active"><a href="" class="nav-link">Главная</a></li>
                            <li><a href="#photos" class="nav-link">Галлерея</a></li>
                            <li><a href="#about" class="nav-link">О нас</a></li>
                            <li><a href="#service" class="nav-link">Наши услуги</a></li>
                            <li><a href="#contact" class="nav-link">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay" data-vide-bg='video/voda_pre' controls>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h1 class="mb-3 text-primary">PROSTO</h1>
                        <p>[ it means simply ]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="photos" class="site-section">
        <div class="container">
            <div class="row mb-5 ">
                <div class="col-md-7 text-center mx-auto">
                    <span class="subtitle-39293">Наши работы</span>
                    <p>Какое же контент-агентство без успешных кейсов? Отобрали для вас те работы, которые очень любим.</p>
                </div>
            </div>




<!--            <div id="posts"  class=" posts_photo">-->
<!--                <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4" >-->
<!--                    <a href="images/1.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <img alt="" class="img-fluid" src="images/1.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/2.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/2.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4" style="left: 15%;">-->
<!--                    <a href="images/3.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/3.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/4.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/4.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/5.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/5.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/6.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/6.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/7.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/7.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/8.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/8.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/9.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/9.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/10jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/10.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/11.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/11.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/12.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/12.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/13.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/13.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/14.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/14.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/15.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/15.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/16.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/16.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/17.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/17.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/18.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/18.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/19.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/19.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/20.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/20.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/21.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/21.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/22.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/22.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/23.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/23.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/24.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/24.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/25.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/25.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/26.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/26.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/27.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/27.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/28.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/28.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/29.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/29.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/30.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/30.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/31.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/31.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/32.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/32.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/33.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/33.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/34.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/34.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/35.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/35.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/36.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <!--                            <span class="icon-search2"></span>-->-->
<!--                        <img class="img-fluid" src="images/36.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">-->
<!--                    <a href="images/37.jpg" class="item-wrap" data-fancybox="gal">-->
<!--                        <img class="img-fluid" src="images/37.jpg">-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>

    <div class="container">

        <div class="row mb-5 ">
            <div class="col-md-7 text-center mx-auto">
                <span class="subtitle-39293">Showreel</span>
            </div>
        </div>
        <div style="margin-top: 100px" class="video_showreel">

            <video poster="images/poster_video.png" controls width="90%%" height="90%">
                <source src="video/showreel.mp4">
            </video>
        </div>

    </div>

    <div id="about" class="site-section bg-black about-me">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 ml-auto">
                    <h3 class=" mb-5 subtitle-39293">О нас</h3>
                    <blockquote>
                        <p class="paragraph_about">Привет! Мы – контент-агентство PROSTO. В нашей команде три соучредителя. Каждая из нас уже давно влюблена в рекламу. Более 10 лет мы работали отдельно друг от друга. В самый сложный год мы решили, что сложившаяся в мире ситуация
                            – это повод не для уныния и прокрастинации, а для новых экспериментов.
                        </p>
                    </blockquote>
                    <p class="paragraph_about"> Мы объединили все наши накопленные знания и открыли небольшое агентство по созданию контента. У всех нас был разный опыт: с малым, средним и крупным бизнесом. Анализируя его, мы решили, что на рынке нужно агентство, которое будет
                        понятным, простым, но качественным. PROSTO мы хотим, чтобы ваш бизнес процветал (ну, соответственно, и у нас тоже все будет хорошо😀). </p>
                    <p>Если вы читаете это, значит вы нуждаетесь в контенте. Тогда добро пожаловать в наш мир! Он увлекательный, креативный, эстетичный. Надеемся, вам он тоже понравится!</p>
                </div>
            </div>
        </div>
    </div>

    <div id="service" class="site-section bg-white">
        <div class="container">
            <div class="row mb-5 ">
                <div class="col-md-7 text-center mx-auto">
                    <span class="subtitle-39293">Наши услуги</span>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-entry-1 h-100">

                        <div class="post-entry-1-contents">
                            <h2>Видео + фото + дизайн</h2>
                            <li>5 видеороликов ( 2 ролика от 40 сек. до 1 мин, 3 видеоряда на 15 - 20 сек для постов);
                            </li>
                            <li>5 видеонарезок для Stories; </li>
                            <li>25 фотографий для постов;</li>
                            <li>20 фотографий для Stories;</li>
                            <li>5 афиш ( две из них - моушн);</li>
                            <li>дизайн страниц в социальных сетях.</li>
                            <p>Стоимость: 20 000 сомов (при заключении договора не менее, чем на 3 месяца). Бонус: креатив (1 видео (15 сек.) и 1 фото.) – разработка и реализация креативной идеи.</br>
                                Стоимость: 30 000 сомов (при заключении договора на 1 месяц).
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-entry-1 h-100">

                        <div class="post-entry-1-contents">
                            <h2>SMM + видео + фото + дизайн</h2>
                            <li>5 видеороликов ( 2 ролика от 40 сек. до 1 мин, 3 видеоряда на 15 - 20 сек для постов);
                            </li>
                            <li>5 видеонарезок для Stories; </li>
                            <li>25 фотографий для постов;</li>
                            <li>20 фотографий для Stories;</li>
                            <li>5 афиш ( две из них - моушн);</li>
                            <li>дизайн страниц в социальных сетях.</li>
                            <li>разработка SMM-стратегии;</li>
                            <li>Копирайтинг</li>
                            <li>Работа с комментариями, общение с пользователями, разработка конкурсов.</li>
                            <p>Стоимость: 35 000 сомов (при заключении договора не менее, чем на 3 месяца). Бонус: креатив (1 видео (15 сек.) и 1 фото.) – разработка и реализация креативной идеи.</br>
                                Стоимость: 45 000 сомов (при заключении договора на 1 месяц).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-entry-1 h-100">

                        <div class="post-entry-1-contents">

                                <h2>SMM</h2>

                            <li>Pазработка SMM-стратегии;</li>
                            <li>Копирайтинг</li>
                            <li>Работа с комментариями, общение с пользователями, разработка конкурсов.</li>
                            <li>Кризисные коммуникации.</li>
                            <p>Стоимость: 20 000 сомов (при заключении договора не менее, чем на 3 месяца). Бонус: креатив (1 видео (15 сек.) и 1 фото.) – разработка и реализация креативной идеи.</br>
                                Стоимость: 25 000 сомов (при заключении договора на 1 месяц).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-entry-1 h-100">

                        <div class="post-entry-1-contents">

                                <h2>Копирайтинг</h2>


                            <li>SMM без технической части (только тексты для постов);</li>
                            <li>Написание материалов для СМИ; </li>
                            <li>Написание текстов для видео- и аудиороликов;</li>
                            <li>Тексты для брошюр, коммерческих предложений и т.д.</li>
                            <p>Стоимость зависит от объема работы.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-entry-1 h-100">

                        <div class="post-entry-1-contents">
                            <h2>PROSTO Видео</h2>
                            <li>5 видеороликов ( 2 ролика от 40 сек. до 1 мин, 3 видеоряда на 15 - 20 сек для постов);
                            </li>
                            <li>5 видеонарезок для Stories; </li>
                            <p>Стоимость: 15 000 сомов (при заключении договора не менее, чем на 3 месяца). Бонус: креатив (1 видео (15 сек.) и 1 фото.) – разработка и реализация креативной идеи.</br>
                                Стоимость: 25 000 сомов (при заключении договора на 1 месяц).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-entry-1 h-100">

                        <div class="post-entry-1-contents">
                            <h2>PROSTO Фото</h2>
                            <li>25 фотографий для постов;</li>
                            <li>20 фотографий для Stories;</li>
                            <p>Стоимость: 15 000 сомов (при заключении договора не менее, чем на 3 месяца). Бонус: креатив (1 видео (15 сек.) и 1 фото.) – разработка и реализация креативной идеи.</br>
                                Стоимость: 25 000 сомов (при заключении договора на 1 месяц).
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-entry-1 h-100">
                <div class="post-entry-1-contents">

                        <h2>PROSTO разовые съемки</h2>
                        <li>Видео от минуты и больше </li>
                        <p>Стоимость: от 5 000 сомов (стоимость зависит от ТЗ).</p>
                        <li>Фотосессия (минимум – час)</li>

                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer id="contact" class="site-footer">
        <div class="site-section">
            <div class="container">
                <div class="row mb-5 ">
                    <div class="col-md-7 text-center mx-auto">

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 mb-5">
                        <div class="form">
                            <form method="post" class="form__body">
                                <h1 class="form__title">Оставьте нам свою заявку!</h1>
                                <div class="form__item">
                                    <label for="formName" class="form__label">Имя:</label>
                                    <input  type="text" name="name" class="form__input _req">
                                </div>
                                <div class="form__item">
                                    <label for="formEmail" class="form__label">E-mail:</label>
                                    <input  type="text" name="email" class="form__input _req _email">
                                </div>
                                <div class="form__item">
                                    <label for="formTel" class="form__label">Телефон:</label>
                                    <input type="text" name="tel" class="form__input _req">
                                </div>

                                <div class="form__item">
                                    <label for="formMessage" class="form__label">Опишите ваш проект</label>
                                    <textarea name="message" class="formMessage form__input" placeholder="Пожалуйста, максимально подробно опишите свою деятельность"></textarea>
                                </div>
                                <div class="form__item ">
                                    <div class="form__label ">Добавьте файлы (можете добавить скриншоты, фотографии, которые помогут нам лучше узнать о вас)</div>
                                    <div class="file ">
                                        <div class="file__item ">
                                            <input accept=".jpg, .png, .gif " type="file" name="f " class="file__input ">
                                            <div class="file__button ">Выбрать</div>
                                        </div>
                                        <div id="formPreview " class="file__preview "></div>
                                    </div>
                                </div>
                                <div class="form__item">
                                    <label for="formMessage" class="form__label">Социальные сети</label>
                                    <textarea name="socials" class="formMessage form__input" placeholder="Добавьте ссылки на социальные сети вашего проекта"></textarea>
                                </div>
                                <div class="form__item">
                                    <div class="form__label">Что мы можем сделать для вас?(выберете необходимую услугу)</div>
                                    <div class="options">
                                        <div class="options__item">
                                            <input style="color: red" checked type="radio" id="formServ"  value="photo" name="service" class="options__input">
                                            <label for="formServ" class="options__label"><span>Фото</span></label>
                                        </div>
                                        <div class="options__item">
                                            <input type="radio" value="video" id="formServ1" name="service" class=" options__input">
                                            <label for="formServ1" class="options__label"><span>Видео</span></label>
                                        </div>
                                        <div class="options__item">
                                            <input type="radio" value="kopiraiting" id="formServ2" name="service" class=" options__input">
                                            <label for="formServ2" class="options__label"><span>Копирайтинг</span></label>
                                        </div>
                                        <div class="options__item">
                                            <input  type="radio" value="smm" id="formServ3" name="service" class=" options__input">
                                            <label for="formServ3" class="options__label"><span>SMM</span></label>
                                        </div>
                                        <div class="options__item">
                                            <input type="radio" value="smm-strateg" id="formServ4" name="service" class=" options__input">
                                            <label for="formServ4" class="options__label"><span>SMM-стратегия</span></label>
                                        </div>


                                    </div>

                                </div>

                                <div class="form__item ">
                                    <label for="formMessage " class="form__label ">Какую задачу вы хотели бы решить вместе с нами? </label>
                                    <textarea name="task" class="form__input " placeholder="Максимально подробно опишите какую цель вы ставите перед агентство и какие проблемы вы хотите решить с нашей помощью"></textarea>
                                </div>

                                <button type="submit " class="form__button ">Отправить</button>
                                <input type="hidden" name="sendmessage" value="ok">
                            </form>
                        </div>


                    </div>
                    <div class="col-lg-4 ml-auto ">
                        <div class="bg-white p-3 p-md-5 ">
                            <h3 class="text-black mb-4 ">Контакты:</h3>
                            <ul class="list-unstyled footer-link ">
                                <li class="d-block mb-3 "><span class="d-block text-black ">Тел:</span>+996558242828 <span></span></li>
                                <li class="d-block mb-3 "><span class="d-block text-black ">Instagram:</span> <a href="#">@prostoagency.art</a><span></span></li>
                                <li class="d-block mb-3 "><span class="d-block text-black ">Email:</span>prostoagency.art@gmail.com <span></span></li>
                                <li class="d-block mb-3 "><span class="icons-contact " class="d-block text-black ">
                                        <a href="#"><i class="fab fa-telegram"></i></a>
                                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center ">
            <div class="col-md-12 ">
                <div class="border-top pt-5 ">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved |  Made by <a href="https://www.instagram.com/zhazmira_dev">@zhazmira_dev</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>


<script src="js/jquery-3.3.1.min.js "></script>
<script src="js/jquery-migrate-3.0.0.js "></script>
<script src="js/popper.min.js "></script>
<script src="js/bootstrap.min.js "></script>
<script src="js/owl.carousel.min.js "></script>
<script src="js/jquery.sticky.js "></script>
<script src="js/jquery.waypoints.min.js "></script>
<script src="js/jquery.animateNumber.min.js "></script>
<script src="js/jquery.fancybox.min.js "></script>
<script src="js/jquery.stellar.min.js "></script>
<script src="js/jquery.easing.1.3.js "></script>
<script src="js/bootstrap-datepicker.min.js "></script>
<script src="js/isotope.pkgd.min.js "></script>
<script src="js/aos.js "></script>
<script src="js/main.js "></script>
<script src="js/jquery-3.5.1.min.js " ></script>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="js/loader.js"></script>
<script src="js/jquery.vide.min.js"></script>
<!--<script  src="js/jquery.js"></script>-->

</body>

</html>