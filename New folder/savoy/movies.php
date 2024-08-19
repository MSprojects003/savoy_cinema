<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="moviebox.css">
    <link rel="stylesheet" href="movies.css">
     <link rel="stylesheet" href="verification.css">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  </head>
<body>
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
<style>
  body{
    background: #080810 !important;
  }
</style>

        <br><br><br><br><br>

 
             
        <!-- movie list -->
        <div class="container">
        <div class="head1">
          <?php 
           $status =$_GET['status'];
          if($status==1){
            ?>
          
            Now showing <?php }else{
              ?>
              Coming soon<?php }
              ?>
        </div>
        <div class="movie-list">
       
        
         <?php 
        
         include 'connection.php';
         $sql=" SELECT * FROM movie_show where expired=0";
         $query=mysqli_query($connect,$sql);   
         if(mysqli_num_rows($query)){
          while($show=mysqli_fetch_array($query)){
            $MID=$show['M_ID'];
            $reldate=$show['reldate'];
            $tday_date=strtotime(date("d-m-Y"));
           

            $rdate=strtotime($reldate);
             $date_diferent= $tday_date- $rdate;
               $days_deferent=  $date_diferent/ (60*60*24);
                if($status==0){
               
              
               if($days_deferent<=0){
               
                
        ?>
        <div class="listt">
        <div class="list1">
            <div class="thumb1">
                <img src="thumbnail/<?php echo $show['thumbnail'];?>" alt="">
            </div>
            <div class="detail1">
                 
                
                <a href="time_select.php?mid=<?php echo $show['M_ID'];?>" class="book" id="book"><i class="fa-solid fa-ticket"></i> Buy <b>tikets</b><div class="border"></div></a>
                <a href="movie_info.php?MID=<?php echo $MID;?>&mname=<?php echo $show['movie_name'];?>" class="more-info" id="moreinfo"><i class="fa-solid fa-circle-info"></i>More <b>Info</b><div class="border"></div></a>
            </div>
            
        </div> 
        <h3 class="h31" ><?php echo $show['movie_name'];?>
                 (<?php echo $show['language'];?>)
                <h5 class="h51"> <?php // convert date to string date
                $datename=date('M d',strtotime($reldate));
                echo "relaseing on ",$datename;?></h5></h3>
                </div>  <?php 

      }}else if($status==1){
        if($days_deferent >=0){?>
         
        <div class="listt">
        <div class="list1">
            <div class="thumb1">
                <img src="thumbnail/<?php echo $show['thumbnail'];?>" alt="">
            </div>
            <div class="detail1">
                 
           
                <a href="time_select.php?mid=<?php echo $show['M_ID'];?>" class="book" id="book"><i class="fa-solid fa-ticket"></i> Buy <b>tikets</b><div class="border"></div></a>
                               <a href="movie_info.php?MID=<?php echo $MID;?>&mname=<?php echo $show['movie_name'];?>" class="more-info" id="moreinfo"><i class="fa-solid fa-circle-info"></i>More <b>Info</b><div class="border"></div></a>
            </div>
            
        </div> 
        
        <h3 class="h31" ><?php echo $show['movie_name'];?>
                 (<?php echo $show['language'];?>)
                <h5 class="h51">now SCREENING</h5></h3>
                </div>  <?php 
      }}
    
    }
     }      
     ?>
        
</div></div>


        <style>
           
</style>

<script>
  var list1 = document.querySelectorAll(".list1");

  list1.forEach(function(list) {
    var detail1 = list.querySelector(".detail1");
    
    list.addEventListener('mouseover', function() {
      detail1.classList.remove("remove-detail1");
      detail1.classList.add("open-detail1");
      list.style.borderRadius="0px";
      

    });

    list.addEventListener('mouseleave', function() {
      detail1.classList.remove("open-detail1");
      detail1.classList.add("remove-detail1");
      list.style.borderRadius="10px";


    });

     
   
  });
</script>

 
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