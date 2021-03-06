<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdd186e994485aed3ca092ebc5a465de8
{
    public static $files = array (
        '2887a2e7b7a6d083a2a5f486504ea78f' => __DIR__ . '/../..' . '/source/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdd186e994485aed3ca092ebc5a465de8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdd186e994485aed3ca092ebc5a465de8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdd186e994485aed3ca092ebc5a465de8::$classMap;

        }, null, ClassLoader::class);
    }
}
