<?php

include('scripts.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/youcode-logo-transparent.png" alt="" style="width: 15%">
        </a>
        <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <header style="display: flex; justify-content: center; align-items: flex-end; ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-img">
                        <img src="assets/images/undraw_virtual_reality_re_yg8i.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="registration-form">
                        <form action="scripts.php" method="POST" id="signup-form">
                            <img src="assets/images/youcode-logo-transparent.png" class="mb-3" alt="">
                            <div class="form-group">
                                <input type="text" name="first-name" onblur="nameErr(this)" class="form-control item" id="first-name" placeholder="First Name" required>
                                <p id="name-err" class="text-danger fs-7 d-none"> please enter a valid user name</p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last-name" onblur="nameErr(this)" class="form-control item" id="last-name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" onblur="emailError(this)" class="form-control item" id="email" placeholder="Email" required>
                                 <p id="email-err" class="text-danger fs-7 d-none"> please enter a valid Email</p>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" onblur="passwordError(this)" class="form-control item" id="password" placeholder="Password" required>
                                <p id="password-err" class="text-danger fs-7 d-none"> please enter a valid Password</p>
                            </div>
                            
                            <div class="form-group">
                                <button id="disable-btn" type="submit"  disabled name="save" class="btn btn-block create-account">Create Account</button>
                                <button type="submit" name="already" class="btn btn-block create-account already-account ">                                
                                   <a href="log-in.php"> Sign In </a>
                                </button>

                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./assets/parsley_js/jquery-3.6.1.min.js"></script>
    <script src="./assets/parsley_js/parsley.min.js"></script>
    <script>

        let signupForm = document.getElementById("signup-form");
        let userName = document.getElementById("first-name");
        let lastName = document.getElementById("last-name");
        let email = document.getElementById("email");
        let password = document.getElementById("password");

        let nameError = document.getElementById("name-err");
        let errorEmail = document.getElementById("email-err");
        let errorPassword = document.getElementById("password-err");
        let disabledBtn = document.getElementById("disable-btn");
        let regexName = /^[aA0-zZ9\s]+$/;
        let regexEmail = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/;
        let regexPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        

        function nameErr(e) {
            console.log(e.value);
            if(!regexName.test(e.value) || e.value == ""){
                e.value = "";
                nameError.classList.remove("d-none");
                e.focus();
                console.log(nameError.classList);
            }else{
                if(regexName.test(userName.value) && regexName.test(lastName.value) && regexEmail.test(email.value) && regexPassword.test(password.value)){
                disabledBtn.removeAttribute("disabled");
                }
                nameError.classList.add("d-none");
            }

        }

        function emailError(e){
            if(!regexEmail.test(e.value) || e.value == ""){
                e.value = "";
                errorEmail.classList.remove("d-none");
                e.focus();
            }else{
                if(regexName.test(userName.value) && regexName.test(lastName.value) && regexEmail.test(email.value) && regexPassword.test(password.value)){
                disabledBtn.removeAttribute("disabled");
                }
                errorEmail.classList.add("d-none");
            }
        }

        function passwordError(e){
            if(!regexPassword.test(e.value) || e.value == ""){
                e.value = "";
                errorPassword.classList.remove("d-none");
                e.focus();
            }else{
                if(regexName.test(userName.value) && regexName.test(lastName.value) && regexEmail.test(email.   value) && regexPassword.test(password.value)){
                disabledBtn.removeAttribute("disabled");
                }
                errorPassword.classList.add("d-none");
            }
        }
    </script>
</body>
</html>