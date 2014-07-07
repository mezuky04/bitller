@extends('templates.loggedIn')
@section('content')
<div class="feed-menu">
    <div class="items"></div>
    <div class="footer-content"></div>
</div>
<div class="feed">
    <div class="tutorial-post">
        <div class="user-who-posted">
            <img src="<?php echo URL::to('/img/feed-post-user-picture.jpg'); ?>">
            <div class="info">
                <span class="action"><a href="#">Alexandru Bugarin</a> added a new tutorial</span>
            </div>
        </div>
        <div class="post-content">
            <div class="title"><a href="#">PHP Object Orientated Programming basics</a></div>
            <a href="#"><img src="<?php echo URL::to('img/demo-post.png'); ?>"></a>
            <div class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo vel nisi molestie viverra. Suspendisse posuere tristique mi vel vestibulum. Etiam quis arcu ac nisl facilisis semper. Donec vitae est quis nunc eleifend aliquam at eget libero...
            </div>
        </div>
    </div>
    <div class="post-comments">
        <div class="post-comment">
            <img src="<?php echo URL::to('img/profile.png'); ?>">
            <div class="comment">
                <div class="comment-info">
                    <span class="name"><a href="#">Alexandru Bugarin</a></span>
                    <span class="date-time">9 iun. 2014</span>
                </div>
                <span class="remove-comment">x</span>
                <div class="text">
                    Test comment with one line
                </div>
            </div>
        </div>


        <div class="post-comment">
            <img src="<?php echo URL::to('img/profile.png'); ?>">
            <div class="comment">
                <div class="comment-info">
                    <span class="name"><a href="#">Alexandru Bugarin</a></span>
                    <span class="date-time">22:04</span>
                </div>
                <span class="remove-comment">x</span>
                <div class="text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae felis nibh. Sed semper, magna a pellentesque pellentesque, nunc turpis tristique mi, et venenatis ligula mauris id nibh. Aenean gravida augue nulla, aliquet adipiscing sapien sollicitudin ac. Duis accumsan sit amet nisi eget vestibulum. Sed faucibus turpis urna, varius scelerisque sem iaculis lobortis. Nulla et risus odio. Nulla facilisi.
                </div>
            </div>
        </div>


        <div class="write-comment">
            <img src="<?php echo URL::to('img/profile.png'); ?>">
            <form name="comment-form" method="post">
                <input type="text" name="comment-input" class="comment-input" placeholder="Write a comment">
                <textarea rows="4" cols="40" name="comment-textarea" class="comment-textarea"></textarea>
                <div class="comment-buttons">
                    <input type="submit" class="submit-comment-button" value="Post comment">
                    <button class="cancel-comment-button">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div class="tutorial-post">
        <div class="user-who-posted">
            <img src="<?php echo URL::to('/img/feed-post-user-picture.jpg'); ?>">
            <div class="info">
                <span class="action"><a href="#">Alexandru Bugarin</a> added a new tutorial</span>
            </div>
        </div>
        <div class="post-content">
            <div class="title"><a href="#">PHP Object Orientated Programming basics</a></div>
            <a href="#"><img src="<?php echo URL::to('img/demo-post.png'); ?>"></a>
            <div class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque commodo vel nisi molestie viverra. Suspendisse posuere tristique mi vel vestibulum. Etiam quis arcu ac nisl facilisis semper. Donec vitae est quis nunc eleifend aliquam at eget libero...
            </div>
        </div>
    </div>
    <div class="post-comments">
        <div class="write-comment">
            <img src="<?php echo URL::to('img/profile.png') ?>">
            <form name="comment-form" method="post">
                <input type="text" name="comment-input" class="comment-input" placeholder="Write a comment">
                <textarea rows="4" cols="40" name="comment-textarea" class="comment-textarea"></textarea>
                <div class="comment-buttons">
                    <input type="submit" class="submit-comment-button" value="Post comment">
                    <button class="cancel-comment-button">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--
<div class="feed-last">
    <div class="write-tutorial">
        <span class="title">Write tutorial</span>
        <span class="text">Are you good at something? Write a tutorial and share with others</span>
    </div>

</div>-->
@stop