<?php 
session_start();

include 'connection.php';

if(isset($_POST['login'])){
    $uname=$_POST['uname'];
    $paswd=$_POST['paswd'];
    $result=false;
    $login="SELECT * FROM staff";
    $run1=mysqli_query($connect,$login);
    if(mysqli_num_rows($run1)){
        while($verify=mysqli_fetch_array($run1)){
            if($verify['st_uname'] && password_verify($paswd,$verify['st_password'])){
                $result=true;
            }
        }
        if($result==true){
            ?>
                <script>
                    alert("Your Succesfully Signed In");
                </script>
                <?php
                $_SESSION['staff']=true;
            }else{
                ?>
                <script>
                    alert("Sign in Failed");
                </script>
                <?php
        }
    }
}




if(isset($_SESSION['staff'])){
    ?>
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
             
            <a href="#"><li id="orders">ORDERS</li></a>
           
             
            <li class="man-screen" id="man-screen">View screen
             
           </li>
           
        
           
            
            
        </ul>
<br>
<br><br><br><br>
<div class="table1" id="table">
<table border="2" >
    <tr>
        <th>Movie_ID</th>
        <th>Movie Name</th>
        <th>Actor</th>
        <th>Actress</th>
        <th>director</th>
        <th>Producer</th>
    <th>genre</th>
    <th>duration</th>
    <th>thumbnail</th>
    <th>trailer</th>
    <th>U/A</th>
    <th>Language</th> 
     
    <th>released date</th>
    <th>Status</th>
    

    </tr>
    <?php
    include 'connection.php';
    $viewsql="SELECT * FROM movie_show";
    $run1=mysqli_query($connect,$viewsql);
    if(mysqli_num_rows($run1)){
        ?>
        <?php
        while($view=mysqli_fetch_array($run1)){
         ?><tr>
         <td>
            <?php echo $view['M_ID'];?>
         </td>
         <td>
            <?php echo $view['movie_name'];?>
         </td><td>
            <?php echo $view['mactor'];?>
         </td><td>
            <?php echo $view['mactress'];?>
         </td><td>
            <?php echo $view['mdirector'];?>
         </td><td>
            <?php echo $view['mproducer'];?>
         </td>
         <td>
            <?php echo $view['mgenere'];?>
         </td><td >
            <?php echo $view['duration'];?>
         </td>
         <td class="img1" >
             <img src="thumbnail/<?php echo $view['thumbnail'];?>" >
         </td><td  class="video">
            
            <?php echo $view['trailer'];?>
          
         </td>
         <td >
            
            <?php echo $view['ua'];?>
          
         </td>
         <td >
            
            <?php echo $view['language'];?>
          
         </td>
          
         <td >
            <?php echo $view['reldate'];?>
         </td>
         <td>
         <?php   
                    $fdate=strtotime(date("d-m-Y"));
                    $rdate=strtotime($view['reldate']);
                     $date_diferent= $fdate- $rdate;
                       $days_deferent=  $date_diferent/ (60*60*24);
                        
                       if($days_deferent<=0){
                       
                        echo -($days_deferent)," Days to Go";
                        echo "(Upcoming)";
                       }else{
                        echo "Released";
                        echo "<br>";
                        echo $days_deferent," day left";
                       }
                
                    ?></td> </tr> 
         <?php
        }
        
       
    }
    


?>
<style>
    .video iframe{
width: 150px;
height: 80px;
    }
   td.img1 img{
        width:60px;
        height: auto;
    }
</style>
</table>
</div>

<!-- orders-->

<div class="order-list">
    <div class="clse">&times;</div>
    <?php 
    
    include 'connection.php';

    $sql="SELECT * FROM orders";
    $query=mysqli_query($connect,$sql);
    if(mysqli_num_rows($query)){
        while($show=mysqli_fetch_array($query)){?>
            <div class="o-list"><a href="#">Order No.<?php echo $show['O_ID'];?></a></div><?php
        }
    }
    
    
    
    
    ?>
    
    
</div>



<script>
    var table=document.getElementById("table");
    var cls=document.querySelector(".clse");
  var v_orders=document.getElementById("orders");
  var ordr_list=document.querySelector(".order-list");
        v_orders.addEventListener('click',function(){
           
            ordr_list.style.display="flex";
            table.style.display="none";
        })
        cls.addEventListener('click',function(){
           ordr_list.style.display="none";
           table.style.display="flex";
        })

</script>

<script src="nav.js"></script>
</body></html>


<?php
}else{?>
    <div class="staff-login">
    <form action="" method="post" enctype="multipart/form-data" >
<h2>
    Staff Login
</h2>
    <input type="text" name="uname" id="" placeholder="User Name">
    <input type="text" name="paswd" id="" placeholder="Password">
    <button name="login">Login In</button>
    </form>
</div>

<style>
    .staff-login{
        display: flex;
        justify-content: center;
         
    }
    .staff-login form{
        display: flex;
        width: 30%;

        gap: 10px;
        flex-direction: column;
        padding: 30px;
        justify-content: center;
        background: linear-gradient(rgb(0,0,0,0.7),rgb(0,0,0,0.5));
    }
    .staff-login form input{
          border-radius: 4px;
          border: none;
          outline: none;
         padding: 10px;

    }
    .staff-login form button{
        padding: 10px;
        border: none;
        background: linear-gradient(45deg, #9a7b7b, #a17b7b);
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-weight:500;
         
        text-transform: uppercase;
        box-shadow: 0 0 5px rgb(0,0,0,0.7);
        margin: 20px;
        border-radius: 10px;
    }
</style>
    <?php
}



?>


<?php 


?>
