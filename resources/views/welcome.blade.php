<?php
// resources/views/welcome.php

?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PeaceySystem FileManager</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
        rel="stylesheet"
    />

    <!-- Pull in our custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/welcome.css')); ?>">
</head>
<body>
    <div class="login-container">
        <?php if(\Illuminate\Support\Facades\Route::has('login')): ?>
            <div class="top-right links">
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/dashboard')); ?>">Drive</a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>">Log in</a>
                    <?php if(\Illuminate\Support\Facades\Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Logo top‐left -->
        <img
            class="login-logo"
            src="<?php echo e(asset('images/PeaceySystems_Logo25_Big-2048x356.png')); ?>"
            alt="PeaceySystems Logo"
        />

        <!-- The login card -->
        <div class="login-card">
            <h1>Welcome to PeaceySystem!</h1>
            <p>Please sign in to your account</p>

            <!-- Replace with your actual login form action/fields if desired -->
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="email">E-mail <span style="color: red;">*</span></label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="<?php echo e(old('email')); ?>"
                        placeholder="E-mail"
                        required
                        autofocus
                    />
                </div>

                <div class="form-group">
                    <label for="password">Password <span style="color: red;">*</span></label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Password"
                        required
                    />
                </div>

                <div class="checkbox-group">
                    <input
                        id="remember"
                        type="checkbox"
                        name="remember"
                        <?php echo e(old('remember') ? 'checked' : ''); ?>

                    />
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn-primary">
                    Log in
                </button>
            </form>
        </div>
    </div>
</body>
</html>
