<?php

use App\About;
use App\Portfolio;
use App\Services;
use App\Slider;

require '../includes/app.php';

estaAutenticado();

$result = $_GET['result'] ?? null;

$slider = Slider::all();
$services = Services::all();
$works = Portfolio::all();
$about = About::all();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        $type = $_POST['type'];
        if (validarTipoContenido($type)) {
            if ($type === 'slide') {
                $slide = Slider::find($id);
                $slide->eliminar();
            }
            if ($type === 'service') {
                $services = Services::find($id);
                $services->eliminar();
            }
            if ($type === 'work') {
                $works = Portfolio::find($id);
                $works->eliminar();
            }
        }
    }
}

incluirTemplate('headerAdmin'); ?>


<!-- Secciones administrables -->

<div class="container-xl admin">

    <?php
    $mensaje = mostrarANotificiacion(intval($result));

    if ($mensaje) { ?>

        <p class="p-3 my-3 text-bg-success fw-bold text-light text-uppercase text-center notification"><?php echo s($mensaje); ?></p>

    <?php } ?>

    <div class="tab-content py-5" id="pills-tabContent">

        <!-- Sldier -->
        <div class="tab-pane fade show active" id="pills-slider" role="tabpanel" aria-labelledby="pills-slider-tab" tabindex="0">
            <h2 class=" py-5 text-dark fw-bolder text-center bg-white">Slider</h2>

            <div class="d-grid d-md-flex my-3">
                <a href="/admin/slider/agregar.php" class="btn btn-outline-primary btn-lg rounded-0 text-uppercase fw-bold">Add Slide</a>
            </div>

            <div class="grid aetos-slider my-3" style="--bs-gap: 1rem;">


                <?php foreach ($slider as $slide): ?>
                    <div class="bg-primary p-4 g-col-12 g-col-sm-6 g-col-md-4 g-col-lg-3 aetos-slide">
                        <img src="/uploads/images/<?php echo s($slide->image); ?>" alt="<?php echo s($slide->title); ?> Icon" title="<?php echo s($slide->title); ?> Icon" class="img-fluid">
                        <div>
                            <h5 class="text-dark fw-bold text-center"><?php echo s($slide->title); ?></h5>
                            <p class="fs-5 text-white text-uppercase fw-bold text-center"><?php echo s($slide->represents); ?></p>
                        </div>

                        <div class="actions">
                            <a href="/admin/slider/actualizar.php?id=<?php echo s($slide->id); ?>" class="btn btn-lg btn-dark text-uppercase fw-bold rounded-0 w-100 mb-3">Update Slide</a>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo s($slide->id); ?>">
                                <input type="hidden" name="type" value="slide">
                                <input type="submit" value="Delete Slide" class="btn btn-lg btn-danger text-uppercase fw-bold rounded-0 w-100">
                            </form>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>

        <!-- Services -->
        <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab" tabindex="0">
            <h2 class=" py-5 text-dark fw-bolder text-center bg-white">Services</h2>

            <div class="d-grid d-md-flex my-3">
                <a href="/admin/services/agregar.php" class="btn btn-lg btn-outline-primary rounded-0  text-uppercase fw-bold">Add Service</a>
            </div>

            <div class="grid my-3 aetos__services">

                <?php foreach ($services as $service): ?>
                    <div class="g-col-12 g-col-sm-6 g-col-md-4 g-col-lg-3 bg-primary aetos-service">
                        <img src="/uploads/images/<?php echo s($service->image); ?>" alt="<?php echo s($service->name); ?> Image" class="img-fluid object-fit-cover">
                        <div class="service_info">
                            <h5 class="fw-bold text-uppercase"><?php echo s($service->name); ?></h5>
                            <p class="fw-lighter"><?php echo s($service->description); ?></p>
                        </div>
                        <div class="actions">
                            <a href="/admin/services/actualizar.php?id=<?php echo s($service->id); ?>" class="btn btn-lg btn-dark rounded-0 fw-bold text-uppercase w-100 mb-3">Update Service</a>
                            <form method="post" class="w-100">
                                <input type="hidden" name="id" value="<?php echo s($service->id); ?>">
                                <input type="hidden" name="type" value="service">
                                <input type="submit" value="Delete Service" class="btn btn-lg btn-danger rounded-0 text-uppercase fw-bold w-100">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- Works -->
        <div class="tab-pane fade" id="pills-works" role="tabpanel" aria-labelledby="pills-works-tab" tabindex="0">
            <h2 class=" py-5 text-dark fw-bolder text-center bg-white">Works</h2>
            <div class="my-3 d-grid-d-md-flex">
                <a href="/admin/portfolio/agregar.php" class="btn btn-lg btn-outline-primary rounded-0 text-uppercase fw-bold">Add Work</a>
            </div>

            <div class="grid my-3 aetos-works">

                <?php foreach ($works as $work): ?>
                    <div class="g-col-12 g-col-sm-6 g-col-md-4 g-col-lg-3 bg-primary work">
                        <img src="/uploads/images/<?php echo s($work->image); ?>" alt="<?php echo s($work->title); ?> Image" class="img-fluid object-fit-cover">
                        <div class="work-info">
                            <h3 class="text-uppercase fw-bold"><?php echo s($work->title); ?></h3>
                            <p><strong>Brand: </strong><?php echo s($work->brand); ?></p>
                            <p class="description"><strong>Description: </strong><?php echo s($work->description); ?></p>
                        </div>
                        <div class="actions">
                            <a href="/admin/portfolio/actualizar.php?id=<?php echo s($work->id); ?>" class="btn btn-lg btn-dark btn rounded-0 fw-bold text-uppercase w-100 mb-3">Update Work</a>
                            <form method="post" class="w-100">
                                <input type="hidden" name="id" value="<?php echo s($work->id); ?>">
                                <input type="hidden" name="type" value="work">
                                <input type="submit" value="Delete Work" class="btn btn-lg btn-danger rounded-0 fw-bold text-uppercase w-100">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>

        </div>

        <!-- Contact Info -->
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <h2 class=" py-5 text-dark fw-bolder text-center bg-white">About Aëtos</h2>

            <div class="table-responsive-md my-3">
                <table class="table table-hover align-middle contact-info">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Section</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($about as $content): ?>
                            <tr>
                                <td><?php echo s($content->section); ?></td>
                                <th scope="row"><?php echo s($content->title); ?></th>
                                <td><?php echo s($content->content); ?></td>
                                <td><?php echo s($content->created); ?></td>
                                <td><?php echo s($content->updated); ?></td>
                                <td>
                                    <a href="/admin/about/actualizar.php?id=<?php echo s($content->id); ?>" class="btn btn-lg btn-primary rounded-0 fw-bold text-uppercase w-100">Update</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<?php incluirTemplate('footer'); ?>