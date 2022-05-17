<?php
    include '../function/loginAdminFunc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/styleIndex.css">
    <title>Login</title>
</head>
<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <form method="post" action="adminLogin.php?action=login">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Sign in</h3>

                        <div class="form-outline mb-4">
                        <input type="text" name="username" id="typeEmailX-2" class="form-control form-control-lg"  required/>
                        <label class="form-label" for="typeEmailX-2">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" required/>
                        <label class="form-label" for="typePasswordX-2">Password</label>
                        </div>

                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Login">
                        

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </section>
</body>
</html>