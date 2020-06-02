<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author"      content="">
    <title>Главная</title>

    <style>
        .Site { display: flex; min-height: 100vh; flex-direction: column; }
        .Site-content { flex: 1; }
    </style>

    <link href="/template/css/bootstrap.min.css"    rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/prettyPhoto.css"      rel="stylesheet">
    <link href="/template/css/price-range.css"      rel="stylesheet">
    <link href="/template/css/animate.css"          rel="stylesheet">
    <link href="/template/css/main.css"             rel="stylesheet">
    <link href="/template/css/responsive.css"       rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/template/js/html5shiv.js"></script>
    <script src="/template/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/template/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"   href="/template/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"                 href="/template/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body class="Site">
<main class="Site-content">

        <header id="header"><!--header-->
            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="index.html"><img src="/template/images/home/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">

                                    <li><a href="/cart/"><i class="fa fa-shopping-cart"></i> Корзина
                                            <span id="cart-count" style="color: red;">
                                                <?php echo Cart::countItems();?>
                                            </span>
                                        </a>
                                    </li>

                                    <?php if(empty($_SESSION['user'])): ?>
                                        <li><a href="/user/login"><i class="fa fa-lock"></i> Вход</a></li>
                                        <li><a href="/user/register"><i class="fa fa-lock"></i> Регистрация</a></li>
                                    <?php else: ?>
                                        <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                        <li><a href="/user/logout"><i class="fa fa-unlock"></i> Выход</a></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="/">Главная</a></li>
                                    <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="/catalog/">Каталог товаров</a></li>
                                            <li><a href="/cart/">Корзина</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/blog/">Блог</a></li>
                                    <li><a href="/about/">О магазине</a></li>
                                    <li><a href="/contacts/">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->

        </header><!--/header-->