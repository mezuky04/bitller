<?php

/**
 * Class ProfileController
 *
 * @author Alexandru Bugarin <alexandru.bugarin@gmail.com>
 */
class ProfileController extends BaseController {

    public function displayProfilePage($username) {

        // Redirect if no username is parsed
        if (!$username) {
            return Redirect::to('home');
        }

        return View::make('profile');
    }

    private function _getProfilePageViewVariables($loggedIn = true) {

        $viewVariables = array();
        // Set variables for logged in user
        if ($loggedIn) {

        }

        // Set variables for not logged in user
    }


}