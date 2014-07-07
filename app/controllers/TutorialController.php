<?php

/**
 * Class TutorialController
 *
 * @author Alexandru Bugarin <alexandru.bugarin@gmail.com>
 */
class TutorialController extends BaseController {

    /**
     * @var string
     */
    private $_addTutorialView = 'tutorial.add';

    /**
     * @var string
     */
    private $_tutorialView = 'tutorial.tut';

    /**
     * Render view for tutorial with given id
     *
     * @param int $id Tutorial id
     * @return mixed
     */
    public function index($id) {
        return View::make($this->_tutorialView);
    }

    /**
     * Show add tutorial view
     *
     * @return mixed
     */
    public function add() {

        if (!Session::get('loggedIn')) {
            return Redirect::to('login');
        }
        return View::make($this->_addTutorialView);
    }

    /**
     * Handle insertion of a new tutorial
     *
     * @return mixed
     */
    public function addTutorial() {

        $tutorialTitle = ucfirst(Input::get('title'));
        $tutorialContent = htmlentities(Input::get('content'));

        if (!$tutorialTitle) {
            return View::make($this->_addTutorialView, array('emptyTutorialTitle' => true));
        }
        if (!$tutorialContent) {
            return View::make($this->_addTutorialView, array('emptyTutorialContent' => true));
        }

        // TODO Advanced validator to check if tutorial is not copy/paste

        // If all it's ok, insert in database
    }

    /**
     * Handle tutorial content auto save
     *
     * @return mixed
     */
    public function autoSave() {
        if (!Session::get('loggedIn')) {
            return Redirect::to('login');
        }
        $tutorialContent = Input::get('body');
        // Insert in db...
    }

}