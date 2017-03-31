<?php

  class k {

    public static function construct() {
    }

    //public static function load_dependencies() {
    //}

    //public static function startup() {
    //}

    //public static function initiate() {
    //}

    //public static function before_capture() {
    //}

    //public static function after_capture() {
    //}

    //public static function prepare_output() {
    //}

    //public static function before_output() {
    //}

    //public static function shutdown() {
    //}

    ######################################################################

    public static function current_user_can($action) {
    	$abilities = unserialize(K_USERS_AUTHORIZATION)[session::$data['user']['type']];
    	return in_array($action, $abilities) || in_array("*", $abilities);
    }

  }
