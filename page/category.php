

<div class="row">
    <h2><a href=""><?php echo mb_strtoupper($_GET['name']);?></a></h2>
    <?php 
        if(isset($_GET['id'])){

            $id = $_GET['id'];
            $sql = "SELECT * FROM `video` WHERE `id_cat_video` = $id";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

    ?>
    <div class="item">
        <a href="?page=video&id=<?php echo $row['id'];?>">
            <img src="upload/images/<?php echo $row['image'];?>" width="151px" height="151px">
        </a>
        <a href="?page=video&id=<?php echo $row['id'];?>"><h3><?php echo $row['title'];?></h3></a>
        <p><?php echo $row['singer'];?></p>
    </div>
    <?php }} }?>

</div>