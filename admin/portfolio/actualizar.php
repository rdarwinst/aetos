<?php

use App\Portfolio;
use App\Services;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

require '../../includes/app.php';

estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
    exit;
}

$services = Services::all();

$work = Portfolio::find($id);
$errores = Portfolio::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['work'];

    $work->sincronizar($args);

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES["work"]["tmp_name"]["image"]) {
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($_FILES["work"]["tmp_name"]["image"])->coverDown(1200, 720);
        $work->setImagen($nombreImagen);
    }

    $errores = $work->validar();

    if (empty($errores)) {
        if ($_FILES["work"]["tmp_name"]["image"]) {
            $img->save(IMAGES_URL . $nombreImagen);
        }
        $resultado = $work->guardar();

        if ($resultado) {
            header('Location: /admin?result=2');
        }
    }
}

incluirTemplate('headerAdmin'); ?>

<main class="py-5 container-xl">
    <h1 class="py-5 text-center bg-white text-dark fw-bold">Update Work</h1>

    <div class="my-3 d-grid d-md-flex">
        <a href="/admin/" class="btn btn-lg btn-primary rounded-0 fw-bold"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <div class="my-3 row">
        <div class="col-md-6 mx-auto">
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">

                <?php include '../../includes/templates/form_works.php'; ?>

                <div class="mb-3 d-grid d-md-flex">
                    <input type="submit" value="Update Work" class="btn btn-lg btn-primary rounded-0 fw-bold text-uppercase">
                </div>
            </form>
        </div>
    </div>
</main>


<?php incluirTemplate('footer'); ?>;