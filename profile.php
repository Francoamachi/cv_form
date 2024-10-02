<?php
include 'db_connection.php';

$usuario_id = isset($_GET['usuario_id']) ? $_GET['usuario_id'] : 1;  

$sql_usuario = "SELECT * FROM usuarios WHERE id = ?";
$stmt_usuario = $conn->prepare($sql_usuario);
$stmt_usuario->bind_param("i", $usuario_id);
$stmt_usuario->execute();
$resultado_usuario = $stmt_usuario->get_result();
$usuario = $resultado_usuario->fetch_assoc();

$sql_experiencia = "SELECT * FROM experiencia_laboral ORDER BY fecha_inicio DESC";
$stmt_experiencia = $conn->prepare($sql_experiencia);
//$stmt_experiencia->bind_param("i", $usuario_id);
$stmt_experiencia->execute();
$resultado_experiencia = $stmt_experiencia->get_result();

$sql_formacion = "SELECT * FROM formacion ORDER BY fecha_inicio DESC";
$stmt_formacion = $conn->prepare($sql_formacion);
//$stmt_formacion->bind_param("i", $usuario_id);
$stmt_formacion->execute();
$resultado_formacion = $stmt_formacion->get_result();

$sql_idiomas = "SELECT * FROM idiomas ";
$stmt_idiomas = $conn->prepare($sql_idiomas);
//$stmt_idiomas->bind_param("i", $usuario_id);
$stmt_idiomas->execute();
$resultado_idiomas = $stmt_idiomas->get_result();


$sql_aptitudes = "SELECT * FROM aptitudes";
$stmt_aptitudes = $conn->prepare($sql_aptitudes);
//$stmt_aptitudes->bind_param("i", $usuario_id);
$stmt_aptitudes->execute();
$resultado_aptitudes = $stmt_aptitudes->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="css/styles1.css"> 
</head>
<body>
    <div class="perfil">
        <h1>Perfil de <?php echo $usuario['nombre']; ?></h1>
        <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $usuario['telefono']; ?></p>
        <p><strong>Nacionalidad:</strong> <?php echo $usuario['nacionalidad']; ?></p>
        

        <h2>Experiencia Laboral</h2>
        <?php if ($resultado_experiencia->num_rows > 0) { ?>
            <?php while ($experiencia = $resultado_experiencia->fetch_assoc()) { ?>
                <div class="experiencia">
                    <p><strong>Empresa:</strong> <?php echo $experiencia['empresa']; ?></p>
                    <p><strong>Puesto:</strong> <?php echo $experiencia['puesto']; ?></p>
                    <p><strong>Ubicación:</strong> <?php echo $experiencia['ubicacion']; ?></p>
                    <p><strong>Tipo:</strong> <?php echo $experiencia['tipo_ubicacion']; ?></p>
                    <p><strong>Descripción:</strong> <?php echo $experiencia['descripcion']; ?></p>
                    <p><strong>Desde:</strong> <?php echo $experiencia['fecha_inicio']; ?> 
                       <strong>Hasta:</strong> <?php echo $experiencia['fecha_fin']; ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No hay experiencia laboral registrada.</p>
        <?php } ?>

        <h2>Formación</h2>
        <?php if ($resultado_formacion->num_rows > 0) { ?>
            <?php while ($formacion = $resultado_formacion->fetch_assoc()) { ?>
                <div class="formacion">
                    <p><strong>Institución:</strong> <?php echo $formacion['institucion']; ?></p>
                    <p><strong>Disciplina Académica:</strong> <?php echo $formacion['disciplina_academica']; ?></p>
                    <p><strong>Desde:</strong> <?php echo $formacion['fecha_inicio']; ?> 
                       <strong>Hasta:</strong> <?php echo $formacion['fecha_fin']; ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No hay formación registrada.</p>
        <?php } ?>

        <h2>Idiomas</h2>
        <?php if ($resultado_idiomas->num_rows > 0) { ?>
            <?php while ($idioma = $resultado_idiomas->fetch_assoc()) { ?>
                <div class="idiomas">
                    <p><strong>Idioma:</strong> <?php echo $idioma['idioma']; ?></p>
                    <p><strong>Nivel:</strong> <?php echo $idioma['nivel']; ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No hay idiomas registrados.</p>
        <?php } ?>

        <h2>Aptitudes</h2>
        <?php if ($resultado_aptitudes->num_rows > 0) { ?>
            <?php while ($aptitud = $resultado_aptitudes->fetch_assoc()) { ?>
                <div class="aptitudes">
                    <p><strong>Aptitud:</strong> <?php echo $aptitud['aptitud']; ?></p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No hay aptitudes registradas.</p>
        <?php } ?>
    </div>
</body>
</html>
