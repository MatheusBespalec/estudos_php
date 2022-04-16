<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7602956d7d267e6d14e09ce36b8462e
{
    public static $files = array (
        'ca46cb79bcddc812fe2aaf4dc9b657de' => __DIR__ . '/../..' . '/source/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'C' => 
        array (
            'CoffeeCode\\DataLayer\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'CoffeeCode\\DataLayer\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/datalayer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7602956d7d267e6d14e09ce36b8462e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7602956d7d267e6d14e09ce36b8462e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd7602956d7d267e6d14e09ce36b8462e::$classMap;

        }, null, ClassLoader::class);
    }
}
