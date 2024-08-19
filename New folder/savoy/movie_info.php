<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['mname'];
    ?></title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="verification.css">
    <link rel="stylesheet" href="moviebox.css">
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
$mid=urldecode($_GET['MID']);
 



?>
    <div class="header">

    
    </div>
    <div class="nav">
        <div class="img">
            <a href="index.php"> <img src="logo.png" alt=""></a>
        </div>
        <div class="search1" id="search1">
        <div class="search-bar" >
        <form action="search.php" class="search" method="post" enctype="multipart/form-data">
                <input type="text" class="search-field" name="input-search" placeholder="Search movies...">
                <button name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div> </div>
        <div class="search-btn-container">
        <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button></div>

         <div class="bar" id="bar"> <i class="fa-solid fa-bars"></i></div> 
    </div>
    <ul class="menu" id="ul">
            <a href="parking.php"><li>BOOK PARKING</li></a>
            <a href="feedback.php"><li>FEEDBACK</li></a>
             
            <a href="movies.php?status=1"><li>NOW SHOWING</li></a>
           <a href="movies.php?status=0"><li>UPCOMING</li></a>

           
         
          
            
            <li><button id="signin">Sign in</button></li>
        </ul>
<br>
<div class="verification" id="verify">

 
 </div>

<?php
include 'connection.php';


$sql="SELECT * FROM movie_show where M_ID='$mid' limit 1";
$run=mysqli_query($connect,$sql);
if(mysqli_num_rows($run)){
    while($show=mysqli_fetch_array($run)){?>
    <!--trailer banner-->
    <div class="slider1-container container">
    <div class="trailer1" aria-disabled="true"><?php echo $show['trailer'];?></div>
       
    </div>
    <div class="video"><?php echo $show['trailer'];?></div>

     <div class="movie-container">
        <div class="movie-thumb">
            <img src="thumbnail/<?php echo $show['thumbnail'];?>" alt="">
        </div>
        <div class="movie-details1">
            <h2><?php echo $show['movie_name'];?></h2>
            
            <h4>Synopsis</h4>
            <p class="summary">
                <?php echo $show['synopsis'];?>
                </p>
                 <div class="details2">
                    <div class="min-details">
                        <h4>Year</h4>
                        <h4><?php echo date("Y",strtotime($show['reldate']));?></h4>
                    </div>
                    <div class="min-details">
                        <h4>Released </h4>
                        <h4><?php echo date("M d",strtotime($show['reldate']));?></h4>
                    </div>
                    <div class="min-details">
                        <h4>Language</h4>
                        <h4><?php echo $show['language'];?></h4>
                    </div>
                    <div class="min-details">
                        <h4>U/A </h4>
                        <h4><?php echo $show['ua'];?></h4>
                    </div>
                    <div class="min-details">
                        <h4>Genere </h4>
                        <h4><?php echo $show['mgenere'];?></h4>
                    </div>
                    </div>
                
        </div>
     </div>
     <div class="hirachy">
        <h2>
            Cast & Crew
        </h2>
        <div class="cast">
        <div class="image1">
            <img src="userlogo.png" alt="">
            <h3>
            <?php echo $show['mactor'];?>
            
        </h3><h4>Actor</h4>
        </div> <div class="image1">
            <img src="userlogo.png" alt="">
            <h3>
            <?php echo $show['mactress'];?>
        </h3><h4>Actress</h4>
        </div>
         <div class="image1">
            <img src="userlogo.png" alt="">
            <h3>
            <?php echo $show['mdirector'];?>
        </h3><h4>Director</h4>
        </div>
        <div class="image1">
            <img src="userlogo.png" alt="">
            <h3>
            <?php echo $show['mproducer'];?>
        </h3><h4>Producer</h4>
        </div>
        
        </div>

     </div>
<div class="button">
  <a href="time_select.php?mid=<?php echo $show['M_ID'];?>">Select Seats</a>
</div>


        <?php
    }
}?>


