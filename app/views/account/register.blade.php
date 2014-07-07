<!doctype html>
<html>
<head>
    <?php echo HTML::style('css/register.css'); ?>
    <?php echo HTML::script('js/jquery.js'); ?>
    <?php echo HTML::script('js/script.js'); ?>
    <title>Sign Up for a Bitller account</title>
</head>
<body>
<div class="register">
    <div class="register-form-top">Sign Up</div>
    <form name="register" method="post" class="register-form">
        <!-- BEGIN first-name input -->
        <input type="text" name="first-name" class="input first-name<?php if (isset($firstNameError)): ?> error-input<?php endif; ?>" placeholder="First name" value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : ''; ?>" autocomplete="off">
        <?php if (isset($emptyFirstName)): ?>
            <span class="error-message">Please enter your first name</span>
        <?php elseif (isset($invalidFirstName)): ?>
            <span class="error-message">First name can contain only alphabetical characters</span>
        <?php elseif (isset($tooShortFirstName)): ?>
            <span class="error-message">Your first or last name is too short</span>
        <?php endif; ?>
        <!-- END first-name input -->

        <!-- BEGIN last-name input -->
        <input type="text" name="last-name" class="input last-name<?php if (isset($lastNameError)): ?> error-input<?php endif; ?>" placeholder="Last name" value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : ''; ?>" autocomplete="off">
        <?php if (isset($emptyLastName)): ?>
            <span class="error-message">Please enter your last name</span>
        <?php elseif (isset($invalidLastName)): ?>
            <span class="error-message">Last name can contain only alphabetical characters</span>
        <?php endif; ?>
        <!-- END last-name input -->

        <!-- BEGIN email input -->
        <input type="text" name="email" class="input email<?php if (isset($emailError)): ?> error-input<?php endif; ?>" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" autocomplete="off">
        <?php if (isset($emptyEmail)): ?>
            <span class="error-message">Please enter your email address</span>
        <?php elseif (isset($invalidEmail)): ?>
            <span class="error-message">Please enter a valid email address</span>
        <?php elseif (isset($alreadyUsedEmail)): ?>
            <span class="error-message">This email is already used by another account</span>
        <?php endif; ?>
        <!-- END email input -->

        <!-- BEGIN password input -->
        <input type="password" name="password" class="input password<?php if (isset($passwordError)): ?> error-input<?php endif; ?>" placeholder="Password">
        <?php if (isset($emptyPassword)): ?>
            <span class="error-message">Please enter a password long at least <?php echo $passwordLength; ?> characters</span>
        <?php elseif (isset($passwordTooShort)): ?>
            <span class="error-message">Please enter a password with at least <?php echo $passwordlength; ?> characters</span>
        <?php endif; ?>
        <!-- END password input -->

        <input type="submit" class="register-button" value="Create account">
    </form>
    <a href="login" class="login-btn"><button class="login">Have an account? Log In</button></a>
</div>
</body>
</html>