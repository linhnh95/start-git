<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5fae77b8dc09b7341340cec09f611fd1
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MobileConnection\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MobileConnection\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5fae77b8dc09b7341340cec09f611fd1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5fae77b8dc09b7341340cec09f611fd1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
