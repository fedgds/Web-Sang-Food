<?php include "app/Views/admin/layout/header.php" ?>
    <main class="container">
        <?php include "app/Views/admin/layout/boxleft.php" ?>
        <article>
            <div class="list-product">
                <h1>DANH SÁCH DANH MỤC</h1>
                <form action="index.php?act=deleteselected-sp" method="post">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Vai trò</th>
                            <th>Hành động</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach($accounts as $account): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $account->username ?></td>
                                <td><?= $account->email ?></td>
                                <td><?= $account->password ?></td>
                                <td><?= $account->role  ?></td>
                                <td>
                                    <?php if($account->role == 0){ ?>    
                                        <a href="<?=ROOT_PATH?>account/phanquyen?id=<?= $account->id ?>"><input type="button" value="Phân quyền"></a>
                                    <?php }else {?>
                                        <a href="<?=ROOT_PATH?>account/goquyen?id=<?= $account->id ?>"><input type="button" value="Gỡ quyền"></a>
                                    <?php } ?>
                                    <a href="<?=ROOT_PATH?>account/delete?id=<?= $account->id ?>"><input type="button" value="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')"></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </form>
            </div>
        </article>
    </main>
<?php include "app/Views/admin/layout/footer.php" ?>