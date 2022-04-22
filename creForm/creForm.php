<?php
    /*
      Plugin Name: creForm
      Plugin URI: https://wordpress.com
      Description: Create contact forms with ease
      Version: 0.1
      Author: CreForm .inc
      Author URI: https://wordpress.com  
    */

    use Creform\CreForm\creformPlugin;
    if( ! defined('ABSPATH'))
      exit;

    define('creform_PLUGIN_DIR', plugin_dir_path(__FILE__));

    require creform_PLUGIN_DIR . 'vendor/autoload.php';

    $plugin = new creformPlugin(__FILE__);