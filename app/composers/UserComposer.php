<?php
class UserComposer {
    public function compose($view) {
        if (Session::get('loggedIn')) {
            $view->with(Session::get('user'));
        }
    }
}