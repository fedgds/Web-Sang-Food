<?php include "app/Views/admin/layout/header.php" ?>
    <main class="container">
        <?php include "app/Views/admin/layout/boxleft.php" ?>
        <article>
            <div class="list-product">
                <h1>DANH SÁCH BÌNH LUẬN</h1>
                <form action="index.php?act=deleteselected-sp" method="post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tài khoản</th>
                            <th>Nội dung bình luận</th>
                            <th>Món ăn</th>
                            <th>Ngày bình luận</th>
                            <th>Hành động</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach($comments as $comment): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $comment->username ?></td>
                                <td><?= $comment->text ?></td>
                                <td><?= $comment->name ?></td>
                                <td><?= $comment->date ?></td>
                                <td>   
                                    <a href="<?=ROOT_PATH?>comment/delete?id=<?= $comment->id ?>"><input type="button" value="Gỡ" onclick="return confirm('Bạn có chắc muốn gỡ bình luận này?')"></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </form>
            </div>
        </article>
    </main>
<?php include "app/Views/admin/layout/footer.php" ?>