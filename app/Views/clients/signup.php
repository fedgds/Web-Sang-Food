<?php include "app/Views/clients/layout/header.php"; ?>
<div class="account">
    <br>
    <br>
    <div class="cont">
            <form action="<?=ROOT_PATH?>signup" method="post">
                <div class="form sign-in">
                    <h2>Create your Account</h2>
                    <label>
                        <span>Name</span>
                        <input type="text" name="username"/>
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email"/>
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password"/>
                    </label>
                    <button type="submit" class="submit">Sign Up</button>
                    <p style="margin-left: 30px;" class="forgot-pass"><a style="font-size: 14px; text-align: center; color: grey; text-decoration: none;" href="<?=ROOT_PATH?>login">Already have an account? Sign in now.</a></p>
                </div>
            </form>
    </div>
</div>
<?php include "app/Views/clients/layout/footer.php"; ?>