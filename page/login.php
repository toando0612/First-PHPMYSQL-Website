<?php

    require("lib/connect.php");

        // Code PHP xử lý validate
        $error = array();
        $data = array();
        if (!empty($_POST['do-login'])) {
            // Lấy dữ liệu
            $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
            $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';

            // Kiểm tra định dạng dữ liệu
            if (empty($data['username'])) {
                $error['email'] = 'Please enter your email';
            }

            if (empty($data['password'])) {
                $error['password'] = 'Please enter your password';
            }

        }

    if(isset($_POST['do-login']) && !empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);



        $sql = "SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";

        if ($result = mysqli_query($con,$sql))
        {
            $rowcount = mysqli_num_rows($result);
            if($rowcount){
                $_SESSION['user'] = mysqli_fetch_assoc($result);
                // echo "<pre>";
                // print_r($_SESSION['user']);
                // die();
                if($_SESSION['user']['level']==1){

                    header("location:admin");
                }
                else{
                    header("location:index.php");
                }
            }
        }
    }


?>
<h1 style="text-align:center;">Login</h1>
<form id="login_table" method="post">
    <table cellpadding="5" class="logintable">
        <tr>
            <th style="color:white;">Email:</th>
            <td><input type="text" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" name="email" placeholder="Account name" />
                </br>
                <div style="color:red;">
                    <?php echo isset($error['email']) ? $error['email'] : ''; ?>
                </div>
            </td>
        </tr>
        <tr>
            <th style="color:white;">Password:</th>
            <td><input type="password" name="password" value="" placeholder="Password" />
                </br>
                <div style="color:red;">
                    <?php echo isset($error['password']) ? $error['password'] : ''; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><input class="btn btn-primary" type="submit" name="do-login" value="Login" /></td>
            <td><input type="reset" value="Clear" /></td>
        </tr>
        <tr>
            <td style="color:white;">Don't have an account</td>
            <td><a href="?page=user&type=register">Sign Up Now></a></td>
        </tr>

    </table>
</form>