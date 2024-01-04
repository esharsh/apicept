<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita270f742f9f525483fa96450d0da2905
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'esharsh\\Testcept\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'esharsh\\Testcept\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita270f742f9f525483fa96450d0da2905::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita270f742f9f525483fa96450d0da2905::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita270f742f9f525483fa96450d0da2905::$classMap;

        }, null, ClassLoader::class);
    }
}