<div class="row">
    <?php 
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql ="SELECT * FROM `video` WHERE `id` = $id";
        
    }
    ?>
    
   
    <div class="col-8">
        <div class="row">
            <?php
            if ($result = mysqli_query($con,$sql)){
            
                $rowcount = mysqli_num_rows($result);
                if($rowcount){

                    $video = mysqli_fetch_assoc($result);
                    $singer =$video['singer'];

                    $view = $video['view'] +1;
                    $sql = "UPDATE `video` SET `view` = '$view' WHERE `video`.`id` = $id;";
                    $con->query($sql);
                    
            ?>
            <h2><a href=""><?php echo $video['title']?></a></h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video['video_link']?>" frameborder="0" allowfullscreen></iframe>
            <h2>View: <?php echo $video['view']?></h2>
            <?php }}?>
        </div>
        <div class="row">
            <h2><a href="">New Songs</a></h2>
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
    <div class="col-4">
        <h2><a href="">Recommended</a></h2>
        <?php 
            $sql = "SELECT * FROM `video` WHERE `singer` LIKE '$singer'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

        ?>
        <div class="col-12">
            <div class="col-3">
                <a href="?page=video&id=<?php echo $row['id'];?>">
                    <img src="upload/images/<?php echo $row['image'];?>" width="50px" height="50px">
                </a>
            </div>
            <div class="col-9">
            <a href="?page=video&id=<?php echo $row['id'];?>"><h3><?php echo $row['title'];?></h3></a>
                
                <span><?php echo $row['singer'];?></span>
            </div>
        </div>
       <?php }}?>
    </div>
   

</div>