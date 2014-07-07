@extends('templates.loggedIn')
@section('content')
<div class="profile-header">
    <img class="cover" src="<?php echo URL::to('img/bitller-cover.png'); ?>">
    <div class="user-info">
        <div class="content">
            <div class="profile-picture">
                <img class="picture" src="<?php echo URL::to('img/account-picture.png'); ?>">
            </div>
            <div class="name">Alexandru Bugarin</div>
            <div class="description">Founder and CEO at <a href="#">Bitller.com</a> | PHP developer</div>
            <div class="rep-btn"><button class="button yellow">Reputation +</button></div>
        </div>
    </div>
    <div class="profile-menu">

    </div>
</div>
@stop