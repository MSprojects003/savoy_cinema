<?php session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="s_date.css">
    <link rel="stylesheet" href="verification.css">
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="seat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
 <?php $mid=$_GET['mid'];
    $sid=$_GET['sid'];
    $tid=$_GET['tid'];
    $did=$_GET['did'];?>
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

<div class="slider-container container3">
<div class="slide active" >
    <?php 
    include 'connection.php';
    $price;
    $banner="SELECT * FROM movie_show where M_ID='$mid'";
    $ban_run=mysqli_query($connect,$banner);
    if(mysqli_num_rows($ban_run)){
        while($run_show=mysqli_fetch_array($ban_run)){
 
            $price=$run_show['tprice'];

?>
  <div class="blur" style="background-image:url('thumbnail/<?php echo $run_show['thumbnail'];?>');  " ></div>
          <img src="thumbnail/<?php echo $run_show['thumbnail'];?>">
          <div class="about about1">
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
        <div class="sdetails">
            <div class="available"><span></span>Available</div>
            <div class="selected"><span></span>Selected</div>
            <div class="unavailable"><span></span>Unavailable</div>
        </div>

        <div class="seat-container">
            <div class="price"  >
                <?php echo "ODC FULL (" ,$price,")";?>
            </div>
            <div class="seats">
            <div class="seatl" id="seatl">
                
                 
</div>
            <div class="seatr" id="seatr">
             
                
            </div>
        
       </div><div class="scrn"><div class="screen">
Screen
</div></div> 
            
            </div>
            
            </div>
            <div class="book-ticket" >
              
            <div class="book-actions">
                
            <span class="v-seat"><b></span>
            <div class="formget">
                    <span class="total"></span>

                    <form action="booking.php?tid=<?php echo $tid;?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="price" id="price" value=<?php echo $price;?>>
                        <input type="hidden" name="seats" id="seatsphp" >
                        <input type="hidden" name="quantity" id="quantity" >
                   
                    <button class="btn" name="book">Book Tickets</button>  
                   
                    </form></div>
            </div>
            </div>
<?php 

$bookedseats=[];


$sql2="SELECT * from orders o inner join tickets t on o.O_ID=t.OID where o.TimeID='$tid'";
$query2=mysqli_query($connect,$sql2);
if(mysqli_num_rows($query2)){
    while($show=mysqli_fetch_array($query2)){
           
         $bookedseats[]=$show['Seat_ID'];
    }
}



?>
  

  

            

 
        
 </div><script>
                

                var bokeds=<?php echo json_encode($bookedseats)?>;

                 
                var seatl=document.getElementById("seatl");
                var total=document.querySelector(".total");
                var b_ticket=document.querySelector(".book-actions");
var seatr=document.getElementById("seatr");
var v_seat=document.querySelector(".v-seat");
var selectedSeats = [];




// Populate seats on the left
for(var x=1; x<=29; x++){
    seatl.innerHTML += `<span class="seat" id="s${x}">${x}</span>`;
    
}

// Populate seats on the right
for(var i=30; i<=58; i++){
    seatr.innerHTML += `<span class="seat" id="s${i}">${i}</span>`;
}

bokeds.forEach(function(b_seat) {
        var seat = document.getElementById("s" + b_seat);
        if (seat) {
            seat.classList.add("disable");
        }
    });

// Event listener for seat selection
var seats = document.querySelectorAll(".seat");
    seats.forEach(function(seat) {
        seat.addEventListener('click', function() {
            if (!seat.classList.contains("disable")) {
                seat.classList.toggle("seat-selected");
                var seatNumber = seat.textContent;
                var index = selectedSeats.indexOf(seatNumber);
                if (index === -1) {
                    selectedSeats.push(seatNumber);
                } else {
                    selectedSeats.splice(index, 1);
                }

                v_seat.innerHTML = "";
                if (selectedSeats.length > 0) {
                    b_ticket.classList.add("open-book-t");
                } else {
                    b_ticket.classList.remove("open-book-t");
                }

                if (selectedSeats.length > 10) {
                    alert("You can't book more than 10 seats!");
                    selectedSeats.splice(selectedSeats.indexOf(seatNumber), 1);
                    seat.classList.remove("seat-selected");
                }

                selectedSeats.forEach(function(s_seat) {
                    var seatelement = document.createElement('span');
                    seatelement.className = 's-seat';
                    seatelement.textContent = s_seat;
                    var rs = "Rs.";
                    total.innerHTML = `<span class='rs'>${rs}</span>${selectedSeats.length * <?php echo number_format($price);?>}`;
                    var seatsphp = document.getElementById("seatsphp");
                    seatsphp.value = selectedSeats.join(",");
                    var quantity = document.getElementById("quantity");
                    quantity.value = selectedSeats.length;
                    v_seat.append(seatelement);
                });
            }
        });
    });
            </script>

             <style>
.disable{
    background: linear-gradient(to top, #535353, #535353, #535353, gray, gray) !important;
}
             </style>
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