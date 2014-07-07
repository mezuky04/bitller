<?php

/**
 * Handle account operations, like login, register, edit etc
 *
 * @author Alexandru Bugarin <alexandru.bugarin@gmail.com>
 */
class AccountController extends BaseController {

    /**
     * @var string Login view name
     */
    private $_loginView = 'account.login';

    /**
     * @var string Register view name
     */
    private $_registerView = 'account.register';

    /**
     * @var string Settings view name
     */
    private $_settingsView = 'account.settings';

    /**
     * @var int Password min length
     */
    private $_passwordLength = 8;

    /**
     * @var array User info from session
     */
    private $_userSession = array();

    /**
     * Set user info in $this->_userSession
     */
    public function __construct() {

        // User not logged in
        if (!Session::get('loggedIn')) {
            return false;
        }

        // Set user info
        $this->_userSession = Session::get('user');

        // Something is wrong, user session should not be empty if user is logged in
        if (!$this->_userSession) {
            // todo log error here
            return false;
        }
    }

    /**
     * Renders login page
     *
     * @return mixed
     */
    public function showLogin() {
        if (Session::get('loggedIn')) {
            return Redirect::to('home');
        }
        return View::make($this->_loginView);
    }

    /**
     * Renders register page
     *
     * @return mixed
     */
    public function showRegister() {
        if (Session::get('loggedIn')) {
            return Redirect::to('home');
        }
        return View::make($this->_registerView);
    }


    /**
     * Render account settings page
     *
     * @return mixed
     */
    public function showSettings() {

        // Redirect not logged in users
        if (!Session::get('loggedIn')) {
            return Redirect::to('login');
        }

        // Get user information to parse to the view
        $userSession = Session::get('user');
        $userModel = new User();
        $userInfo = $userModel->getUser($userSession['UserId']);

        $accountSettingsInfo = array();
        $accountSettingsInfo['completeName'] = $userInfo->FirstName.' '.$userInfo->LastName;
        $accountSettingsInfo['firstName'] = $userInfo->FirstName;
        $accountSettingsInfo['lastName'] = $userInfo->LastName;
        $accountSettingsInfo['email'] = $userInfo->Email;
        return View::make($this->_settingsView, $accountSettingsInfo);
    }

    /**
     * Handle user login
     *
     * @return mixed
     */
    public function login() {

        $email = Input::get('email');
        $password = Input::get('password');

        if (!$email) {
            // Empty email
            return View::make($this->_loginView, array(
                'emptyEmail' => true,
                'emailError' => true
            ));
        }

        if (!$password) {
            // Empty password
            return View::make($this->_loginView, array(
                'emptyPassword' => true,
                'passwordError' => true
            ));
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Invalid email
            return View::make($this->_loginView, array(
                'invalidEmail' => true,
                'emailError' => true
            ));
        }

        $userModel = new User();
        $result = $userModel->loginUser($email, $password);

        if (isset($result['invalidLogin'])) {
            return View::make($this->_loginView, array(
                'invalidLogin' => true,
                'passwordError' => true
            ));
        }

        if (isset($result['disabledAccount'])) {
            return View::make($this->_loginView, array(
                'otherError' => true,
                'disabledAccount' => true
            ));
        }

        if (isset($result['validLogin'])) {
            return Redirect::to('home');
        }

        return View::make($this->_loginView, array(
            'serverError' => true
        ));
    }


    /**
     * Handle user registration
     *
     * @return mixed
     */
    public function register() {

        $firstName = Input::get('first-name');
        $lastName = Input::get('last-name');
        $email = Input::get('email');
        $password = Input::get('password');

        if (!$firstName) {
            // Empty first name
            return View::make('account.register', array(
                'emptyFirstName' => true,
                'firstNameError' => true
            ));
        }
        if (!$lastName) {
            // Empty last name
            return View::make('account.register', array(
                'firstName' => $firstName,
                'emptyLastName' => true,
                'lastNameError' => true
            ));
        }

        if (!$email) {
            // Empty email
            return View::make('account.register', array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'emptyEmail' => true,
                'emailError' => true
            ));
        }
        if (!$password) {
            // Empty password
            return View::make('account.register', array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'emptyPassword' => true,
                'passwordError' => true,
                'passwordLength' => $this->_passwordLength
            ));
        }

        if (!ctype_alpha($firstName)) {
            // Invalid first name
            return View::make('account.register', array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'invalidFirstName' => true,
                'firstNameError' => true
            ));
        }

        if (!ctype_alpha($lastName)) {
            // Invalid last name
            return View::make('account.register', array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'invalidLastName' => true,
                'lastNameError' => true
            ));
        }

        if (strlen($firstName) + strlen($lastName) < 3) {
            // First name or last name are too short
            return View::make('account.register', array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'tooShortFirstName' => true,
                'firstNameError' => true
            ));
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Invalid email
            return View::make('account.register', array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'invalidEmail' => true,
                'emailError' => true
            ));
        }

        if (strlen($password) < $this->_passwordLength) {
            // Password is too short
            return View::make('account.register', array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'passwordTooShort' => true,
                'passwordError' => true,
                'passwordLength' => $this->_passwordLength
            ));
        }

        // Check if email is already used
        $userModel = new User();
        if (!$userModel->checkEmail($email)) {
            // Email already used
            return View::make($this->_registerView, array(
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'alreadyUsedEmail' => true,
                'emailError' => true
            ));
        }

        // Make first name and last name lower case then upper case the first letter of each one
        $firstName = ucfirst(strtolower($firstName));
        $lastName = ucfirst(strtolower($lastName));

        // All is fine, insert new user in database
        $userModel->createUser(array(
            'Email' => $email,
            'FirstName' => $firstName,
            'LastName' => $lastName,
            'Password' => $password
        ));

        return Redirect::to('home');
    }


    /**
     * Destroy user session
     *
     * @return mixed
     */
    public function logout() {
        Session::forget('user');
        Session::forget('loggedIn');
        return Redirect::to('/');
    }

    /**
     * Update user first and last name
     */
    public function updateName() {

        // todo check if password is correct (do a function for that and use in all methods when is needed)

        // Get input values
        $firstName = ucfirst(strtolower(Input::get('first-name')));
        $lastName = ucfirst(strtolower(Input::get('last-name')));

        // Check if contain not allowed characters
        if (!ctype_alpha($firstName) || !ctype_alpha($lastName)) {
            // Invalid characters
            // todo a better error handler
            return false;
        }
        // todo check if user don't changed it username in the last 20 weeks
        // todo update in database first and last name
    }

    /**
     * Update user email
     */
    public function updateEmail() {
        // todo check if password is correct
        // todo get input value
        // todo check if email is already used
        // todo update email in db
    }

    /**
     * Update user password
     */
    public function updatePassword() {
        // todo check if current password is valid
        // todo check if new passwords match
        // todo update password in db
    }
}