<!DOCTYPE html>
<html>
<head>
    <title>Aplicar Encuesta</title>
</head>
<body>
<h1>Aplicar Encuesta - <?php echo $encuesta['id']; ?></h1>
<form method="post" action="<?php echo base_url('encuesta/guardar_respuestas/' . $encuesta['id']); ?>">
    <input type="hidden" name="encuesta_id" value="<?php echo $encuesta['id']; ?>">

    <h2>Datos del Encuestado:</h2>
    <label for="encuestado_nombre">Nombre del Encuestado:</label>
    <input type="text" name="encuestado_nombre" required>

    <h2>Preguntas:</h2>
    <?php foreach ($preguntas as $pregunta): ?>
        <p><strong>Pregunta:</strong> <?php echo $pregunta['pregunta']; ?></p>

        <?php if ($pregunta['tipo_pregunta'] === 'seleccion_multiple'): ?>
            <!-- Pregunta de opción múltiple -->
            <?php foreach ($pregunta['opciones'] as $opcion): ?>
                <label>
                    <input type="radio" name="respuesta[<?php echo $pregunta['id']; ?>]" value="<?php echo $opcion; ?>">
                    <?php echo $opcion; ?>
                </label><br>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Pregunta abierta -->
            <textarea name="respuesta[<?php echo $pregunta['id']; ?>]" rows="4" cols="50" required></textarea>
        <?php endif; ?>
    <?php endforeach; ?>

    <input type="submit" value="Guardar Respuestas">
</form>

<a href="<?php echo base_url('encuesta'); ?>">Volver a la lista de encuestas</a>
</body>
</html>
