<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2cf376b8b32fe31bac9c3049fa5ed5d9
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2cf376b8b32fe31bac9c3049fa5ed5d9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2cf376b8b32fe31bac9c3049fa5ed5d9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
