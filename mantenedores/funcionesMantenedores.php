<?php

switch($_REQUEST['mant']){

    case "1"://mantenedor usuario
            include "../clases/Usuario.php";
            $Usuario= new Usuario();

              switch($_REQUEST['func']){

                  case "1":// Ingresar / Modificar Usuario

                                $campoRut=$_REQUEST['txt_run'];
                                $posicionGuion= strpos($campoRut,"-");
                                $rut= substr($campoRut,0,$posicionGuion);
                                $dv= substr($campoRut,$posicionGuion+1,$posicionGuion+1);

                                $Usuario->setRun($rut);
                                $Usuario->setDv($dv);
                                $Usuario->setNombre($_REQUEST["txt_nombre"]);
                                $Usuario->setApellido($_REQUEST["txt_apellido"]);
                                $Usuario->setCorreo($_REQUEST["txt_correo"]);
                                $Usuario->setClave($_REQUEST["txt_clave1"]);
                                $Usuario->setGrado($_REQUEST["select_grado"]);
                                $Usuario->setEstado("1");
                                $Usuario->setTipo($_REQUEST["select_tipoUsuario"]);

                                $Usuario->insertarModificarUsuario();
                            break;
                  case "2"://Comprobar Rut
                                echo $Usuario->validarRut($_REQUEST['txt_run']);
                            break;
              }
             break;

    case "2"://mantenedor brigadas
            switch($_REQUEST['func']){
                  case "1"://ingresar brigada
                          break;
            }

}



?>
