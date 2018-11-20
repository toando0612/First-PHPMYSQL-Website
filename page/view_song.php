<div class="row">
    <?php 
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql ="SELECT * FROM `song` WHERE `id` = $id";
        
    }
    ?>
    
   
    <div class="col-6">
        <div class="row">
            <?php
            if ($result = mysqli_query($con,$sql)){
            
                $rowcount = mysqli_num_rows($result);
                if($rowcount){

                    
                    $song = mysqli_fetch_assoc($result);
                    $singer = $song['singer'];
                    $view = $song['view'] +1;
                    $sql = "UPDATE `song` SET `view` = '$view' WHERE `song`.`id` = $id;";
                    $con->query($sql);
                    
            ?>
            <h2><a href=""><?php echo $song['title']?></a></h2>
            <audio controls>
                <source src="upload/music/<?php echo $song['song_link']?>" type="audio/mpeg">
            
            </audio>
            <h2>View: <?php echo $song['view']?></h2>
            <?php }}?>
        </div>
        <div class="row">
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
        
    </div>
    <div class="col-6">
        <h2><a href="">SAME SINGER</a></h2>
        <?php 
            $sql = "SELECT * FROM `song` WHERE `singer` LIKE '$singer'";
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