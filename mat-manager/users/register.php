<?php include ("../templates/header.php"); ?>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form method="post">

            <input type="text"  name="idEmployee" placeholder="idEmployee" >

            <input type="text"  name="firstName" placeholder="firstName" >

            <input type="text"  name="lastName" placeholder="lastName" >

            <input type="text"  name="username" placeholder="username" >

            <input type="password"  name="password" placeholder="password" >
            
            <input type="email"  name="email" placeholder="email" >

            <input type="text"  name="phone" placeholder="phone" >           
            
            <select name="role" id="role" >
                    <option value="">elija rol</option>
                    <option value="administrador">administrador</option>
                    <option value="gerente">gerente</option>
                    <option value="bodeguero">bodeguero</option>
            </select>
            <br><br>
            <input type="submit" name="register" >
        </form>
        <?php 
        include("../con_db.php");

        if (isset($_POST['register'])){
            if (
                strlen($_POST['idEmployee']) >= 1 &&
            strlen($_POST['firstName']) >= 1 &&
            strlen($_POST['lastName']) >= 1 &&
            strlen($_POST['username']) >= 1 &&
            strlen($_POST['password']) >= 1 &&
            strlen($_POST['email']) >= 1 &&
            strlen($_POST['phone']) >= 1 &&
            strlen($_POST['role']) >= 1  ) {

                $idEmployee = trim($_POST['idEmployee']);
                $firstName = trim($_POST['firstName']);
                $lastName = trim($_POST['lastName']);
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $email = trim($_POST['email']);
                $phone = trim($_POST['phone']);
                $role = trim($_POST['role']);
                $datereg = date("y/m/d");
                $consultaUser = "SELECT * FROM users WHERE username = '$username'";
                $resultadoUser = mysqli_query($conex, $consultaUser);

                if (mysqli_num_rows($resultadoUser) > 0) {
                    // El usuario ya existe, muestra un mensaje de error
                    echo "El usuario ya existe. Por favor, elige otro nombre de usuario.";
                } else {
                    // El usuario no existe, puedes proceder con el registro          
                    
                    $consulta = "INSERT INTO users(idEmployee,firstName, lastName, username, password, email, phone, role, date_reg) 
                    VALUES ('$idEmployee','$firstName','$lastName','$username','$password','$email','$phone','$role','$datereg')";
                    $resultado = mysqli_query($conex, $consulta);
                    if ($resultado){
                        ?>
                        <h3 class="ok">te has registrado exitosamente</h3>
                        <?php 
                    } else {
                        ?>
                        <h3 class="bad">algo ha salido mal</h3>
                        <?php 
                    } 
                }

                
            }else {
                ?>
                <h3 class="bad">llene todos los campos</h3>
                <?php 
            }

        }    
        mysqli_close($conex);
?> 
    
    </div>
    
    <?php include ("../templates/footer.php"); ?>