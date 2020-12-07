<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container"> 
            <section class="row mt-5">
                <div class="card w-100 m-auto">
                    <div class="card-header">
                        Registrar Nueva Empresa de Reciclaje
                    </div>

                    <div class="card-body w-100">
                        <div class="card-tittle">
                            <h3 class=" title-2">Empresa de Reciclaje</h3>
                        </div>
                        <hr>
                        <form id="form" action="" method="post">
                            <div class="form-group">
                                <label class="lal"> Nit<span class="ast">*</span></label>
                                <input type="number" id="Nit_Empresa" class="form-control" placeholder="Ingrese el Nit">
                            </div>
                            <div class="form-group">
                                <label class="lal"> Nombre<span class="ast">*</span></label>
                                <input type="text" id="Nombre_Empresa" class="form-control" placeholder="Ingrese el Nombre">
                            </div>
                            <div class="form-group">
                                <label class="lal"> Teléfono<span class="ast">*</span></label>
                                <input type="number" id="Telefono" class="form-control" placeholder="Ingrese el Teléfono">
                            </div>
                            <div class="form-group">
                                <label class="lal"> Dirección<span class="ast">*</span></label>
                                <input type="text" id="Direccion" class="form-control" placeholder="Ingrese la Dirección">
                            </div>                        
                            <div>
                                <button name="Agregar" type="submit" class="botones au-btn  au-btn--green au-btn--small ">

                                    <span id="payment-button-amount">Guardar</span>
                                </button>
                                <a href="?controller=empresaReciclaje" id="" class="botones btn btn-secondary ">

                                    Cancelar
                                </a>
                                
                            </div>
                        </form>   
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/empresaReciclaje.js"></script>
