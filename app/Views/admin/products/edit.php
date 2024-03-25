<?php include "app/Views/admin/layout/header.php" ?>
    <main class="container">
        <?php include "app/Views/admin/layout/boxleft.php" ?>
        <article>
            <div class="add-product">
                <h1>SỬA SẢN PHẨM</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-add">
                        <div class="left">
                            <label for="">TÊN SẢN PHẨM</label><br>
                            <input type="text" name="name" placeholder="Nhập tên sản phẩm" value="<?= $product->name ?>"><br><br>
                            <label for="">GIÁ</label><br>
                            <input type="number" name="price" min="1" placeholder="Nhập giá sản phẩm" value="<?= $product->price ?>"><br><br>
                            <label for="">DANH MỤC</label><br>
                            <select name="idCategory" id="category">
                                <?php foreach($categories as $cate): ?>
                                    <option value="<?=$cate->id?>"<?= ($cate->id == $product->idCategory)? 'selected' :'' ?>>
                                        <?=$cate->name ?>
                                    </option>
                                <?php endforeach ?>
                            </select><br><br>
                        </div>
                        <div class="right" style="margin-bottom: 20px;">
                                <label for="">ẢNH</label><br>
                                <div class="main-image">
                                    <label for="fileInput5" class="main-file-input"><i class="fa-solid fa-upload"></i>Upload ảnh</label>
                                    <input type="file" name="image" id="fileInput5" style="display: none;">
                                    <img src="<?=ROOT_PATH ?>images/<?= $product->image ?>" alt="" height="70">
                                </div>
                                <div class="textarea-sp">
                                    <label for="">MÔ TẢ</label><br>
                                    <textarea name="des" id="des" cols="50" rows="7" placeholder="Nhập mô tả"><?= $product->des ?></textarea>
                                </div>
                                <div>
                                    <label for="">TRẠNG THÁI</label><br>
                                    <select style="padding: 8px; font-size: 15px; border: 1px solid #ccc; border-radius: 4px; background-color: #fff; color: #333; width: 140px;" name="status" id="">
                                        <option value="<?= $product->status ?>"><?= $product->status == 0 ? 'Hiển thị' : 'Ẩn' ?></option>
                                    </select>
                                </div>
                                <div>
                                    <input type="hidden" name="id" value="<?= $product->id ?>">
                                </div>
                        </div>
                    </div>
                    <input type="submit" class="submit" value="SỬA">
                    <input type="reset" class="reset" value="NHẬP LẠI">
                </form>
            </div>
        </article>
    </main>
<?php include "app/Views/admin/layout/footer.php" ?>