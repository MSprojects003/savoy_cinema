<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="s_date.css">
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="verification.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php $mid=$_GET['mid'];
$TID;?>
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


<script>
    var btn1=document.getElementById("signin");
    btn1.addEventListener('click',function(){
       
    })
</script>
 
<div class="main">
 <div class="slider-container container3">
<div class="slide active" >
    <?php 
    include 'connection.php';
    $banner="SELECT * FROM movie_show where M_ID='$mid'";
    $ban_run=mysqli_query($connect,$banner);
    if(mysqli_num_rows($ban_run)){
        while($run_show=mysqli_fetch_array($ban_run)){
?>
  <div class="blur" style="background-image:url('thumbnail/<?php echo $run_show['thumbnail'];?>');  " ></div>
          <img src="thumbnail/<?php echo $run_show['thumbnail'];?>">
          <div class="about about1" >
          <div class="name mname"><?php echo $run_show['movie_name'];
          if($run_show['ua']=='A'){
            echo "(",$run_show['ua'],")";}?></div>
            <div class="mdetails">
                <span class="ua"><?php echo $run_show['ua'];?></span>.
                <span class="duration"><?php echo $run_show['duration'];?></span>.
                <span class="reldate1"><?php echo date("d M,Y",strtotime($run_show['reldate']));?></span>.
                <span class="language"><?php echo $run_show['language'];?></span>.
                <span class="genere"><?php echo $run_show['mgenere'];?></span>
            </div>
            <div class="mcast">
                <span class="mactor"><?php echo $run_show['mactor'];?></span>,
                <span class="mactress"><?php echo $run_show['mactress'];?></span>,
                <span class="mdirector"><?php echo $run_show['mdirector'];?></span>,
                <span class="mproducer"><?php echo $run_show['mproducer'];?></span>
            </div><?php
        }
    }


?>
      
               
          </div>
        </div></div>

<div class="caption">
    <h3>Showtimes</h3>
</div>

<?php   
include 'connection.php';
$did1;
$sql="SELECT * FROM movie_show ms inner join show_date sd on ms.M_ID=sd.mid where ms.M_ID='$mid'  order by date_id asc ";
$run=mysqli_query($connect,$sql);
if(mysqli_num_rows($run)){
   ?>
   <div class="dte"><?php
    while($show=mysqli_fetch_array($run)){



        $date=$show['date1'];
            $tday_date=strtotime(date("d-m-Y"));
           

            $date1=strtotime($date);
             $date_diferent= $tday_date- $date1;
               $days_deferent=  $date_diferent/ (60*60*24);
                if($days_deferent<=0){
                    
                    ?>
    <div class="dates"><?php

         ?><form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $show['date_id'];?>" name="did">
         <button id="date" name="ok"><span class="month"><?php echo date("M",strtotime($show['date1']));?>
        <span class="day"><?php echo date("d",strtotime($show['date1']));?></span></span></button> 
         </form>
         
         
    </div>
         <?php
         
          $did1=$show['date_id'];
    }else{
        
       
         
          $did1=NULL;
    }
}?></div><?php
}


?>

<div class="container" >
    <?php 
    if(isset($_POST['ok'])){
    $did=$_POST['did'];
    
    
    $sql2 = "SELECT * FROM show_time st INNER JOIN show_date sd ON st.did=sd.date_id WHERE st.did='$did'";
$run2=mysqli_query($connect,$sql2);
    if(mysqli_num_rows($run2)){

        $uniqueid=[];
        while($row=mysqli_fetch_array($run2)){
           
            $scrnIds = $row['scrn_ID'];
            if (in_array($scrnIds, $uniqueid)) {
            }else{
                $uniqueid[] = $scrnIds;
             } 
            $TID=$row['time_id'];
         
        }
        foreach($uniqueid as $SID){
            
           
            $sql5="SELECT * FROM screen where S_ID='$SID'";
            $run5=mysqli_query($connect,$sql5);
            if(mysqli_num_rows($run5)){
                while($row2=mysqli_fetch_array($run5)){
                    ?>
                    <h3 class="screen-name"><?php echo $row2['Scrn_name'];?></h3>
                    <?php
                }
            }



            $sql3="SELECT * from  show_time where scrn_ID='$SID' && did='$did'";
            $run3=mysqli_query($connect,$sql3);
            if(mysqli_num_rows($run3)){?>
                <div class="time-buttons"><?php
                while($show2=mysqli_fetch_array($run3)){?>
   
                <a href="seat.php?mid=<?php echo $mid;?>&&did=<?php echo $did;?>&&sid=<?php echo $SID;?>&&tid=<?php echo $show2['time_id'];?>"><button class="times"><?php $parts= explode(":",$show2['stime']);
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
                              echo $hour,":",$min," ",$period;?></button></a><?php
                    
                }?></div><?php
            }
            

        }
    }
    }else{
        if($did1==NULL){
            echo "NO DATES AVAILABLE";
        }else{

        
        $did=$did1;
        $sql2 = "SELECT * FROM show_date sd INNER JOIN show_time st ON sd.date_id=st.did WHERE sd.date_id='$did' order by date_id asc";
        $run2=mysqli_query($connect,$sql2);
            if(mysqli_num_rows($run2)){
        
                $uniqueid=[];
                while($row=mysqli_fetch_array($run2)){
                   
                    $scrnIds = $row['scrn_ID'];
                    if (in_array($scrnIds, $uniqueid)) {
                    }else{
                        $uniqueid[] = $scrnIds;
                     } 
                    
                 
                }
                foreach($uniqueid as $SID){
                    
                   
                    $sql5="SELECT * FROM screen where S_ID='$SID'";
                    $run5=mysqli_query($connect,$sql5);
                    if(mysqli_num_rows($run5)){
                        while($row2=mysqli_fetch_array($run5)){
                            ?>
                            <h3 class="screen-name"><?php echo $row2['Scrn_name'];?></h3>
                            <?php
                        }
                    }
        
        
        
                    $sql3="SELECT * from  show_time where scrn_ID='$SID' && did='$did'";
                    $run3=mysqli_query($connect,$sql3);
                    if(mysqli_num_rows($run3)){?>
                        <div class="time-buttons"><?php
                        while($show2=mysqli_fetch_array($run3)){
                            $tid=$show2['time_id'];
                            $scid=$show2['scrn_ID'];
                             
                            ?>
                        
                        
         
                        <a href="seat.php?mid=<?php echo $mid;?>&&tid=<?php echo $tid;?>&&sid=<?php echo $scid;?>&&did=<?php echo $did;?>"><button class="times"><?php $parts= explode(":",$show2['stime']);
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
                                      echo $hour,":",$min," ",$period;?></button></a><?php
                            
                        }?></div><?php
                    }
                    
        
                }
            }  

    }}

?></div>
</div>
</div>


 
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
