<?php

require '../includes/app.php';

incluirTemplate('header'); ?>
<!-- Navegacion Principal -->
<nav class="navbar navbar-expand-md py-3 shadow" data-bs-theme="light">
    <div class="container-fluid">
        <a href="/admin" class="navbar-brand">
            <img src="/build/img/logo-azul.svg" alt="Logo Aetos" width="150">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Menu Mobile">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            <form action="" class="d-flex flex-grow-1 me-md-5" role="search" data-bs-theme="dark">
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
        <img src="/build/img/logo-negro.svg" alt="Logo Aetos" width="150" class="img-fluid">
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

<!-- Secciones administrables -->


<div class="container-xl">

    <div class="tab-content py-5" id="pills-tabContent">

        <!-- Sldier -->
        <div class="tab-pane fade show active" id="pills-slider" role="tabpanel" aria-labelledby="pills-slider-tab" tabindex="0">
            <h2 class=" py-5 text-dark fw-bolder text-center bg-white">Slider</h2>

            <div class="d-grid d-md-flex my-3">
                <a href="/admin/slider/agregar.php" class="btn btn-outline-primary btn-lg rounded-0 text-uppercase fw-bold">Add Slide</a>
            </div>

            <div class="table-responsive-md mt-3">
                <table class="table align-middle table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="text-uppercase">Slide</th>
                            <th scope="col" class="text-uppercase">Actions</th>
                        </tr>
                    </thead><!-- thead -->
                    <tbody>

                        <tr>
                            <td class="bg-primary">

                                <div class="d-flex slide align-items-center justify-content-center">
                                    <img src="/build/img/zeus.svg" alt="Slide Icon" style="width: 150px; height: 150px;" class="slide__img">

                                    <div class="slide__info">
                                        <h3 class="text-dark fs-3 fw-bold">Ray</h2>
                                            <h4 class="text-white fs-2 fw-bold text-uppercase">Authority</h4>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <a href="#" class="btn btn-lg btn-outline-primary rounded-0 text-uppercase fw-bold mb-3 w-100">Update Slide</a>
                                <form>
                                    <input type="hidden" name="id">
                                    <button type="submit" class="btn btn-lg btn-outline-danger rounded-0 text-uppercase fw-bold mb-3 w-100">Delete Slide</button>
                                </form>
                            </td>
                        </tr><!-- tr -->

                        <tr>
                            <td class="bg-primary">

                                <div class="d-flex slide align-items-center justify-content-center ">
                                    <img src="/build/img/poseidon.svg" alt="Slide Icon" style="width: 150px; height: 150px;" class="slide__img">

                                    <div class="slide__info">
                                        <h3 class="text-dark fs-3 fw-bold">Trident</h2>
                                            <h4 class="text-white fs-2 fw-bold text-uppercase">Balance</h4>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <a href="#" class="btn btn-lg btn-outline-primary rounded-0 text-uppercase fw-bold mb-3 w-100">Update Slide</a>
                                <form>
                                    <input type="hidden" name="id">
                                    <button type="submit" class="btn btn-lg btn-outline-danger rounded-0 text-uppercase fw-bold mb-3 w-100">Delete Slide</button>
                                </form>
                            </td>
                        </tr><!-- tr -->

                        <tr>
                            <td class="bg-primary">

                                <div class="d-flex slide align-items-center justify-content-center ">
                                    <img src="/build/img/2.svg" alt="Slide Icon" style="width: 150px; height: 150px;" class="slide__img">

                                    <div class="slide__info">
                                        <h3 class="text-dark fs-3 fw-bold">Helmet</h2>
                                            <h4 class="text-white fs-2 fw-bold text-uppercase">Warrior</h4>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <a href="#" class="btn btn-lg btn-outline-primary rounded-0 text-uppercase fw-bold mb-3 w-100">Update Slide</a>
                                <form>
                                    <input type="hidden" name="id">
                                    <button type="submit" class="btn btn-lg btn-outline-danger rounded-0 text-uppercase fw-bold mb-3 w-100">Delete Slide</button>
                                </form>
                            </td>
                        </tr><!-- tr -->

                    </tbody><!-- tbody -->
                </table><!-- table -->
            </div>

        </div>

        <!-- Services -->
        <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab" tabindex="0">
            <h2 class=" py-5 text-dark fw-bolder text-center bg-white">Services</h2>

            <div class="d-grid d-md-flex my-3">
                <a href="#" class="btn btn-lg btn-outline-primary rounded-0  text-uppercase fw-bold">Add Service</a>
            </div>

            <div class="table-responsive-md mt-3">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="text-uppercase">Title</th>
                            <th scope="col" class="text-uppercase">Description</th>
                            <th scope="col" class="text-uppercase">Image</th>
                            <th scope="col" class="text-uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Service 1</th>
                            <td>Anim cupidatat nulla esse nulla proident tempor dolore nostrud ex.</td>
                            <td>
                                <picture>
                                    <source srcset="/build/img/identity-1.avif" type="image/avif">
                                    <source srcset="/build/img/identity-1.webp" type="image/webp">
                                    <source srcset="/build/img/identity-1.jpg" type="image/jpeg">
                                    <img loading="lazy" src="/build/img/identity-1.jpg" alt="Service Image" width="180">
                                </picture>
                            </td>
                            <td>
                                <a href="#" class="btn btn-lg btn-outline-primary rounded-0 fw-bold text-uppercase w-100 mb-3">Update Service</a>
                                <form>
                                    <input type="hidden" name="id">
                                    <button type="button" class="btn btn-lg btn-outline-danger rounded-0 text-uppercase fw-bold w-100">Delete Service</button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Service 2</th>
                            <td>Id veniam incididunt mollit officia enim reprehenderit sit duis incididunt enim sint eiusmod.</td>
                            <td>
                                <picture>
                                    <source srcset="/build/img/identity-2.avif" type="image/avif">
                                    <source srcset="/build/img/identity-2.webp" type="image/webp">
                                    <source srcset="/build/img/identity-2.jpg" type="image/jpeg">
                                    <img loading="lazy" src="/build/img/identity-2.jpg" alt="Service Image" width="180">
                                </picture>
                            </td>
                            <td>
                                <a href="#" class="btn btn-lg btn-outline-primary rounded-0 fw-bold text-uppercase w-100 mb-3">Update Service</a>
                                <form>
                                    <input type="hidden" name="id">
                                    <button type="button" class="btn btn-lg btn-outline-danger rounded-0 text-uppercase fw-bold w-100">Delete Service</button>
                                </form>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Service 3</th>
                            <td>Incididunt consectetur eiusmod sunt enim labore laborum sunt reprehenderit adipisicing ullamco.</td>
                            <td>
                                <picture>
                                    <source srcset="/build/img/identity-3.avif" type="image/avif">
                                    <source srcset="/build/img/identity-3.webp" type="image/webp">
                                    <source srcset="/build/img/identity-3.jpg" type="image/jpeg">
                                    <img loading="lazy" src="/build/img/identity-3.jpg" alt="Service Image" width="180">
                                </picture>
                            </td>
                            <td>
                                <a href="#" class="btn btn-lg btn-outline-primary rounded-0 fw-bold text-uppercase w-100 mb-3">Update Service</a>
                                <form>
                                    <input type="hidden" name="id">
                                    <button type="button" class="btn btn-lg btn-outline-danger rounded-0 text-uppercase fw-bold w-100">Delete Service</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div> <!-- .table-responsive -->

        </div>

        <!-- Works -->
        <div class="tab-pane fade" id="pills-works" role="tabpanel" aria-labelledby="pills-works-tab" tabindex="0">
            <h2 class=" py-5 text-dark fw-bolder text-center bg-white">Works</h2>
        </div>

        <!-- Works -->
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <h2 class=" py-5 text-dark fw-bolder text-center bg-white">Contact Info</h2>
        </div>

    </div>

</div>

<?php incluirTemplate('footer'); ?>