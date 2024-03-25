<?php include "app/Views/clients/layout/header.php"; ?>
<div class="account">
    <br>
    <br>
    <div class="cont">
        <form action="<?=ROOT_PATH?>login" method="post">
            <div class="form sign-in">
                <h2>Welcome</h2>
                <label>
                    <span>Email</span>
                    <input type="email" name="email"/>
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password"/>
                    <input type="hidden" name="username"/>
                </label>
                <button type="submit" class="submit">Sign In</button>
                <p style="margin-left: 30px;" class="forgot-pass"><?php echo $message!='' ? "Sai thông tin!" : ""; ?></p>
                <p style="margin-left: 30px;" class="forgot-pass"><a style="font-size: 14px; text-align: center; color: grey; text-decoration: none;" href="<?=ROOT_PATH?>signup">Don't have an account yet? Sign up now.</a></p>
            </div>
        </form>
        </div>
    </div>
</div>
<?php include "app/Views/clients/layout/footer.php"; ?>