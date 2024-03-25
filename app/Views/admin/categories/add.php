<?php include "app/Views/admin/layout/header.php" ?>
    <main class="container">
        <?php include "app/Views/admin/layout/boxleft.php" ?>
        <article>
            <div class="add-product">
                <h1>THÊM MỚI DANH MỤC</h1>
                <form action="<?=ROOT_PATH?>category/add" method="POST" enctype="multipart/form-data">
                    <div class="form-add">
                        <div class="left" style="margin-bottom: 20px;">
                            <label for="">TÊN DANH MỤC</label><br>
                            <input type="text" name="name" placeholder="Nhập tên sản phẩm"><br><br>
                            <label for="">ẢNH</label><br>
                            <div class="main-image">
                                <label for="fileInput5" class="main-file-input"><i class="fa-solid fa-upload"></i>Upload ảnh</label>
                                <input type="file" name="image" id="fileInput5" style="display: none;">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="submit" value="THÊM">
                    <input type="reset" class="reset" value="NHẬP LẠI">
                </form>
            </div>
        </article>
    </main>
<?php include "app/Views/admin/layout/footer.php" ?>