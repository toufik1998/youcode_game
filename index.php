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
    <link rel="stylesheet" href="./assets/parsley/parsley_css.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
            <div class="container-fluid" >
                <a class="navbar-brand " href="#">
                    <img src="assets/images/youcode-logo-transparent.png" alt="" style="width: 15%">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button class="">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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

        <div class="container-fluid mt-lg-4 header-content" >
            <div class="row">
                <div class="col-md-6">
                    <div class="header-img">
                        <img src="assets/images/undraw_virtual_reality_re_yg8i.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="registration-form">
                        <form action="scripts.php" method="POST" id="demo-form" data-parsley-validate="" data-parsley-trigger="keyup" enctype="multipart/form-data">
                            <img src="assets/images/youcode-logo-transparent.png" class="mb-3" alt="">
                            <div class="form-group">
                                <input type="text" name="first-name"  class="form-control item" id="first-name" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last-name"  class="form-control item" id="last-name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" data-parsley-type="email" class="form-control item" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" data-parsley-pattern="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/" class="form-control item" id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="uploadfile" class="form-control" id="admin-image" />
                            </div>
                            
                            <div class="form-group">
                                <button id="disable-btn" type="submit"   name="save" class="btn btn-block create-account">Create Account</button>
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
    <script src="./assets/parsley/jquery-3.6.1.min.js"></script>
    <script src="./assets/parsley/parsley.min.js"></script>
</body>
</html>