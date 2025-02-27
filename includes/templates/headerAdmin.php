<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Maqueta del sitio Aëtos">
    <meta name="keywords" content="Branding, Web Site, Web Design, Marketing">
    <title>Aëtos</title>
    <link rel="icon" href="/build/img/isotipo.svg" type="image/x-icon">

    <!-- Tipografías -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300;400;700;900&family=Nunito:wght@300;400;700;900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300;400;700;900&family=Nunito:wght@300;400;700;900&display=swap">
    </noscript>

    <!-- Íconos -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </noscript>

    <!-- Animaciones -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.min.css">
    </noscript>

    <!-- Swiper -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    </noscript>

    <!-- CSS Propio -->
    <link rel="stylesheet" href="/build/css/app.min.css">

    <link rel="prefetch" href="/build/js/bundle.min.js">
    <link rel="prefetch" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">
</head>

<body data-bs-theme="dark">

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
                <form action="" class="d-flex flex-grow-1 me-md-5" role="search" data-bs-theme="dark">
                    <input type="search" name="search" id="search" class="form-control me-2 rounded-0 fw-lighter">
                    <button type="submit" class="btn btn-primary btn-lg rounded-0"><i class="bi bi-search"></i></button>
                </form>
                <ul class="navbar-nav text-center mt-3 mt-md-0">
                    <li class="nav-item d-flex flex-column">
                        <a href="#adminPanel" class="nav-link link-primary text-uppercase fw-bold" data-bs-toggle="offcanvas" role="button" aria-controls="#adminPanel">Open Panel</a>
                    </li>
                    <li class="nav-item d-flex flex-column">
                        <a href="/logout.php" class="nav-link link-primary text-uppercase fw-bold">Logout</a>
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
                <p class="fs-5 text-dark fw-bold text-center mt-3"><?php echo s($_SESSION['name']); ?></p>
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