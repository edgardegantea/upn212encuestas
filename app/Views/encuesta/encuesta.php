<!DOCTYPE html>
<html>
<head>
    <title>Encuesta</title>
</head>
<body>
<h1>Encuesta: <?php echo $encuesta['titulo']; ?></h1>
<p><?php echo $encuesta['descripcion']; ?></p>

<form method="post" action="<?php echo base_url('encuesta/' . $encuesta['id'] . '/guardarRespuestas'); ?>">
    <label for="encuestado_nombre">Nombre del encuestado:</label>
    <input type="text" name="encuestado_nombre" required>

    <?php foreach ($preguntas as $pregunta): ?>
        <div>
            <p><?php echo $pregunta['pregunta']; ?></p>
            <?php if ($pregunta['tipo_pregunta'] === 'seleccion_multiple'): ?>
                <?php $opciones = $opcionModel->where('pregunta_id', $pregunta['id'])->findAll(); ?>
                <?php foreach ($opciones as $opcion): ?>
                    <label>
                        <input type="radio" name="respuesta_<?php echo $pregunta['id']; ?>" value="<?php echo $opcion['opcion']; ?>">
                        <?php echo $opcion['opcion']; ?>
                    </label>
                <?php endforeach; ?>
            <?php else: ?>
                <textarea name="respuesta_<?php echo $pregunta['id']; ?>" rows="4" cols="50"></textarea>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <input type="submit" value="Enviar Respuestas">
</form>
</body>
</html>
