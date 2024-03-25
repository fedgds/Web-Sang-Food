<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .binhluan{
            width: 100%;
        }
        .binhluan table{
            width: 100%; 
            border: 1px solid #D70019;
            margin-bottom: 10px;
        }

        .binhluan table tr{
            display: grid;
            width: 100%;
            grid-template-columns: 1fr 6fr 1fr;
            margin-bottom: 5px;
        }
        textarea{
            width: 100%;
        }
        form{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        textarea{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input[type="submit"]{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #D70019;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
        }
        input[type="submit"]:hover{
            background-color: black;
        }
        .name, .date{
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="row mb"> 
        <div class="binhluan">
            <table style="text-align:center;">
                <tr>
                    <th>Khách hàng</th>
                    <th>Nội dung bình luận</th>
                    <th>Ngày binh luận</th>
                </tr>
                <tr>
                <?php foreach ($comments as $comment) { ?>
                    <td><?= $comment->username ?></td>
                    <td><?= $comment->text ?></td>
                    <td><?= date("d/m/Y", strtotime($comment->date)) ?></td>
                <?php }?>  
                </tr>
            </table>
        </div> 
        <?php if(isset($_SESSION['user'])){ ?>
        <div class="form">
            <form action="<?= ROOT_PATH?>comment" method="post">
                <input type="hidden" name="idAccount" value="<?=$_SESSION['user']['id']?>">
                <input type="hidden" name="idProduct" value="<?= $_GET['id'] ?>">
                <textarea name="text" id="" cols="10" rows="5"></textarea><br>
                <input type="submit" value="GỬI BÌNH LUẬN">
            </form>
        </div> 
        <?php } else{
            echo '<p style="color: red; text-align: center;">Đăng nhập để thực hiện chức năng bình luận</p>';
        }?>
    </div>
    <!-- <?php dd($comments) ?> -->
</body>
</html>