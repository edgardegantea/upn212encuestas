<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


<h1>Crear Pregunta de Encuesta</h1>

<form method="post" action="<?php echo base_url('pregunta/store'); ?>">
    <input type="hidden" name="encuesta_id" value="<?php echo $encuestaId; ?>">

    <label for="pregunta">Pregunta:</label>
    <textarea name="pregunta" rows="4" cols="50" required></textarea>

    <label for="tipo">Tipo de Pregunta:</label>
    <select name="tipo">
        <option value="opcion_multiple">Opción Múltiple</option>
        <option value="abierta">Abierta</option>
    </select>

    <!-- Otros campos relacionados con la pregunta, como opciones de respuesta, etc., según el tipo de pregunta -->

    <input type="submit" value="Guardar Pregunta">
</form>


<?= $this->endSection(); ?>
