<div class="mt-2">
    <h4 class="display-4">Imágenes de Señales Viales</h4>
</div>

<div class="mt-5">

    <div class="container mt-4">
        <div class="row">
            <?php
            foreach ($imgs as $img) {
                echo "
            <div class='col-md-4 mb-4'>
                <div class='card'>
                    <img src='" . htmlspecialchars($img['imagen_url']) . "' class='card-img-top' alt='Señal'>
                    <div class='card-body'>
                        <p class='card-text'>" . htmlspecialchars($img['categoria_senial_nombre']) . "</p>
                    </div>
                    <div class='card-body'>
                        <p class='card-text'>" . htmlspecialchars($img['descripcion']) . "</p>
                    </div>
                </div>
            </div>";
            }

            ?>

        </div>
    </div>
</div>