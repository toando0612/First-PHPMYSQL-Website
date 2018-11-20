<?php 
        if(isset($_GET['key'])){
            $key = $_GET['key'];

            $sql_song = "SELECT * FROM `song` WHERE `title` LIKE '%$key%'";

            $sql_video = "SELECT * FROM `video` WHERE `title` LIKE '%$key%'";

            $result_song = mysqli_query($con, $sql_song);
            $result_video = mysqli_query($con, $sql_video);
        }
?>

<?php
    if (mysqli_num_rows($result_song) > 0) {
?>

<div class="row">
    
        <h2>SONG</h2>
        <?php while ($row = mysqli_fetch_assoc($result_song)) { ?>
        <div class="item">
            <a href="?page=song&id=<?php echo $row['id'];?>">
                <img src="upload/images/<?php echo $row['image'];?>" width="151px" height="151px">
            </a>
            <a href="?page=song&id=<?php echo $row['id'];?>"><h3><?php echo $row['title'];?></h3></a>
            <p><?php echo $row['singer'];?></p>
        </div>
        <?php } ?>
</div>
<?php } ?>

<?php
    if (mysqli_num_rows($result_video) > 0) {
?>
<div class="row">
    
        <h2>VIDEO</h2>
        <?php while ($row = mysqli_fetch_assoc($result_video)) { ?>
        <div class="item">
            <a href="?page=song&id=<?php echo $row['id'];?>">
                <img src="upload/images/<?php echo $row['image'];?>" width="151px" height="151px">
            </a>
            <a href="?page=song&id=<?php echo $row['id'];?>"><h3><?php echo $row['title'];?></h3></a>
            <p><?php echo $row['singer'];?></p>
        </div>
        <?php } ?>
</div>
<?php } ?>
<?php if(mysqli_num_rows($result_video)==0 && mysqli_num_rows($result_song)==0){
    echo "NOT FOUND";
}
?>