<!doctype html>
<html>
<head>
    <?php echo HTML::style('css/login.css'); ?>
    <?php echo HTML::script('js/jquery.js'); ?>
    <?php echo HTML::script('js/script.js'); ?>
    <title>Bitller - Log In</title>
</head>
<body>
<div class="login">
    <div class="login-form-top">Sign In</div>
    <form name="login" method="post" class="login-form">

        <?php if (isset($disabledAccount)): ?>
        <div class="other-error">
             Your account has been disabled
        </div>
        <?php endif; ?>

        <!-- BEGIN email input -->
        <input type="text" name="email" class="input email<?php if (isset($emailError)): ?> error-input<?php endif; ?>" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" autocomplete="off">
        <?php if (isset($emptyEmail)): ?>
            <span class="error-message">Please enter your email</span>
        <?php elseif (isset($invalidEmail)): ?>
            <span class="error-message">Please enter a valid email</span>
        <?php endif; ?>
        <!-- END email input -->

        <!-- BEGIN password input -->
        <input type="password" name="password" class="input password<?php if(isset($passwordError)): ?> error-input<?php endif; ?>" placeholder="Password">
        <?php if (isset($emptyPassword)): ?>
            <span class="error-message">Please enter your account password</span>
        <?php elseif(isset($invalidLogin)): ?>
            <span class="error-message">Invalid email or password</span>
        <?php endif; ?>
        <!-- END password input -->

        <input type="submit" value="Log In" class="login-button">
    </form>

    <a href="register" class="register-btn"><button class="register">Create new account</button></a>
</div>
<!--<div class="popup">
    <div class="content">
        Alert message goes here.
    </div>
</div>-->
</body>
</html>