   
           
            
        var searchbtn=document.querySelector(".search-btn");
        searchbtn.addEventListener('click',function(){
            var nav=document.querySelector(".search1");
            
                nav.classList.toggle("open-search1");
            
             
        });
        
        var i = document.querySelector(".fa-bars");
        var menu=document.getElementById("ul");
        var bar=document.getElementById("bar");
        bar.addEventListener('click',function(){
            menu.classList.toggle("open-ul");
            i.classList.toggle("fa-xmark");
            
        });

        

            function showSignInForm() {
                var signin_form = `
                    <span class="closeform1" id="closeform1">&times;</span>
                    <form class='form1' action="verification.php" method="post" enctype="multipart/form-data">
                        <span class="log"> Sign In </span>
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="paswd" placeholder="Password">
                        <button class='signin' name="login">Login</button>
                        <span class="cap1">New to Savoy? <span id="sign-up" class="sign-up-form">Sign up now</span></span>
                    </form>`;
                verify.innerHTML = signin_form;
                verify.style.display = "flex";
                verify.style.justifyContent="center";

                document.querySelector("#closeform1").addEventListener('click', function() {
                    verify.style.display = "none";
                });

                document.querySelector("#sign-up").addEventListener('click', function() {
                    showSignUpForm();
                });
            }

            function showSignUpForm() {
                var signup_form = `
                    <span class="closeform1" id="closeform1">&times;</span>
                    <form class='form1' action="verification.php" method="post" enctype="multipart/form-data">
                        <span class="log"> Sign Up </span>
                        <input type="text" name="fname" placeholder="Full Name" required>
                        <input type="email" name="u_email" placeholder="Email" required>
                        <input type="number" name="u_phone" placeholder="Phone Number" required>
                        <input type="password" name="u_password" id="password" placeholder="Password" required>
                        <input type="password" name="u_cpassword" id="cpassword" placeholder="Confirm Password" required>
                        <span class="incorrect-p"></span>
                        <button class='signin' name="signup">Sign Up</button>
                        <span class="cap1">Already have an Account? <span id="sign-in" class="sign-in-form">Sign In now</span></span>
                    </form>`;

                verify.innerHTML = signup_form;
                verify.style.display = "flex";
               var password=document.getElementById("password");
               var c_paassword=document.getElementById("cpassword");
              var incorrect_pasword=document.querySelector(".incorrect-p");
              var button_submit=document.querySelector(".signin");
              button_submit.addEventListener('click', function(event) {
                
                if (c_paassword.value === password.value) {
                    incorrect_pasword.style.display = "none";
                     
                } else {
                    event.preventDefault();
                    incorrect_pasword.textContent = "Password Doesn't Matched!";
                    incorrect_pasword.style.color = "red";
               
                }
            });
              
                document.querySelector("#closeform1").addEventListener('click', function() {
                    verify.style.display = "none";
                });

                document.querySelector("#sign-in").addEventListener('click', function() {
                    showSignInForm();
                });
            }
        var verify = document.querySelector("#verify");

   
  function login() {
    var signinButton = document.querySelector("#signin");
    
    signinButton.addEventListener('click', function() {
        showSignInForm();
    });
}

login();
        
        alertMsg();

         
         function alertMsg() {
            var alertMsg = localStorage.getItem('alertMsg');
            if (alertMsg) {
                alert(alertMsg);
                localStorage.removeItem('alertMsg');
            }
        }

        
        function alertM() {
            var alertm = localStorage.getItem('errorMsg');
            if (alertm) {
                
                showSignInForm();
                localStorage.removeItem('errorMsg');
            }
        }


         
        alertM();

     












