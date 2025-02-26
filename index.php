<?php

use App\About;
use App\Services;
use App\Slider;

require './includes/app.php';

$sliders = Slider::all();
$services = Services::all();

incluirTemplate('header');
?>

<div class="navbar fixed-top" data-bs-theme="dark">
    <div class="container-fluid barra-navegacion">
        <a href="/" class="navbar-brand">
            <img src="/build/img/logo-blanco.svg" alt="Logo Aëtos" width="150">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle Navigation" style="border: none; outline: none;">
            <div class="dots">
                <span class="dot" style="width: 14px; height: 14px; background-color: #FFFFFF; display: inline-block;"></span>
                <span class="dot" style="width: 14px; height: 14px; background-color: #FFFFFF; display: inline-block;"></span>
            </div>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column justify-content-center h-100 pe-3">
                    <li class="nav-item">
                        <a href="#about" class="text-center nav-link link-primary fs-1 fw-bold">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#services" class="text-center nav-link link-primary fs-1 fw-bold">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#portfolio" class="text-center nav-link link-primary fs-1 fw-bold">Works</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="text-center nav-link link-primary fs-1 fw-bold">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<header class="min-vh-100 w-100 section home" id="home">
    <div class="container-xl min-vh-100 d-flex justify-content-center align-items-end">
        <div class="headers">
            <div class="header-1">
                <h1 class="powerful">Po<span>werf</span>ul</h1>
                <a href="#about" style="font-size: 14px;">Read More</a>
            </div>
            <div class="header-2">
                <h2>B<span>rand</span>s</h2>
            </div>
        </div>
    </div>
</header>

<div class="py-5 min min-vh-100 aetos-icons section">
    <div class="container-xl min-vh-100">
        <div class="d-flex flex-column justify-content-center align-items-center min-vh-100 subElement swiper">
            <div class="d-flex flex-column justify-content-center align-items-center complementary">
                <p class="text-white fw-lighter">What we truly are:</p>
                <p class="text-white fw-lighter">Strategic ally to build <span>Powerful Brands</span> that improve the world</p>
            </div>
            <div class="swiper-wrapper">
                <?php foreach ($sliders as $slide): ?>
                    <div class="swiper-slide">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img src="uploads/images/<?php echo s($slide->image); ?>" alt="Aetos Icon" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <div class="icon-info">
                                    <h2 class="text-center text-md-start"><?php echo s($slide->title); ?> <span><?php echo s($slide->represents); ?></span></h2>
                                    <p class="text-center text-md-start">&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>

