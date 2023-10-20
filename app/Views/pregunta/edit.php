<!DOCTYPE html>
<html>
<head>
    <title>Editar Pregunta de Encuesta</title>
</head>
<body>
<h1>Editar Pregunta de Encuesta</h1>

<form method="post" action="<?php echo base_url('pregunta/update/' . $pregunta['id']); ?>">
    <input type="hidden" name="pregunta_id" value="<?php echo $pregunta['id']; ?>">
    <input type="hidden" name="encuesta_id" value="<?php echo $pregunta['encuesta_id']; ?>">

    <label for="pregunta">Pregunta:</label>
    <textarea name="pregunta" rows="4" cols="50" required><?php echo $pregunta['pregunta']; ?></textarea>

    <label for="tipo">Tipo de Pregunta:</label>
    <select name="tipo_pregunta">
        <option value="seleccion_multiple" <?php echo $pregunta['tipo_pregunta'] === 'seleccion_multiple' ? 'selected' : ''; ?>>Opción Múltiple</option>
        <option value="abierta" <?php echo $pregunta['tipo_pregunta'] === 'abierta' ? 'selected' : ''; ?>>Abierta</option>
    </select>

    <!-- Otros campos relacionados con la pregunta, como opciones de respuesta, etc., según el tipo de pregunta -->

    <input type="submit" value="Guardar Cambios">
</form>
</body>
</html>
