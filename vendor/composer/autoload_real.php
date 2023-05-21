<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit63a1a0d334cfdf84b2b073a62d5e261d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit63a1a0d334cfdf84b2b073a62d5e261d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit63a1a0d334cfdf84b2b073a62d5e261d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit63a1a0d334cfdf84b2b073a62d5e261d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
