<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="moviebox.css">
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="verification.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body id="body">
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


<div class="slider-container">
<?php 
include 'connection.php';
$sql="SELECT * FROM movie_show where expired=0 order by M_ID DESC limit 1";
$query1=mysqli_query($connect,$sql);
if(mysqli_num_rows($query1)){
    while($slide=mysqli_fetch_array($query1)){
        $MID=$slide['M_ID'];
        ?>
        <div class="slide active" >
        <div class="blur" style="background-image:url('<?php echo 'thumbnail/'.$slide['thumbnail'];?>');  " ></div>
          <img src="thumbnail/<?php echo $slide['thumbnail'];?>">
          <div class="about">
              <div class="name"> <?php echo $slide['movie_name']?></div>
              <div class="action2">
                  <a href="time_select.php?mid=<?php echo $slide['M_ID'];?>">BOOK TICKETS</a>
                  <a href="movie_info.php?MID=<?php echo $MID;?>&mname=<?php echo $slide['movie_name'];?>">INFO</a>
              </div>
          </div>
        </div><?php
    }
}


$sql2="SELECT * FROM movie_show where expired=0 && M_ID < (SELECT MAX(M_ID) FROM movie_show) order by M_ID Desc Limit 5";
$run=mysqli_query($connect,$sql2);
if(mysqli_num_rows($run)){
    while($slide2=mysqli_fetch_array($run)){
        $MID=$slide2['M_ID'];
?>
       <div class="slide" >
        <div class="blur" style="background-image:url('<?php echo 'thumbnail/'.$slide2['thumbnail'];?>');  " ></div>
          <img src="thumbnail/<?php echo $slide2['thumbnail'];?>">
          <div class="about">
              <div class="name"> <?php echo $slide2['movie_name']?></div>
              <div class="action2">
              <a href="time_select.php?mid=<?php echo $slide2['M_ID'];?>">BOOK TICKETS</a>
              <a href="movie_info.php?MID=<?php echo $MID;?>&mname=<?php echo $slide2['movie_name'];?>">INFO</a>
              </div>
          </div>
        </div><?php
    }
}
?>
  
  
   
   
  
  <button class="prev" onclick="prev()">&#10094;</button>
  <button class="next" onclick="next()">&#10095;</button>
</div>
<!-- slider for slider-->



<h1 class="now-showing">
    NOW SHOWING
</h1>

<script>
   
</script>
  
<div class="p">
<br>

<?php 


include 'connection.php';
$sqlr="SELECT * FROM movie_show where expired=0 order by M_ID DESC limit 4";
$run1=mysqli_query($connect,$sqlr);
if(mysqli_num_rows($run1)){
    while($view1=mysqli_fetch_array($run1)){
        $reldate=$view1['reldate'];
        $tday_date=strtotime(date("d-m-Y"));
            
        $rdate=strtotime($reldate);
         $date_diferent= $tday_date- $rdate;
           $days_deferent=  $date_diferent/ (60*60*24);
           if($days_deferent >=0){


           
        ?>

        <div class="list">
        <div class="thumb" id="thumb">
            <img src="thumbnail/<?php echo $view1['thumbnail'];?>" alt="" class="img">
            
        </div>
        <div class="details" id="details">
                <div class="name">
                <?php echo $view1['movie_name'];?>
                </div>
                <div class="content">
                <div class="lang"><?php echo $view1['language'];?></div>
                <li class="u-a"><?php echo $view1['ua'];?></li>
                <li class="cate"><?php echo $view1['mgenere'];?></li>
                </div>
               <br>
                <div class="action-btn">
                <a href="time_select.php?mid=<?php echo $view1['M_ID'];?>">BOOK TICKETS</a>
                <a href="movie_info.php?MID=<?php echo $view1['M_ID'];?>&mname=<?php echo $view1['movie_name'];?>">MOVIE INFO</a></div>
            </div>
        </div>
    <?php
    }}
}

?>

    
    
</div>

<!----- upcoming-->
<h2 class="upcoming">
    UPCOMING MOVIES
</h2>
<div class="p">
<br>

<?php 


include 'connection.php';
$sqlr="SELECT * FROM movie_show where expired=0 order by M_ID DESC limit 4";
$run1=mysqli_query($connect,$sqlr);
if(mysqli_num_rows($run1)){
    while($view1=mysqli_fetch_array($run1)){
        $reldate=$view1['reldate'];
        $tday_date=strtotime(date("d-m-Y"));
            
        $rdate=strtotime($reldate);
         $date_diferent= $tday_date- $rdate;
           $days_deferent=  $date_diferent/ (60*60*24);
           if($days_deferent <=0){


           
        ?>

        <div class="list">
        <div class="thumb" id="thumb">
            <img src="thumbnail/<?php echo $view1['thumbnail'];?>" alt="" class="img">
            
        </div>
        <div class="details" id="details">
                <div class="name">
                <?php echo $view1['movie_name'];?>
                </div>
                <div class="content">
                <div class="lang"><?php echo $view1['language'];?></div>
                <li class="u-a"><?php echo $view1['ua'];?></li>
                <li class="cate"><?php echo $view1['mgenere'];?></li>
                </div>
               <br>
                <div class="action-btn">
                <a href="time_select.php?mid=<?php echo $view1['M_ID'];?>">BOOK TICKETS</a>
                <a href="movie_info.php?MID=<?php echo $view1['M_ID'];?>&mname=<?php echo $vie1['M_ID'];?>">MOVIE INFO</a></div>
            </div>
        </div>
    <?php
    }}
}

?>




     
</div>

<style>
    
.footer .general h2{
    color: gold;
   margin-bottom: 20px;
}
.generals{
    display: flex;
    flex-direction: column;
    gap: 30px;
}
.general2 .f-logo{
    display: flex;
    
    margin-top: -30px;
}
.general2 .links {
    display: flex;
    gap: 30px;
    flex-direction: row;
}
body{
background: #080808;
}
</style>

</div>

<style>
 
 </style>
<script>


 


   
 


</script>
<!-- footer -->
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



<script src="scrpt.js"> </script>
<script src="slider.js"></script>
<script src="nav.js"></script>   
    
</body>
</html>



 

<style>
   