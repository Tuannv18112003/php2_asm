<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ec0c4f904bcac955638bb787e6ed815
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ec0c4f904bcac955638bb787e6ed815::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ec0c4f904bcac955638bb787e6ed815::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8ec0c4f904bcac955638bb787e6ed815::$classMap;

        }, null, ClassLoader::class);
    }
}
