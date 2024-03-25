<aside>
    <ul class="menu-list">
        <li><a href="<?= ROOT_PATH ?>admin/home">Trang chủ</a></li>
        <li class="list-item">Danh mục <i class="fa-solid fa-caret-down"></i>
            <ul class="menu-item">
                <li><a href="<?= ROOT_PATH ?>category/add">Thêm danh mục</a></li>
                <li><a href="<?= ROOT_PATH ?>category/list">Danh sách</a></li>
            </ul>
        </li>
        <li class="list-item">Sản phẩm <i class="fa-solid fa-caret-down"></i>
            <ul class="menu-item">
                <li><a href="<?= ROOT_PATH ?>product/add">Thêm sản phẩm</a></li>
                <li><a href="<?= ROOT_PATH ?>product/list">Danh sách</a></li>
            </ul>
        </li>
        <?php if($_SESSION['user']['role'] == 2){ ?>
            <li><a href="<?= ROOT_PATH ?>account/list">Khách hàng</i></a></li>
        <?php } ?>
        <li><a href="<?= ROOT_PATH ?>comment/list">Bình luận</a></li>
    </ul>
</aside>