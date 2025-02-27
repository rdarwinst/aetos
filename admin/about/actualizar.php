<?php

use App\About;

require '../../includes/app.php';

estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
    exit;
}

$about = About::find($id);

$errores = About::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['about'];

    $about->sincronizar($args);

    $errores = $about->validar();

    if (empty($errores)) {
        $about->guardar();
    }
}

incluirTemplate('headerAdmin'); ?>

<main class="py-5 container-xl">
    <h1 class="py-5 text-center bg-white text-dark fw-bold">Update Aëtos Info</h1>

    <div class="my-3 d-grid d-md-flex">
        <a href="/admin/" class="btn btn-lg btn-primary rounded-0 fw-bold"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <div class="my-3 row">
        <div class="col-md-6 mx-auto">
            <form method="post" class="needs-validation" novalidate>

                <?php include '../../includes/templates/form_aetos.php'; ?>

                <div class="mb-3 d-grid d-md-flex">
                    <input type="submit" value="Update" class="btn btn-lg btn-primary fw-bold text-uppercase rounded-0">
                </div>
            </form>
        </div>
    </div>
</main>


<?php incluirTemplate('footer'); ?>;