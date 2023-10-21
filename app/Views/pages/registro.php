<?= $this->extend('template/body2') ?>

<?= $this->section('content') ?>


    <div class="row">
        <div class="col col-md-2">
            
        </div>


        <div class="col-12 col-md-8 col-xs-12 col-sm-12">
            <form class="" action="<?= base_url('/registro') ?>" method="post" enctype="multipart/form-data">

                <div class="card-body">
                    <h4>Datos personales</h4>


                    <?php csrf_field(); ?>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Nombre:</label>
                                <input type="text" class="form-control"
                                       id="exampleInputBorderWidth2" name="nombre" placeholder="Ejemplo: Edgar">
                            </div>
                        </div>

                        

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Apellido Paterno:</label>
                                <input type="text" class="form-control"
                                       id="exampleInputBorderWidth2" name="apaterno" placeholder="Ejemplo: Degante">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Apellido Materno:</label>
                                <input type="text" class="form-control"
                                       id="exampleInputBorderWidth2" name="amaterno" placeholder="Ejemplo: Aguilar"
                                       minlength="3">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Teléfono:</label>
                                <input class="form-control" type="tel" name="phone_no" pattern="[0-9]{10}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">CURP:</label>
                                <input type="text" class="form-control"
                                       id="exampleInputBorderWidth2" name="curp" placeholder="ABCD123456DEFGHIXX"
                                       minlength="18" maxlength="18">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Sexo:</label>
                                <select class="form-control" name="sexo" id="">
                                    <option value="f">Femenino</option>
                                    <option value="m">Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Fecha de nacimiento:</label>
                                <input type="date" class="form-control"
                                       id="exampleInputBorderWidth2" name="fechaNacimiento">
                            </div>
                        </div>

                    </div>


                        <h4 class="mt-5">Datos para inicio de sesión</h4>

                    <div class="row">
                        


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Nombre de usuario:</label>
                                <input type="text" class="form-control"
                                       id="exampleInputBorderWidth2" name="username" placeholder="miusuario">
                            </div>
                        </div>
                        
  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Contraseña:</label>
                                <input type="password" class="form-control"
                                       id="exampleInputBorderWidth2" name="password"
                                       placeholder="Defina una contraseña">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Correo electrónico:</label>
                                <input type="email" class="form-control"
                                       id="exampleInputBorderWidth2" name="email" placeholder="usuario@mail.com">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorderWidth2">Tipo de usuario:</label>
                                <select name="rol" id="" class="form-control">
                                    <option value="asg">Administrativo y de Servicios Generales</option>
                                    <option value="docente">Docente</option>
                                    <option value="alumno">Alumno</option>
                                </select>
                            </div>
                        </div>

                        
                    </div>



                    <h4 class="mt-5">Datos de adscripción a UPN</h4>

                    <div class="row">

                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputBorderWidth2">Adscrito a:</label>
                                    <select name="adscripcion" id="" class="form-control">
                                        <option value="TEZIUTLAN">TEZIUTLAN</option>
                                        <option value="AYOTOXCO">AYOTOXCO</option>
                                        <option value="HUEYAPAN">HUEYAPAN</option>
                                        <option value="GUADALUPE VICTORIA">GUADALUPE VICTORIA</option>
                                        <option value="ZAPOTITLAN">ZAPOTITLAN</option>
                                        <option value="HUEHUETLLA">HUEHUETLLA</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputBorderWidth2">Matrícula o identificador:</label>
                                    <input type="text" class="form-control"
                                           id="exampleInputBorderWidth2" name="codigo">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputBorderWidth2">Carrera:</label>
                                    <select name="carrera" id="" class="form-control">
                                        <option value="1">ADMINISTRACIÓN</option>
                                        <option value="2">LEIP</option>
                                        <option value="3">INTERVENCION EDUCATIVA</option>
                                        <option value="4">PEDAGOGÍA</option>
                                        <option value="5">PSICOLOGIA EDUCATIVA</option>
                                        <option value="6">MEB</option>
                                        <option value="7">MEMS</option>
                                        <option value="8">MDLCI</option>
                                    </select>
                                </div>
                            </div>

                    </div>
                    
                        

                </div>

                <div class="card-footer">
                    <button type="reset" class="btn btn-default">Restablecer campos</button>
                    <button type="submit" class="btn btn-primary float-right">Aceptar</button>
                </div>


            </form>
        </div>


        <div class="col col-md-2"></div>
    </div>






<?= $this->endSection(); ?>