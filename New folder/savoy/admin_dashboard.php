<?php 

session_start();

include 'connection.php';
// php script for signn admin

if(isset($_POST['a_login'])){

    $a_uname=$_POST['a_uname'];
    $a_paswd=$_POST['a_paswd'];
    $verification=false;
    $admin_login="SELECT * FROM admin ";
    $a_login_query=mysqli_query($connect,$admin_login);
    if(mysqli_num_rows($a_login_query)){
        while($a_verify=mysqli_fetch_array($a_login_query)){
            if($a_uname==$a_verify['A_unaame'] && password_verify($a_paswd,$a_verify['A_password'])){
                $verification=true;



            }

           
        }
        if($verification==true){
            $_SESSION['admin']=true;
            ?>
            <script>
                alert("Succesfully Signed In!");
            </script><?php
        }else{
            ?>
            <script>
                alert(" Signed In Failed!");
            </script><?php
        
        }
    }
}



if(!isset($_SESSION['admin']) || !$_SESSION['admin']){
?>
    <div class="admin-login">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Admin Signin</h2>
        <input type="text" name="a_uname" placeholder="User Name">
        <input type="text" name="a_paswd" placeholder="Password">
        <button name="a_login">Login</button>
        <span class="no-account">No Account? <span class="signup-open">Signup Here!</span></span>
    </form>
</div>

<div class="admin-signup">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Create Admin Account</h2>
        <input type="text" name="a_s_name" placeholder="Admin Name">
        <input type="text" name="a_s_uname" placeholder="User Name">
        <input type="text" name="a_s_paswd" id="a_paswd" placeholder="Password">
        <input type="text" name="a_c_paswd" id="a_c_paswd" placeholder="Confirm Password">
        <span class="err"></span>
        <button name="a_signup" id="signup_admin">Create</button>
        <span class="no-account">Already have an account? <span class="signin-open">Signin Here!</span></span>
    </form>
</div>


 <script>
    
    var a_signin_form = document.querySelector(".admin-login");
    var a_signin_open = document.querySelector(".signin-open");
    var a_signup_open = document.querySelector(".signup-open");

    var a_signup_form = document.querySelector(".admin-signup");

    function openSignin() {
        a_signup_form.style.display = "none";
        a_signin_form.style.display = "flex";
    }

    function openSignup() {
        a_signin_form.style.display = "none";
        a_signup_form.style.display = "flex";
    }

    a_signup_open.addEventListener('click', function () {
        openSignup();
    });

    a_signin_open.addEventListener('click', function () {
        openSignin();
    });
     var a_paswd=document.getElementById("a_paswd");
     var ac_paswd=document.getElementById("a_c_paswd");
     var sub_signup=document.getElementById("signup_admin");
     var a_s_err=document.querySelector(".err");

     sub_signup.addEventListener('click',function(event){
        if(a_paswd.value != ac_paswd.value){
           event.preventDefault();
           a_s_err.textContent="Password Doesnt Matched!";

        }
     })




    
 </script>
 <?php 
// php script for create admin account 
include 'connection.php';

if(isset($_POST['a_signup'])){
    $a_name =$_POST['a_s_name'];
    $a_uname = $_POST['a_s_uname'];
    $a_paswd = password_hash($_POST['a_s_paswd'], PASSWORD_DEFAULT);

    $a_create = "INSERT INTO admin (A_name, A_unaame, A_password) VALUES ('$a_name', '$a_uname', '$a_paswd')";
    $admin_query = mysqli_query($connect, $a_create);

    if($admin_query){
       ?><script>alert("Account Created for Admin");</script><?php
    } else {
        ?><script>alert("Error creating account. Please try again.");</script><?php
    }
}




}else{


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
    <div class="nav" style="background: linear-gradient(45deg, #24245f, #2b5091) !important;">
        <div class="img">
            <a href="index.php"> <img src="logo.png" alt=""></a>
        </div>
        <div class="search1" id="search1">
        <div class="search-bar" >
            <form action="admin_search.php" method="post" enctype="multipart/form-data" class="search">
                <input type="text" class="search-field" name="search_input" placeholder="Search movies...">
                <button name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div> </div>
        <div class="search-btn-container">
        <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button></div>

         <div class="bar" id="bar"> <i class="fa-solid fa-bars"></i></div> 
    </div>
        <ul class="menu" id="ul" style=" background: linear-gradient(45deg, #24245f, #2b5091) !important;">
            <a href="#" onclick="addm()"><li>ADD MOVIE SHOW</li></a>
            <a href="#"><li id="orders">ORDERS</li></a>
            <a href="paarking_order.php"><li >PARKING BOOKINGS</li></a>
            <a href="Feedback_list.php"><li >FEEDBACKS</li></a>
             
            <a href="#"><li id="create-stafff">CREATE STAFF</li></a>
            <li class="man-screen" id="man-screen">MANAGE SCREEN
            <ul class="man-scrn" id="manage-screen">

                <li id="add-scrn" name="clcike">Add Screen</li>
                <a href="view_screens.php"><li>View Screen</li></a>
            </ul>
           </li>
           
        
           
            
            
        </ul>
<br>
<br><br><br><br>
 
 <style>
    .menu li{
        padding: 20px !important;
    }
 </style>

<div class="dashboard-page" id="dashboard">
<!-- view manage availabke movies-->
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
    
    <th>Expired?</th>
    <th>Action</th>    

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
         <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="old_img" value="<?php echo htmlspecialchars($view['thumbnail']); ?>">
    <input type="hidden" name="img_mid" value="<?php echo htmlspecialchars($view['M_ID']); ?>">
    <button name="e_img">
        <img src="thumbnail/<?php echo htmlspecialchars($view['thumbnail']); ?>" alt="Thumbnail">
    </button>
</form>

             
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
                
                    ?></td>
                     
                    <td>
                        <?php 
                        if($view['expired']==0){
                            echo "No";
                        }else if($view['expired']==1){
                            echo "Yes";
                        }
                        
                        ?>
                    </td>
                <td><form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="hid" value="<?php echo $view['M_ID'];?>">
                    <button name="open-edit" id="edit-open">EDIT</button>
                </form>
                </td></tr> 
         <?php
        }
        
       
    }
    