<section class="py-5 min-vh-100 section about" id="about">
    <div class="container-xl min-vh-100">
        <div class="row justify-content-around align-items-center min-vh-100">
            <div class="col-md-5 subElement">
                <p class="fs-5 text-center text-md-start text-white">Brand Impact</p>
                <h2 class="text-center text-md-start">Create, <span>Engage,</span> <span>Grow</span></h2>
                <p class="fs-5 text-center text-md-start text">Ignite <span class="fw-bold">Your Brand</span> Story</p>
            </div>
            <div class="col-md-4 subElement complementary">
                <p><?php
                    $aboutText = About::where('title', 'About Info');
                    echo nl2br(s($aboutText->content)); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 min-vh-100 d-flex align-items-center section services" id="services">
    <div class="container-xl d-flex flex-column justify-content-center align-items-center text-center">
        <h2 class="order-2 order-md-1 subElement">We create & reposition <span>Powerful Brands</span></h2>
        <div class="row mx-5 justify-content-center align-items-center gap-3 my-4 order-1 order-md-2 subElement">
            <?php foreach ($services as $service): ?>
                <div class="col-md-3 service">
                    <img src="/uploads/images/<?php echo s($service->image); ?>" alt="<?php echo s($service->name); ?> Image" class="img-fluid">
                    <div class="service__info">
                        <h3 class="service__title"><?php echo s($service->name); ?></h3>
                        <ul class="text-start">
                            <?php
                            $items = explode(', ', $service->description);
                            foreach ($items as $item):
                            ?>
                                <li><?php echo s($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <p class="mt-2 m-md-0 fs-5 text-center order-3 subElement w-75 mx-auto">We define brand strategies that add value, help our clients to stand out and achieve their success.</p>
    </div>
</section>

<section class="py-5 min-vh-100 section portfolio" id="portfolio">
    <div class="container-xl min-vh-100">
        <div class="row justify-content-between align-items-center min-vh-100">
            <div class="col-md-6 order-2 order-md-1 texts subElement">
                <p>Clear Vision</p>
                <h2 class="fw-bold">Build Your <span>Legacy</span></h2>
                <p class="complementary">See how we allied with visionary teams to build brands that stand out and connected with their target audiences.</p>
                <div class="d-grid d-md-flex btn-container" style="margin-top: 5rem;">
                    <button type="button" class="btn btn-primary btn-lg rounded-0 fs-6 fw-bold text-uppercase" data-bs-toggle="modal" data-bs-target="#modalPortfolio">View Portfolio <i class="bi bi-eye-fill"></i></button>
                </div>
            </div>

            <div class="col-md-5 order-1 order-md-2 subElement works">
                <div class="swiper" id="swiper-works">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="grid">
                                <div class="g-col-6 work" style="background-image: url(/build/img/galeria-1.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 1</h3>
                                        <p class="work__description">Qui nulla do officia cupidatat deserunt tempor Lorem occaecat nostrud id eiusmod incididunt exercitation.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                                <div class="g-col-6 work" style="background-image: url(/build/img/galeria-2.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 2</h3>
                                        <p class="work__description">Laborum occaecat velit ad quis in occaecat Lorem ea pariatur est elit.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                                <div class="g-col-4 work" style="background-image: url(/build/img/galeria-3.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 3</h3>
                                        <p class="work__description">Ullamco laborum adipisicing eiusmod irure dolor ea eu.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                                <div class="g-col-4 work" style="background-image: url(/build/img/galeria-4.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 4</h3>
                                        <p class="work__description">Consequat aute sint laborum elit.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                                <div class="g-col-4 work" style="background-image: url(/build/img/galeria-5.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 5</h3>
                                        <p class="work__description">Ea labore est consectetur ea sit commodo ipsum.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="grid">
                                <div class="g-col-4 work" style="background-image: url(/build/img/galeria-3.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 3</h3>
                                        <p class="work__description">Ullamco laborum adipisicing eiusmod irure dolor ea eu.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                                <div class="g-col-4 work" style="background-image: url(/build/img/galeria-4.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 4</h3>
                                        <p class="work__description">Consequat aute sint laborum elit.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                                <div class="g-col-4 work" style="background-image: url(/build/img/galeria-5.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 5</h3>
                                        <p class="work__description">Ea labore est consectetur ea sit commodo ipsum.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                                <div class="g-col-6 work" style="background-image: url(/build/img/galeria-1.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 1</h3>
                                        <p class="work__description">Qui nulla do officia cupidatat deserunt tempor Lorem occaecat nostrud id eiusmod incididunt exercitation.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                                <div class="g-col-6 work" style="background-image: url(/build/img/galeria-2.jpg);">
                                    <div class="work__info">
                                        <h3 class="work__title">Work 2</h3>
                                        <p class="work__description">Laborum occaecat velit ad quis in occaecat Lorem ea pariatur est elit.</p>
                                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#projectModal">
                                            See More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-pagination"></div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 min-vh-100 section team" id="team">
    <div class="container-xl min-vh-100">
        <p class="team-text mb-0 p-0 subElement">"We are passionate about taking your brand to the next level. Together, <span>we turn ideas into exceptional results."</span></p>
        <div class="row flex-md-column">
            <div class="col-6 col-md-12">
                <div class="row mt-3 mb-5 justify-content-center">
                    <div class="col-md-3 mb-3 m-md-0 subElement">
                        <div class="card" data-bs-theme="light">
                            <picture>
                                <source srcset="/build/img/equipo-1.avif" type="image/avif">
                                <source srcset="/build/img/equipo-1.webp" type="image/webp">
                                <source srcset="/build/img/equipo-1.jpg" type="image/jpeg">
                                <img loading="lazy" width="120" height="300" src="/build/img/equipo-1.jpg" alt="People" class="card-img-top object-fit-cover">
                            </picture>
                            <div class="card-body">
                                <p class="card-text">Erlich Bacman</p>
                                <p class="card-text">Marketing</p>
                                <div class="d-flex gap-3">
                                    <a href="#" class="link-dark" aria-label="instagram-link"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="link-dark" aria-label="tiktok-link"><i class="bi bi-tiktok"></i></a>
                                    <a href="#" class="link-dark" aria-label="facebook-link"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="link-dark" aria-label="whatsapp-link"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 m-md-0 subElement">
                        <div class="card" data-bs-theme="light">
                            <picture>
                                <source srcset="/build/img/equipo-2.avif" type="image/avif">
                                <source srcset="/build/img/equipo-2.webp" type="image/webp">
                                <source srcset="/build/img/equipo-2.jpg" type="image/jpeg">
                                <img loading="lazy" width="120" height="300" src="/build/img/equipo-2.jpg" alt="People" class="card-img-top object-fit-cover">
                            </picture>
                            <div class="card-body">
                                <p class="card-text">Laurie Bream</p>
                                <p class="card-text">UX / UI Designer</p>
                                <div class="d-flex gap-3">
                                    <a href="#" class="link-dark" aria-label="instagram-link"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="link-dark" aria-label="tiktok-link"><i class="bi bi-tiktok"></i></a>
                                    <a href="#" class="link-dark" aria-label="facebook-link"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="link-dark" aria-label="whatsapp-link"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 m-md-0 subElement">
                        <div class="card" data-bs-theme="light">
                            <picture>
                                <source srcset="/build/img/equipo-3.avif" type="image/avif">
                                <source srcset="/build/img/equipo-3.webp" type="image/webp">
                                <source srcset="/build/img/equipo-3.jpg" type="image/jpeg">
                                <img loading="lazy" width="120" height="300" src="/build/img/equipo-3.jpg" alt="People" class="card-img-top object-fit-cover">
                            </picture>
                            <div class="card-body">
                                <p class="card-text">Monical Hall</p>
                                <p class="card-text">Software Dev</p>
                                <div class="d-flex gap-3">
                                    <a href="#" class="link-dark" aria-label="instagram-link"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="link-dark" aria-label="tiktok-link"><i class="bi bi-tiktok"></i></a>
                                    <a href="#" class="link-dark" aria-label="facebook-link"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="link-dark" aria-label="whatsapp-link"><i class="bi bi-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-12 align-self-center subElement">
                <h2>Create,<span>Innovate</span></h2>
            </div>
        </div>
    </div>
</section>

<section class="py-5 min-vh-100 section contact" id="contact">
    <div class="container-xl min-vh-100">
        <div class="min-vh-100 row justify-content-around align-items-center">
            <div class="col-md-5 subElement">
                <p>We are open</p>
                <h2>To Work <span>Worldwide</span></h2>
                <p>Our mission is to build powerful brand projects; so, let us know what you have on mind.</p>
            </div>
            <div class="col-md-5 subElement">
                <form class="w-75 mx-auto needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="name" class="form-label text-primary text-uppercase">Your Name</label>
                        <input type="text" name="name" id="name" class="form-control rounded-0 bg-transparent border-0 border-bottom border-primary text-white fw-lighter" required>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-primary text-uppercase">Your Email</label>
                        <input type="email" name="email" id="email" class="form-control rounded-0 bg-transparent border-0 border-bottom border-primary text-white fw-lighter" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label text-primary text-uppercase">Brand</label>
                        <input type="text" name="brand" id="brand" class="form-control rounded-0 bg-transparent border-0 border-bottom border-primary text-white fw-lighter">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label text-primary text-uppercase">Country</label>
                        <input type="text" name="country" id="country" class="form-control rounded-0 bg-transparent border-0 border-bottom border-primary text-white fw-lighter">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label text-primary text-uppercase">How did you hear about Aëtos?</label>
                        <input type="text" name="subject" id="subject" class="form-control rounded-0 bg-transparent border-0 border-bottom border-primary text-white fw-lighter" required>
                        <div class="invalid-feedback">Please enter the subject.</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label text-primary text-uppercase">Type of service you are interested in?</label>
                        <textarea name="message" id="message" cols="3" class="form-control rounded-0 bg-transparent border-0 border-bottom border-primary text-white fw-lighter" required></textarea>
                        <div class="invalid-feedback">Please enter your message.</div>
                    </div>
                    <div class="d-grid d-md-flex">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold text-uppercase mt-3 rounded-0">Send Message <i class="bi bi-send-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="py-5 footer section">
    <div class="container-xl">
        <div class="row align-items-center justify-content-center">
            <div class="col-6 subElement">
                <h2>Powerful <span>Brands</span></h2>
            </div>
            <div class="col-6 subElement">
                <div class="row">
                    <div class="col-12 col-md-6 p-0 mb-5">
                        <h3 class="fw-bold mb-3">Miami, US</h3>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <p class="fs-6">
                                    <?php
                                    $hours = About::where('title', 'Business hours');
                                    echo s($hours->content);
                                    ?>
                                </p>
                            </li>
                            <li class="nav-item">
                                <?php
                                $email = About::where('title', 'Email');
                                ?>
                                <a href="mailto:<?php echo s($email->content); ?>" class="link-dark text-decoration-none fs-6"><?php echo s($email->content); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 p-0">
                        <h3 class="fw-bold mb-3">Site</h3>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="#about" class="nav-link m-0 p-0 p-1 link-dark">About</a></li>
                            <li class="nav-item"><a href="#services" class="nav-link m-0 p-0 p-1 link-dark">Services</a></li>
                            <li class="nav-item"><a href="#portfolio" class="nav-link m-0 p-0 p-1 link-dark">Works</a></li>
                            <li class="nav-item"><a href="#contact" class="nav-link m-0 p-0 p-1 link-dark">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="text-center fw-lighter my-3 m-md-0">&copy; All rights reserved. Designed by Aëtos.</p>
</footer>

<div class="social-networks">
    <div class="position-fixed bottom-0 end-0 d-flex flex-column gap-4 me-4 mb-3">
        <?php
        $instagram = About::where('title', 'Instagram');
        $whatsapp = About::where('title', 'WhatsApp');
        ?>
        <a href="<?php echo s($instagram->content); ?>" target="_blank" class="fs-4"><i class="bi bi-instagram"></i></a>
        <a href="<?php echo s($whatsapp->content); ?>" target="_blank" class="fs-4"><i class="bi bi-whatsapp"></i></a>
    </div>
</div>

<div class="position-fixed bottom-0 start-0 m-4 d-none go-home">
    <a href="#home" class="link-dark fs-1"><img src="/build/img/up.svg" alt="GO Home Btn" width="30"></a>
</div>

<!-- Modal Send PortFolio -->
<div class="modal modal-lg fade p5" id="modalPortfolio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalPortfolioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-column w-75 mx-auto">
                <h2 class="popup-title" id="modalPortfolioLabel">View <span>Portfolio</span></h2>
                <p class="text-center fw-lighter">Fill out the form to receive my latest work via email. Let's connect and create!</p>
            </div>
            <div class="modal-body">
                <form class="w-75 mx-auto">
                    <div class="mb-3">
                        <label for="name" class="form-label text-uppercase fs-6">Your Name</label>
                        <input type="text" name="name" id="name" class="form-control bg-primary border border-0 rounded-0 border-bottom border-dark fs-6 fw-lighter">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-uppercase fs-6">Your Email</label>
                        <input type="email" name="email" id="email" class="form-control bg-primary border border-0 rounded-0 border-bottom border-dark fs-6 fw-lighter">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label text-uppercase fs-6">Your Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control bg-primary border border-0 rounded-0 border-bottom border-dark fs-6 fw-lighter">
                    </div>
                    <div class="mt-4 pb-5 d-grid d-md-flex gap-3">
                        <button type="button" class="btn btn-portfolio rounded-0 text-uppercase fw-bold fs-5">Send <i class="bi bi-lightning-charge-fill"></i></button>
                        <button type="button" class="btn btn-outline-danger rounded-0 text-uppercase fw-bold fs-5" data-bs-dismiss="modal">Close <i class="bi bi-x-octagon-fill"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Project -->
<div class="modal modal-lg fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-2 fw-bold text-uppercase" id="projecModalLabel">Project Name</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <picture>
                    <source srcset="" type="image/avif">
                    <source srcset="" type="image/webp">
                    <source srcset="" type="image/jpeg">
                    <img loading="lazy" src="" alt="Work" style="width: 100%; height: 50dvh; object-fit: cover;">
                </picture>
                <div class="contracted-services d-flex py-3 gap-3">
                    <p class="border border-dark m-0 p-3 text-uppercase fw-bold">Web Development</p>
                    <p class="border border-white m-0 p-3 text-uppercase fw-bold text-white">UX / UI</p>
                </div>
                <p class="fw-lighter m-0">Deserunt est fugiat enim laboris ipsum anim. Et in pariatur voluptate velit qui amet qui reprehenderit consectetur do. Fugiat enim ea sint ea esse nulla magna enim duis deserunt id ad. Aute id eu anim nulla mollit aliquip. Consequat et excepteur dolor veniam ex laborum ut dolor cillum cillum sint eiusmod occaecat. Sunt reprehenderit velit velit aliqua amet magna sit.</p>
            </div>
        </div>
    </div>
</div>

<?php incluirTemplate('footer'); ?>