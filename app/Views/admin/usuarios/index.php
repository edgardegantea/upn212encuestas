<?= $this->extend('template/body') ?>

<?= $this->section('content') ?>
    

<div>
    
    <h2>Usuarios del sistema</h2>


    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <thead>
            <th>NOMBRE DEL USUARIO</th>
            <th>TIPO DE USUARIO</th>
            <th>USERNAME</th>
            <th>CORREO ELECTRÓNICO</th>
            <th>SEXO</th>
            <th>ACCIONES</th>
        </thead>
        <tbody>
            
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['nombre'] . ' ' . $usuario['apaterno'] . ' ' . $usuario['amaterno'] ?></td>
                    <td>
                        <?php if($usuario['rol'] == 'admin'): ?>
                            Administrador
                        <?php elseif($usuario['rol'] == 'asg'): ?>
                            Administrativos y servicios generales
                        <?php elseif($usuario['rol'] == 'docente'): ?>
                            Docente
                        <?php else: ?>
                            Alumno
                        <?php endif; ?>
                    </td>
                    <td><?= $usuario['username']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <td>
                        <?php if($usuario['sexo'] == 'f'): ?>
                            Mujer
                        <?php else: ?>
                            Hombre
                        <?php endif; ?>
                        </td>
                    <td>

                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    </div>


</div>



<?= $this->endSection(); ?>