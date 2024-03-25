<?php include "app/Views/admin/layout/header.php" ?>
    <main class="container">
        <?php include "app/Views/admin/layout/boxleft.php" ?>
        <article>
            <div class="add-product">
                <h1>THÊM MỚI SẢN PHẨM</h1>
                <form action="<?=ROOT_PATH?>product/add" method="POST" enctype="multipart/form-data">
                    <div class="form-add">
                        <div class="left">
                            <label for="">TÊN SẢN PHẨM</label><br>
                            <input type="text" name="name" placeholder="Nhập tên sản phẩm"><br><br>
                            <label for="">GIÁ</label><br>
                            <input type="number" name="price" min="1" placeholder="Nhập giá sản phẩm"><br><br>
                            <label for="">DANH MỤC</label><br>
                            <select name="idCategory" id="category">
                                <?php foreach($categories as $cate): ?>
                                    <option value="<?=$cate->id?>"><?=$cate->name?></option>
                                <?php endforeach ?>
                            </select><br><br>
                        </div>
                        <div class="right" style="margin-bottom: 20px;">
                                <label for="">ẢNH</label><br>
                                <div class="main-image">
                                    <label for="fileInput5" class="main-file-input"><i class="fa-solid fa-upload"></i>Upload ảnh</label>
                                    <input type="file" name="image" id="fileInput5" style="display: none;">
                                </div>
                                <div class="textarea-sp">
                                    <label for="">MÔ TẢ</label><br>
                                    <textarea name="des" id="des" cols="50" rows="7" placeholder="Nhập mô tả"></textarea>
                                </div>
                                <div>
                                    <label for="">TRẠNG THÁI</label><br>
                                    <select style="padding: 8px; font-size: 15px; border: 1px solid #ccc; border-radius: 4px; background-color: #fff; color: #333; width: 140px;" name="status" id="">
                                        <option value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    </select>
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