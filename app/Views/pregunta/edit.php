<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>



<h1>Editar Pregunta de Encuesta</h1>

<form method="post" action="<?php echo base_url('pregunta/update/' . $pregunta['id']); ?>">
    
    <input type="hidden" name="pregunta_id" value="<?php echo $pregunta['id']; ?>">
    <input type="hidden" name="encuesta_id" value="<?php echo $pregunta['encuesta_id']; ?>">

    <div class="form-group">
        <label class="form-label" for="pregunta">Pregunta:</label>
        <textarea class="form-control" name="pregunta" rows="4" cols="50" required><?php echo $pregunta['pregunta']; ?></textarea>
    </div>

    <div class="form-group">
        <label for="tipo">Tipo de Pregunta:</label>
        <select class="form-control" name="tipo_pregunta">
            <option value="seleccion_multiple" <?php echo $pregunta['tipo_pregunta'] === 'seleccion_multiple' ? 'selected' : ''; ?>>Opción Múltiple</option>
            <option value="abierta" <?php echo $pregunta['tipo_pregunta'] === 'abierta' ? 'selected' : ''; ?>>Abierta</option>
        </select>
    </div>
    

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <input class="btn btn-primary " type="submit" value="Guardar cambios">
    </div>
</form>


<?= $this->endSection() ?>

