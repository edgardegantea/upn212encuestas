<!DOCTYPE html>
<html>
<head>
    <title>Crear Nueva Encuesta</title>
</head>
<body>
<h1>Crear Nueva Encuesta</h1>

<form method="post" action="<?php echo site_url('encuesta'); ?>">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" rows="4" cols="50" required></textarea>

    <input type="submit" value="Guardar Encuesta">
</form>
</body>
</html>
