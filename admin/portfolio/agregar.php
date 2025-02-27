<?php

use App\Portfolio;
use App\Services;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

require '../../includes/app.php';

estaAutenticado();

$services = Services::all();

$work = new Portfolio;
$errores = Portfolio::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $work = new Portfolio($_POST['work']);

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES["work"]["tmp_name"]["image"]) {
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($_FILES["work"]["tmp_name"]["image"])->coverDown(1200, 720);
        $work->setImagen($nombreImagen);
    }

    $errores = $work->validar();

    if (empty($errores)) {
        if (!is_dir(IMAGES_URL)) {
            mkdir(IMAGES_URL, 0755, true);
        }

        $img->save(IMAGES_URL . $nombreImagen);

        $work->guardar();
    }
}

incluirTemplate('headerAdmin'); ?>

<main class="py-5 container-xl">
    <h1 class="py-5 text-center bg-white text-dark fw-bold">Add Work</h1>

    <div class="my-3 d-grid d-md-flex">
        <a href="/admin/" class="btn btn-lg btn-primary rounded-0 fw-bold"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <div class="my-3 row">
        <div class="col-md-6 mx-auto">
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                
                <?php include '../../includes/templates/form_works.php'; ?>

                <div class="mb-3 d-grid d-md-flex">
                    <input type="submit" value="Add Work" class="btn btn-lg btn-primary rounded-0 fw-bold text-uppercase">
                </div>
            </form>
        </div>
    </div>
</main>


<?php incluirTemplate('footer'); ?>;