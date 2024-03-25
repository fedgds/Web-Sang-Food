<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị admin</title>
    <link rel="stylesheet" href="../css/index-admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="wrapper">
        <header id="header">
            <nav class="navigation container">
                <a href="<?= ROOT_PATH ?>admin/home"><img class="logo" src="<?= ROOT_PATH ?>images/Sang Food.png" alt="" style="width: 60px; margin-left: 140px;"></a>
                
                <marquee class="marquee-wel" behavior="" direction="" style="text-transform: uppercase;"><i class="fa-solid fa-bolt-lightning"></i> CHÀO MỪNG ĐẾN VỚI TRANG QUẢN TRỊ</marquee>
                <div class="profile-out">
                    <a href="#"><i class="fa-solid fa-user-tie"></i>
                    <?php if($_SESSION['user']['role'] == 2){?>
                        <span style="font-size: 14px;">Admin</span>
                    <?php }else{?>
                        <span style="font-size: 14px;">Quản trị viên</span>
                    <?php }?>
                    </a>
                    <a href="<?= ROOT_PATH ?>home"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
                
            </nav>
        </header>
    <div class="overlay"></div>