<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .kotaktengah{
            width: auto;
            height: auto;
            background-color: white;
            border: 1px solid blue;
        }
        .formsaya{
            width: 400px;
            height: 250px;
            background-color: purple;
        }
        body{
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #17a2b8;
        }
        .login{
            width: 360px;
            height: min-content;
            padding: 20px;
            border-radius: 12px;
            background: white;
        }

        .login h1{
            font-size: 36px;
            margin-bottom: 25px;
        }

        .login form {
            font-size: 20px;
        }

        .login form .form-group {
            margin-bottom: 12px;
        }

        .login form input[type="submit"] {
            font-size: 20px;
            margin-top: 15px;
        }
        
    </style>
</head>
<body>
    <div class="login">
        <h1 class="text-center">Welcome Home !</h1>
        <form class="needs-validation">
            <div class="form-group was-validated">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" id="email" required>
                <div class="invalid-feedback">
                    Masukkan Email anda.
                </div>
            </div>

            <div class="form-group was-validated">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" required>
                <div class="invalid-feedback">
                    Masukkan password anda.
                </div>
            </div>

            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" id="check">
                <label class="form-check-label" for="check">Remember Me</label>
            </div>

            <input class="btn btn-success w-100" type="submit" value="Login">
        </form>    
    </div>
</body>
</html>