<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio de sesion - MAT-MANAGER</title>
    <link rel="stylesheet" href="styles/style.css">
</head> 
<body>
    <header>
        <h1>MAT-MANAGER</h1>
    </header>

    <div class="container">
        <h1>login de Usuario</h1>
        <form action="loginUser.php" method="post" >           

            <input type="text" name="username" placeholder="username" autocomplete="off">

            <input type="password" name="password" placeholder="password" autocomplete="off">
            
            <input type="submit" value="iniciar sesion">  <br> <br>        
            <a href="">olvidò su contraseña?</a> <br><br>
            
              
        </form>
        <div id="error-message" style="color: red;"></div>

       
    </div>
    <footer>
        &copy; 2023 MAT-MANAGER
    </footer>
</body>
</html>
