<?php
/**
 * Created by PhpStorm.
 * User: Vara
 * Date: 05/11/2014
 * Time: 9:18 AM
 */

class AuthController extends \BaseController{
    public function token(){
        return csrf_token();
    }
}