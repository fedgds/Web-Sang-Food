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
                <h1>DANH SÁCH DANH MỤC</h1>
                <form action="index.php?act=deleteselected-sp" method="post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Hành động</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach($categories as $category): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $category->name ?></td>
                                <td><img src="<?=ROOT_PATH ?>images/<?= $category->image ?>" alt="" width="100" height="60"></td>
                                <td>
                                    <a href="<?=ROOT_PATH?>category/edit?id=<?= $category->id ?>"><input type="button" value="Sửa"></a>    
                                    <a href="<?=ROOT_PATH?>category/delete?id=<?= $category->id ?>"><input type="button" value="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                    <div class="action">
                        <a href="add">THÊM DANH MỤC</a>
                    </div>
                </form>
            </div>
        </article>
    </main>
<?php include "app/Views/admin/layout/footer.php" ?>