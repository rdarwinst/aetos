<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aetos</title>
    <!-- Tipografías -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300;400;700;900&family=Nunito:wght@300;400;700;900&display=swap
"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300;400;700;900&family=Nunito:wght@300;400;700;900&display=swap
">
    </noscript>
    <!-- Íconos -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </noscript>

    <!-- CSS Propio -->
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="prefetch" href="build/js/bundle.min.js">
</head>

<body>

    <main class="py-5 min-vh-100 login">

        <div class="container-xl min-vh-100 d-flex align-items-center justify-content-center">

            <div class="row login-form">
                <div class="col-4 w-100 mx-auto bg-dark d-flex flex-column py-3 px-5">

                    <a href="/" class="text-center"><img src="/build/img/logo-azul.svg" alt="Logo Aetos" class="img-fluid logo w-50 align-self-center"></a>

                    <form action="" class="my-5 needs-validation" data-bs-theme="dark" novalidate>

                        <div class="form-floating mb-4">
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="form-control rounded-0" 
                                placeholder="name@example.com"
                                required>                                
                            <label for="email" class="text-primary">Email</label>
                            <div class="invalid-feedback">Email field cannot be empty.</div>
                        </div>

                        <div class="form-floating mb-4">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-control rounded-0" 
                                placeholder="Your Password"
                                required>                                
                            <label for="passwword" class="text-primary">Password</label>
                            <div class="invalid-feedback">Password field cannot be empty.</div>
                        </div>

                        <div class="my-3 d-flex justify-content-end">
                            <a href="#" class="link-primary text-decoration-none">¿Forgot Password?</a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-primary fw-bold text-uppercase rounded-0 fs-6">Login <i class="bi bi-door-open-fill"></i></button>
                        </div>

                    </form>
                    <p class="m-0 text-center fw-lighter text-primary" style="font-size: 14px;">&copy; All rights reserved. Desgined by Aëtos.</p>
                </div>
            </div>

        </div><!-- .container-xl -->
    </main>

    <script src="build/js/bundle.min.js" defer></script>
</body>

</html>