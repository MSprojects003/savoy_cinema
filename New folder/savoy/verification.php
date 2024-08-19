<?php   
session_start();

include 'connection.php';

if(isset($_POST['signup'])){
    $fname=$_POST['fname'];
    $email=$_POST['u_email'];
    $u_phone=$_POST['u_phone'];
    
    $u_password=password_hash($_POST['u_password'],PASSWORD_DEFAULT);
     
    $sql="INSERT into user_account(uname,u_email,u_phone,u_password)values('$fname','$email','$u_phone','$u_password')";
    $add=mysqli_query($connect,$sql);

    if ($add) {
        ?>
        <script>
             
           localStorage.setItem('alertMsg', 'You have Successfully Signed Up!');
            window.location.href = document.referrer;
        </script>
         
    

    <?php
}else{
    ?>
    <script>
             
             localStorage.setItem('alertMsg', 'Failed to Signed Up!');
              window.location.href = document.referrer;
          </script>
 
<?php
}}






if (isset($_POST['login'])) {
    $uname = $_POST['email'];
    $paswd = $_POST['paswd']; 
    $result = false;

    $sql2 = "SELECT * FROM user_account ";
    $run2 = mysqli_query($connect, $sql2);
    
    if (mysqli_num_rows($run2) > 0) {
        while ($show = mysqli_fetch_array($run2)) {
            
            if ($uname == $show['u_email'] && password_verify($paswd, $show['u_password'])) {
                $result = true;
                $_SESSION['signed']=true;
                $_SESSION['UID']=$show['U_ID'];
            }
        }
    }

    if ($result == true) {
        ?>
         <script>
             
             localStorage.setItem('alertMsg', 'You have Successfully Signed In!');
              window.location.href = document.referrer;
          </script><?php
    } else {
        ?>
         <script>
             
             localStorage.setItem('alertMsg', 'Incorrect Verification Details!');
              window.location.href = document.referrer;
          </script><?php
    }
}




?>

 