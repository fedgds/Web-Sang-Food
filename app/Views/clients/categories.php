<?php include "app/Views/clients/layout/header.php"; ?>
<h1 style="text-align: center;" class="title">DANH MỤC CỦA CHÚNG TÔI</h1>
    <div class="main">
        <?php foreach($categories as $category): ?>
            <div class="list-categories">
                <div class="item">
                    <a href="<?= ROOT_PATH ?>category?id=<?= $category->id ?>"><img src="images/<?= $category->image ?>" alt=""></a>
                    <div class="sub">
                        <a href="<?= ROOT_PATH ?>category?id=<?= $category->id ?>"><?= $category->name ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div> 
<?php include "app/Views/clients/layout/footer.php"; ?>