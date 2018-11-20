<div class="row">
    <h2><a href="">MOST PLAY</a></h2>
    <?php 
            $sql = "SELECT * FROM song ORDER BY view DESC LIMIT 30";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

    ?>
    <div class="item">
        <a href="?page=song&id=<?php echo $row['id'];?>">
            <img src="upload/images/<?php echo $row['image'];?>" width="151px" height="151px">
        </a>
        <a href="?page=song&id=<?php echo $row['id'];?>"><h3><?php echo $row['title'];?></h3></a>
        <p><?php echo $row['singer'];?></p>
    </div>
    <?php }} ?>

</div>