<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>


<h1>Crear Pregunta de Encuesta</h1>

<form method="post" action="<?php echo base_url('pregunta/store'); ?>">


    <input type="hidden" name="encuesta_id" value="<?php echo $encuestaId; ?>">


    <div class="form-group">
        <label for="pregunta">Pregunta:</label>
        <textarea class="form-control" name="pregunta" rows="4" cols="50" required></textarea>
    </div>

    
    <div class="form-group">
        <label for="tipo">Tipo de Pregunta:</label>
        <select class="form-control" name="tipo_pregunta">
            <option value="seleccion_multiple">Opción Múltiple</option>
            <option value="abierta">Abierta</option>
        </select>
    </div>

    
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <input class="btn btn-primary " type="submit" value="Guardar Pregunta">
    </div>
</form>


<?= $this->endSection(); ?>
