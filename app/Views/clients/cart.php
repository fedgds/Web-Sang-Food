<?php include "app/Views/clients/layout/header.php"; ?>
    <h1 id="title">GIỎ HÀNG</h1>
        <table class="cart-table">
            <tr>
                <th>#STT</th>
                <th>Món ăn</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Xóa</th>
            </tr>
            <?php $i = 1;?>
            <?php foreach($carts as $cart): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $cart->name ?></td>
                    <td><img src="<?=ROOT_PATH?>images/<?= $cart->image ?>" alt=""></td>
                    <td><?= $cart->price ?></td>
                    <td><a href="<?= ROOT_PATH ?>delete-cart?id=<?= $cart->id ?>">Xóa</a></td>
                </tr>
            <?php endforeach ?>
        </table>
        
<?php include "app/Views/clients/layout/footer.php"; ?>
