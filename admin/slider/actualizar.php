<?php

use App\Slider;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

require '../../includes/app.php';

estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
    exit;
}

$slider = Slider::find($id);
$errores = Slider::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['slider'];

    $slider->sincronizar($args);

    $errores = $slider->validar();

    $nombreImagen = md5(uniqid(rand(), true)) . ".png";
    
    if ($_FILES["slider"]["tmp_name"]["image"]) {
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($_FILES["slider"]["tmp_name"]["image"])->cover(900, 900);
        $slider->setImagen($nombreImagen);
    }
    
    
    if (empty($errores)) {
        if ($_FILES["slider"]["tmp_name"]["image"]) {
            $img->save(IMAGES_URL . $nombreImagen);
        }

        $slider->guardar();
    }
}

incluirTemplate('headerAdmin'); ?>

<main class="py-5 container-xl">
    <h1 class="py-5 text-center bg-white text-dark fw-bold">Update Slide</h1>
    <div class="my-3 d-grid d-md-flex">
        <a href="/admin/" class="btn btn-lg btn-primary rounded-0 text-uppecase fw-bold"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <div class="my-3 row">
        <div class="col-md-6 mx-auto">
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">

                <?php include '../../includes/templates/form_slider.php'; ?>

                <div class="mb-3 d-grid d-md-flex">
                    <input type="submit" value="Update Slide" class="btn btn-lg btn-primary rounded-0 text-uppercase fw-bold">
                </div>
            </form>
        </div>
    </div>
</main>

<?php incluirTemplate('footer'); ?>