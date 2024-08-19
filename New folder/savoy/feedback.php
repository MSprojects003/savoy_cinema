<?php session_start(); 


if(isset($_POST['send'])){


    include 'connection.php';
    if(isset($_SESSION['signed'])|| $_SESSION['signed'] || isset($_SESSION['UID'])){
        $feedback=$_POST['feedback'];
        $fdate=date("Y-m-d");
        $uid=$_SESSION['UID'];
        $sql="INSERT INTO feedback(feedback,f_uid,f_date)values('$feedback','$uid','$fdate')";
        $query=mysqli_query($connect,$sql);
        if($query){
            ?>
            <script>alert("thank you For Your Feedback!");</script>
            <?php
        }else{
            ?>
            <script>alert("Failed to send Your Feedback!");</script>
            <?php
        }
        
    }else{
        ?>
        <script>alert("Please Login First !");</script>
        <?php
    }
    
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="moviebox.css">
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="verification.css">
    
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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



        <br><br><br><br><br>

        <div class="verification" id="verify"></div>
        <div class="head">
        <h2 class="heading1">Box Office and Booking Enquiries</h2>

        <h3 class="heading2">We confirm our film programme on the Monday of each week for that Friday through Thursday. Best thing to do is stay posted on our film listings page where you can check film times and book tickets online.</h3>
        
    <h3 class="heading2">Alternatively, you can call us on <span class="number">01233 555642</span> to book tickets.</h3>
     
        <h2 class="heading1">General Enquiries and Customer Service
</h2>
<h3 class="heading2">Uncertain of anything on our website? Would you like to find out further information? Before submitting your enquiry, check out our FAQs, as we might have already answered your question!</h3>
<h3 class="heading2">
Please fill in the form below to get in touch with the Everyman Customer Service Team.
</h3>   
<h3 class="heading2">Any details you provide on this form will be used to deal with your enquiry and to help us manage and improve our customer service experience. We may need to share your details with some third parties in order to respond to you, but they will also only use your information for this specific purpose. If you’d like to receive our newsletters and other marketing materials, you can sign up here. To see our full privacy policy, including more information about what we do with your data and how long we keep it, you can click here.</h3>
<br><br>
<hr>

<br><br><br><br>

<div class="cform">
<h2 class="heading1">
    Feedback
</h2>
 
 <div class="flex"> 

 <form action="" method="post" enctype="multipart/form-data" class="form">
    <textarea name="feedback" id="" cols="100" rows="20" placeholder="Write Your Feedback"></textarea>
    <button name="send">SEND</button>
 </form>

</div>


</div>

</div>


<div class="footer"> </div>


<style>
    .form textarea{
        background: linear-gradient(45deg, #332a2a, #140f0f);
    border: none;
    padding: 10px;
    color: white;
    box-shadow: 0 0 10px rgb(42 37 37 / 90%);
    border-radius: 5px;
    }
    .form{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .form button{
        padding: 14px;
    border-radius: 5px;
    border: none;
    margin: 10px;
    width: 30%;
    background: linear-gradient(45deg, #3b418c, #318290);
    font-size: 20px;
    font-weight: 600;
    }
    body{
        background-color: black
    }
    .flex{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
       
        
        
    }
    
    h2{
        text-align: center;
        margin: 10px;
        color:red;
    }
    .flex1{
        display: flex;
        justify-content: center;
        
    }
    .right::before{
        content: "";
        width: 10px;
        background: red;
    }
     
    .right form{
         
        width: 500px;
       display: flex;
         flex-direction: column;
    }

.right form input{
    padding: 10px;
    margin: 20px;
    box-shadow: 0 0 10px black;
    border: none;
    outline: none;
    border-radius: 5px;
    width: 100%;
    height: 100%;
}
.left form{
        max-width: 500px;
        width: 100%;
        
        display: flex;
         
        flex-direction: column;
    }

.left form input{
    padding: 10px;
    margin: 20px;
    box-shadow: 0 0 10px black;
    border: none;
    outline: none;
    border-radius: 5px;
}
@media(max-width:800px){
    .footer{
        width: auto !important;
    }
}
@media(max-width:600px){
    .footer{
        width: auto !important;
    }
    .head{
       
        
        margin-left: 50px !important;
    }
}
    h2.heading1{
        
        font-family:"Bungee Spice", sans-serif;
        font-weight: 100;
        font-size: 30px;
        
        
       
    }
    .number{
        color: white;
         
    }
    .head{
        margin-top: 50px;
        
        margin: 50px;
       
    }
    h3.heading2{
        margin-top: 30px;
        color: silver;
        text-align: left;
        margin-bottom: 50px;
        font-size: 20px;
        font-weight: 400px;
        font-style: italic;
        
    }
</style>









        <script src="nav.js"></script>
 
</body>
</html>


 
