$(document).ready(function() {
    $('.profile-name').click(function() {
        $('.account-info-ex').toggle();
    });
    expandComment();
    hideComment();
    expandEditFields();
    expandSetting();
    hideSetting();
});

function expandComment() {
    $('.comment-input').click(function() {
        var commentBox = $(this).parent();
        commentBox.find('.comment-input').hide();
        commentBox.find('.comment-textarea').show().focus();
        commentBox.find('.comment-buttons').show();
    });
}

function hideComment() {
    $('.cancel-comment-button').click(function() {
        var commentBox = $(this).parent().parent();
        commentBox.find('.comment-input').show();
        commentBox.find('.comment-textarea').hide();
        commentBox.find('.comment-buttons').hide();
        return false;
    });
}

function expandEditFields() {
    $('.edit-field').show();
}

function expandSetting() {
    $('.option').click(function() {
        $('.option-expanded').hide();
        $('.option').show();
        $(this).hide();
        $(this).next().show();
    })
}

function hideSetting() {
    $('.cancel-setting').click(function() {
        $(this).parent().hide();
        $(this).parent().prev().show();
    });
}