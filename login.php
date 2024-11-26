<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                <div class="text">
                    <p>Selamat datang di sistem gaji garmen <i>- ghinova</i></p>
                </div>                
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                    <header>Login</header>
                    <form method="POST" action="ceklogin.php">
                        <div class="input-field">
                            <input type="text" class="input" id="username" name="username" required autocomplete="off">
                            <label for="username">Username</label> 
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Login">
                        </div>
                        <div class="signin">
                            <span>Don't have an account? <a href="#">Sign up here</a></span>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
</body>
</html>
