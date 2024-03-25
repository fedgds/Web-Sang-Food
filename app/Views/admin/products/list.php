<?php include "app/Views/admin/layout/header.php" ?>
    <main class="container">
        <?php include "app/Views/admin/layout/boxleft.php" ?>
        <article>
        <?php if($message != ''){ ?>
            <script>
                alert("<?= $message ?>")
            </script>
        <?php } ?>
            <div class="list-product">
                <h1>DANH SÁCH SẢN PHẨM</h1>
                <form action="index.php?act=deleteselected-sp" method="post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach($products as $product): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $product->name ?></td>
                                <td><?= $product->cateName ?></td>
                                <td><?= number_format($product->price) ?> VND</td>
                                <td><img src="<?=ROOT_PATH ?>images/<?= $product->image ?>" alt="" width="100" height="60"></td>
                                <td><?= $product->status == 0 ? 'Hiển thị' : 'Ẩn' ?></td>
                                <td>
                                    <a href="<?=ROOT_PATH?>product/edit?id=<?= $product->id ?>"><input type="button" value="Sửa"></a>    
                                    <a href="<?=ROOT_PATH?>product/delete?id=<?= $product->id ?>"><input type="button" value="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                    <div class="action">
                        <a href="add">THÊM SẢN PHẨM</a>
                    </div>
                </form>
            </div>
        </article>
    </main>
<?php include "app/Views/admin/layout/footer.php" ?>