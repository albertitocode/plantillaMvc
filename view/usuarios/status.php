<div class="page-header">
    <h3 class="fw-bold mb-3">Inhabiliar o habilitar usuarios</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="#">
                <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Usuarios</a>
        </li>

    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tittle">
                    Actualizacion Usuarios
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo getUrl("Usuarios", "Usuarios", "updateStatus"); ?>" method="post" id="form">
                    <div class="form-group col-lg-4">
                        <label for="usuario_id">Digite el id del usuario</label>
                        <input type="text" name="usuario_id" id="" class="form-control" placeholder="Id">

                    </div>
                    <div class="mt-5">
                        <input type="submit" value="Buscar" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>