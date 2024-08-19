<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="a_dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background:silver;">
    <div class="header">

    
    
    </div>
    <div class="nav">
        <div class="img">
            <a href="index.php"> <img src="logo.png" alt=""></a>
        </div>
        <div class="search1" id="search1">
        <div class="search-bar" >
        <form action="admin_search.php" method="post" enctype="multipart/form-data" class="search">
                    <input type="text" name="search_input" class="search-field" placeholder="Search movies...">
                    <button name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
        </div> </div>
        <div class="search-btn-container">
        <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button></div>

         <div class="bar" id="bar"> <i class="fa-solid fa-bars"></i></div> 
    </div>
        <ul class="menu" id="ul">
           
            <a href="paarking_order.php"><li >PARKING Bookings</li></a>
             
            <a href="feedback_list.php"><li>FEEDBACKS</li></a>
            
           
        
           
            
            
        </ul>
<br>
<br><br><br><br>
 <style>

    .feedback-list{
           
           margin: 100px;
    }
    li{
padding: 10px;
margin: 3px;
    }
    .feedback-list a{
        text-decoration: none;
       
    }
    .list{
        display: flex;
        justify-content: space-between;
    }
    .list .h3{
        background-color: black;
        color: white;
        padding: 10px;

    }

 </style>
<div class="feedback-list">
    
<ul class="list-group">
    <?php 
    include 'connection.php';
    $sql="SELECT * FROM feedback";
    $run=mysqli_query($connect,$sql);
    if(mysqli_num_rows($run)){
        while($show=mysqli_fetch_array($run)){?>
            <a href="feedbacks.php?fid=<?php echo $show['fid'];?>"><li class="list-group-item list"><div class="h3"><?php echo "No.",$show['fid'];?></div> <div class="date"><?php echo date("d M",strtotime($show['f_date']));?></div></li></a><?php
        }
    }
    
    ?>
  
  
</ul>
</div>
<script src="nav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>