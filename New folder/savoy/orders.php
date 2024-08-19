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

    <?php $oid=$_GET['iod'];
    ?>
    </div>
    <div class="nav">
        <div class="img">
            <a href="admin_dashboard.php"> <img src="logo.png" alt=""></a>
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
             
             
           
            <a href="feedback_list.php"><li>FEEDBACKS</li></a>
             
           
        
           
            
            
        </ul>
<br>
<br><br><br><br>

 
<h1 class="h1-order">Order No. <?php echo $oid;?></h1>
<?php 

include 'connection.php';


?>
<div class="order-container"><?php
$sql="SELECT * FROM  orders o  inner join user_account u on u.U_ID=o.C_ID where o.O_ID='$oid'";
$run=mysqli_query($connect,$sql);
if(mysqli_num_rows($run)){
    while($show=mysqli_fetch_array($run)){
        ?><div class="c_headng">
    <span>Customer   : </span>
    <span>Telephone  :</span>
    <span>Email      :</span>
    <span>Order Date :</span>
    <span>Seat Count :</span>
    <span>Reserved show Date :</span>
    <span>Reserved Show Time :</span>
    <span>Screen  :</span>
    </div>
    <div class="c-detail">
    <span class="details"><?php echo $show['uname'];?></span>
    <span class="details"><?php echo $show['u_phone'];?></span> 
    <span class="details"><?php echo $show['u_email'];?></span> 
    <span class="details"><?php echo date("M d,Y",strtotime($show['B_date']))?></span>
    <span class="details"><?php echo $show['T_count'];?></span> 
    
<?php
$TID=$show['TimeID'];
    $rdate="SELECT * FROM show_time st inner join show_date sd on st.did=sd.date_id inner join screen sc on st.scrn_ID=sc.S_ID where st.time_id='$TID'";
    $run2=mysqli_query($connect,$rdate);
    if(mysqli_num_rows($run2)){
        while($show2=mysqli_fetch_array($run2)){?>
            <span class="details"><?php echo date("M d, Y",strtotime($show2['date1']));?></span> 
            <span class="details" style="color:red;background:white;padding:20px;font-weight:bold;"><?php   
             $parts= explode(":",$show2['stime']);
             $hour= $parts[0];
             $min= $parts[1];
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
            
            
           ?></span> 

<span class="details"><?php echo $show2['Scrn_name'];?></span> 
     <?php   
    }
    }
   ?>
   

    </div> 
    <?php
    }?>
     <?php
}
?>
</div>
   
   <div class="seat-details">

   <span class="span1">Seats :</span>
   <span class="seats-list">
   <?php $total;

   $sql3="SELECT * FROM orders o inner join tickets t on o.O_ID=t.OID where o.O_ID='$oid'";
   $run3=mysqli_query($connect,$sql3);
   if(mysqli_num_rows($run3)){
     
    while($show3=mysqli_fetch_array($run3)){
        $total=$show3['Total_price'];?>
       
       <span class="seat"><?php echo $show3['Seat_ID'];?></span>
  <?php  }
   }?>
   </span>

</div>

<div class="action-order">

<span class="total"><span class="t-total">Total : </span><?php echo "Rs.",number_format($total),".00";?></span>


<?php 
 
 $check="SELECT * FROM orders where O_ID='$oid'";
 $check_query=mysqli_query($connect,$check);
 if(mysqli_num_rows($check_query)){
    while($show5=mysqli_fetch_array($check_query)){

        $status=$show5['status'];
        if($status==1){
            ?>
            <h3 style="color:wheat;font-size:30px;text-shadow:0 0 10px black;">Order Accepted</h3>
            <?php
        }else{
            ?>
<form action="" method="post" enctype="multipart/form-data">
<button name="accept">Accept Reseevation</button>
</form><?php

        }
    }
 }

?>

</div>

<?php 

if(isset($_POST['accept'])){
    
    $sql4="UPDATE orders set status=1 where O_ID='$oid' ";
    $run4=mysqli_query($connect,$sql4);
    if($run4){
        ?>
        <script>
        alert("Order Accepted");
        </script><?php

    }else{?>
        <script>
        alert("Order Failed",<?php mysqli_error($connect);?>);
        </script><?php
    }
}


?>



     



<style>
    .t-total{
        color:white;
         
    font-weight: 300;
    font-family: sans-serif;
    font-size: 25px;
    }
    .action-order{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        background: rgb(0,0,0,0.6);
        
        padding: 40px;
        margin:20px;
        margin-bottom: 0px !important;
    }
    .action-order button{
        padding: 30px;
    font-size: 25px;
    font-weight: 900;
    font-family: ui-rounded;
    border: none;
    background: linear-gradient(15deg, #231414, #4b3131, #62543b);
    color: wheat;
    text-shadow: 0 0 10px black;
    box-shadow: 0px 0px 10px #332e2e;
    }
    .total{
        color:white;
        font-size: 35px;
        font-weight: 900;
        text-shadow: 0 0 10px black;
    }
    .seats-list{
        padding: 30px;
    }
    .seat:hover{
        color:wheat;
        background: linear-gradient(45deg, #6e1212, #794f0e, #c59139);
        transition: all 0.3s ease-in;
    }
    .seat{
        background: white;
        color: red;
        font-size: 25px;
        padding: 20px;
        font-weight: 500;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .seat-details{
        padding: 50px;
        background: black;
        color:red;
        margin: 20px;
        font-size: 30px;
    }
    .c_headng{
        display: flex;
        flex-direction: column;
        gap: 30px;
        color: yellow;
        font-size:25px;
    }
    .c-detail{
        display: flex;
        flex-direction: column;
        gap: 30px;
        font-size: 25px;
    }
    
    .order-container{
        background-color: rgb(0,0,0,0.8);
        padding: 30px;
        display: flex;
        
        margin: 20px;
        font-size: 20px;
        flex-direction: row;
        gap: 50px;
        color:wheat;
    }
    h1.h1-order{
        text-align: center;
        font-size: 40px;
    }
</style>


<script src="nav.js"></script>

  </body>
  </html>