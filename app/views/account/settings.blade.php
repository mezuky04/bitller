@extends('templates.loggedIn')
@section('content')
<div class="settings-account">
    <a href="#"><img class="cover" src="<?php echo URL::to('img/account-cover.png'); ?>"></a>
    <a href="#"><img class="profile" src="<?php echo URL::to('img/account-picture.png'); ?>"></a>
    <span class="user-name"><a href="#">{{ $completeName; }}</a></span>
    <span class="followers">107 followers</span>
</div>
<div class="setting-box">
    <div class="general-settings">
        <span class="title">General settings</span>
        <div class="options">
            <!-- BEGIN Name setting -->
            <div class="option">
                <div class="name-icon"><img src="<?php echo URL::to('img/settings-name.png'); ?>"></div>
                <div class="setting-option-value">
                    <div class="settings-name">Name</div>
                    <div class="name-value"><?php if(isset($completeName) && $completeName) echo $completeName; ?></div>
                </div>
                <button class="button yellow edit">Edit</button>
            </div>
            <div class="option-expanded">
                <div class="name-icon"><img src="<?php echo URL::to('img/settings-name.png'); ?>"></div>
                <div class="setting-option-value">
                    <div class="settings-name">Name</div>
                    <div class="name-value"></div>
                </div>
                <button class="button yellow edit cancel-setting">Cancel</button>
                <div class="setting-exp-content">
                    <div class="name-inputs">
                        <form name="setting-name-form" method="post" action="name">
                            <div class="input">
                                <span class="input-text">First name</span>
                                <input type="text" name="first-name" value="{{ $firstName; }}" class="name-input">
                            </div>
                            <div class="input">
                                <span class="input-text">Last name</span>
                                <input type="text" name="last-name" value="{{ $lastName; }}" class="name-input">
                            </div>
                            <div class="display-as">
                                <span class="input-text">Display as</span>
                                <select name="display-as" class="display-as-select">
                                    <option value="first-last-name">{{ $firstName.' '.$lastName; }}</option>
                                    <option value="lsat-first-name">{{ $lastName.' '.$firstName; }}</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="setting-desc">
                        <span class="bold">Remember:</span> you can change your name only few times, so please use your real name and do not use special or numeric characters
                    </div>
                </div>
                <div class="password-to-save">
                    <span class="text">To save changes to your account, please enter your Bitller password</span>
                    <form name="setting-name-from">
                        <div class="input">
                            <span class="input-text">Password</span>
                            <input type="password" class="name-input">
                        </div>
                        <input type="submit" value="Save changes" class="button turquoise">
                    </form>
                </div>
            </div>
            <!-- END Name setting -->
            <div class="divider"></div>

            <!-- BEGIN Email setting -->
            <div class="option">
                <div class="name-icon"><img src="<?php echo URL::to('img/settings-email.png'); ?>"></div>
                <div class="setting-option-value">
                    <div class="settings-name">Email</div>
                    <div class="name-value"><?php if(isset($email) && $email) echo $email; ?></div>
                </div>
                <button class="button yellow edit">Edit</button>
            </div>
            <div class="option-expanded">
                <div class="name-icon"><img src="<?php echo URL::to('img/settings-email.png'); ?>"></div>
                <div class="setting-option-value">
                    <div class="settings-name">Email</div>
                    <div class="name-value"></div>
                </div>
                <button class="button yellow edit cancel-setting">Cancel</button>
                <form name="setting-name-form" method="post" action="name">
                    <div class="input">
                        <span class="input-text">First name</span>
                        <input type="text" name="first-name" value="{{ $firstName; }}" class="name-input">
                    </div>
                </form>
                <div class="password-to-save">
                    <span class="text">To save changes to your account, please enter your Bitller password</span>
                    <form name="setting-name-from">
                        <div class="input">
                            <span class="input-text">Password</span>
                            <input type="password" class="name-input">
                        </div>
                        <input type="submit" value="Save changes" class="button turquoise">
                    </form>
                </div>
            </div>
            <!-- END Email settings -->
            <div class="divider"></div>

            <!-- BEGIN Password setting -->
            <div class="option">
                <div class="name-icon"><img src="<?php echo URL::to('img/settings-password.png'); ?>"></div>
                <div class="setting-option-value">
                    <div class="settings-name">Password</div>
                    <div class="name-value">Never updated</div>
                </div>
                <button class="button yellow edit">Edit</button>
            </div>
            <div class="option-expanded">
                <div class="name-icon"><img src="<?php echo URL::to('img/settings-password.png'); ?>"></div>
                <div class="setting-option-value">
                    <div class="settings-name">Password</div>
                    <div class="name-value"></div>
                </div>
                <button class="button yellow edit cancel-setting">Cancel</button>
                <div class="setting-inputs">
                    First name <input type="text">
                    Last name <input type="text">
                </div>
            </div>
            <!-- END Password setting -->

        </div>
    </div>

    <div class="divider"></div>

    <div class="general-settings">
        <span class="title">Security</span>
        <div class="options">
            <div class="option">
                <div class="name-icon"><img src="<?php echo URL::to('img/settings-name.png'); ?>"></div>
                <div class="setting-option-value">
                    <div class="settings-name">Two-step authentication</div>
                    <div class="name-value">Disabled</div>
                </div>
                <button class="button yellow edit">Edit</button>
            </div>


        </div>
    </div>
</div>
@stop