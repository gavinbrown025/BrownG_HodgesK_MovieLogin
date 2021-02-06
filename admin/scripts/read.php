<?php

function getAllMovies(){
    $pdo = Database::getInstance()->getConnection();
    $queryAll = "SELECT * FROM tbl_movies";
    $runAll = $pdo->query($queryAll);
    $movies = $runAll->fetchAll(PDO::FETCH_ASSOC);

    if ($movies) {
        return $movies;
    } else {
        return 'There was a problem retrieving info';
    }
}


function getSingleMovie($id){
    $pdo = Database::getInstance()->getConnection();
    $querySingle = 'SELECT * FROM tbl_movies WHERE movies_id = "'.$id.'" ';
    $runSingle = $pdo->query($querySingle);

    if ($runSingle) {
        $movie = $runSingle->fetch(PDO::FETCH_ASSOC);
        return $movie;
    } else {
        return 'There was a problem retrieving this movie';
    }
}

function getMoviesByGenre($genre){
    $pdo = Database::getInstance()->getConnection();
    $query = 'SELECT m.*, 
        GROUP_CONCAT(g.genre_name) AS genre_name FROM tbl_movies m 
        LEFT JOIN tbl_mov_genre link ON link.movies_id = m.movies_id 
        LEFT JOIN tbl_genre g ON link.genre_id = g.genre_id 
        GROUP BY m.movies_id 
        HAVING genre_name LIKE "%'.$genre.'%" ';
    $runQuery = $pdo->query($query);

    if ($runQuery) {
        $movies = $runQuery->fetchAll(PDO::FETCH_ASSOC);
        return $movies;
    } else {
        return 'There was a problem retrieving '.$genre.' movies';
    }
}
