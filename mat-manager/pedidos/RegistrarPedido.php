<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <header>
        <h1>MAT-MANAGER</h1>        
    </header>
<div class="container">
        <h2>Registro de Materiales</h2>
        <form method="post">

            <input type="text"  name="idPedido" placeholder="id Pedido" >

            <select name="proovedor" id="proovedor" >
                    <option value="">elija proovedor</option>
                    <option value="cobre">cobre</option>
                    <option value="argo">argo</option>
                    <option value="megamex">megamex</option>
            </select>   

            <input type="text"  name="material" placeholder="material" >

            <input type="number"  name="cantidad" placeholder="cantidad" >            
            
            <input type="number"  name="costoUnitario" placeholder="costoUnitario" >                     
            
            <br><br>
            <input type="submit" name="register" value="registrar">
        </form>  
        <?php 
            include ("../con_db.php");

            if (isset($_POST['register'])){
                if (
                strlen($_POST['idPedido']) >= 1 &&
                strlen($_POST['proovedor']) >= 1 &&
                strlen($_POST['material']) >= 1 &&
                strlen($_POST['cantidad']) >= 1 &&
                strlen($_POST['costoUnitario']) >= 1
                 ) {
    
                    
                    $idPedido = trim($_POST['idPedido']);
                    $proovedor = trim($_POST['proovedor']);
                    $material = trim($_POST['material']);
                    $cantidad = trim($_POST['cantidad']);
                    $costoUnitario = trim($_POST['costoUnitario']);                    
                    $datereg = date("y/m/d");
                    $consulta = "INSERT INTO pedidos(`idPedido`, `nameProveedor`, `materiales`, `cantidad`, `costoUnitario`, `fecha_reg`) 
                    VALUES ('$idPedido ','$proovedor','$material','$cantidad','$costoUnitario','$datereg')";
                    $resultado = mysqli_query($conex, $consulta);
                        if ($resultado){
                            ?>
                            <h3 class="ok">se ha registrado exitosamente</h3>
                            <?php include ("../con_db.php");

                            $query = "SELECT * FROM users WHERE username = ? AND password = ?";
                            $stmt = $conex->prepare($query);
                            $stmt->bind_param("ss", $username, $password);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $registro =mysqli_fetch_assoc($result);
                            $rol = $registro['role'];

                            if ($result->num_rows == 1) {

                            if ($rol == 'administrador') {
                                header('Location: admin/index.php');
                                exit();
                            } elseif ($rol == 'gerente') {
                                header('Location: gerente/index.php');
                                exit();
                            } 
                            
                            }?>
                            <?php                             
                        } else {
                            ?>
                            <h3 class="bad">algo ha salido mal</h3>
                            <?php 
                        } 
                    
                }else {
                    ?>
                    <h3 class="bad">llene todos los campos</h3>
                    <?php 
                }
    
            }

        ?>
        
    </div>

    <?php 
        
    ?>
            
            

    <footer>
        &copy; 2023 MAT-MANAGER
    </footer>

</body>
</html>
</html>