<?php

use App\Usuario;

require 'includes/app.php';
incluirTemplate('header');

$errores = Usuario::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $auth = new Usuario($_POST['user']);

    $errores = $auth->validarLogin();

    if (empty($errores)) {
        $user = Usuario::where('email', $auth->email);

        if ($user) {
            if ($user->validarPassword($auth->password)) {

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['id'] = $user->id;
                $_SESSION['name'] = $user->name . " " . $user->lastname;
                $_SESSION['login'] = true;

                header('Location: /admin');
                exit;
            }
        } else {
            Usuario::setError('email', 'The entered email is not registered.');
        }
    }

    $errores = Usuario::getErrores();
}

?>

<main class="py-5 min-vh-100 login">

    <div class="container-xl min-vh-100 d-flex align-items-center justify-content-center">

        <div class="row login-form">
            <div class="col-4 w-100 mx-auto bg-dark d-flex flex-column py-3 px-5">

                <a href="/" class="text-center"><img src="/build/img/logo-azul.svg" alt="Logo Aetos" class="img-fluid logo w-50 align-self-center"></a>

                <form method="post" class="my-5 needs-validation" data-bs-theme="dark" novalidate>

                    <div class="form-floating mb-4">
                        <input
                            type="email"
                            name="user[email]"
                            id="email"
                            class="form-control rounded-0 <?php echo isset($errores['email']) ? 'is-invalid' : ''; ?>"
                            placeholder="name@example.com"
                            required>
                        <label for="email" class="text-primary">Email</label>
                        <div class="invalid-feedback"><?php echo $errores['email'] ?? 'Email field cannot be empty.'; ?></div>
                    </div>

                    <div class="form-floating mb-4">
                        <input
                            type="password"
                            name="user[password]"
                            id="password"
                            class="form-control rounded-0 <?php echo isset($errores['password']) ? 'is-invalid' : ''; ?>"
                            placeholder="Your Password"
                            required>
                        <label for="passwword" class="text-primary">Password</label>
                        <div class="invalid-feedback"><?php echo $errores['password'] ?? 'Password field cannot be empty.'; ?></div>
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

<?php incluirTemplate('footer'); ?>