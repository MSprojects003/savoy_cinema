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

<form action="" method="post" enctype="multipart/form-data">
<div class="date-select">
    <span>Select Date : <input type="date" name="date" class="date" ></span>
</div>
<div class="time_btns">
<span>Select Time : </span>
<input type="time" name="time" id="" class="time">
</div>

 
<input type="hidden" name="park" id="p_value">
 

 <div class="view-parkings">
    <h1>Available Parkings</h1>

    <div class="parkings">
        
        <div class="car">
            <h2>Car Parking</h2>
            <div class="car-park">
                 
                    <span class="p" id="b1">C1</span>
                    <span class="p" id="b2">C2</span>
                    <span class="p" id="b3">C3</span>
                    <span class="p" id="b4">C4</span>
                    <span  class="p" id="b5">C5</span>
                    <span class="p" id="b6">C6</span>
                    
           
            </div>
        </div>
        <div class="bike">
            <h2>Bike Parking</h2>
            <div class="bike-park">
            <span class="p"id="b1">B1</span>
            <span class="p"id="b2">B2</span>
            <span class="p" id="b3">B3</span>
            <span class="p" id="b4">B4</span>
            <span class="p" id="b5">B5</span>
            <span class="p" id="b6">B6</span>
            </div>
        </div>
        
    </div>
    <button class="booknow" name="book">Book</button>
 </div>
 </form>

 <script>
    var timok=document.querySelectorAll(".timeok");
        var timeid=document.getElementById("timeid");
        var inp = document.querySelector("#p_value");
        var parkingSlots = document.querySelectorAll('.p');

        parkingSlots.forEach(function(pp) {
            pp.addEventListener('click', function() {
                 
                parkingSlots.forEach(function(none) {
                    none.style.background = "#76c7c0";
                });
                 
                pp.style.background = "red";
                inp.value=pp.textContent;
            });
        });
         
        
    </script>

 <?php 
   include 'connection.php';
    if(isset($_SESSION['signed'])&& isset($_SESSION['UID']) && $_SESSION['signed']==true){
        if(isset($_POST['book'])){
    $time=$_POST['time'];
    $date=$_POST['date'];
    $park=$_POST['park'];
    $uid=$_SESSION['UID'];

    $book="INSERT INTO parking_booking(parking,p_UID,p_date,p_time,p_price)values('$park','$uid','$date','$time','300')";
    $query=mysqli_query($connect,$book);
    if($query){
        ?>
        <script>
            alert("Parking Booked Succesfully");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Parking Booked Failed!");
        </script>
        <?php
    }

    
        }
     
    }else{
        ?>
        <script>
              alert("Not Logged in ! Please Login First")
             
        </script><?php
    }


?>
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
<script src="nav.js" defer></script>
<script src="slider.js"></script>
 </body>
 </html>


<style>
     
     .booknow {
    padding: 20px 200px;
    margin: 50px;
    background: linear-gradient(#a59090, rgb(136 88 88 / 20%));
    border: none;
    
    color: wheat;
    font-weight: 600;
    box-shadow: 0 0 5px rgb(0 0 0);
}
    .booknow:hover{
        background: linear-gradient(4deg,#a59090, rgb(136 88 88 / 20%));
        transition: all 0.3s ease-in;
        color: silver;
    }
    .date-select,.time_btns {
    display: flex;
    justify-content: left;
    align-items: center;
     
    margin: 100px;
    font-family: sans-serif;
    color: #f5f5f5;
}

.date-select span,.time_btns span {
    font-size: 1.2em;
    font-weight: 600;
}

.date-select .date,.time_btns .time  {
    margin-left: 10px;
    padding: 8px;
    font-size: 1em;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #333;
    color: #f5f5f5;
}

.date-select .date:hover {
    border-color: #76c7c0;
}

.date-select .date:focus {
    outline: none;
    border-color: #5fa8a6;
    box-shadow: 0 0 5px #5fa8a6;
}

    .view-parkings {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin: 100px;
    color: #f5f5f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.view-parkings h1 {
    color: #f5f5f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-transform: uppercase;

    font-weight: 800;
    margin-bottom: 20px;
}

.parkings {
    display: flex;
    justify-content: center;
    background-color: #1c1c1c;
    padding: 40px;
flex-direction: column;
    gap: 20px;
    width: 100%;
    border-radius: 10px;
}

.car, .bike {
    
    flex-direction: column;
    border-radius: 10px;
    width: 100%;
    display: flex;
    justify-content: center;
}

.car h2, .bike h2 {
    color: #fff;
    font-size: 1.5em;
    margin-bottom: 20px;
}

.car-park, .bike-park {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding: 20px;
    
    border-radius: 10px;
}

.car-park span, .bike-park span {
    background: #76c7c0;
    color: #fff;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
     
    border-radius: 5px;
    font-size: 1em;
    font-weight: bold;
}

.car-park span:hover, .bike-park span:hover {
    background: #5fa8a6;
    cursor: pointer;
}

</style>



