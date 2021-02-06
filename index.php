<?php
    require_once 'load.php';

    if(isset($_GET['filter'])){
        $filter = $_GET['filter'];
        $getMovies = getMoviesByGenre($filter);
    } else {
        $getMovies = getAllmovies();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
</head>
<body>

   <?php include 'templates/header.php';?>

    <?php foreach ($getMovies as $movie): ?>

        <div class="movie-item">

            <img src="images/<?php echo $movie['movies_cover'];?>" 
            alt="cover image">

            <h2> <?php echo $movie['movies_title'];?></h2>

            <h4>Realease Date: <?php echo $movie['movies_release'];?></h4>

            <a href="details.php?id=<?php echo $movie['movies_id'];?>" >
                More Details
            </a>

        </div>

    <?php endforeach;  ?>

        <!-- var_dump($getMovies);
         exit; -->
    <?php include 'templates/footer.php';?>

</body>
</html>