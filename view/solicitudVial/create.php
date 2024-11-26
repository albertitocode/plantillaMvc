<div class="mt-2">
    <h3 class="display-4">Registrar solicitud señales de transito en mal estado</h3>
</div>


<div class="mt-5">
    <div class="alert alert-danger d-none" role="alert" id="error">
        
    </div>
<!--     
    //   if(isset($_SESSION['errores'])){
    //         echo "<div class='alert alert-danger' role='alert'>";
    //           foreach ($_SESSION['errores'] as $error) {
    //             echo $error."<br>";
    //           }
    //        echo "</div>";
    //        unset($_SESSION['errores']);
    //     }

    //  -->
<form action="<?php echo getUrl("Solicitud","Solicitud","postCreateSenal");?>"method="post" id="form">
    <div class="row mt-5">
    <div class="col-md-4">
            <label for="senal_id">Id</label>
            <input type="text" name="senal_id" class="form-control" placeholder="Id">
            
        </div>
        <div class="col-md-4">
            <label for="senal_nombre">Señal nombre</label>
            <input type="text" name="senal_nombre" id="senal_nombre" class="form-control" placeholder="Señal Nombre">
            
        </div>
        <div class="col-md-4">
        <label for="categoria_senal_id">Categoria</label>
         <select name="categoria_senal_id" id="" class="form-control">
            <option value="">Seleccione categoria...</option>
            <?php
             foreach($categoria_senal as $categoria){
                echo "<option  value='".$categoria['categoria_senal_id']."'>".$categoria['categoria_senal_nombre']."</option>";
             }
            ?>
         </select>
        </div>
        <div class="col-md-4">
        <label for="tipo_senal_id">Tipo de señal</label>
         <select name="tipo_senal_id" id="" class="form-control">
            <option value="">Seleccione señal...</option>
            <?php
             foreach($tipo_senal as $tipo){
                echo "<option  value='".$tipo['tipo_senal_id']."'>".$tipo['tipo_senal_nombre']."</option>";
             }
            ?>
         </select>
        </div>
        
    </div>
    <div class="mt-5">
        <input type="submit"value="Enviar" class="btn btn-success">
    </div>
</form>
</div>