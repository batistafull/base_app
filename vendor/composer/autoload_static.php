<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7c67130c6e34804dbf130c13b7ada0d4
{
    public static $files = array (
        '4cdafd4a5191caf078235e7dd119fdaf' => __DIR__ . '/..' . '/flightphp/core/flight/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Medoo\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Medoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/catfan/medoo/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7c67130c6e34804dbf130c13b7ada0d4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7c67130c6e34804dbf130c13b7ada0d4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7c67130c6e34804dbf130c13b7ada0d4::$classMap;

        }, null, ClassLoader::class);
    }
}
