<?php
    require_once 'load.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $movie = getSingleMovie($id);
    }
 //var_dump($movie); exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
    
    <?php include 'templates/header.php';?>

    <?php if(!empty($movie)): ?>

        <? var_dump($movie); exit;?>
        
        <div class="movie-item">
            
            <img src="images/<?php echo $movie['movies_cover'];?>" 
            alt="cover image">
            
            <h2> <?php echo $movie['movies_title'];?></h2>
            
            <h4>Realease Date: <?php echo $movie['movies_release'];?></h4>
            
            <a href="details.php?id=<?php echo $movie['movies_id'];?>" >
                More Details
            </a>

        </div>
          
        <?php else: ?>
        <p>Invalid Movie Selection</p>
        
        <?php endif; ?>
        
        <!-- var_dump($getMovies);
         exit; -->


    <footer>
        <p>Copyright 2013</p>
    </footer>
    
</body>
</html>