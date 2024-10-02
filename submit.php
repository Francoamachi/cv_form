<?php
include 'db_connection.php'; 


$nombre = $_POST['nombre'];
$nacimiento = $_POST['nacimiento'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$nacionalidad = $_POST['nacionalidad'];
$empresa = $_POST['empresa'];
$puesto = $_POST['puesto'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$ubicacion = $_POST['ubicacion'];
$tipo_ubicacion = $_POST['tipo_de_ubicacion'];
$descripcion = $_POST['perfil'];
$institucion = $_POST['institucion'];
$disciplina_academica = $_POST['disciplina_academica'];
$idioma = $_POST['idioma'];
$nivel_de_idioma = $_POST['nivel_de_idioma'];
$aptitud = $_POST['aptitud'];

$sql_usuario = "INSERT INTO usuarios (nombre, fecha_nacimiento, telefono, email, nacionalidad) VALUES (?, ?, ?, ?, ?)";
$stmt_usuario = $conn->prepare($sql_usuario);
$stmt_usuario->bind_param("sssss", $nombre, $nacimiento, $telefono, $email, $nacionalidad);
$stmt_usuario->execute();

$usuario_id = $conn->insert_id;

if ($empresa!='' and $puesto != '') {

    $sql_experiencia = "INSERT INTO experiencia_laboral (usuario_id, empresa, puesto, fecha_inicio, fecha_fin, ubicacion, tipo_ubicacion, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_experiencia = $conn->prepare($sql_experiencia);
    $stmt_experiencia->bind_param("isssssss", $usuario_id, $empresa, $puesto, $fecha_inicio, $fecha_fin, $ubicacion, $tipo_ubicacion, $descripcion);
    $stmt_experiencia->execute();
}

if ($institucion != '' and $disciplina_academica != '') {
    $sql_formacion = "INSERT INTO formacion (usuario_id, institucion, disciplina_academica, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?)";
    $stmt_formacion = $conn->prepare($sql_formacion);
    $stmt_formacion->bind_param("issss", $usuario_id, $institucion, $disciplina_academica, $fecha_inicio, $fecha_fin);
    $stmt_formacion->execute();
}

if ($idioma != '') {
    $sql_idiomas = "INSERT INTO idiomas (usuario_id, idioma, nivel) VALUES (?, ?, ?)";
    $stmt_idiomas = $conn->prepare($sql_idiomas);
    $stmt_idiomas->bind_param("iss", $usuario_id, $idioma, $nivel_de_idioma);
    $stmt_idiomas->execute();
}

if ($aptitud != ''){
    $sql_aptitudes = "INSERT INTO aptitudes (usuario_id, aptitud) VALUES (?, ?)";
    $stmt_aptitudes = $conn->prepare($sql_aptitudes);
    $stmt_aptitudes->bind_param("is", $usuario_id, $aptitud);
    $stmt_aptitudes->execute();
}

header("Location: profile.php?usuario_id=$usuario_id");
exit();
?>
