<?php
    include("../principal/comun.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php head(); ?>
</head>
<body>

    <?php
       cargarHeader();
     ?>

     <div class="container" style="background:white;">
          <div class="" style="background:white;">

            <div class="container" style="margin-top:25px;">
                <div class="row col-xs-4">
                  <input class="form-control" type="text" placeholder="Ingrese rut/ nombre/ apodo">
                </div>
                <div class="row">
                  <button class="col-xs-1 btn btn-warning">Buscar</button>
                  <a href="./nuevoUsuario.php" class="col-xs-2 col-xs-offset-5 btn btn-success">Nuevo</a>
                </div>
            </div>


                  <table class="table table-bordered table-colapse">
                    <thead>
                      <th>Rut</th>
                      <th>DV</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Correo</th>
                      <th>Grado</th>
                      <th>Estado</th>
                      <th>Privilegios</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                    </thead>
                    <tbody>
                      <?php
                          require '../clases/Usuario.php';
                          $Usuario= new Usuario();
                          $filas= $Usuario->listarUsuario();

                          $contador=0;
                          foreach($filas as $columna){
                          $contador++;
                          echo '<tr>
                                    <td><input type="text" readonly class="form-control" id="txt_run'.$contador.'" value="'.$columna['run_funcionario'].'" ></td>
                                    <td><input type="text" readonly class="form-control" id="txt_dv'.$contador.'" value="'.$columna['dv'].'" ></td>
                                    <td><input type="text"readonly class="form-control"  id="txt_nombre'.$contador.'" value="'.$columna['nombre_funcionario'].'" ></td>
                                    <td><input type="text"readonly class="form-control"  id="txt_apellido'.$contador.'" value="'.$columna['apellido_funcionario'].'" ></td>
                                    <td><input type="text" readonly class="form-control" id="txt_correo'.$contador.'" value="'.$columna['correo'].'" ></td>
                                    <td><input type="text" readonly class="form-control" id="txt_grado'.$contador.'" value="'.$columna['descripcion_grado'].'" ></td>
                                    <td><input type="text" readonly class="form-control" id="txt_estado'.$contador.'" value="'.$columna['descripcion_estado'].'" ></td>
                                    <td><input type="text" readonly class="form-control" id="txt_tipo_usuario'.$contador.'" value="'.$columna['descripcion_tipo_usuario'].'" ></td>
                                    <td><button type="button"  onclick="mostrarModal('.$contador.')" data-toggle="modal" data-target="#ventanaModal" class="btn btn-warning">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                      </button>
                                    </td>
                                    <td>
                                      <a href="javascript:alert("ELIMINADA")" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                      </a>
                                    </td>
                                </tr>';
                         }
                      ?>
                      </tr>

                    </tbody>
                  </table>
              </div>

                <script>
                   function mostrarModal(fila){

                      $("#txt_run").val($("#txt_run"+fila).val());
                      $("#txt_nombre").val($("#txt_nombre"+fila).val());
                      $("#txt_apellido").val($("#txt_apellido"+fila).val());
                      $("#txt_correo").val($("#txt_correo"+fila).val());
                      $("#txt_run").val($("#txt_run"+fila).val());
                    }

                </script>

              <!-- Modal -->
              <div class="modal fade" id="ventanaModal" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div id="modbody" class="modal-body">

                      <form class="form-horizontal" name="formularioCreacion" id="formularioCreacion" action="">

                        <div class="form-group">
                              <label class="sr-only control-label col-lg-2" for="txt_run">Run</label>
                              <div class="col-lg-3">
                                <input  onBlur="validarRut();" required minlenght="12" title="Complete este campo" placeholder="Rut" class="form-control" id="txt_run" name="txt_run" type="text" >
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="sr-only control-label col-lg-2" for="txt_nombre">Nombres</label>
                              <div class="col-lg-3">
                                <input required title="Complete este campo" placeholder="Nombre" id="txt_nombre" name="txt_nombre" type="text" class="form-control">
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="sr-only control-label col-lg-2" for="txt_apellido">Apellidos</label>
                              <div class="col-lg-3">
                                <input required title="Complete este campo" placeholder="Apellido" id="txt_apellido" name="txt_apellido" type="text" class="form-control">
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="sr-only control-label col-lg-2" for="txt_correo">Correo</label>
                              <div class="col-lg-3">
                                <input required title="Complete este campo" placeholder="Correo" id="txt_correo" name="txt_correo" type="text" class="form-control">
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="sr-only control-label col-lg-2" for="select_tipoUsuario">Tipo Usuario</label>
                              <div class="col-lg-3">
                                <select id="select_tipoUsuario" class="form-control" name="select_tipoUsuario" id="">
                                    <?php
                                     require '../clases/TipoUsuario.php';
                                     $TipoUsuario= new TipoUsuario();
                                     $filas= $TipoUsuario->listarTipo();

                                     foreach ($filas as $columna) {
                                      echo"<option value=".$columna['id_tipo_usuario'].">".$columna['descripcion_tipo_usuario']."</option>";
                                     }
                                    ?>
                                </select>
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="sr-only control-label col-lg-2" for="select_grado">Grado Funcionario</label>
                              <div class="col-lg-3">
                                <select id="select_grado" class="form-control" name="select_grado" id="">
                                    <?php
                                    require '../clases/Grado.php';
                                    $Grados= new Grado();
                                    $filas= $Grados->listarGrados();


                                    foreach($filas as $columna){
                                    echo "<option value=".$columna['id_grado'].">".$columna['descripcion_grado']."</option>";
                                  }
                                     ?>
                                </select>
                              </div>
                        </div>

                        <div class="form-group">
                              <label class="sr-only control-label col-lg-2" for="select_grado">Tipo Usuario</label>
                              <div class="col-lg-3">
                                <select id="select_grado" class="form-control" name="select_grado" id="">
                                    <?php
                                    require '../clases/Grado.php';
                                    $Grados= new Grado();
                                    $filas= $Grados->listarGrados();


                                    foreach($filas as $columna){
                                    echo "<option value=".$columna['id_grado'].">".$columna['descripcion_grado']."</option>";
                                  }
                                     ?>
                                </select>
                              </div>
                        </div>
                        <div id="divClave" class="form-group">
                              <label class="sr-only control-label col-lg-2" for="txt_clave_actual">Contraseña</label>
                              <div class="col-lg-3">
                                <input required title="Complete este campo" placeholder="Contraseña Actual" id="txt_clave_actual" name="txt_clave_actual" type="password" class="form-control">
                              </div>
                        </div>

                        <div id="divClave1" class="form-group">
                              <label class="sr-only control-label col-lg-2" for="txt_clave1">Contraseña</label>
                              <div class="col-lg-3">
                                <input required title="Complete este campo" placeholder="Contraseña" id="txt_clave1" name="txt_clave1" type="password" class="form-control">
                              </div>
                        </div>

                          <div id="divClave2" class="form-group">
                              <label class="sr-only control-label col-lg-2" for="txt_clave2">Repita Contraseña</label>
                              <div class="col-lg-3">
                                <input required title="Complete este campo" placeholder="Confirme Contraseña" id="txt_clave2" name="txt_clave2" type="password" class="form-control">
                              </div>
                          </div>

                          <div  class="form-group">
                            <div class="col-lg-4 col-lg-offset-2">
                                <div id="mensaje" class=""></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-1">
                              <input required type="submit" onclick="crearUsuario()" class="btn btn-success pull-right" value="Guardar">
                            </div>
                          </div>
                        </form>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

  </div>
	</body>
</html>
