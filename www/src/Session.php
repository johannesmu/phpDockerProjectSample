<?php
namespace textreview;

class Session {
  public static function init() {
    if( session_status() == PHP_SESSION_NONE ) {
      session_start();
    }
  }
  public static function set( $name, $value ) {
    self::init();
    $_SESSION[ $name ] = $value;
  }

  public static function get( $name ) {
    self::init();
    if( array_key_exists( $name, $_SESSION ) ) {
      return $_SESSION[$name];
    }
    else {
      return null;
    }
  }

  public static function unset( $name ) {
    self::init();
    unset( $_SESSION[$name] );
  }
}
?>