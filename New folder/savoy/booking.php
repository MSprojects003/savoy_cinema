<?php
 include 'connection.php';
session_start();
if(isset($_SESSION['signed'])&& isset($_SESSION['UID']) && $_SESSION['signed']==true){


if(isset($_POST['book'])){
    $seats=explode(',',$_POST['seats']);
 
$tid=$_GET['tid'];
$uid=$_SESSION['UID'];
    ?>
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
     
    <link rel="stylesheet" href="booking.css">
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
            <form action="" class="search">
                <input type="text" class="search-field" placeholder="Search movies...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
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
  
 <div class="main">
 <h1>reserveation  summary <i class="fa-solid fa-circle-info info1"></i></h1>
 </div>
 <div class="main1">
    <?php 
    
   

    $sql="SELECT * FROM show_time st inner join show_date sd on st.did=sd.date_id  inner join movie_show ms on sd.mid=ms.M_ID inner join screen s on st.scrn_ID = s.S_ID where st.time_id='$tid'";
    $run=mysqli_query($connect,$sql);
    if(mysqli_num_rows($run)){
        while($show=mysqli_fetch_array($run)){?>
        <div class="container">
           <div class="container1">
            <div class="wrap1">
        <img src="thumbnail/<?php echo $show['thumbnail'];?>" alt="">
            </div>
            <div class="wrap2">
                <h2><?php  echo $show['movie_name'];?></h2> 
                <div class="h3"><i class="fa-solid fa-calendar-days day"></i> <span class="date"><?php echo date("D M, Y", strtotime($show['date1']));?></span></div>
                <div class="h3"><i class="fa-regular fa-clock"></i> <span class="time"><?php  
                 $times=explode(":",$show['stime']);
                 $hour =$times[0];
                 $min=$times[1];

                 if ($hour < 12) {
                    $hour =$hour+ 12;
                    $period = "AM";
                  } elseif ($hour == 0) {
                    $hour = 12;
                    $period = "PM";
                  } else {
                    $period = "PM";
                  }
                echo $hour,":",$min," ",$period;
                
                
                ?></span></div>
                <div class="h3">
                    <span class="quantity">Seats Count : </span>
                    <?php echo count($seats) ;?>
                </div>

               
            </div>
            
           </div>
          
        </div>
        <div class="container3">
           <div class="h2">
                    <span class="caption">
                        Seats info <i class="fa-solid fa-circle-info info1"></i> : 
                    </span>
                    <div class="seat-container">
                    <?php 

    foreach($seats as $seat){?>
        <div class="seats"><?php echo $seat ;?></div><?php
    }
                ?></div></div>
           </div>
           <div class="action">
            <div class="total-bill"><?php echo "Total : <div class='h6'>Rs.</div>", number_format($show['tprice'] * count($seats)),".00";?></div>
            <div class="proceed">
                
            <form action="" method="post" enctype="multipart/form-data">
                 <?php foreach($seats as $seat){
                    ?><input type="hidden" name="sseats[]" id="" value="<?php echo $seat;?>"><?php
                 }?>
                 <input type="hidden" name="tid" id="" value="<?php echo $tid;?>">
                 <input type="hidden" name="uid" id="" value="<?php echo $uid;?>">
                <input type="hidden" name="price" id="" value="<?php echo $show['tprice'];?>">
                <input type="hidden" name="count" value="<?php echo count($seats);?>">
                <button name="b-tickets">Book tikcets</button>
            </form></div>
           </div>

<?php


        }
    }
   
?>
 </div>
  

<?php
     









}












}else{
   ?>
   <script>
    localStorage.setItem('errorMsg',"error")
window.location.href=document.referrer;

   </script>
   <?php
}

if(isset($_POST['b-tickets'])){

    $count=$_POST['count'];
    $tid=$_POST['tid'];
    $uid=$_POST['uid'];
    $price=$_POST['price'];
    $total=$count * $price;
    $sseats=$_POST['sseats'];
    
    $tday=date('Y-m-d');
    $book="INSERT INTO orders(C_ID,TimeID,T_count,Total_price,B_date,status)values('$uid','$tid','$count','$total','$tday','0')";
    $query=mysqli_query($connect,$book);
    if($query){
        $OID=mysqli_insert_id($connect);
        
        $book2="INSERT INTO tickets(OID,price,Seat_ID) values(?,?,?)";
        $statement=mysqli_prepare($connect,$book2);

        foreach($sseats as $sseat){
            mysqli_stmt_bind_param($statement,"iii",$OID,$price,$sseat);
           $final=mysqli_stmt_execute($statement);

           if($final){
            $result=true;
           }else{
            $result=false;
            ?>
            <script>
               alert("error: ",<?php echo mysqli_error($connect);?>);
            </script><?Php

           }
        }
       }else{
        ?>
        <script>
            alert("error: ",<?php echo mysqli_error($connect);?>);
        </script><?Php

       }

       if($result==true){
        ?>
        <script>
alert("Your Booking Successful! check your Email");
        </script>
         <?php
       }else{?>
       <script>
alert("error: ",<?php echo mysqli_error($connect);?>);
       </script>
        <?php
       }
}


?>

<style>
   
</style>

 
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