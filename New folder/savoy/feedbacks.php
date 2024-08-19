
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="a_dashboard.css">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background:silver;">
    <div class="header">

    <?php 

   $FID=$_GET['fid'];

    ?>
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
 

<div class="order-container">
<h2>Feedback Details</h2>
  <?php 
include 'connection.php';
$sql="SELECT * FROM feedback f inner join user_account u on u.U_ID=f.f_uid where fid='$FID'";
$run=mysqli_query($connect,$sql);
if(mysqli_num_rows($run)){
    while($show=mysqli_fetch_array($run)){

        ?>

<div class="order-details">
    <div class="header">
    <span>Feedback No.: </span>
    <span>customer name : </span>
    <span>customer Phone : </span>
     
    <span>Message sent Date : </span>
     
    <span>Feedback: </span>
    </div>
    <div class="data">
    <span><?php echo $show['fid'];?> </span>
    <span><?php echo $show['uname'] ?></span>
    <span><?php echo $show['u_phone']; ?></span>
    
    <span><?php echo date("M D Y",strtotime($show['f_date']));?></span>
  
    <span><?php echo "Rs.",$show['feedback'],".00";?></span>
    <span><button id="ok">OK</button></span>
    </div>
</div>

<?php
    }
}

?>
</div>
<script>
    var ok=document.getElementById("ok");
    ok.addEventListener('click',function(){
        window.location.href=document.referrer;
    })
</script>

<style>
.order-details{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    background: linear-gradient(45deg, #2a2d61, #307a9d);
    margin: 70px;
    padding: 20px;
    
    border-radius: 10px;
    box-shadow: 0 0 8px rgb(0, 0, 0, 0.7);
}
    .header,.data{
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .header span{
        color: white;
        font-weight: 700;
        
        text-shadow: 0 0 7px rgb(0,0,0,0.8);
        font-size: 20px;
    }
    .data span{
        color: silver;
        font-size: 20px;
        font-weight: 600;

    }
    .order-container h2{
     color: red;
     text-align: center;
     font-size: 25px;
     text-transform: uppercase;
     margin: 10px;
     text-shadow: 0 0 3px black;
    }
</style>
<script src="nav.js"></script>
</body>
</html>

 