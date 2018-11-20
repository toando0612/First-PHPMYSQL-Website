<h1 style="text-align:center;">Register</h1>
<?php
require("lib/connect.php");
// Code PHP xử lý validate
$error = array();
$data  = array();
if ( isset($_POST['do-register']) ) {
    // Lấy dữ liệu
    $data['fullname'] = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $data['email']    = isset($_POST['email']) ? $_POST['email'] : '';
    $data['gender']   = isset($_POST['gender']) ? $_POST['gender'] : '';
    
    $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
    
    // Kiểm tra định dạng dữ liệu
    require('./validate.php');
    if (empty($data['fullname'])) {
        $error['fullname'] = 'Please enter your fullname';
    }

    if (empty($data['gender'])) {
        $error['gender'] = 'Please choose your gender';
    }
    if (empty($data['email'])) {
        $error['email'] = 'Please enter your email';
    }
    
    else if (!is_email($data['email'])) {
        $error['email'] = 'Incorrect email';
    }
    
    
    if (empty($data['password'])) {
        $error['password'] = 'Please enter your password';
    }
    
    // Lưu dữ liệu
    if (!$error) {
               
        if (isset($_POST['do-register'])) {
            $fullname = addslashes($_POST['fullname']);
            $email    = addslashes($_POST['email']);
            $gender      = addslashes($_POST['gender']);
           
            $password = addslashes($_POST['password']) ? md5($_POST['password']) : '';

            // Kiểm tra username hoặc email có bị trùng hay không
            $sql    = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
?>
               <div style="color:red; text-align:center;"><?php
                echo "email existed ";
?></div>
                <?php
            } else {
                // Ngược lại thì thêm bình thường
                $sql = "INSERT INTO user (fullname, gender, email, password) VALUES ('$fullname','$gender','$email', '$password')";

                if (mysqli_query($con, $sql)) {
                   header("location:index.php?page=login");
                }
            }
        }
    }
}
?>
       <form id="login_table" method="post">
            <table cellpadding="5" width="500px" height="500px" class="registertable">
                <tr>
                    <th style="color:white;">Fullname</th>
                    <td><input type="text" name="fullname" value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''; ?>" placeholder="Enter your name"/>
                        <div style="color:red;"><?php echo isset($error['fullname']) ? $error['fullname'] : '';?></div>
                    </td>
                </tr>

                <tr>
                    <th style="color:white;">Email</th>
                    <td><input type="text" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" placeholder="Your email address" />
                        <div style="color:red;"><?php echo isset($error['email']) ? $error['email'] : ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <th style="color:white;">Gender</th>
                    <td style="color:#222a2c;"> <input type="radio" name="gender" value="male" checked="" /> Male
                        <input type="radio" name="gender" value="female"/> Female</br>
                        <div style="color:red;">
                            <?php echo isset($error['gender']) ? $error['gender'] : '';?>
                            
                        </div>
                    </td>
                </tr>
               
               
                <tr>
                    <th style="color:white;">Password</th>
                    <td><input type="password" name="password" value="" placeholder="password" />
                        </br><div style="color:red;"><?php echo isset($error['password']) ? $error['password'] : ''; ?></div>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Register" name="do-register" /></td>
                    <td><input type="reset" value="Clear" /></td>
                </tr>

                <tr>
                    <td style="color:white;">Already Have An Account =></td>
                    <td><a href="?page=user&type=login">Login Now</a></td>
                </tr>
            </table>
        </form>