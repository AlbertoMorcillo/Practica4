<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../estilo/Styles.css" rel="stylesheet">
</head>
<body class="login-page">
    <div class="login-form">
        <h1>Sign In</h1>
        <br>
        <?php if (isset($errors) && !empty($errors)) : ?>
        <div class="error-message">
            <?php echo $errors ?>
        </div>
        <?php endif; ?>
        <form action="signin.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($validEmail); ?>" autofocus>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($validPassword); ?>">

            <input type="submit" value="Sign In">
        </form>
        <p class="green-text">¿No tienes una cuenta?</p>
        <div class="login">
            <form method="post" action="../controlador/login.php">
                <button type="submit" name="signup" class="btn-login">Login</button>
            </form>
        </div>
        <div class="return">
            <form method="post" action="../controlador/index.php">
                <button type="submit" name="return" class="btn-return">Inicio</button>
            </form>
        </div>
    </div>
</body>
</html>