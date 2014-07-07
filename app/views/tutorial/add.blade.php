@extends('templates.loggedIn')
@section('content')
<!-- Include Font Awesome -->
<link href="<?php echo URL::to('/froala/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"

<!-- Include editor style file -->
<link href="<?php echo URL::to('/froala/css/froala_editor.css'); ?>" rel="stylesheet" type="text/css">

<!-- Include jQuery library -->
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

<!-- Include editor javascript file -->
<script src="<?php echo URL::to('froala/js/froala_editor.min.js'); ?>"></script>
<div class="new-tutorial">

    <div class="editor-block">
        <form name="add-tutorial-form" class="add-tutorial-form" action="/add-tutorial" method="post">
            <input type="text" name="title" class="title" placeholder="Tutorial title">
            <?php if(isset($emptyTutorialTitle) && $emptyTutorialTitle): ?>
                Please enter a title
            <?php endif; ?>
            <textarea id="editor" name="content">
            </textarea>
            <?php if(isset($emptyTutorialContent) && $emptyTutorialContent): ?>
                Please write your tutorial
            <?php endif; ?>
            <input type="submit" class="button turquoise" name="submit-tutorial" value="Post tutorial">
            <span class="or">or</span>
            <button class="button yellow" name="preview-tutorial">Preview tutorial</button>
        </form>
    </div>
    <div class="categories">

    </div>
</div>
<script>
    $(function() {
        $('#editor').editable({
            inlineMode: false,
            editorClass: 'editor',
            borderColor: '#d5d5d5',
            autosave: true,
            autosaveInterval: 5000,
            saveURL: 'http://bitller.com/add-tutorial',
            width: 900,
            height: 350,
            buttons: ["bold", "italic", "underline", "fontFamily", "align", "createLink", "insertImage"],
            fontList: ["Roboto"],
            placeholder: "Write tutorial here..."
        });
    });

</script>
@stop