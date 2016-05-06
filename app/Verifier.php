<?php
/**
 * Created by PhpStorm.
 * User: atul
 * Date: 7/31/15
 * Time: 2:09 PM
 */

namespace App;

use Auth;

class Verifier {
    public function verify($username, $password)
    {
        \Log::debug("I am Inside Verifier username = " . $username . " and password = " . $password);

        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}