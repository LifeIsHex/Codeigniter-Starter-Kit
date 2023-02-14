<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite96ea5d76d3b76de2eeba8124aa1cb72
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite96ea5d76d3b76de2eeba8124aa1cb72::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite96ea5d76d3b76de2eeba8124aa1cb72::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite96ea5d76d3b76de2eeba8124aa1cb72::$classMap;

        }, null, ClassLoader::class);
    }
}