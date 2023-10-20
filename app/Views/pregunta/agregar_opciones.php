<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


<h1>Agregar Opciones de Respuesta</h1>

<form method="post" action="<?php echo base_url('pregunta/guardar_opciones'); ?>">
    <input type="hidden" name="pregunta_id" value="<?php echo $pregunta_id; ?>">

    <label for="opciones">Opciones de Respuesta (una por línea):</label>
    <textarea name="opciones" rows="4" cols="50" required></textarea>

    <input type="submit" value="Guardar Opciones">
</form>

<a href="<?php echo base_url('pregunta/ver/' . $pregunta_id); ?>">Volver a la pregunta</a>


<?= $this->endSection(); ?>