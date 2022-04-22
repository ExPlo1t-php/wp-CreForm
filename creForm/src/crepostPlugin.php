<?php
    namespace Creform\CreForm;
    use Creform\CreForm\Controller\AdminController;

    class creformPlguin{
        const TRANSIENT_creform_ACTIVATED = 'creform_activated';
        public function __construct($file)
        {
            register_activation_hook( $file, [$this, 'plugin_activation']);
            add_action('admin_notices', [$this, 'notice_activation']);

            if(is_admin()){
                $adminController = new AdminController();
            }            
        }

        public function plugin_activation():void{
            set_transient(self::TRANSIENT_creform_ACTIVATED, true);
        }

        public function notice_activation():void{
            if(get_transient(self::TRANSIENT_creform_ACTIVATED)){
                self::render('notices', ['message' => 'Thanks for activating creform']);
                delete_transient(self::TRANSIENT_creform_ACTIVATED);
            }
        }
        public static function render($name, $args = []):void{
            extract($args);
            $file = creform_PLUGIN_DIR . 'views/$name.php';
            ob_start();
            include_once($file);
            echo ob_get_clean();
        }
    }