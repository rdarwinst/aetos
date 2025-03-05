<?php

use App\Usuario;

require 'includes/app.php';

$errores = Usuario::getErrores();
$error = false;

$token = s($_GET['token']);

$usuario = Usuario::where('token', $token);

if (empty($usuario)) {
    Usuario::setError('error', 'Invalid Token.');
    $error = true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password = new Usuario($_POST['user']);

    $errores = $password->comprobarPassword();

    if (empty($errores)) {
        $usuario->password = null;
        $usuario->password = $password->password;
        $usuario->hashPassword();
        $usuario->token = null;
        
        $resultado = $usuario->guardar();

        if ($resultado) {
            header('Location: /login.php?success=2');
        }
    }
}


incluirTemplate('header');

?>

<main class="py-5 min-vh-100 login">

    <div class="container-xl min-vh-100 d-flex align-items-center justify-content-center">

        <?php if ($error) return; ?>

        <div class="row login-form">
            <div class="col-4 w-100 mx-auto bg-dark d-flex flex-column py-3 px-5">

                <a href="/" class="text-center"><img src="/build/img/logo-azul.svg" alt="Logo Aetos" class="img-fluid logo w-50 align-self-center"></a>

                <form method="post" class="my-5 needs-validation" data-bs-theme="dark" novalidate>

                    <div class="form-floating mb-4">
                        <input
                            type="password"
                            name="user[password]"
                            id="password"
                            class="form-control rounded-0 <?php echo isset($errores['password']) ? 'is-invalid' : ''; ?>"
                            placeholder="name@example.com"
                            required>
                        <label for="password" class="text-primary">Password</label>
                        <div class="invalid-feedback"><?php echo $errores['password'] ?? 'Password field cannot be empty.'; ?></div>
                    </div>

                    <div class="my-3 d-flex justify-content-end">
                        <a href="login.php" class="link-primary text-decoration-none">Do you already have an account? Log in.</a>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg btn-primary fw-bold text-uppercase rounded-0 fs-6">Reset Password <i class="bi bi-key-fill"></i></button>
                    </div>

                </form>
                <p class="m-0 text-center fw-lighter text-primary" style="font-size: 14px;">&copy; All rights reserved. Desgined by Aëtos.</p>
            </div>
        </div>

    </div><!-- .container-xl -->
</main>

<?php incluirTemplate('footer'); ?>