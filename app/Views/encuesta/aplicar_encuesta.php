<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


<h1>Usted está respondiendo la encuesta: <?php echo $encuesta['titulo']; ?></h1>
<form method="post" action="<?php echo base_url('encuesta/guardar_respuestas/' . $encuesta['id']); ?>">
    <input type="hidden" name="encuesta_id" value="<?php echo $encuesta['id']; ?>">


<!--
    <h2>Datos del Encuestado:</h2>
    <label for="encuestado_nombre">Nombre del Encuestado:</label>
    <input type="text" name="encuestado_nombre" required>
-->

    <h2>Preguntas:</h2>
    <?php foreach ($preguntas as $pregunta): ?>

        <div class="card">
            <div class="card-header">
                <p><strong>Pregunta:</strong> <?php echo $pregunta['pregunta']; ?></p>
            </div>

        
            <div class="card-body">

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
            <textarea class="form-control" name="respuesta[<?php echo $pregunta['id']; ?>]" rows="4" cols="50" required></textarea>
        <?php endif; ?>
        </div>
        </div>
    <?php endforeach; ?>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <input class="btn btn-primary " type="submit" value="Guardar Respuestas">
    </div>
</form>

<!-- <a href="<?php echo base_url('encuesta'); ?>">Volver a la lista de encuestas</a> -->


<?= $this->endSection(); ?>