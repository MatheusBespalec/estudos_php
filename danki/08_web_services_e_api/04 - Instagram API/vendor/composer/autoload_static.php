<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c07a747e8333960b528e18b598a1669
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MetzWeb\\Instagram\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MetzWeb\\Instagram\\' => 
        array (
            0 => __DIR__ . '/..' . '/cosenary/instagram/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c07a747e8333960b528e18b598a1669::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c07a747e8333960b528e18b598a1669::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0c07a747e8333960b528e18b598a1669::$classMap;

        }, null, ClassLoader::class);
    }
}
