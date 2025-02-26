<?php

use App\Services;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

require '../../includes/app.php';

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
    exit;
}

$services = Services::find($id);
$errores = Services::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['service'];

    $services->sincronizar($args);

    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES["service"]["tmp_name"]["image"]) {
        $manager = new ImageManager(Driver::class);
        $img = $manager->read($_FILES["service"]["tmp_name"]["image"])->resizeDown(900, 900);
        $services->setImagen($nombreImagen);
    }

    $errores = $services->validar();

    if (empty($errores)) {
        if ($_FILES["service"]["tmp_name"]["image"]) {
            $img->save(IMAGES_URL . $nombreImagen);
        }
        $services->guardar();
    }
}

incluirTemplate('header');
?>

<!-- Navegacion Principal -->
<nav class="navbar navbar-expand-md py-3 shadow" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">
            <img src="/build/img/logo-azul.svg" alt="Logo Aetos" width="150">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Menu Mobile">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">

            <form class="d-flex flex-grow-1 me-md-5" role="search" data-bs-theme="dark">
                <input type="search" name="search" id="search" class="form-control me-2 rounded-0 fw-lighter">
                <button type="submit" class="btn btn-primary btn-lg rounded-0"><i class="bi bi-search"></i></button>
            </form>
            <ul class="navbar-nav text-center mt-3 mt-md-0">
                <li class="nav-item d-flex flex-column">
                    <a href="#adminPanel" class="nav-link link-primary text-uppercase fw-bold" data-bs-toggle="offcanvas" role="button" aria-controls="#adminPanel">Open Panel</a>
                </li>
                <li class="nav-item d-flex flex-column">
                    <a href="#" class="nav-link link-primary text-uppercase fw-bold">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- AdminPanel -->
<div class="offcanvas offcanvas-start bg-primary" tabindex="-1" id="adminPanel" aria-labelledby="adminPanelLabel">
    <div class="offcanvas-header" data-bs-theme="dark">
        <a href="/admin/"><img src="/build/img/logo-negro.svg" alt="Logo Aetos" width="150" class="img-fluid"></a>
        <button type="button" class="btn-close" role="button" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-center">
        <div class="profile">
            <div class="profile__picture rounded-circle bg-dark w-25 mx-auto">
                <img src="/build/img/casco-azul.svg" alt="ProfileIcon" class="img-fluid">
            </div>
            <p class="fs-5 text-dark fw-bold text-center mt-3">Name <span class="d-block">Surname</span></p>
        </div>

        <ul class="nav nav-pills flex-column align-items-center" id="pills-tab" role="tablist" data-bs-theme="dark">
            <li class="nav-item py-3" role="presentation">
                <button type="button" class="nav-link text-uppercase link-dark shadow-sm active" id="pills-slider-tab" data-bs-toggle="pill" data-bs-target="#pills-slider" role="tab" aria-controls="pills-slider" aria-selected="true">Slider Aetos</button>
            </li>

            <li class="nav-item py-3" role="presentation">
                <button type="button" class="nav-link text-uppercase link-dark shadow-sm" id="pills-services-tab" data-bs-toggle="pill" data-bs-target="#pills-services" role="tab" aria-controls="pills-services" aria-selected="true">Services</button>
            </li>
            <li class="nav-item py-3" role="presentation">
                <button type="button" class="nav-link text-uppercase link-dark shadow-sm" id="pills-works-tab" data-bs-toggle="pill" data-bs-target="#pills-works" role="tab" aria-controls="pills-works" aria-selected="true">Works</button>
            </li>
            <li class="nav-item py-3" role="presentation">
                <button type="button" class="nav-link text-uppercase link-dark shadow-sm" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Contact Info</button>
            </li>
        </ul>
    </div>
    <div class="offcanvas-footer">
        <p class="copyright text-center m0 fw-lighter text-dark">&copy; All rights reserved. Desgined by Aëtos.</p>
    </div>
</div>


<main class="py-5 container-xl">
    <h1 class="py-5 text-center bg-white text-dark fw-bold">Update Service</h1>

    <div class="my-3 d-grid d-md-flex">
        <a href="/admin/" class="btn btn-lg btn-primary rounded-0 fw-bold"><i class="bi bi-arrow-left"></i> Back</a>
    </div>

    <div class="my-3 row">
        <div class="col-md-6 mx-auto">
            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                <?php include '../../includes/templates/form_services.php'; ?>
                <div class="mb-3 d-grid d-md-flex">
                    <input type="submit" value="Update Service" class="btn btn-lg btn-primary rounded-0 fw-bold text-uppercase">
                </div>
            </form>
        </div>
    </div>
</main>

<?php incluirTemplate('footer'); ?>