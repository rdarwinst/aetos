<?php

use App\Services;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

require '../../includes/app.php';

estaAutenticado();

$services = new Services;
$errores = Services::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $services = new Services($_POST['service']);

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


    if ($_FILES["service"]["tmp_name"]["image"]) {
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($_FILES["service"]["tmp_name"]["image"])->cover(720, 1200);
        $services->setImagen($nombreImagen);
    }

    $errores = $services->validar();

    if (empty($errores)) {

        if (!is_dir(IMAGES_URL)) {
            mkdir(IMAGES_URL, 0755, true);
        }

        $img->save(IMAGES_URL . $nombreImagen);

        $services->guardar();
    }
}
incluirTemplate('headerAdmin'); ?>

<main class="py-5 container-xl">
    <h1 class="py-5 text-center bg-white text-dark fw-bold">Add Service</h1>

    <div class="my-3 d-grid d-md-flex">
        <a href="/admin/" class="btn btn-lg btn-primary rounded-0 fw-bold"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <div class="my-3 row">
        <div class="col-md-6 mx-auto">
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                <?php include '../../includes/templates/form_services.php'; ?>
                <div class="mb-3 d-grid d-md-flex">
                    <input type="submit" value="Add Service" class="btn btn-lg btn-primary rounded-0 fw-bold text-uppercase">
                </div>
            </form>
        </div>
    </div>
</main>

<?php incluirTemplate('footer'); ?>