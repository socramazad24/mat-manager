<?php

include ("../con_db.php");

$idPedido = $_GET['idPedido'];
$sentencia = $conex->prepare("SELECT * FROM pedidos WHERE idPedido=?");
$sentencia->bind_param("s",$idPedido);
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
        <h2>modificar pedidos</h2>
        <form action="updatePedidos.php" method="post">

            <input type="text"  name="idPedido" value="<?php echo $result["idPedido"] ?>" placeholder="id idPedido" >

            <select name="nameProveedor" id="nameProveedor" >
                    <option value="">elija proovedor</option>
                    <option value="cobre">cobre</option>
                    <option value="argo">argo</option>
                    <option value="megamex">megamex</option>
            </select>  

            <input type="text"  name="materiales" value="<?php echo $result["materiales"] ?>" placeholder="nombre del material" >

            <input type="number"  name="cantidad" value="<?php echo $result["cantidad"] ?>" placeholder="cantidad" >

            <input type="number"  name="costoUnitario" value="<?php echo $result["costoUnitario"] ?>" placeholder="costo Unitario" >            
                        
            <br><br>
            <input type="submit" name="register" value="guardar">
        </form>  
        
        
    </div>
   

    <?php include ("../templates/footer.php"); ?>