<?php

use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\CanalController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\MiClaseController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// RUTAS DEL ADMINISTRADOR
Route::get('clases',[ClasesController::class,'mostrar'])->name('clases');
Route::get('RegistroMaestro',[MaestroController::class,'mostrar'] )->name('RegistroMaestro');
Route::post('RegistroMaestro',[MaestroController::class,'registrar'] )->name('RegistroMaestro');
Route::get('clase/{id}',[ClasesController::class,'verclase'])->name('clase');
Route::get('verAvisos/{id}',[ClasesController::class,'verAvisos'])->name('verAvisos');
Route::get('verMateriaMaestro/{id}',[ClasesController::class,'verMateriaMaestro'])->name('verMateriaMaestro');
Route::get('ConsultarMaestros', [ClasesController::class, 'ConsultarMaestros'])->name('ConsultarMaestros');

// RUTAS DEL ALUMNO
Route::get('Calificaciones', [CalificacionesController::class, 'mostrar'])->name('Calificaciones');
Route::get('Avisos',[CanalController::class,'mostrarAlumno'])->name('Avisos');
Route::get('SubirDocumentos',[DocumentosController::class,'mostrar'])->name('SubirDocumentos');
Route::post('SubirDocumentos',[DocumentosController::class,'subirDoc'])->name('SubirDocumentos');
Route::post('ActualizarDocumentos',[DocumentosController::class,'ActualizarDocumentos'])->name('ActualizarDocumentos');
Route::get('verDocument/{nombreDocument}', [DocumentosController::class, 'verDocument'])->name('verDocument');
Route::get('verTodosMateriales',[MaterialesController::class,'verTodosMateriales'])->name('verTodosMateriales');
Route::get('ConsultarMateriales/{nombreMaterial}', [MaterialesController::class, 'ConsultarMateriales'])->name('ConsultarMateriales');
Route::get('ConsultarTodosLosMateriales', [MaterialesController::class, 'ConsultarTodosLosMateriales'])->name('ConsultarTodosLosMateriales');


// RUTAS GET DEL MAESTRO
Route::get('MiClase',[MiClaseController::class,'mostrar'])->name('MiClase');
Route::get('RegistrarPadre',[PadreController::class,'PadreRegisterView'])->name('RegistrarPadre');
Route::post('RegistrarPadre',[PadreController::class,'PadreRegister'])->name('PadreRegister');
Route::get('Canal',[CanalController::class,'mostrar'])->name('Canal');
Route::post('AgregarAviso',[CanalController::class,'agregar'])->name('AgregarAviso');
Route::get('AgregarMaterias',[MateriasController::class,'mostrar'])->name('AgregarMaterias');
Route::post('AgregarMaterias', [MateriasController::class,'agregar'])->name('AgregarMaterias');
Route::post('editarmateria', [MateriasController::class,'actualizar'])->name('editarmateria');
Route::post('editarmaterial', [MaterialesController::class,'actualizarMaterial'])->name('editarmaterial');
Route::delete('/materias/{id}', [MateriasController::class, 'destroy'])->name('materias.destroy');
Route::get('CalificacionesMaestro',[CalificacionesController::class,'mostrarCalificacionesMaestro'])->name('CalificacionesMaestro');
Route::get('CalificacionesPorMateria/{id}',[CalificacionesController::class,'CalificacionesPorMateria'])->name('CalificacionesPorMateria');
Route::post('CalificacionesPorMateria/{id}',[CalificacionesController::class,'RegistrarCalificaciones'])->name('CalificacionesPorMateria');
Route::get('AgregarMateriales',[MaterialesController::class,'mostrar'])->name('AgregarMateriales');
Route::post('AgregarMateriales',[MaterialesController::class,'agregar'])->name('AgregarMateriales');
Route::get('verArchivo/{nombreArchivo}', [MaterialesController::class, 'verArchivo'])->name('verArchivo');
Route::get('ConsultarDocumentos',[MiClaseController::class,'ConsultarDocumentos'])->name('ConsultarDocumentos');
Route::get('/ConsultarDocumentosTotales',[MiClaseController::class,'ConsutarDocumentosTotales'])->name('ConsultarDocumentosTotales');
Route::get('/ConsultarDocumentosValidados',[MiClaseController::class,'ConsultarDocumentosValidados'])->name('ConsultarDocumentosValidados');
Route::get('/ConsultarDocumentosRechazados',[MiClaseController::class,'ConsultarDocumentosRechazados'])->name('ConsultarDocumentosRechazados');
Route::get('/ConsultarDocumentosPendientes',[MiClaseController::class,'ConsultarDocumentosPendientes'])->name('ConsultarDocumentosPendientes');
Route::get('verDocumentMaestro/{nombreDocument}', [DocumentosController::class, 'verDocument'])->name('verDocument');
Route::get('/validarDocumentos/{item}', [MiClaseController::class, 'validarDocumentos'])->name('validarDocumentos');
Route::get('/rechazarDocumentos/{item}', [MiClaseController::class, 'rechazarDocumentos'])->name('rechazarDocumentos');
Route::get('/ConsultarDocumentosPorNombreYApellido/{nombre?}/{apaterno?}/{amaterno?}', [MiClaseController::class, 'ConsultarDocumentosPorNombreYApellido'])->name('ConsultarDocumentosPorNombreYApellido');
Route::delete('/materiales/{id}', [MaterialesController::class, 'eliminarMaterial'])->name('materiales.eliminar');
Route::get('ConsultarMaterialesMaestro/{nombreMaterial}', [MaterialesController::class, 'ConsultarMaterialesMaestro'])->name('ConsultarMaterialesMaestro');
Route::get('ConsultarTodosLosMaterialesMaestro', [MaterialesController::class, 'ConsultarTodosLosMaterialesMaestro'])->name('ConsultarTodosLosMaterialesMaestro');
Route::get('/buscar-calificaciones/{materiaId}', [CalificacionesController::class, 'buscarCalificaciones'])->name('buscar.calificaciones');
// <a href="/validarDocumentos/${item.documents[i].id}" class="btn btn-success">Validar</a>
//                                 <a class="block" href="/rechazarDocumentos/${item.documents[i].id}" class="btn btn-danger">Rechazar</a></td>`;



Route::post('/test-subida', function () {
    dd('entra al post');
});


require __DIR__.'/auth.php';
