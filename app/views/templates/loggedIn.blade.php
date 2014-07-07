<!doctype html>
<html>
<head>
    <?php echo HTML::style('css/style.css'); ?>
    <?php echo HTML::script('js/jquery.js'); ?>
    <?php echo HTML::script('js/jquery.rte.js'); ?>
    <?php echo HTML::script('js/script.js'); ?>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="wrap">
    <div id="header">
        <div class="header-content">
            <div class="logo">

            </div>
            <div class="menu">
                <div class="menu-item"><a href="/home">Home</a></div>
                <div class="menu-item"><a href="/tutorials">Tutorials</a></div>
                <div class="menu-item"><a href="/courses">Courses</a></div>
                <div class="menu-item"><a href="/library">Library</a></div>
            </div>

            <div class="search">
                <input type="text" name="search-box" class="search-box" placeholder="Search for tutorials or people">
                <input type="submit" class="search-button">
            </div>
            <div class="add-tutorial">
                <a href="/add-tutorial"><button class="button turquoise">Add tutorial</button></a>
            </div>
            <div class="account-info">
                <img src="<?php echo URL::to('img/profile.png'); ?>" class="profile-picture">
                <div class="welcome"><a href="#" class="profile-name"><?php if (isset($FirstName)) echo $FirstName; ?></a></div>
                <div class="account-info-ex">
                    <div class="items">
                        <a href="#"><div class="account-item profile">My profile</div></a>
                        <a href="/settings"><div class="account-item settings">Settings</div></a>
                        <a href="/logout"><div class="account-item logout">Logout</div></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="content">
        @yield('content')
    </div>
</div>

</body>
</html>