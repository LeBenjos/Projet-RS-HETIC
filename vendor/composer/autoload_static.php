<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita5ecadb4a624afc416c7f40e4db74200
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Unilink\\ProjetRsHetic\\' => 22,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Unilink\\ProjetRsHetic\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita5ecadb4a624afc416c7f40e4db74200::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita5ecadb4a624afc416c7f40e4db74200::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita5ecadb4a624afc416c7f40e4db74200::$classMap;

        }, null, ClassLoader::class);
    }
}