?>

</table>

</div>

<?php 

if(isset($_POST['e_img'])){
    $imgmid=$_POST['img_mid'];
    $old_image=$_POST['old_img'];
     ?>

  <div class="edit-img-form">
    
    <form action="" class="img-form" method="post" enctype="multipart/form-data">
    <div class="close-img-form">&times;</div>
        <input type="hidden" name="imgmidd" id="" value="<?php echo $imgmid;?>">
        <input type="hidden" name="old" value="<?php echo $old_image;?>">
        <input type="file" name="edit_thumb_value">
        <button name="edit_thumbnail">Edit thumbnail</button>
    </form>
  </div>
  <script>
     var close_img_form=document.querySelector(".close-img-form");
              var edit_img_form=document.querySelector(".img-form");

              close_img_form.addEventListener('click',function(){
                edit_img_form.style.scale="0";
                edit_img_form.style.transition="0.3s";
              })
  </script>
<style>
     
    .close-img-form{
        font-size: 40px;
        font-weight: 800;
        transform: translate(-10px, -20px);

    }
    .edit-img-form form.img-form button{
        padding: 10px;
    border: none;
    border-radius: 5px;
    background: linear-gradient(45deg, #161c5e, #0f3a5e);
    color: white;
    box-shadow: 0 0 10px rgb(0, 0, 0, 0.4);
    }
    .edit-img-form{
        padding: 20px;
        display: flex;
        justify-content: center;
        transform: translate(10px, -290px);
    }
    .edit-img-form form.img-form{
        padding: 30px;
    background: linear-gradient(45deg, #7879b4, #4974a9);
    display: flex;
    flex-direction: column;
    gap: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgb(0, 0, 0, 0.5);
    
    }
</style>

<?php
}

if(isset($_POST['edit_thumbnail'])){
    $imgmidd=$_POST['imgmidd'];
    $old=$_POST['old'];
    $image_edit=$_FILES['edit_thumb_value']['name'];
    $e_tempname=$_FILES['edit_thumb_value']['tmp_name'];
    
    

    $update_image="UPDATE movie_show set thumbnail='$image_edit' where movie_show.M_ID='$imgmidd'";
    $img_updated_query=mysqli_query($connect,$update_image);
    if($img_updated_query){
        $path='thumbnail/';
        move_uploaded_file($e_tempname,$path.$image_edit);
        @unlink($path.$old);
        ?>
        <script>
            alert("Thumbnail Updated Succesful");
          
        </script><?php
         
    }else{
        ?>
        <script>
            alert("Thumbnail Updated failed");
        </script><?php
    }
}





?>
<?php 
if(isset($_POST['open-edit'])){
    $e_mid=$_POST['hid'];
    ?>
<div class="edit-form">
   <div class="close-edit-form">&times;</div>
    <form action="" method="post" enctype="multipart/form-data">
        <?php $editf="SELECT * FROM movie_show where M_ID='$e_mid'";
        $editf_run=mysqli_query($connect,$editf);
        if(mysqli_num_rows($editf_run)){
            while($editv=mysqli_fetch_array($editf_run)){
         ?>
         <input type="number" name="emid" value="<?php echo $editv['M_ID'];?>">
        <span>Movie Name : <input type="text" name="e_mname" value="<?php echo $editv['movie_name'];?>"required ></span>
        <span>Actor Name : <input type="text" name="e_mactor" value="<?php echo $editv['mactor'];?>" required></span>
        <span>Actress Name : <input type="text" name="e_mactress"   value="<?php echo $editv['mactress'];?>" required></span>
        <span>Director Name : <input type="text" name="e_mdirector"  value="<?php echo $editv['mdirector'];?>" required></span>
        <span>Producer Name : <input type="text" name="e_mproducer"  value="<?php echo $editv['mproducer'];?>" required></span>
        <span>Ticket Price : <input type="number" name="e_tprice"  value="<?php echo $editv['tprice'];?>" required></span>
        <span>Genere : <select name="e_mgenere"   required>
            <option value="Action" <?php if($editv['mgenere']=='Action') echo 'selected';?>>Action</option>
            <option value="Horror" <?php if($editv['mgenere']=='Horror') echo 'selected';?>>Horror</option>
            <option value="Romance" <?php if($editv['mgenere']=='Romance') echo 'selected';?>>Romance</option>
            <option value="Thriller" <?php if($editv['mgenere']=='Thriller') echo 'selected';?>>Thriller</option>
            <option value="Comedy" <?php if($editv['mgenere']=='Comedy') echo 'selected';?>>Comedy</option>
            <option value="Sci-Fy" <?php if($editv['mgenere']=='Sci-Fy') echo 'selected';?>>Sci-Fi</option>
            <option value="Fantasy" <?php if($editv['mgenere']=='Fantasy') echo 'selected';?>>Fantasy</option>
        </select><br>


        <span>Duration : <input type="text" name="e_duration" id="" value="<?php echo $editv['duration'];?>" required></span>
        <span>Language : 
        <select name="e_language" id="" required>
            <option value="English" <?php if($editv['language']=='English') echo 'selected' ?>>English</option>
            <option value="Tamil" <?php if($editv['language']=='Tamil') echo 'selected' ?>>Tamil</option>
            <option value="Telugu" <?php if($editv['language']=='telugu') echo 'selected' ?>>Telugu</option>
            <option value="Malayalam" <?php if($editv['language']=='Malayalam') echo 'selected' ?>>Malayalam</option>
            <option value="Kannada" <?php if($editv['language']=='Kannada') echo 'selected' ?>>Kannada</option>
            <option value="Hindi" <?php if($editv['language']=='Hindi') echo 'selected' ?>>Hindi</option>
            <option value="Chinese" <?php if($editv['language']=='Chinese') echo 'selected' ?>>Chinese</option>
        </select>
        </span>
        <br>
        <span>Synopsis : <input type="text" name="e_synopsis" id="" value="<?php echo $editv['synopsis']; ?>" required></span>
        <br>
        <span>Certified :<br><br>
        <span>U :
        <input type="radio" name="e_ua" id="" value="U" <?php echo ($editv['ua']=='U')? 'checked' : ''; ?> ></span>
        <span>U/A:
        <input type="radio" name="e_ua" id="" value="U/A" <?php echo ($editv['ua']=='U/A')? 'checked' : ''; ?>></span>
        <span>A :
        <input type="radio" name="e_ua" id="" value="A" <?php echo ($editv['ua']=='A')? 'checked' : ''; ?>></span>
        </span>
        <br><br>
<hr>
        
        <span>Trailer : <input type="text" name="e_trailer" id="" value="<?php echo htmlspecialchars($editv['trailer']);?>" required></span><br>
        <span>release date : <input type="date" name="e_release_date" id="" value=<?php echo htmlspecialchars(date('Y-m-d',strtotime($editv['reldate'])));?> required> </span>
        
        <span>Status : <input type="number" name="e_status" id="" value="<?php echo $editv['expired']; ?>" required></span>
        <br>
        <button name="edit">EDIT</button>
    </form>
    </div>
    <br>
    <?php
            }}
}


if(isset($_POST['edit'])){

    include 'connection.php';
   $emid=$_POST['emid'];
    $emname=$_POST['e_mname'];
    $e_actor=$_POST['e_mactor'];
    $e_mactress=$_POST['e_mactress'];
    $e_mdirector=$_POST['e_mdirector'];
    $e_mproducer=$_POST['e_mproducer'];
    $et_price=$_POST['e_tprice'];
    $emgenere=$_POST['e_mgenere'];
    $elanguage=$_POST['e_language'];
    $e_duration=$_POST['e_duration'];
    $e_synopsis=$_POST['e_synopsis'];
    $e_ua=$_POST['e_ua'];
    $e_trailer=$_POST['e_trailer'];
    
    $e_reldate=$_POST['e_release_date'];
    $e_expired=$_POST['e_status'];

    $update="UPDATE movie_show ms set movie_name='$emname', mactor='$e_actor', mactress='$e_mactress' ,mdirector='$e_mdirector', mproducer='$e_mproducer',
     tprice='$et_price', language='$elanguage', mgenere='$emgenere', trailer='$e_trailer', reldate='$e_reldate', duration='$e_duration', synopsis='$e_synopsis', ua='$e_ua', expired='$e_expired' where ms.M_ID='$emid'";
     $upadte_query=mysqli_query($connect,$update);
     if($upadte_query){
        ?>
        <script>
            alert("Movie Details Updated Succesfully");
        </script><?php
     }else{
        ?>
        <script>
            alert("Movie Details Updated Failed");
        </script><?php
     }

}


?>
<!------->
<style>
    .close-edit-form{
        font-weight: 900;
        font-size: 40px;
        cursor: pointer;
        transform: translate(-300px,-30px);
    }
    .edit-form button{
        background: linear-gradient(45deg, #432c90, #2a41ae);
    border: none;
    padding: 15px 70px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgb(0, 0, 0, 0.6);
    margin-top: 20px;
    text-align: center;
    margin: 20px;
    color: white;
    font-weight: 600;
    font-size: 20px;
}
    
    #edit-open{
        background: linear-gradient(45deg, #2f2f6ef0, #4e7ecf);
    padding: 10px 20px;
    border: none;
    color: white;
    font-weight: 900;
    box-shadow: 0 0 6px rgb(0, 0, 0, 0.7);
    margin: 10px;
    border-radius: 5px;
    }
    #edit-open:hover{
        background: linear-gradient(120deg, #2f2f6ef0, #4e7ecf);
        transition: all 0.3s ease-in;
    }
    
    .video iframe{
width: 150px;
height: 80px;
    }
   td.img1 img{
        width:60px;
        height: auto;
    }
    .edit-form{
        padding: 40px;
    background: linear-gradient(45deg, #aebdc3, #9a93a6fc, #a8a8b8);
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 100px;
    left: 200px;
    flex-direction: column;
    width: 50%;
    box-shadow: 0 0 10px black;
    border-radius: 10px;
    color: black;
    }
    .edit-form form{
        display: flex;
    flex-direction: column;
    width: 50%;
    gap: 10px;
    }
    .edit-form form input{
        width:100%;
    }
</style>
 

</div></div>

<!-- form for  add screen -->
<div class="conatiner1">

<div class="addscreen" id="addscreen1">
    

    <form action="" method="post" enctype="multipart/form-data">
    <h3>Add New Screen</h3>
    <br>
       <span>Screen Name : <input type="text" name="scrn-name" id=""></span>
       <span>Description : <textarea name="description1" id=""></textarea></span>
       <div class="buttonadnew" ><button class="addnew" name="addscrnnew">Add New Screen</button></div>
       
    </form>
</div></div>

<!--- orders lst-->


<div class="order-list">
    <div class="clse">&times;</div>
    <?php 
    
    include 'connection.php';

    $sql="SELECT * FROM orders";
    $query=mysqli_query($connect,$sql);
    if(mysqli_num_rows($query)){
        while($show=mysqli_fetch_array($query)){?>
            <div class="o-list"><a href="orders.php?iod=<?php echo $show['O_ID'];?>">Order No.<?php echo $show['O_ID'];?></a></div><?php
        }
    }
    
    
    
    
    ?>
    
    
</div>



 

<?php 

   include 'connection.php';

   if(isset($_POST['addscrnnew'])){
    $scrn_name=$_POST['scrn-name'];
    $desc=$_POST['description1'];

    $addscrn="INSERT INTO screen(Scrn_name,S_description)values('$scrn_name','$desc')";
    $screen_query1=mysqli_query($connect,$addscrn);

    if($screen_query1){
        ?>
        <script>
            document.write=alert("Screen Succesfully Added !");
        </script><?php
    }else{
        ?>
        <script>
            document.write=alert("Screen Succesfully Failed!");
        </script><?php
    }
   }



?>

 



 

 <div class="add-contain">
<div class="add-mov1" id="pop1">
<button id="back" >back</button>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="m-det" id="m-det">
        <span>Movie Name : <input type="text" name="mname" required ></span>
        <span>Actor Name : <input type="text" name="actor"  required></span>
        <span>Actress Name : <input type="text" name="actress"    required></span>
        <span>Director Name : <input type="text" name="director"   required></span>
        <span>Producer Name : <input type="text" name="producer"   required></span>
        <span>Ticket Price : <input type="number" name="tprice"   required></span>
        <span>Genere : <select name="mgenere"   required>
            <option value="Action">Action</option>
            <option value="Horror">Horror</option>
            <option value="Romance">Romance</option>
            <option value="Thriller">Thriller</option>
            <option value="Comedy">Comedy</option>
            <option value="Sci-Fy">Sci-Fi</option>
            <option value="Fantasy">Fantasy</option>
        </select><br>


        <span>Duration : <input type="text" name="duration" id="" required></span>
        <span>Language : 
        <select name="language" id="" required>
            <option value="English">English</option>
            <option value="Tamil">Tamil</option>
            <option value="Telugu">Telugu</option>
            <option value="Malayalam">Malayalam</option>
            <option value="Kannada">Kannada</option>
            <option value="Hindi">Hindi</option>
            <option value="Chinese">Chinese</option>
        </select>
        </span>
        <br>
        <span>Synopsis : <input type="text" name="synopsis" id="" required></span>
        <br>
        <span>Certified :<br><br>
        <span>U :
        <input type="radio" name="ua" id="" value="U" ></span>
        <span>U/A:
        <input type="radio" name="ua" id="" value="U/A" ></span>
        <span>A :
        <input type="radio" name="ua" id="" value="A" ></span>
        </span>
        <br><br>
<hr>
        <span>Thumbnail : <input type="file" name="thumbnail" id="" required></span>
        <span>Trailer : <input type="text" name="trailer" id="" required></span>
        <span>release date : <input type="date" name="release_date" id="" required> </span>
       
        <br>
        <br>
        <span>Date Count :
        <input type="number" name="" id="dnum" required> </span>
        <span> Time Count (Per day):
        <input type="number" name="" id="tnum" required></span>
        <br><br>
            <button id="ok">ok</button>
        </div>

       
        
        <div class="screening-det" id="screen-det" style="display:none;">
            
       <h3 id="h31">Screening Details</h3>
            
            <script>
                var submit=document.getElementById("add-mov");
                var dnum=document.getElementById("dnum");
                var tnum=document.getElementById("tnum");
                var back=document.getElementById("back");
                var ok=document.getElementById("ok");
                var h31=document.getElementById("h31");
                var screen_det=document.getElementById("screen-det");
                var m_det=document.getElementById("m-det");
                ok.addEventListener('click', function(event){
                    event.preventDefault();
                   
                    m_det.style.display="none";
                    screen_det.style.border="none";
                    screen_det.style.display="flex";
                    h31.scrollIntoView({ behavior: "smooth" });
                    var loop = "";
                    loop = `<div class="screening-det" id="screen-det" style="display:none;">`
            
                    loop=` <h3 id="h31">Screening Details</h3>`
                    for (var i = 1; i <= dnum.value; i++) {
                      loop += `<span style="color: red;">Day ${i}</span>`;
                      loop += `<span>Select date ${i}: <input type="date" name="date[]" id=""></span>`;

        
                      for (var x = 1; x <= tnum.value; x++) {
                          loop += `<span style="color: red;">Select the (${x}) Start Time: <input type="time" name="stimes[]" id="" value=""></span>`;
                          
                          loop += `<span>Select the Screen:<?php screenSelect();?></span>`;
                          }

         
                        
                    }

                       screen_det.innerHTML = loop;
                       back.style.display="block";
                       submit.style.display="block !important";
                      

                     
                });
                back.addEventListener('click', function(event1){
                     event1.preventDefault();
                     screen_det.style.display="none";
                     m_det.style.display="block";

              });
              var close_edit_form=document.querySelector(".close-edit-form");
              var edit_form=document.querySelector(".edit-form");
              

              close_edit_form.addEventListener('click',function(){
                edit_form.style.scale="0";
                edit_form.style.transition="0.3s";
              })

             

               
            </script>
           

            
             
        </div>
        <?php }?>
           
            
            <?php
         
         

         function screenSelect() {
            ?>
            <select name="screen[]" id=""><?php
            include 'connection.php';
            $sqln="SELECT * FROM screen";
            $run=mysqli_query($connect,$sqln);
            if(mysqli_num_rows($run)){
                while($s=mysqli_fetch_array($run)){
                    ?>
                    <option value=<?php echo $s['S_ID'];?>><?php echo $s['Scrn_name'];;?></option><?php
                }
            }

?>
</select>
<?php
         }
          
         ?>
         <button class="add-mov" name="addmov" id="add-mov" style="display:none;">Add Movie</button>
    <script>
        var okbtn=document.getElementById("ok");
        okbtn.addEventListener('click',function(){
            var btn1=document.getElementById("add-mov");
            btn1.style.display="block";
        })



    </script>
       

    </form>
</div>
 
</div>
 





<?php

if(isset($_POST['addmov'])){
    $mname=$_POST['mname'];
    $actor=$_POST['actor'];
    $actress=$_POST['actress'];
    $director=$_POST['director'];
    $producer=$_POST['producer'];
    $language=$_POST['language'];
    $duration=$_POST['duration'];
    $ua=$_POST['ua'];
    $synopsis=$_POST['synopsis'];
    $mgenere=$_POST['mgenere'];
    $stimes=$_POST['stimes'];
    $tprice=$_POST['tprice'];
    $dates=$_POST['date'];
    $trailer=$_POST['trailer'];
    $reldate=$_POST['release_date'];
    $screens=$_POST['screen'];
    $thumbnail=$_FILES['thumbnail']['name'];
    $temp=$_FILES['thumbnail']['tmp_name'];

    $path="thumbnail/";

    move_uploaded_file($temp,$path.$thumbnail);

    $sql="INSERT INTO movie_show(movie_name,mactor,mactress,mdirector,mproducer,tprice,language,mgenere,thumbnail,trailer,reldate,duration,synopsis,ua,expired)
        VALUES('$mname','$actor','$actress','$director','$producer','$tprice','$language','$mgenere','$thumbnail','$trailer','$reldate','$duration','$synopsis','$ua',0)";
    $query1=mysqli_query($connect,$sql);
    $MID=mysqli_insert_id($connect);

    if($query1){
         
        $sql2="INSERT INTO show_date(date1,mid) VALUES (?, ?)";
        $stmt1=mysqli_prepare($connect,$sql2);

        $timesPerDay = count($stimes) / count($dates); 

        foreach($dates as $dateIndex => $date){
            mysqli_stmt_bind_param($stmt1, "si", $date, $MID);
            $query2=mysqli_stmt_execute($stmt1);
            $did=mysqli_insert_id($connect);  

            if($query2){
                 
                $sql3="INSERT INTO show_time(stime,did,scrn_ID) VALUES (?, ?, ?)";
                $statement=mysqli_prepare($connect,$sql3);

                if (!$statement) {
                    echo "Error: ", mysqli_error($connect);
                }

                 
                $dayTimes = array_slice($stimes, $dateIndex * $timesPerDay, $timesPerDay);
                $dayScreens = array_slice($screens, $dateIndex * $timesPerDay, $timesPerDay);

                foreach($dayTimes as $index => $stime){
                    $screen= $dayScreens[$index];

                    mysqli_stmt_bind_param($statement, "sii", $stime, $did, $screen);
                    $query3=mysqli_stmt_execute($statement);

                    if($query3){
                        $result=true;
                    } else {
                        $result=false;
                        ?><script>
                            alert("Error: ", <?php echo mysqli_error($connect); ?>);// we can find what is the error
                        </script><?php
                    }
                }
            } else {
                ?><script>
                    alert("Error: ",<?php echo mysqli_error($connect); ?>);// here also we can what is the errror
                </script><?php
            }
        }

        if($result){
            ?><script>
                alert("Movie show Added Successfully");
            </script><?php
        } else {
            ?><script>
                alert("Error: ", <?php echo mysqli_error($connect); ?>);
            </script><?php
        }
    } else {
        ?><script>
            alert("Error: ",<?php echo mysqli_error($connect); ?>);
        </script><?php
    }
}
?>

<div class="staf-form">
    <form action="" method="post" enctype="multipart/form-data">
        <span class="st_head">Create Account</span>
        <span class="close2">&times;</span>
        
        <input type="text" name="s_name" id="" placeholder="Staff Name">
        <input type="text" name="s_uname" id="" placeholder="User name">
        <input type="password" name="s_paswd" id="st_paswd" placeholder="Password">
        <input type="password" name="confirm_s_paswd" id="st_c_paswd" placeholder="Confirm Password">
        <span class="s_error" ></span>
        <button name="create_account" id="cr_acc">create Account</button>
         
    </form>
    <script>

                var cr_acc=document.getElementById("cr_acc");
                var st_paswd=document.getElementById("st_paswd");
                var st_c_paswd=document.getElementById("st_c_paswd");
                var span_error =document.querySelector(".s_error");
                cr_acc.addEventListener('click',function(event){
                    if(st_c_paswd.value != st_paswd.value){
                       event.preventDefault();
                       span_error.textContent="Paasword Doesnt matched!";
                       span_error.style.color="red";
                    }else{
                        span.style.display="none";
                    }
                });
               

            </script>

    <?php

    if(isset($_POST['create_account'])){
        $fname=$_POST['s_name'];
        $uname=$_POST['s_uname'];
        $paswd=$_POST['s_paswd'];
        $c_paswd=$_POST['confirm_s_paswd'];

        
          

        $hash_paswd=password_hash($paswd,PASSWORD_DEFAULT);


        $create="INSERT INTO staff(st_name,st_uname,st_password)values('$fname','$uname','$hash_paswd')";
        $create_query=mysqli_query($connect,$create);

        if($create_query){
            ?>
            <script>
               alert("Staff Account Succesful !")
            </script>


            <?php
        }else{
            ?>
            <script>
               alert("Failed to Create Account!")
            </script>


            <?php
        }
    
}

    

?>

</div>

<style>
   .staf-form{
    display: none;
    align-items: center;
    justify-content: center;

   }
   span.close2{
    color: white;
    font-size: 30px;
    transform: translate(-10px, -80px);
   }
   input{
    background:none; 
    padding: 10px;
    border: none;
    color: white;
    outline: none;
    border-bottom: 1px solid white;
     
   }
   .staf-form form span.st_head{
    text-align: center;
    color: red;
    font-size: 25px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
   }
    .staf-form form{
        display: flex;
    flex-direction: column;
    gap: 10px;
    justify-content: center;
    background: linear-gradient(45deg, #24245f, #2b5091) !important;
    padding: 30px;
    width: 20%;
    }
    .staf-form form button{
        background: linear-gradient(45deg, #541717, #b42e2e);
    border: none;
    border-radius: 3px;
    padding: 10px;
    color: white;
    text-shadow: 0 0 10px black;
    }
</style>
<script>
   
  var table=document.getElementById("table");
  var addscreen1=document.getElementById("addscreen1");
  var dashboard=document.getElementById("dashboard");
  var addscreen=document.getElementById("add-scrn");
  addscreen.addEventListener('click',function(){
    addscreen1.style.display="flex";
    table.remove();

   
  })
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

        var cr_stafff=document.getElementById("create-stafff");
        var staf_form=document.querySelector(".staf-form");
        cr_stafff.addEventListener('click',function(){
              staf_form.style.display="flex";
              table.style.display="none";
        })
        var close2=document.querySelector(".close2");
        close2.addEventListener('click',function(){
            staf_form.style.display="none";
            table.style.display="flex";
        })

        

</script>


<script src="admin_dashboard.js"></script>
<script src="nav.js"></script>
</body>
</html>
<?php

    

 ?>
     <style>
        .admin-signup {
    display: none;
    margin: 100px;
    justify-content: center;
    align-items: center;
}

.admin-login {
    display: flex;
    margin: 100px;
    justify-content: center;
    align-items: center;
}

.admin-login form, .admin-signup form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 20px;
    align-items: center;
    padding: 40px;
    width: 30%;
    background: linear-gradient(45deg, white, silver);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
}

.no-account {
    color: red;
    font-weight: 500;
}

.signup-open, .signin-open {
    font-size: 20px;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
    color: rgba(0, 0, 0, 0.7);
    margin: 10px;
}

.signup-open:hover, .signin-open:hover {
    color: black;
    text-decoration: underline;
    transition: all 0.3s ease-in;
    cursor: pointer;
}

.admin-login form input, .admin-signup form input {
    padding: 5px;
    background: none;
    outline: none;
    font-size: 18px;
    border: none;
    border-bottom: 1px solid black;
    color: red;
}

.admin-login form button, .admin-signup form button {
    background: linear-gradient(45deg, #332f39, #79659c);
    padding: 10px;
    width: 80%;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
}

        
    </style>
<?php

?>











 