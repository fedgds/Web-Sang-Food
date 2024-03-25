<?php include "app/Views/clients/layout/header.php"; ?>
    <div id="banner">
        <div class="box-left">
            <h2>
                <span>THỨC ĂN</span>
                <br>
                <span>THƯỢNG HẠNG</span>
            </h2>
            <p style="color:#fff">Chuyên cung cấp các món ăn đảm bảo dinh dưỡng
                hợp vệ sinh đến người dùng,phục vụ người dùng 1 cái
                hoàn hảo nhất</p>
            <a href="#title">Mua ngay</a>
        </div>
        <div class="box-right">
            <img src="images/img_1.png" alt="">
            <img src="images/img_2.png" alt="">
            <img src="images/img_3.png" alt="">
        </div>
        <form action="page/search.php" class="search" method="post">
            <div class="search-container">
                <input type="search" name="productName" placeholder="Tìm kiếm món ăn...">
                <button type="submit" class="search-button">
                    <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
                </button>
            </div>
        </form>
    </div>
    <h1 id="title">MÓN ĂN CỦA CHÚNG TÔI</h1>
    <div class="main">
        <?php foreach($products as $product): ?>
            <div class="list-products">
                <div class="item">
                    <img src="images/<?= $product->image ?>" alt="">
                    <div class="sub">
                        <p class="foodname"><?= $product->name ?></p>
                        <p class="price"><?= number_format($product->price) ?> VND</p>
                    </div>
                    <a href="<?= ROOT_PATH ?>detail?id=<?= $product->id ?>" class="detail">Chi Tiết</a>
                </div>
            </div>
        <?php endforeach ?>
    </div> 
    <div class="list-page">
        <!--  -->
    </div>
<?php include "app/Views/clients/layout/footer.php"; ?>
