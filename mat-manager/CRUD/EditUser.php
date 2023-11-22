<?php

include ("../con_db.php");

$idEmployee = $_GET['idEmployee'];
$sentencia = $conex->prepare("SELECT * FROM users WHERE idEmployee=?");
$sentencia->bind_param("s",$idEmployee);
$sentencia-> execute();
$resultado = $sentencia -> get_Result();
$result=$resultado->fetch_assoc();
if (!$result) {    
    echo '<script language="javascript">';
	echo 'alert("no hay resultados para ese id");';
	//echo 'window.location="../tables/TablaPedidos.php";';
	echo '</script>';
}
?>

<?php include ("../templates/header.php"); ?>

    <div class="container">
        <h2>modificar usuarios</h2>
        <form action="updateUser.php" method="post">

            <input type="text" name="idEmployee" value="<?php echo $result["idEmployee"] ?>" placeholder="id usuario">

            <input type="text"  name="firstName" value="<?php echo $result["firstName"] ?>" placeholder="firstName" >           

            <input type="text"  name="lastName" value="<?php echo $result["lastName"] ?>" placeholder="lastName" >

            <input type="text"  name="username" value="<?php echo $result["username"] ?>" placeholder="username" >

            <input type="text"  name="password" value="<?php echo $result["password"] ?>" placeholder="password" >      
            
            <input type="email"  name="email" value="<?php echo $result["email"] ?>" placeholder="email" >   

            <input type="number"  name="phone" value="<?php echo $result["phone"] ?>" placeholder="phone" >   

            <select name="role" id="role" >
                    <option value="">elija rol</option>
                    <option value="administrador">administrador</option>
                    <option value="gerente">gerente</option>
                    <option value="bodeguero">bodeguero</option>
            </select>               
            
            

            <br><br>
            <input type="submit" name="register" value="guardar">
        </form>  
        
        
    </div>
   

    <?php include ("../templates/footer.php"); ?>