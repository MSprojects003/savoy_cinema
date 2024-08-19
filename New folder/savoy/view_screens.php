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

    
    </div>
    <div class="nav" style="background: linear-gradient(45deg, #24245f, #2b5091) !important;">
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
        <ul class="menu" id="ul" style=" background: linear-gradient(45deg, #24245f, #2b5091) !important;">
           
            <a href="paarking_order.php"><li >PARKING Bookings</li></a>
             
            <a href="feedback_list.php"><li>FEEDBACKS</li></a>
            
           
        
           
            
            
        </ul>
<br>
<br><br><br><br>
 <div class="link">
<a href="admin_dashboard.php" class="home">Home</a></div>
<div class="screens">
     <table border="1">
        <tr>
            <th>
                Screen ID
            </th>
            <th>
                Screen Name
            </th>
            <th>
                Screen Description
            </th>
        </tr>
        
     
        <?php 
include 'connection.php';
$sql="SELECT * FROM screen";
$run=mysqli_query($connect,$sql);
if(mysqli_num_rows($run)){
    while($row=mysqli_fetch_assoc($run)){
        ?><tr></tr>
        <td><?php echo $row['S_ID'];?></td>
        <td><?php echo $row['Scrn_name']; ?></td>
        <td><?php echo $row['S_description'];?></td>
        </tr>
        <?php
    }
}



?>
     </table>
</div>

<style>
    .link{
        margin: 30px;
    }
    a.home{
    box-shadow: 0 0 8px rgb(0,0,0,0.5);
    border-radius: 5px;
    background: linear-gradient(#46467a, #246fa8);
    padding: 15px 30px ;
    text-decoration: none;
    color: white;
   
     
    }
     .screens{
        display: flex;
        justify-content: center;
        margin:100px;
        
     }
    
</style>



 <script src="nav.js"></script>
 </body>
 </html>