<style>
    .button{
        display: flex;
        justify-content: center;
        margin: 50px;
    }
    .button a:hover{
        background: #0f324f;
        color: red;
        
    }
   
    .button a{
        text-decoration: none;
        text-align: center;
        background-color: #125185;
        color: white;
        transition: all 0.3s ease-in;
        border: none;
        width: 20%;
        
        padding-left: 20px;
        padding-right: 20px;
        font-size: 20px;
        padding: 15px;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight: 300;
        text-transform: uppercase;
        border-radius: 5px;
    }
    .image1{
        margin-top: 30px;
        scale: 0.8;
        
         
        
        
    }
    .cast{
        display: flex;
        gap: 20px;
        justify-content: center;
    }
    .image1 h4{
        text-align: center !important;
        color:#ac8f8f;
        margin: 5px;
        text-transform: uppercase
         

    }
    .image1 h3{
        font-weight: 300;
        text-align: center;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 30px;
        margin-top: -20px;
    }
    .image1 img{
        width: auto;
        
        height: 200px;
        clip-path: circle(35%);
    }
    .hirachy{
       margin-bottom: 10px !important;
        margin: 180px;
        margin-top: 50px;
        border-bottom: 1px solid white;
    }
    .hirachy h2{
        border-bottom: 1px solid white;
        padding: 10px;
        color: white;
        font-size: 30px;
        text-transform: uppercase;
        font-weight: 300;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-align: left;

    }
    .details2{
        border-top: 1px solid white;
       width: 80%;
        margin-top: 50px;
    }
    .min-details{
        
        border-bottom: 1px solid white;
        display: flex;
        width:100%;
        justify-content: space-around;
    }
    .min-details h4{
        font-size: 15px !important;
    }
    .details1{
        color:red;
    }
    body{
        background: #080808;
        color: white;
    }
    
    .container{
        margin-top:65px;
       overflow: hidden !important;
       height: 350px ;
 

    }
    .video{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .video iframe{
        position: absolute;
        z-index: 2;
        width: 600px;
        height: 350px;
        top: 83px;
       
    }
    .trailer1 iframe{
        pointer-events: none;
        width: 100%;
        
        filter: blur(10px);
        height: 350px;
        z-index: 1;
    }
    .movie-container{
       margin: 180px;
        display: flex;
        margin-bottom: 100px;
        gap:100px;
        width: 80%;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        
    }
    
    .movie-details1 h2{
        color: #fff;
        font-size: 50px;
        font-weight: 300;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .movie-details1 h4{
        color: silver;
        padding-top: 10px;
        padding-bottom: 10px;
        text-transform: uppercase;
        font-weight: 300;
        width:100%;
        font-size: 20px;
    }
    .movie-details1 p.summary{
        color:white;
        font-weight: 600;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        width:80%;
        padding-bottom:5px;
        padding-top: 5px;
        border-top: 1px solid silver;
        border-bottom: 1px solid silver;
    }
    .movie-thumb img{
        width: auto;
        height: 500px;
    }
    

            
    
</style>
<div class="footer">
<div class="card text-center">
   
  <div class="card-body">
    <h5 class="card-title"><img src="logo.png" alt=""></h5>
    <p class="card-text media"><span><a href="https://www.facebook.com/mohomed.atheef.14?mibextid=ZbWKwL"><i class="fa-brands fa-facebook"></i></a></span> <span><a href=""><i class="fa-brands fa-instagram"></i></a></span><span><a href="https://wa.me/+94787987255"><i class="fa-brands fa-whatsapp"></i></a></span></p>
     <p class="des">Savoy Cinema, Colombo also known as Savoy 3D Cinema and Savoy 2 is a prominent cinema in Sri Lanka located on Galle Road in Wellawatte, Colombo, just near the old Dutch canal. The building is owned and run by EAP Films and Theatres Private Limited.</p>
  </div>
  <div class="card-footer text-body-secondary footer2">
  COPYRIGHT © 2024 SAVOY Cinemas LTD. ALL RIGHTS RESERVED.
  </div>
</div> </div>
<style>
   .media{
    display: flex;
    flex-direction: row;
    justify-content: center;
    gap: 20px;
   }
   
   .media span a{
    font-size: 25px;
    color: #981414;
   
   }
   p.des{
    color:wheat;
    font-weight: 300;
    font-size: 18px;
    padding-top: 30px;
    padding-bottom: 30px;
   }
   .text-center{
    background: none !important;
    top:100px;
   }
    .card-title img{
        width: auto;
        height: 100px;
    }
    .footer2{
        padding:30px;
        color: white !important;
    }
</style>

<script src="nav.js"></script>
</body>
</html>