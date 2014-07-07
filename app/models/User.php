<?php
/**
 * User model
 *
 * Handle database operations with Users table
 *
 * @author Alexandru Bugarin <alexandru.bugarin@gmail.com>
 */
class User extends BaseModel {

    /**
     * @var string Table name
     */
    protected $_tableName = 'Users';

    /**
     * Get all fields for given user id
     *
     * @param int $userId
     * @return mixed
     */
    public function getUser($userId) {

        return DB::table($this->_tableName)->where('UserId', $userId)->first();
    }

    /**
     * Check if given email password combination is correct and, if $loginUser flag is true, user is logged in
     *
     * @param string $email
     * @param string $password
     * @param bool $loginUser
     * @return bool
     */
    public function checkLogin($email, $password, $loginUser = true) {

        $user = DB::table($this->_tableName)->where('Email', $email)->first();

        // User not found
        if (!$user) {
            return false;
        }

        // Invalid password
        if (!Hash::check($password, $user->Password)) {
            return false;
        }

        // Login user if is needed
        if ($loginUser) {
            // Save user session
            Session::put('user', array(
                'UserId' => $user->UserId,
                'Email' => $user->Email,
                'FirstName' => $user->FirstName,
                'LastName' => $user->LastName
            ));
            Session::put('loggedIn', true);
        }

        return true;
    }

    public function loginUser($email, $password) {

        $user = DB::table($this->_tableName)->where('Email', $email)->first();

        if (!$user || !Hash::check($password, $user->Password)) {
            // Invalid email or password
            return array('invalidLogin' => true);
        }

        if ($user->Disabled) {
            // Account disabled
            return array('disabledAccount' => true);
        }

        // Save user session
        Session::put('user', array(
            'UserId' => $user->UserId,
            'Email' => $user->Email,
            'FirstName' => $user->FirstName,
            'LastName' => $user->LastName
        ));
        Session::put('loggedIn', true);

        return array('validLogin' => true);
    }

    public function checkEmail($email) {
        if (DB::table($this->_tableName)->where('Email', $email)->count()) {
            return false;
        }
        return true;
    }

    public function createUser($userInfo) {

        $userInfo['Password'] = Hash::make($userInfo['Password']);
        $userId = DB::table($this->_tableName)->insertGetId($userInfo);
        Session::put('user', array(
            'UserId' => $userId,
            'Email' => $userInfo['Email'],
            'FirstName' => $userInfo['FirstName'],
            'LastName' => $userInfo['LastName']
        ));
        Session::put('loggedIn', true);
    }
}
