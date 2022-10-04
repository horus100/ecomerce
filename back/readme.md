# Back-end Ecomerce

## Estructura de directorio
* Carpeta Configuracion: 
  * base: En este archivo se desarrolla la logica MVC
  * BD: En este archivo se encuentra la funcion "Conectar con la BD"
  * config: En este archivo se encuentran las constantes del sistema. Ej: la url para todas redirecciones
  * loadControles: Funcion estandar de PHP
* Carpeta Modelos: Contiene los archivos controladores del Sistema
* Carpeta Modelos: Contiene los archivos modelos
  * Carpeta Main: Contiene la configuracion base de cada modelo.
* Archivo Core: Archivo index de la carpeta back-end

## URLs del Back-end
* Carrito
  * <?=url_index?>Carrito/index : Muestra la pagina carrito
  * <?=url_index?>Carrito/funcion: Funcion POST, para "agregar uno","eliminar uno" o "eliminar todos" los productos del carrito
  * <?=url_index?>Carrito/funcion
* Compra
  * <?=url_index?>Compra/index : Pagina principal de la compra, solo para usuarios logeados
  * <?=url_index?>Compra/ver_detalles : 
  * <?=url_index?>Compra/confirmar_compra : Muestra la pagina confirmar compra
  * <?=url_index?>Compra/registrar_compra : POST, Graba la compra para usuarios logeados
  * <?=url_index?>Compra/eliminar_compra : Elimina una compra para usuarios logeados
  * <?=url_index?>Compra/envio : Muestra la pagina para registrar envio
  * <?=url_index?>Compra/registrar_envio : POST, registra los datos de envio
* Error : Archivo simple para mostrar pagina no encontrada.
* General : Contiene funciones aisladas de ayuda en el back.
* Usuario
  * <?=url_index?>Usuario/index : Muestra la pagina de login
  * <?=url_index?>Usuario/registro : Muestra la pagina de registro
  * <?=url_index?>Usuario/registrar : Ejecuta el registro
  * <?=url_index?>Usuario/verificar : Ejecuta la verificacion del logeo
  * <?=url_index?>Usuario/cerrar_sesion : Cierra sesion de usuario
* Venta
  * <?=url_index?>Venta/index : Muestra todas la ventas realizadas en la tienda al Admin
  * <?=url_index?>Venta/ver_detalles : Muestra los detalles de una venta al admin
  * <?=url_index?>Venta/actualizar_estado_venta : Procesa la actualizacion del estado de una venta