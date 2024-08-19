<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Details</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="a_dashboard.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background:silver;">
    <div class="header"></div>
    <div class="nav">
        <div class="img">
            <a href="index.php"> <img src="logo.png" alt=""></a>
        </div>
        <div class="search1" id="search1">
            <div class="search-bar">
                <form action="admin_search.php" method="post" enctype="multipart/form-data" class="search">
                    <input type="text" name="search_input" class="search-field" placeholder="Search movies...">
                    <button name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="search-btn-container">
            <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="bar" id="bar"><i class="fa-solid fa-bars"></i></div>
    </div>
    <ul class="menu" id="ul">
        
        
    </ul>
    <br><br><br><br><br><br><br>

    <?php 
    include 'connection.php';

    if (isset($_POST['search'])) {
        $search_input = $_POST['search_input'];
        $search = "SELECT * FROM movie_show WHERE movie_name = '$search_input'";
        $run = mysqli_query($connect, $search);

        if (mysqli_num_rows($run) > 0) {
            ?><div class="table1" id="table">
                  <table border="2">
                  <tr>
                      <th>Movie_ID</th>
                      <th>Movie Name</th>
                      <th>Actor</th>
                      <th>Actress</th>
                      <th>Director</th>
                      <th>Producer</th>
                      <th>Genre</th>
                      <th>Duration</th>
                      <th>Thumbnail</th>
                      <th>Trailer</th>
                      <th>U/A</th>
                      <th>Language</th> 
                      <th>Released Date</th>
                      <th>Status</th>
                  </tr><?php

            while ($view = mysqli_fetch_array($run)) {?>
            <tr>
                      <td><?php echo $view['M_ID']; ?></td>
                      <td><?php echo $view['movie_name']; ?></td>
                      <td><?php echo $view['mactor']; ?></td>
                      <td><?php echo $view['mactress']; ?></td>
                      <td><?php echo $view['mdirector']; ?></td>
                      <td><?php echo $view['mproducer']; ?></td>
                      <td><?php echo $view['mgenere']; ?></td>
                      <td><?php echo $view['duration']; ?></td>
                      <td class="img1"><img src="thumbnail/<?php echo $view['thumbnail']; ?>"></td>
                      <td class="video"><?php echo $view['trailer'] ;?></td>
                      <td><?php echo $view['ua'] ?></td>
                      <td><?php echo $view['language']; ?></td>
                      <td><?php echo $view['reldate']; ?></td>
                      <td><?php

                $fdate = strtotime(date("d-m-Y"));
                $rdate = strtotime($view['reldate']);
                $date_diferent = $fdate - $rdate;
                $days_deferent = $date_diferent / (60 * 60 * 24);


                if($days_deferent<=0){
                       
                    echo -($days_deferent)," Days to Go";
                    echo "(Upcoming)";
                   }else{
                    echo "Released";
                    echo "<br>";
                    echo $days_deferent," day left";
                   }



 
            }
            ?></table></div>
     <?php   } else {?>
            <h1>No Results Found</h1><?php
        }
    }
    ?>
    <style>
    .video iframe{
width: 150px;
height: 80px;
    }
   td.img1 img{
        width:60px;
        height: auto;
    }
</style>
<script src="nav.js"></script>
</body>
</html>
