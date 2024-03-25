<?php include "app/Views/clients/layout/header.php"; ?>
<h1 style="text-align: center; margin-bottom: 20px;" class="title">Chi tiết món "<?= $products->name ?>"</h1>
<div class="food-detail">
        <img src="images/<?= $products->image ?>" alt="Đang tải">
        <div class="info">
            <div class="price">Giá: <?= number_format($products->price) ?> VND</div>
            <div class="des">Mô tả: <?= $products->des ?></div>
        </div>
        <form action="<?= ROOT_PATH?>detail?id=<?= $products->id?>" method="post">
            <input type="hidden" name="idProduct" value="<?= $products->id ?>">
            <input type="hidden" name="name" value="<?= $products->name ?>">
            <input type="hidden" name="image" value="<?= $products->image ?>">
            <input type="hidden" name="price" value="<?= $products->price ?>">
            <input type="hidden" name="idAccount" value="<?= $_SESSION['user']['id'] ?>">
            <?php if(isset($_SESSION['user'])){ ?>
                <button style="padding: 3px 5px; background-color: yellow; margin-top: 10px" type="submit">Thêm vào giỏ</button>
            <?php }else{?>
                <span style="color: red;">Đăng nhập để mua</span>
            <?php } ?>
        </form>
</div>
<div class="comment">
    <h2>Bình luận</h2>
    <iframe src="<?= ROOT_PATH ?>comment?id=<?= $_GET['id'] ?>" frameborder="0" width="100%" height="300px"></iframe>
</div>
<?php include "app/Views/clients/layout/footer.php"; ?>