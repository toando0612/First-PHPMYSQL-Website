<?php
    // Start the session
    session_start();
    require("lib/connect.php");
    // cái này là ph[]ng thức get tr3n dường dẫn , xem nhé
//http://localhost/Project/?page=newsong biến page đó
    if(isset($_GET['page'])){
        //ví dụ như dường dẫn trên thì
        //$p = newsong
        $p = $_GET['page'];

    }
    else{
        $p = "";
    }
?>
<!doctype html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf8_unicode_ci">
    <title>Home</title>
</head>

<body>
    <div id="top">
        <a title="banner" href="#"><img width="100%" height="150px" src="images/banner.jpg" />
        </a>
    </div>
    <div id="menu">
        <div id="menu_music">
            <ul>
                <li>
                    <div id="tab"><a href="javascript:void(0)">Songs</a></div>
                    <ul class="submenu">
                        <li><a href="?page=newsong">News</a></li>
                        <li><a href="?page=mostplay">Most Plays</a></li>
                        
                    </ul>
                </li>
                
                <li><a href="javascript:void(0)">Video</a>
                    <ul class="submenu">
                        <?php 
                            $sql = "SELECT * FROM cat_video";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                        <li><a href="?page=category&name=<?php echo $row['name'] ?>&id=<?php echo $row['id'] ?>"><?php echo mb_strtoupper($row['name']) ?></a></li>
                        <?php }} ?>
                    </ul>
                </li>
                <form id="search" method="get" action="?page=search">
                    <li><input type="text" name="key" placeholder="type for searching" value="<?php echo @$_GET['key'] ?>"></li>
                    <li><input type="submit" name="page" value="search"></li>
                </form>
            </ul>
        </div>
        <div id="menu_user">
            <ul>
                <li><a href="."> | Home | </a></li>
                <li>
                <?php 
                    if ( isset($_SESSION['user']) && $_SESSION['user'] ){
                       echo "<span style='color:white'>".$_SESSION['user']['fullname']. "</span> <a style='text-decoration:underline;' href='?page=user&type=logout'>Logout</a>";
                    }
                    else{
                       echo '<a href="?page=user&type=login"> | Login | </a>';
                            
                    }
                ?>
                </li>
                <li><a href="?page=user&type=register"> | Register | </a></li>
            </ul>
        </div>
    </div>

    <div id="wrapper">
        <div id="main" class="col-9">

            <?php
            // phần này là switch case nhé ,
                switch ($p) {
                   
                    case 'user':{
                        if( !isset($_SESSION['user']) ){
                            if($_GET['type'] == "login" && isset($_GET['type'])){
                                //file login.php nằm trong thư mục page nek
                                // để cái này gọi là cắt nhỏ html ra cho nó gọn dễ quản lí tại vài trang web sẽ có
                                // nhiều bố cục giống nhau chỉ có phần nội dung là thay đôi xem nhé
                                require("page/login.php");
                            }

                            else if ($_GET['type'] == "register" && isset($_GET['type'])) {

                                require("page/register.php");
                            }
                            // else{
                            //     header("location:index.php");
                            // }
                        }
                        else if($_GET['type'] == "logout" && isset($_GET['type'])){
                            if (isset($_SESSION['user'])){
                                unset($_SESSION['user']);
                                header("location:index.php");
                            }
                            
                        }
                        else{
                            header("location:index.php");
                        }
                        break;
                    }
                        
                    case 'search':{
                        require("page/search.php");
                        break;
                    }
                    case 'song':{
                        require("page/view_song.php");
                        break;
                    }
                    case 'video':{
                        require("page/view_video.php");
                        break;
                    }
                    case 'category':{
                        require("page/category.php");
                        break;
                    }
                    // new song đây
                    case 'newsong':{
                       // phần này gọi file newsong.php
                        require("page/newsong.php");
                        break;
                    }
                    case 'mostplay':{
                        require("page/mostplay.php");
                        break;
                    }
                        
                    default:
                        require("page/home.php");
                        break;
                }
            ?>
        </div>

        <div id="right" class="col-3">
            <div><img width="200" height="510" style="border:0;" src="images/ads1.png" /></div>
            <div><img width="200" height="300" style="border:0;" src="images/ads2.png" /></div>
        </div>

    </div>
    <div id="bottom" class="row">Copyright</div>
</body>

</html>