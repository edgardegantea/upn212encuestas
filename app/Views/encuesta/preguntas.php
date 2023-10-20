<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>

<h1>Preguntas de la Encuesta</h1>

<p><a href="<?php echo base_url('encuesta'); ?>">Volver a la lista de encuestas</a></p>

<?php if ($encuesta): ?>
    <h2>Encuesta: <?php echo $encuesta['titulo']; ?></h2>
<?php endif; ?>

<!-- Agregar botón para crear una nueva pregunta -->
<a href="<?php echo base_url('pregunta/create/' . $encuesta['id']); ?>" class="btn btn-primary">Agregar Nueva Pregunta</a>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <tr>
                        <th>ID</th>
                        <th>Pregunta</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach ($preguntas as $pregunta): ?>
                        <tr>
                            <td><?php echo $pregunta['id']; ?></td>
                            <td><?php echo $pregunta['pregunta']; ?></td>
                            <td><?php echo $pregunta['tipo_pregunta']; ?></td>
                            <td>
                                <!-- Agregar opciones de ver, editar y eliminar -->
                                <a href="<?php echo base_url('pregunta/ver/' . $pregunta['id']); ?>" class="btn btn-info">Ver</a>
                                <a href="<?php echo base_url('pregunta/edit/' . $pregunta['id']); ?>" class="btn btn-warning">Editar</a>
                                <a href="<?php echo base_url('pregunta/delete/' . $encuesta['id'] . '/' . $pregunta['id']); ?>">Eliminar</a>

                                <?php if ($pregunta['tipo_pregunta'] === 'seleccion_multiple'): ?>
                                    <a href="<?php echo base_url('pregunta/agregar_opciones/' . $pregunta['id']); ?>" class="btn btn-light">Agregar Opciones</a>
                                    <a href="<?php echo base_url('pregunta/ver_opciones/' . $pregunta['id']); ?>" class="btn btn-light">Ver Opciones</a>
                                <?php endif; ?>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>



            </div>

        </div>

    </div>
</div>








<?= $this->endSection() ?>
