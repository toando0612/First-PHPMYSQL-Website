<?php
    // Start the session
    session_start();
    require("../lib/connect.php");
    if($_SESSION['user']['level'] !=1){
        header("location:http://localhost/project/");
    }
    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }
    else{
        $p = "";
    }
?>
<!Doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <meta charset="utf8_unicode_ci">
</head>
<body style="padding: 10px 20px;">
<center><a href="../index.php"><h5>GO TO SITE</h5></a></center>
<center><h1>Admin dashboard</h1></center>


<div class="vertical-menu col-3">

  <a href="?page=listsong" class="active">List song</a>
  <a href="?page=addsong" >Add song</a>
  <a href="?page=listvideo">List video</a>
  <a href="?page=addvideo" >Add video</a>
  <a href="?page=listuser">List user</a>

</div class="col-9">
  <div>
      <?php 
                switch ($p) {
                   
                    
                    case 'listsong':{
                        require("listsong.php");
                        break;
                    }
                    case 'addsong':{
                        require("addsong.php");
                        break;
                    }
                    case 'deletesong':{
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $sql = "DELETE FROM `song` WHERE `song`.`id` = $id";
                            $con->query($sql);
                            header("location:?page=listsong");
                        }
                        
                        break;
                    }
                    case 'editsong':{
                        require("editsong.php");
                        break;
                    }


                    case 'listvideo':{
                        require("listvideo.php");
                        break;
                    }
                    case 'addvideo':{
                        require("addvideo.php");
                        break;
                    }
                    case 'deletevideo':{
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $sql = "DELETE FROM `video` WHERE `video`.`id` = $id";
                            $con->query($sql);
                            header("location:?page=listvideo");
                        }
                        break;
                    }
                    case 'editvideo':{
                        require("editvideo.php");
                        break;
                    }

                    case 'listuser':{
                        require("listuser.php");
                        break;
                    }
                    case 'edituser':{
                        require("edituser.php");
                        break;
                    }
                    case 'deleteuser':{
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];

                            $sql = "SELECT * FROM `user` WHERE `id` = $id";
                            $result = mysqli_query($con,$sql);
                           
                            $num_rows = mysqli_num_rows($result);
                            $row = mysqli_fetch_assoc($result);
                            if(  $num_rows && $row['level']!=1){
                                $sql = "DELETE FROM `user` WHERE `user`.`id` = $id";
                                $con->query($sql);
                            }
                            header("location:?page=listuser");
                           
                        }
                        break;
                    }
                    default:{
                        require("listsong.php");
                        break;
                    }
                }
            ?>
  </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
</script>
</html>
