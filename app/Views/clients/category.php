<?php include "app/Views/clients/layout/header.php"; ?>
<h1 id="title">MÓN ĂN TRONG DANH MỤC "<?= $category[0]->name ?>"</h1>
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
<?php include "app/Views/clients/layout/footer.php"; ?>