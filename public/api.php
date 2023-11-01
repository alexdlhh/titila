<?php
session_start();
require_once 'modeloDB.php';
require_once 'repository/usuariosRepository.php';
require_once 'repository/visitantesRepository.php';
require_once 'repository/mediaRepository.php';
require_once 'repository/notificaionesRepository.php';

$table = !empty($_POST['table']) ? $_POST['table'] : '';
$option = !empty($_POST['option']) ? $_POST['option'] : '';

if(empty($table) && !empty($_GET['table'])){
    $table = $_GET['table'];
}
if(empty($option) && !empty($_GET['option'])){
    $option = $_GET['option'];
}

switch($table){
    case 'visitantes':
        $visitantesRepository = new visitantesRepository();
        switch($option){
            case 'get':
                check_session();
                $id = !empty($_GET['id']) ? $_GET['id'] : 0;
                $result = $visitantesRepository->get($id);
                break;
            case 'csv':
                echo 'test';
                check_session();
                $id = 0;
                $result = $visitantesRepository->get($id);
                //generamos un csv y lo descargamos
                $filename = 'generate/visitantes.csv';
                $delimiter = ";";
                $f = fopen('php://memory', 'w');
                $fields = array('ID', 'Nombre', 'Apellido', 'DNI', 'Correo', 'Telefono', 'Direccion', 'Sexo', 'Fecha', 'Hora', 'Observaciones', 'Nombre_2', 'Apellido_2', 'DNI_2', 'Correo_2', 'Telefono_2', 'Direccion_2', 'Sexo_2', 'Fecha_2', 'Hora_2', 'Observaciones_2', 'Nombre_3', 'Apellido_3', 'DNI_3', 'Correo_3', 'Telefono_3', 'Direccion_3', 'Sexo_3', 'Fecha_3', 'Hora_3', 'Observaciones_3', 'Evento', 'Lugar', 'Secuencia');
                fputcsv($f, $fields, $delimiter);
                foreach ($result['visitantes'] as $key => $value) {
                    $lineData = array($value['visitantes']['id'], $value['visitantes']['nombre'], $value['visitantes']['apellido'], $value['visitantes']['dni'], $value['visitantes']['correo'], $value['visitantes']['telefono'], $value['visitantes']['direccion'], $value['visitantes']['sexo'], $value['visitantes']['fecha'], $value['visitantes']['hora'], $value['visitantes']['observaciones'], $value['visitantes']['nombre_2'], $value['visitantes']['apellido_2'], $value['visitantes']['dni_2'], $value['visitantes']['correo_2'], $value['visitantes']['telefono_2'], $value['visitantes']['direccion_2'], $value['visitantes']['sexo_2'], $value['visitantes']['fecha_2'], $value['visitantes']['hora_2'], $value['visitantes']['observaciones_2'], $value['visitantes']['nombre_3'], $value['visitantes']['apellido_3'], $value['visitantes']['dni_3'], $value['visitantes']['correo_3'], $value['visitantes']['telefono_3'], $value['visitantes']['direccion_3'], $value['visitantes']['sexo_3'], $value['visitantes']['fecha_3'], $value['visitantes']['hora_3'], $value['visitantes']['observaciones_3'], $value['visitantes']['evento'], $value['visitantes']['lugar'], $value['visitantes']['secuencia']);
                    fputcsv($f, $lineData, $delimiter);
                }
                fseek($f, 0);
                header('Content-Type: text/csv');
                header('Content-Disposition: attachment; filename="' . $filename . '";');
                fpassthru($f);
                exit; 
                break;
            case 'insert':
                check_session();
                $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';                    
                $apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : '';                    
                $correo = !empty($_POST['correo']) ? $_POST['correo'] : '';                    
                $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : '';                    
                $direccion = !empty($_POST['direccion']) ? $_POST['direccion'] : '';                    
                $sexo = !empty($_POST['sexo']) ? $_POST['sexo'] : '';                    
                $fecha = !empty($_POST['fecha']) ? $_POST['fecha'] : '';                    
                $hora = !empty($_POST['hora']) ? $_POST['hora'] : '';
                $observaciones = !empty($_POST['observaciones']) ? $_POST['observaciones'] : '';
                $dni = !empty($_POST['dni']) ? $_POST['dni'] : '';
                $nombre_2 = !empty($_POST['nombre_2']) ? $_POST['nombre_2'] : '';                    
                $apellido_2 = !empty($_POST['apellido_2']) ? $_POST['apellido_2'] : '';                    
                $correo_2 = !empty($_POST['correo_2']) ? $_POST['correo_2'] : '';                    
                $telefono_2 = !empty($_POST['telefono_2']) ? $_POST['telefono_2'] : '';                    
                $direccion_2 = !empty($_POST['direccion_2']) ? $_POST['direccion_2'] : '';                    
                $sexo_2 = !empty($_POST['sexo_2']) ? $_POST['sexo_2'] : '';                    
                $fecha_2 = !empty($_POST['fecha_2']) ? $_POST['fecha_2'] : '';                    
                $hora_2 = !empty($_POST['hora_2']) ? $_POST['hora_2'] : '';
                $observaciones_2 = !empty($_POST['observaciones_2']) ? $_POST['observaciones_2'] : '';
                $dni_2 = !empty($_POST['dni_2']) ? $_POST['dni_2'] : '';
                $nombre_3 = !empty($_POST['nombre_3']) ? $_POST['nombre_3'] : '';                    
                $apellido_3 = !empty($_POST['apellido_3']) ? $_POST['apellido_3'] : '';                    
                $correo_3 = !empty($_POST['correo_3']) ? $_POST['correo_3'] : '';                    
                $telefono_3 = !empty($_POST['telefono_3']) ? $_POST['telefono_3'] : '';                    
                $direccion_3 = !empty($_POST['direccion_3']) ? $_POST['direccion_3'] : '';                    
                $sexo_3 = !empty($_POST['sexo_3']) ? $_POST['sexo_3'] : '';                    
                $fecha_3 = !empty($_POST['fecha_3']) ? $_POST['fecha_3'] : '';                    
                $hora_3 = !empty($_POST['hora_3']) ? $_POST['hora_3'] : '';
                $observaciones_3 = !empty($_POST['observaciones_3']) ? $_POST['observaciones_3'] : '';
                $dni_3 = !empty($_POST['dni_3']) ? $_POST['dni_3'] : '';
                $evento = !empty($_COOKIE['evento'])?$_COOKIE['evento']:'';
                $lugar = !empty($_COOKIE['lugar'])?$_COOKIE['lugar']:'';
                $secuencia = $visitantesRepository->get_next_secuence($evento, $lugar);
                $data = (object) array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'direccion' => $direccion,
                    'sexo' => $sexo,
                    'fecha' => $fecha,
                    'hora' => $hora,
                    'observaciones' => $observaciones,
                    'dni' => $dni,
                    'nombre_2' => $nombre_2,
                    'apellido_2' => $apellido_2,
                    'correo_2' => $correo_2,
                    'telefono_2' => $telefono_2,
                    'direccion_2' => $direccion_2,
                    'sexo_2' => $sexo_2,
                    'fecha_2' => $fecha_2,
                    'hora_2' => $hora_2,
                    'observaciones_2' => $observaciones_2,
                    'dni_2' => $dni_2,
                    'nombre_3' => $nombre_3,
                    'apellido_3' => $apellido_3,
                    'correo_3' => $correo_3,
                    'telefono_3' => $telefono_3,
                    'direccion_3' => $direccion_3,
                    'sexo_3' => $sexo_3,
                    'fecha_3' => $fecha_3,
                    'hora_3' => $hora_3,
                    'observaciones_3' => $observaciones_3,
                    'dni_3' => $dni_3,
                    'lugar' => $lugar,
                    'evento' => $evento,
                    'secuencia' => $secuencia
                );
                $id = $visitantesRepository->insert($data);
                $result = array(
                    'status' => 'success',
                    'message' => 'Visitor created successfully.',
                    'id' => $id
                );
                break;
            case 'update':
                check_session();
                $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';                    
                $apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : '';                    
                $correo = !empty($_POST['correo']) ? $_POST['correo'] : '';                    
                $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : '';                    
                $direccion = !empty($_POST['direccion']) ? $_POST['direccion'] : '';                    
                $sexo = !empty($_POST['sexo']) ? $_POST['sexo'] : '';                    
                $fecha = !empty($_POST['fecha']) ? $_POST['fecha'] : '';                    
                $hora = !empty($_POST['hora']) ? $_POST['hora'] : '';
                $observaciones = !empty($_POST['observaciones']) ? $_POST['observaciones'] : '';
                $dni = !empty($_POST['dni']) ? $_POST['dni'] : '';
                $nombre_2 = !empty($_POST['nombre_2']) ? $_POST['nombre_2'] : '';                    
                $apellido_2 = !empty($_POST['apellido_2']) ? $_POST['apellido_2'] : '';                    
                $correo_2 = !empty($_POST['correo_2']) ? $_POST['correo_2'] : '';                    
                $telefono_2 = !empty($_POST['telefono_2']) ? $_POST['telefono_2'] : '';                    
                $direccion_2 = !empty($_POST['direccion_2']) ? $_POST['direccion_2'] : '';                    
                $sexo_2 = !empty($_POST['sexo_2']) ? $_POST['sexo_2'] : '';                    
                $fecha_2 = !empty($_POST['fecha_2']) ? $_POST['fecha_2'] : '';                    
                $hora_2 = !empty($_POST['hora_2']) ? $_POST['hora_2'] : '';
                $observaciones_2 = !empty($_POST['observaciones_2']) ? $_POST['observaciones_2'] : '';
                $dni_2 = !empty($_POST['dni_2']) ? $_POST['dni_2'] : '';
                $nombre_3 = !empty($_POST['nombre_3']) ? $_POST['nombre_3'] : '';                    
                $apellido_3 = !empty($_POST['apellido_3']) ? $_POST['apellido_3'] : '';                    
                $correo_3 = !empty($_POST['correo_3']) ? $_POST['correo_3'] : '';                    
                $telefono_3 = !empty($_POST['telefono_3']) ? $_POST['telefono_3'] : '';                    
                $direccion_3 = !empty($_POST['direccion_3']) ? $_POST['direccion_3'] : '';                    
                $sexo_3 = !empty($_POST['sexo_3']) ? $_POST['sexo_3'] : '';                    
                $fecha_3 = !empty($_POST['fecha_3']) ? $_POST['fecha_3'] : '';                    
                $hora_3 = !empty($_POST['hora_3']) ? $_POST['hora_3'] : '';
                $observaciones_3 = !empty($_POST['observaciones_3']) ? $_POST['observaciones_3'] : '';
                $dni_3 = !empty($_POST['dni_3']) ? $_POST['dni_3'] : '';
                $id = !empty($_POST['id']) ? $_POST['id'] : 0;
                $data = (object) array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'direccion' => $direccion,
                    'sexo' => $sexo,
                    'fecha' => $fecha,
                    'hora' => $hora,
                    'observaciones' => $observaciones,
                    'dni' => $dni,
                    'nombre_2' => $nombre_2,
                    'apellido_2' => $apellido_2,
                    'correo_2' => $correo_2,
                    'telefono_2' => $telefono_2,
                    'direccion_2' => $direccion_2,
                    'sexo_2' => $sexo_2,
                    'fecha_2' => $fecha_2,
                    'hora_2' => $hora_2,
                    'observaciones_2' => $observaciones_2,
                    'dni_2' => $dni_2,
                    'nombre_3' => $nombre_3,
                    'apellido_3' => $apellido_3,
                    'correo_3' => $correo_3,
                    'telefono_3' => $telefono_3,
                    'direccion_3' => $direccion_3,
                    'sexo_3' => $sexo_3,
                    'fecha_3' => $fecha_3,
                    'hora_3' => $hora_3,
                    'observaciones_3' => $observaciones_3,
                    'dni_3' => $dni_3,
                    'lugar' => $lugar,
                    'evento' => $evento,
                    'secuencia' => $secuencia,
                    'id' => $id
                );
                $status = $visitantesRepository->update($data);
                if($status){
                    $result = array(
                        'status' => 'success',
                        'message' => 'Visitor updated successfully.'
                    );
                }else{
                    $result = array(
                        'status' => 'error',
                        'message' => 'Visitor not updated.',
                        'error' => $status
                    );
                }
                break;
            case 'delete':
                check_session();
                $id = !empty($_POST['id']) ? $_POST['id'] : 0;
                $status = $visitantesRepository->delete($id);
                $result = array(
                    'status' => 'success',
                    'message' => 'Visitor deleted successfully.'
                );
                break;
            default:
                $result = array(
                    'status' => 'error',
                    'message' => 'Invalid option.'
                );
                break;
        }
        break;
    case 'usuarios':
        $usuariosRepository = new usuariosRepository();
        switch($option){
            case 'get':
                check_session();
                $id = !empty($_GET['id']) ? $_GET['id'] : 0;
                $result = $usuariosRepository->get($id);
                break;
            case 'insert':
                check_session();
                $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
                $apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : '';
                $correo = !empty($_POST['correo']) ? $_POST['correo'] : '';
                $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : '';
                $password = !empty($_POST['password']) ? $_POST['password'] : '';
                $rol = !empty($_POST['rol']) ? $_POST['rol'] : '';
                $data = (object) array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'password' => $password,
                    'rol' => $rol
                );
                $status = $usuariosRepository->insert($data);
                if($status){
                    $result = array(
                        'status' => 'success',
                        'message' => 'User created successfully.'
                    );
                }else{
                    $result = array(
                        'status' => 'error',
                        'message' => 'User not created.'
                    );
                }
                break;
            case 'update':
                check_session();
                $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
                $apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : '';
                $correo = !empty($_POST['correo']) ? $_POST['correo'] : '';
                $telefono = !empty($_POST['telefono']) ? $_POST['telefono'] : '';
                $password = !empty($_POST['password']) ? $_POST['password'] : '';
                $rol = !empty($_POST['rol']) ? $_POST['rol'] : '';
                $id = !empty($_POST['id']) ? $_POST['id'] : 0;
                $data = (object) array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'password' => $password,
                    'rol' => $rol,
                    'id' => $id
                );
                $status = $usuariosRepository->update($data);
                if($status){
                    $result = array(
                        'status' => 'success',
                        'message' => 'User updated successfully.'
                    );
                }else{
                    $result = array(
                        'status' => 'error',
                        'message' => 'User not updated.'
                    );
                }                    
                break;
            case 'delete':
                check_session();
                $id = !empty($_POST['id']) ? $_POST['id'] : 0;
                $status = $usuariosRepository->delete($id);
                if($status){
                    $result = array(
                        'status' => 'success',
                        'message' => 'User deleted successfully.'
                    );
                }else{
                    $result = array(
                        'status' => 'error',
                        'message' => 'User not deleted.'
                    );
                }
                break;
            case 'login':
                $username = !empty($_POST['username']) ? $_POST['username'] : '';
                $password = !empty($_POST['password']) ? $_POST['password'] : '';
                $data = (object) array(
                    'username' => $username,
                    'password' => $password
                );
                $result = $usuariosRepository->login($data);
                if(!empty($result)){
                    setcookie('user_id', $result[0]['id'], time() + (86400 * 30), "/");
                    $_COOKIE['user_id'] = $result[0]['id'];
                    setcookie('user_data', base64_encode(json_encode($result[0]['nombre'])), time() + (86400 * 30), "/");
                    $_COOKIE['user_data'] = base64_encode(json_encode($result[0]['nombre']));
                    setcookie('user_rol', $result[0]['rol'], time() + (86400 * 30), "/");
                    $_COOKIE['user_rol'] = $result[0]['rol'];
                    setcookie('evento',$_POST['evento'], time() + (86400 * 30), "/");
                    $_COOKIE['evento'] = $_POST['evento'];
                    setcookie('lugar',$_POST['day'], time() + (86400 * 30), "/");
                    $_COOKIE['lugar'] = $_POST['day'];
                    $result = array(
                        'status' => 'success',
                        'message' => 'User logged successfully.'
                    );
                }else{
                    $result = array(
                        'status' => 'error',
                        'message' => 'Invalid credentials, User not logged.'
                    );
                }
                break;
            default:
                $result = array(
                    'status' => 'error',
                    'message' => 'Invalid option.'
                );
                break;
        }
        break;
    case 'media':
        $mediaRepository = new mediaRepository();
        switch($option){
            case 'get':
                check_session();
                $id = !empty($_GET['id']) ? $_GET['id'] : 0;
                $result = $mediaRepository->get($id);
                break;
            case 'insert':
                check_session();
                $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
                $tipo = !empty($_POST['tipo']) ? $_POST['tipo'] : 'foto';
                $visitante = !empty($_POST['id']) ? $_POST['id'] : 0;
                $url = '';
                $url_2 = '';
                $url_3 = '';
                //subimos el archivo
                if($tipo == 'foto'){
					$file='';
                    //$_POST['file'] es una imagen en base64, la convertimos a imagen y la guardamos
                    /*$img = $_POST['file'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = 'generate/'.$tipo.'/'.date('Ymdhsi').'-1-'.$visitante.'.png';
                    $success = file_put_contents($file, $data);
                    $url = $file;*/
					$img = $_POST['file'];
					$base64Data = substr($img, strpos($img, ",") + 1); // Elimina el prefijo 'data:image/...;base64,'

					// Obtén el tipo de imagen desde la cadena base64
					$imageType = '';
					if (preg_match('/^data:image\/(\w+);base64,/', $img, $typeMatch)) {
						$imageType = $typeMatch[1];
					}

					// Verifica que el tipo de imagen sea válido
					if ($imageType !== '') {
						// Decodifica la cadena base64
						$data = base64_decode($base64Data);

						// Genera un nombre de archivo único
						$file = 'generate/' . $tipo . '/' . date('Ymdhsi') . '-1-' . $visitante . '.' . $imageType;

						// Guarda el archivo
						$success = file_put_contents($file, $data);
					}
					
					$url = $file;

                }elseif($tipo == 'firmas'){
                    //$_POST['file'] es una imagen en base64, la convertimos a imagen y la guardamos
                    $img = $_POST['file'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = 'generate/'.$tipo.'/'.date('Ymdhsi').'-1-'.$visitante.'.png';
                    $success = file_put_contents($file, $data);
                    $url = $file;
                }elseif($tipo == 'video'){
                    if(!empty($_FILES['file']['name'])){
                        $target_dir = "generate/".$tipo.'/';
                        $target_file = $target_dir .date('Ymdhsi').'-'.$visitante.'-'. basename($_FILES["file"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if file already exists
                        if (file_exists($target_file)) {
                            $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            $result = array(
                                'status' => 'error',
                                'message' => 'File not uploaded.'
                            );
                        // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                                $url = $target_file;
                            } else {
                                $result = array(
                                    'status' => 'error',
                                    'message' => 'File not uploaded.'
                                );
                            }
                        }                        
                    }
                }

                if($tipo == 'foto'){
                    //$_POST['file'] es una imagen en base64, la convertimos a imagen y la guardamos
                    /*$img = $_POST['file_2'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = 'generate/'.$tipo.'/'.date('Ymdhsi').'-2-'.$visitante.'.png';
                    $success = file_put_contents($file, $data);
                    $url_2 = $file;*/
					$file='';
                    //$_POST['file'] es una imagen en base64, la convertimos a imagen y la guardamos
                    /*$img = $_POST['file'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = 'generate/'.$tipo.'/'.date('Ymdhsi').'-1-'.$visitante.'.png';
                    $success = file_put_contents($file, $data);
                    $url = $file;*/
					$img = $_POST['file_2'];
					$base64Data = substr($img, strpos($img, ",") + 1); // Elimina el prefijo 'data:image/...;base64,'

					// Obtén el tipo de imagen desde la cadena base64
					$imageType = '';
					if (preg_match('/^data:image\/(\w+);base64,/', $img, $typeMatch)) {
						$imageType = $typeMatch[1];
					}

					// Verifica que el tipo de imagen sea válido
					if ($imageType !== '') {
						// Decodifica la cadena base64
						$data = base64_decode($base64Data);

						// Genera un nombre de archivo único
						$file = 'generate/' . $tipo . '/' . date('Ymdhsi') . '-2-' . $visitante . '.' . $imageType;

						// Guarda el archivo
						$success = file_put_contents($file, $data);
					}
					
					$url_2 = $file;
                }elseif($tipo == 'firmas'){
                    //$_POST['file'] es una imagen en base64, la convertimos a imagen y la guardamos
                    $img = $_POST['file_2'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = 'generate/'.$tipo.'/'.date('Ymdhsi').'-2-'.$visitante.'.png';
                    $success = file_put_contents($file, $data);
                    $url_2 = $file;
                }

                if($tipo == 'foto'){
                    //$_POST['file'] es una imagen en base64, la convertimos a imagen y la guardamos
                    /*$img = $_POST['file_3'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = 'generate/'.$tipo.'/'.date('Ymdhsi').'-3-'.$visitante.'.png';
                    $success = file_put_contents($file, $data);
                    $url_3 = $file;*/
					$file='';
                    //$_POST['file'] es una imagen en base64, la convertimos a imagen y la guardamos
                    /*$img = $_POST['file'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = 'generate/'.$tipo.'/'.date('Ymdhsi').'-1-'.$visitante.'.png';
                    $success = file_put_contents($file, $data);
                    $url = $file;*/
					$img = $_POST['file_3'];
					$base64Data = substr($img, strpos($img, ",") + 1); // Elimina el prefijo 'data:image/...;base64,'

					// Obtén el tipo de imagen desde la cadena base64
					$imageType = '';
					if (preg_match('/^data:image\/(\w+);base64,/', $img, $typeMatch)) {
						$imageType = $typeMatch[1];
					}

					// Verifica que el tipo de imagen sea válido
					if ($imageType !== '') {
						// Decodifica la cadena base64
						$data = base64_decode($base64Data);

						// Genera un nombre de archivo único
						$file = 'generate/' . $tipo . '/' . date('Ymdhsi') . '-3-' . $visitante . '.' . $imageType;

						// Guarda el archivo
						$success = file_put_contents($file, $data);
					}
					
					$url_3 = $file;
                }elseif($tipo == 'firmas'){
                    //$_POST['file'] es una imagen en base64, la convertimos a imagen y la guardamos
                    $img = $_POST['file_3'];
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $file = 'generate/'.$tipo.'/'.date('Ymdhsi').'-3-'.$visitante.'.png';
                    $success = file_put_contents($file, $data);
                    $url_3 = $file;
                }

                $data = (object) array(
                    'nombre' => $nombre,
                    'tipo' => $tipo,
                    'url' => $url,
                    'id_visitante' => $visitante,
                );
                $data_2 = (object) array(
                    'nombre' => $nombre,
                    'tipo' => $tipo,
                    'url' => $url_2,
                    'id_visitante' => $visitante,
                );
                $data_3 = (object) array(
                    'nombre' => $nombre,
                    'tipo' => $tipo,
                    'url' => $url_3,
                    'id_visitante' => $visitante,
                );
                $id = $mediaRepository->insert($data);
                $id_2 = $mediaRepository->insert($data_2);
                $id_3 = $mediaRepository->insert($data_3);
                $result = array(
                    'status' => 'success',
                    'message' => 'Media created successfully.',
                    'id' => $id,
                    'id_2' => $id_2,
                    'id_3' => $id_3
                );
                break;
            case 'update':
                check_session();
                $id = !empty($_POST['id']) ? $_POST['id'] : 0;
                $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : '';
                $tipo = !empty($_POST['tipo']) ? $_POST['tipo'] : 'foto';
                $visitante = !empty($_POST['visitante']) ? $_POST['visitante'] : 0;
                $url = '';
                //subimos el archivo
                if(!empty($_FILES['file']['name'])){
                    $target_dir = "generate/".$tipo.'/';
                    $target_file = $target_dir .date('Ymdhsi').'-'.$visitante.'-'. basename($_FILES["file"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["file"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $uploadOk = 0;
                    }
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        $uploadOk = 0;
                    }
                    // Check file size
                    if ($_FILES["file"]["size"] > 5000000) {
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        $result = array(
                            'status' => 'error',
                            'message' => 'File not uploaded.'
                        );
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                            $url = $target_file;
                        } else {
                            $result = array(
                                'status' => 'error',
                                'message' => 'File not uploaded.'
                            );
                        }
                    }
                }
                $data = (object) array(
                    'nombre' => $nombre,
                    'tipo' => $tipo,
                    'url' => $url,
                    'id' => $id
                );
                $status = $mediaRepository->update($data);
                if($status){
                    $result = array(
                        'status' => 'success',
                        'message' => 'Media updated successfully.'
                    );
                }else{
                    $result = array(
                        'status' => 'error',
                        'message' => 'Media not updated.'
                    );
                }
                break;
            case 'delete':
                check_session();
                $id = !empty($_POST['id']) ? $_POST['id'] : 0;
                $media = $mediaRepository->get($id);
                $status = $mediaRepository->delete($id);
                unlink($media[0]['url']);
                if($status){
                    $result = array(
                        'status' => 'success',
                        'message' => 'Media deleted successfully.'
                    );
                }else{
                    $result = array(
                        'status' => 'error',
                        'message' => 'Media not deleted.'
                    );
                }
                break;
            default:
                $result = array(
                    'status' => 'error',
                    'message' => 'Invalid option.'
                );
                break;
        }
        break;
    case 'mail':
        $token = 'Ad4e7DJPX4SSSgu6mufX9pbqm6UKjkY79QYcxkrh';
        $email_send = !empty($_POST['email_send']) ? $_POST['email_send'] : '';
        $subject = 'Tu vídeo estará listo en breve';//!empty($_POST['subject']) ? $_POST['subject'] : '';
        $type= !empty($_POST['type']) ? $_POST['type'] : '';
        $visitante = !empty($_POST['visitante']) ? $_POST['visitante'] : '';
        $text_content = !empty($_POST['text_content']) ? $_POST['text_content'] : '';
        $visitantesRepository = new VisitantesRepository();
        $visitante = $visitantesRepository->get($visitante);
        foreach ($visitante as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $visitante= $value2;
                break;
            }
            break;
        }

        if($type == 'welcome'){
            $template = file_get_contents(__DIR__.'/template/welcome.html');
            $template = str_replace('##nombre##', $visitante['visitantes']['nombre'], $template);
            $template = str_replace('##apellido##', $visitante['visitantes']['apellido'], $template);

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://xn--elrobodelao-beb.ipzmarketing.com/api/v1/send_emails",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"info@xn--elrobodelao-beb.com\",\"name\":\"El robo del año\"},\"to\":[{\"email\":\"".$email_send."\",\"name\":\"".$visitante['visitantes']['nombre']."\"}],\"subject\":\"".$subject."\",\"html_part\":\"".$template."\\n\",\"text_part\":\"\",\"text_part_auto\":true,\"headers\":{\"X-CustomHeader\":\"Header value\"},\"smtp_tags\":[\"string\"],\"attachments\":[]}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "x-auth-token: ".$token
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }

            $template2 = file_get_contents(__DIR__.'/template/montador.html');
            $template2 = str_replace('##nombre##', $visitante['visitantes']['nombre'], $template2);
            $template2 = str_replace('##apellido##', $visitante['visitantes']['apellido'], $template2);
            $template2 = str_replace('##fecha##', $visitante['visitantes']['fecha'], $template2);
            $template2 = str_replace('##hora##', $visitante['visitantes']['hora'], $template2);
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://xn--elrobodelao-beb.ipzmarketing.com/api/v1/send_emails",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"info@xn--elrobodelao-beb.com\",\"name\":\"El robo del año\"},\"to\":[{\"email\":\"".($visitante['visitantes']['id']%2==0?'media1@elrobodelaño.com':'media2@elrobodelaño.com')."\",\"name\":\"".$visitante['visitantes']['nombre']."\"}],\"subject\":\"".$subject."\",\"html_part\":\"".$template2."\\n\",\"text_part\":\"\",\"text_part_auto\":true,\"headers\":{\"X-CustomHeader\":\"Header value\"},\"smtp_tags\":[\"string\"],\"attachments\":[]}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "x-auth-token: ".$token
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }
        }elseif($type == 'visitante'){
            $template = file_get_contents(__DIR__.'/template/visitante.html');
            $template = str_replace('##nombre##', $visitante['visitantes']['nombre'], $template);
            $template = str_replace('##apellido##', $visitante['visitantes']['apellido'], $template);
            $email_send = $visitante['visitantes']['correo'];
            $media = $visitante['media'];
            $video = '';

            foreach ($media as $key => $value) {
                if($value['tipo'] == 'video' && !empty($value['url'])){
                    $video = 'https://xn--elrobodelao-beb.com/'.$value['url'];
					$video2 = 'https://xn--elrobodelao-beb.com/video.php?url_to_video='.$video;
					$video3 = 'https://tracking.nomadspro.com/video.php?url_video='.$video;
                }
            }
            $template = str_replace('##video##', $video, $template);
			$template = str_replace('##video2##', $video2, $template);
			$template = str_replace('##video3##', $video3, $template);
			$template = str_replace('\n','',$template);
			
			/*echo "{\"from\":{\"email\":\"info@xn--elrobodelao-beb.com\",\"name\":\"El robo del año\"},\"to\":[{\"email\":\"".$email_send."\",\"name\":\"".$visitante['visitantes']['nombre']."\"}],\"subject\":\"".$subject."\",\"html_part\":\"".$template."\\n\",\"text_part\":\"\",\"text_part_auto\":true,\"headers\":{\"X-CustomHeader\":\"Header value\"},\"smtp_tags\":[\"string\"],\"attachments\":[]}";die;*/

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://xn--elrobodelao-beb.ipzmarketing.com/api/v1/send_emails",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"info@xn--elrobodelao-beb.com\",\"name\":\"El robo del año\"},\"to\":[{\"email\":\"".$email_send."\",\"name\":\"".$visitante['visitantes']['nombre']."\"}],\"subject\":\"".$subject."\",\"html_part\":\"".$template."\\n\",\"text_part\":\"\",\"text_part_auto\":true,\"headers\":{\"X-CustomHeader\":\"Header value\"},\"smtp_tags\":[\"string\"],\"attachments\":[]}",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/json",
                    "x-auth-token: ".$token
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
            if(!empty($visitante['visitantes']['correo_2'])){
                $template = file_get_contents(__DIR__.'/template/visitante.html');
                $template = str_replace('##nombre##', $visitante['visitantes']['nombre_2'], $template);
                $template = str_replace('##apellido##', $visitante['visitantes']['apellido_2'], $template);
                $email_send = $visitante['visitantes']['correo_2'];
                $media = $visitante['media'];
                $video = '';
                foreach ($media as $key => $value) {
                    if($value['tipo'] == 'video' && !empty($value['url'])){
                        $video = 'https://elrobodelaño.com/'.$value['url'];
                    }
                }
                $template = str_replace('##video##', $video, $template);

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://xn--elrobodelao-beb.ipzmarketing.com/api/v1/send_emails",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"info@xn--elrobodelao-beb.com\",\"name\":\"El robo del año\"},\"to\":[{\"email\":\"".$email_send."\",\"name\":\"".$visitante['visitantes']['nombre']."\"}],\"subject\":\"".$subject."\",\"html_part\":\"".$template."\\n\",\"text_part\":\"\",\"text_part_auto\":true,\"headers\":{\"X-CustomHeader\":\"Header value\"},\"smtp_tags\":[\"string\"],\"attachments\":[]}",
                    CURLOPT_HTTPHEADER => array(
                        "content-type: application/json",
                        "x-auth-token: ".$token
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    echo $response;
                }
            }
            if(!empty($visitante['visitantes']['correo_3'])){
                $template = file_get_contents(__DIR__.'/template/visitante.html');
                $template = str_replace('##nombre##', $visitante['visitantes']['nombre_3'], $template);
                $template = str_replace('##apellido##', $visitante['visitantes']['apellido_3'], $template);
                $email_send = $visitante['visitantes']['correo_3'];
                $media = $visitante['media'];
                $video = '';
                foreach ($media as $key => $value) {
                    if($value['tipo'] == 'video'){
                        $video = 'https://elrobodelaño.com/'.$value['url'];
                    }
                }
                $template = str_replace('##video##', $video, $template);

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://xn--elrobodelao-beb.ipzmarketing.com/api/v1/send_emails",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\"from\":{\"email\":\"info@xn--elrobodelao-beb.com\",\"name\":\"El robo del año\"},\"to\":[{\"email\":\"".$email_send."\",\"name\":\"".$visitante['visitantes']['nombre']."\"}],\"subject\":\"".$subject."\",\"html_part\":\"".$template."\\n\",\"text_part\":\"\",\"text_part_auto\":true,\"headers\":{\"X-CustomHeader\":\"Header value\"},\"smtp_tags\":[\"string\"],\"attachments\":[]}",
                    CURLOPT_HTTPHEADER => array(
                        "content-type: application/json",
                        "x-auth-token: ".$token
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    echo $response;
                
                }
            }
        }

        break;
    case 'notificaciones':
        switch($option){
            case 'get':
                $id_montador = $_COOKIE['user_id'];
                $rol = $_COOKIE['user_rol'];
                $notificacionesRepository = new NotificacionesRepository();
                if($rol == 1){
                    $notificaciones = $notificacionesRepository->getAll();
                }elseif($rol == 3 || $rol == 4){
                    $notificaciones = $notificacionesRepository->get($id_montador);
                }
                $result = array(
                    'status' => 'success',
                    'data' => $notificaciones
                );
                break;
            case 'marcar':
                $id = $_POST['id'];
                $notificacionesRepository = new NotificacionesRepository();
                $status = $notificacionesRepository->update($id);
                if($status){
                    $result = array(
                        'status' => 'success',
                        'message' => 'Notificación marcada como leída.'
                    );
                }else{
                    $result = array(
                        'status' => 'error',
                        'message' => 'Error al marcar la notificación.'
                    );
                }
                break;
        }
        break;
}


echo json_encode($result);

function check_session(){
    if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] !== '') {
        return true;
    }else{
        $result = array(
            'status' => 'error',
            'message' => 'You are not logged in.'
        );
    }
}