<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- register.php -->
<?= form_open('auth/doRegister'); ?>
    <input type="text" name="username" placeholder="Username" value="<?= old('username') ?>">
    <?= isset($validation) ? $validation->getError('username') : ''; ?>

    <input type="text" name="email" placeholder="Email" value="<?= old('email') ?>">
    <?= isset($validation) ? $validation->getError('email') : ''; ?>

    <input type="password" name="password" placeholder="Password">
    <?= isset($validation) ? $validation->getError('password') : ''; ?>

    <button type="submit">Register</button>
<?= form_close(); ?>

</body>
</html>