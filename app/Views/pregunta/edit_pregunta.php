<!DOCTYPE html>
<html>
<head>
    <title>Editar Pregunta de Encuesta</title>
</head>
<body>
<h1>Editar Pregunta de Encuesta</h1>

<form method="post" action="<?php echo base_url('pregunta/update/' . $pregunta['id']); ?>">
    <input type="hidden" name="pregunta_id" value="<?php echo $pregunta['id']; ?>">
    <input type="hidden" name="encuesta_id" value="<?php echo $pregunta['encuesta_id'];">

        <label for="pregunta">Pregunta:</label>
        <textarea name="pregunta" rows="4" cols="50" required><?php echo $pregunta['pregunta']; ?></textarea>

        <label for="tipo">Tipo de Pregunta:</label>
        <select name="tipo">
            <option value="opcion_multiple" <?php echo $pregunta['tipo'] === 'opcion_multiple' ? 'selected' : ''; ?>>Opción Múltiple</option>
            <option value="abierta" <?php echo $pregunta['tipo'] === 'abierta' ? 'selected' : ''; ?>>Abierta</option>
        </select>

        <!-- Agregar campo para opciones de respuesta -->
        <label for="opciones">Opciones de Respuesta:</label>
        <textarea name="opciones" rows="4" cols="50"><?php echo $pregunta['opciones']; ?></textarea>

        <!-- Otros campos relacionados con la pregunta, como opciones de respuesta, etc., según el tipo de pregunta -->

        <input type="submit" value="Guardar Cambios">
    </form>

    <!-- Agregar botón para agregar opciones de respuesta -->
    <a href="<?php echo base_url('pregunta/agregar_opcion/' . $pregunta['id']); ?>" class="btn btn-primary">Agregar Opción de Respuesta</a>
</body>
</html>

