<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LapTop | Shop</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/template/css/owl-carousel.css" type='text/css'>
    <link rel="stylesheet" href="/template/css/style.css" type='text/css'>
    <link rel="stylesheet" href="/template/css/responsive.css" type='text/css'>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="/cart/"><i class="fa fa-shopping-cart"></i>Корзина</a></li>
                            <?php if(User::isGuest()) : ?>
                                <li><a href="/user/login"><i class="fa fa-lock"></i>Войти</a></li>
                            <?php else: ?>
                                <li><a href="/cabinet/"><i class="fa fa-user"></i>Аккаунт</a></li>
                                <li><a href="/user/logout"><i class="fa fa-unlock"></i>Выйти</a></li>
                                <?php if(User::getUserById(User::checkLogged())['role'] == 'admin') : ?>
                                    <li><a href="/admin"><i class="fa fa-cog"></i>Панель администратора</a></li>
                                <?php endif ?> 
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="/">lap<span>Top</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="/cart/">Корзина - <span class="cart-amunt"><?php echo Cart::getTotalPrice(Product::getProductsByIds(array_keys(Cart::getProducts()))) ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo Cart::countItemsInCart() ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Главная</a></li>
                        <li><a href="/catalog/">Каталог</a></li>
                        <li><a href="/contacts/">Контакты</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->