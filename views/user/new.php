<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid"> 
            <section class="row mt-5">
                <div class="card w-100 m-auto">
                    <div class="card-header">
                        Agregar Usuarios
                    </div>
                    
                    <div class="card-body w-100">
                        <div class="card-tittle">
                            <h3 class=" title-2">Usuario</h3>
                        </div>
                        <hr>
                        <form action="" id="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Nombre<span class="ast">*</span></label>
                                <input type="text" id="Nombre" class="form-control" placeholder="Ingrese el nombre">
                            </div>
                            <div class="form-group">
                                <label> Apellido<span class="ast">*</span></label>
                                <input type="text" id="Apellido" class="form-control" placeholder="Ingrese el apellido">
                            </div>
                            <div class="form-group">
                                <label> Cédula<span class="ast">*</span></label>
                                <input type="number" id="Cedula" class="form-control" placeholder="Ingrese la cédula">
                            </div>
                            <div class="form-group">
                                <label> Correo<span class="ast">*</span></label>
                                <input type="email" id="Correo" class="form-control" placeholder="Ingrese el correo">
                            </div>
                            <div class="form-group">
                                <label> Teléfono<span class="ast">*</span></label>
                                <input type="number" id="Telefono" class="form-control" placeholder="Ingrese el teléfono">
                            </div>
                            <div class="form-group">
                                <label> Dirección<span class="ast">*</span></label>
                                <input type="text" id="Direccion" class="form-control" placeholder="Ingrese la dirección">
                            </div>
                            <div class="form-group">
                                <label>Foto<span class="ast"></span></label>
                                <input type="file" id="foto" class="form-control" accept=".png, .jpg, .gif">
                            </div>
                            <div class="form-group">
                                <label>Rol<span class="ast">*</span></label>
                                <select id="Id_Rol" id="Id_Rol" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php
                                    foreach ($roles as $rol) {
                                        ?>
                                        <option value="<?php echo $rol->Id_Rol?>"><?php echo $rol->Nombre ?></option>
                                        <?php                                       
                                    }
                                    ?>
                                </select>
                            </div>

                            <div id="divarea1" class="form-group">
                                <label>Empresa Reciclaje<span class="ast">*</span></label>
                                    <select id="Id_Empresa_Reciclaje" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php
                                        foreach ($empresas as $empresa) {
                                            ?>
                                            <option value="<?php echo $empresa->Id_Empresa_Reciclaje?>">
                                                <?php echo $empresa->Nombre_Empresa ?></option>
                                                <?php                                       
                                            }
                                            ?>
                                        </select>
                                    </div>
                            <button id="" type="submit"   class="botones au-btn  au-btn--green au-btn--small ">

                        <span id="payment-button-amount"  >Guardar</span>
                            </button>
                            <a href="?controller=user" id="" class="botones btn btn-secondary ">Cancelar</a>                           

                        </form>
                    </div>
                </div>
            </section>

        </main>
    </div>
</div>
<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/usuario.js"></script>
<script >
    $(document).ready(function () {
        $('#divarea1').hide();       
        $('#Id_Rol').change(function () {
            if ($(this).val() == "2") {
                $('#divarea1').show();         
            }
            else if ($(this).val() == "3" || "4") {
                $('#divarea1').hide();
            }
        });
    });
</script>