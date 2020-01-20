<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc5585179c476c58758a0ccb626f3fe4f
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
        'c' => 
        array (
            'core\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'core\\' => 
        array (
            0 => __DIR__ . '/..' . '/framework/core',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc5585179c476c58758a0ccb626f3fe4f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc5585179c476c58758a0ccb626f3fe4f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}