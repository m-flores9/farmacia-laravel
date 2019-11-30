<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTAS PRODUCTOS
Route::get('/productos', 'ControladorProducto@home');
//RUTAS CRUD
Route::get('/insertarproducto', 'ControladorProducto@vista_insertar');

Route::post('/insertarproducto-c', 'ControladorProducto@insertar');

Route::get('/actualizarproducto/{id}', 'ControladorProducto@vista_actualizar');

Route::post('/actualizarproducto-c/{id}','ControladorProducto@actualizar');

Route::get('/borrarproducto/{id}', 'ControladorProducto@borrar_producto');

//RUTAS TIPO MEDICAMENTO
Route::get('/tipomedicamento', 'ControladorTipoMedicamento@home');
//RUTAS CRUD
Route::get('/insertartipomedicamento', 'ControladorTipoMedicamento@vista_insertar');

Route::post('/insertartipomedicamento-c', 'ControladorTipoMedicamento@insertar');

Route::get('/actualizartipomedicamento/{id}', 'ControladorTipoMedicamento@vista_actualizar');

Route::post('/actualizartipomedicamento-c/{id}','ControladorTipoMedicamento@actualizar');

Route::get('/borrartipomedicamento/{id}', 'ControladorTipoMedicamento@borrar');

//RUTAS CASA MEDICA
Route::get('/casamedica', 'ControladorCasaMedica@home');
//RUTAS CRUD
Route::get('/insertarcasamedica', 'ControladorCasaMedica@vista_insertar');

Route::post('/insertarcasamedica-c', 'ControladorCasaMedica@insertar');

Route::get('/actualizarcasamedica/{id}', 'ControladorCasaMedica@vista_actualizar');

Route::post('/actualizarcasamedica-c/{id}','ControladorCasaMedica@actualizar');

Route::get('/borrarcasamedica/{id}', 'ControladorCasaMedica@borrar');

//RUTAS PRESENTACION
Route::get('/presentacion', 'ControladorPresentacion@home');
//RUTAS CRUD
Route::get('/insertarpresentacion', 'ControladorPresentacion@vista_insertar');

Route::post('/insertarpresentacion-c', 'ControladorPresentacion@insertar');

Route::get('/actualizarpresentacion/{id}', 'ControladorPresentacion@vista_actualizar');

Route::post('/actualizarpresentacion-c/{id}','ControladorPresentacion@actualizar');

Route::get('/borrarpresentacion/{id}', 'ControladorPresentacion@borrar');

//RUTAS PRODUCTOS
Route::get('/proveedores', 'ControladorProveedores@home');
//RUTAS CRUD
Route::get('/insertarproveedor', 'ControladorProveedores@vista_insertar');

Route::post('/insertarproveedor-c', 'ControladorProveedores@insertar');

Route::get('/actualizarproveedor/{id}', 'ControladorProveedores@vista_actualizar');

Route::post('/actualizarproveedor-c/{id}','ControladorProveedores@actualizar');

Route::get('/borrarproveedor/{id}', 'ControladorProveedores@borrar');

//RUTAS VISITADORES
Route::get('/visitadores', 'ControladorVisitadores@home');
//RUTAS CRUD
Route::get('/insertarvisitador', 'ControladorVisitadores@vista_insertar');

Route::post('/insertarvisitador-c', 'ControladorVisitadores@insertar');

Route::get('/actualizarvisitador/{id}', 'ControladorVisitadores@vista_actualizar');

Route::post('/actualizarvisitador-c/{id}','ControladorVisitadores@actualizar');

Route::get('/borrarvisitador/{id}', 'ControladorVisitadores@borrar');

//RUTAS VISITADORES
Route::get('/usuarios', 'ControladorUsuarios@home');

//RUTAS CRUD
Route::get('/insertarusuario', 'ControladorUsuarios@vista_insertar');

Route::post('/insertarusuario-c', 'ControladorUsuarios@insertar');

Route::get('/borrarusuario/{id}', 'ControladorUsuarios@borrar');

//Otras Rutas
Route::get('/buscar', 'ControladorProducto@prod')->name('buscar');
Route::get('/buscar_compra', 'ControladorProducto@prod_compra')->name('buscar_compra');
Route::post('/vender', 'ControladorProducto@carrito');
Route::post('/comprar', 'ControladorProducto@carrito_compra');
Route::get('/borrar', 'ControladorProducto@borrar')->name('borrar');
Route::get('/borrar_compra', 'ControladorProducto@borrar_compra')->name('borrar_compra');
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/checkout_compra', function () {
    return view('checkout_compra');
});
Route::get('/grabar', 'ControladorProducto@grabar')->name('grabar');
Route::post('/grabar_compra', 'ControladorProducto@grabar_compra');
Route::get('/proveedor', 'ControladorProveedor@proveedores')->name('proveedor');
//Otras otras rutas
Route::get('/compras', 'ControladorAbono@compras')->name('compras');
Route::post('/abonar', 'ControladorAbono@grabar_abono');
Route::get('/diario', function () {
    return view('diario');
});
Route::get('/diario_compras', function () {
    return view('diario_compras');
});
Route::get('/fechas', function () {
    return view('fechas');
});
Route::post('/ventas_fechas', 'ControladorReportes@ventas_fechas');
Route::post('/compras_fechas', 'ControladorReportes@compras_fechas');
Route::post('/vencimientos', 'ControladorReportes@vencimientos');
Route::get('/acreedores', 'ControladorReportes@saldo_proveedores')->name('saldo_proveedores');
Route::get('/diario_abonos', 'ControladorReportes@historial_abonos')->name('historial_abonos');
