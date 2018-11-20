<?php 
    require("lib/connect.php");
    
?>
<div class="row">
    <h2><a href="">VIDEO HOT</a></h2>
    <?php 
            $sql = "SELECT * FROM video LIMIT 8";
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
    <?php }} ?>

</div>
<div class="row">

    <div class="col-6">
        <h2><a href="">NEWS SONG</a></h2>
        <?php 
            $sql = "SELECT * FROM song LIMIT 10";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <div class="col-12">
            <div class="col-3">
                <a href="?page=song&id=<?php echo $row['id'];?>">
                    <img src="upload/images/<?php echo $row['image'];?>" width="50px" height="50px">
                </a>
            </div>
            <div class="col-9">
            <a href="?page=song&id=<?php echo $row['id'];?>"><h3><?php echo $row['title'];?></h3></a>
                
                <span><?php echo $row['singer'];?></span>
            </div>
        </div>
       <?php }}?>
    </div>
    <div class="col-6">
        <h2><a href="">MOST PLAY </a></h2>
        <?php 
            $sql = "SELECT * FROM `song` ORDER BY view DESC LIMIT 10";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <div class="col-12">
            <div class="col-3">
                <a href="?page=song&id=<?php echo $row['id'];?>">
                    <img src="upload/images/<?php echo $row['image'];?>" width="50px" height="50px">
                </a>
            </div>
            <div class="col-9">
                <a href="?page=song&id=<?php echo $row['id'];?>"><h3><?php echo $row['title'];?></h3></a>
                <span><?php echo $row['singer'];?></span>
            </div>
        </div>
        <?php }}?>
    </div>
</div>