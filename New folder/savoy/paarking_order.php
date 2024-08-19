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
       
        <a href="feedback_list.php"><li id="create-stafff">FEEDBACKS</li></a>
         
    </ul>
    <br><br><br><br><br><br><br>


 
    <div class="order-container">
        <a href="admin_dashboard.php" style="background: linear-gradient(45deg, #22455a, #29285e);
    width: 10%;
    text-align: center;
    margin: 20px;">Home</a>
        <h2>Parking Bookings</h2>
       
        <?php 
        include 'connection.php';
        $sql="SELECT * FROM parking_booking";
        $run=mysqli_query($connect,$sql);
        if(mysqli_num_rows($run)){
            while($show=mysqli_fetch_array($run)){?>
                <div class="order-list1"><a href="park_booking_details.php?pid=<?php echo $show['P_ID'];?>"> Oredr No.<?php echo $show['P_ID'];?></a>
                <div class="odate"><?php echo date("M d, Y",strtotime($show['p_date']));?></div>
                </div><?php
            }
        }



?>
        
    </div>
  <style>
    .order-container h2{
        text-align: center;
        text-shadow: 0 0 4px black;
        font-weight: 25px;
        text-transform: uppercase;

    }
    .odate{
        color: red;
        text-shadow:0 0 10px rgb(0,0,0,0.4);
        font-size: 25px;
        font-weight: 800;
    }
    .order-container a{
        padding: 20px;
    background: linear-gradient(45deg, #22455a, #29285e);
    color: white;
    border-radius: 5px;
    box-shadow: 0 0 7px rgb(0, 0, 0, 0.8);
    text-decoration: none;
    }
    .order-container{
        
    width: 100%;
    display: flex;
    flex-direction: column;
    }
    .order-list1{
    box-shadow: 0 0 5px rgb(0,0,0,0.5);
    border-radius: 5px;
    
    margin: 30px;
    padding: 30px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
     
    }
  </style>
    

<script src="nav.js"></script>
    </body></html>