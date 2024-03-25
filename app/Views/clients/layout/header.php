<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="marquee">
        <h3>Welcom To Sang's Shop</h3>
    </div>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="images/Sang Food.png" alt="">
            </div>
            <nav>
                <ul>
                    <li><a href="home">Home</a></li>
                    <li><a href="categories">Categories</a></li>
                    <li><a href="recipes">Recipes</a></li>
                    <li><a href="blog">Blog</a></li>
                    <li><a href="about">About</a></li>
                </ul>
            </nav>
            <div class="actions">
                <div class="cart-menu">
                    <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
                <div class="account-menu">
                    
                    <?php if(isset( $_SESSION['user']['username'])){ ?>
                        <p>Hello, <?=$_SESSION['user']['username'] ?></p>
                        <?php if($_SESSION['user']['role'] != 0){ ?>
                            <a href="<?=ROOT_PATH?>admin/home">Vào trang quản trị</a>
                        <?php }?>
                        <a href="<?=ROOT_PATH?>logout">Đăng xuất</a>
                    <?php } else{ ?>
                        <a href="login"><i class="fa-solid fa-user"></i></a>
                    <?php  }?>
                    
                </div>
            </div>
        </div>