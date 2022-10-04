<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <ul>
        <li><a href="<?=url_index?>">Inicio</a></li>
        <li><a href="<?=url_index?>Producto/allProductos">Todos los productos</a></li>
        <li><a href="<?=url_index?>carrito/index">Carrito</a></li>
        
        <!--Solo carga estas opciones si esta logeado, sin importar el rol-->
        <?php if (GeneralControl::V_Sesion("usuario") || GeneralControl::V_Sesion("admin")) {
                if (GeneralControl::V_Sesion("usuario")) {
                    $nombre=$_SESSION['usuario']['Nombre'];
                } else {
                    $nombre=$_SESSION['admin']['Nombre'];
                }
                
            ?>

            <h1><?php echo "Hola ".$nombre; ?></h1>
            <li><a href="<?=url_index?>compra/index">Compras</a></li>            
            <li><a href="<?=url_index?>usuario/cerrar_sesion">cerrar sesion</a></li>
            
            <!--Carga opraciones solo para usuarios admin-->
            <?php 
                if(GeneralControl::V_Sesion("admin")){ ?>

            <li><a href="<?=url_index?>venta/index">ver ventas</a></li>            
            <li><a href="<?=url_index?>producto/crear_producto">crear producto</a></li>            
            <li><a href="<?=url_index?>producto/crear_Categoria">crear categoria</a></li>
 

            <?php  }
            
            ?>
        <!-- Si no se esta logeado se cargaran las opciones de login e inicio sesion-->
        <?php } else{?> 
            <li><a href="<?=url_index?>usuario/index">Login</a></li>
            <li><a href="<?=url_index?>usuario/registro">Registro</a></li>  
        <?php } ?>
    </ul>