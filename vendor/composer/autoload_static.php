<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit723c25fb232fced9952e970c92ac24aa
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit723c25fb232fced9952e970c92ac24aa::$classMap;

        }, null, ClassLoader::class);
    }
}