<?php
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            
            $file = "C:/wamp64/www/jeu carte/jeu-de-carte-php/".$class.'.php';
            if (file_exists($file)) {
                require_once($file);
                return true;
            }
            return false;
        });
    }
    
}
Autoloader::register();

?>