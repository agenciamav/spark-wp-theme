<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7cd7024361e067b69e9c8ab9b9fa5452
{
    public static $files = array (
        '383eaff206634a77a1be54e64e6459c7' => __DIR__ . '/..' . '/sabre/uri/lib/functions.php',
        '3569eecfeed3bcf0bad3c998a494ecb8' => __DIR__ . '/..' . '/sabre/xml/lib/Deserializer/functions.php',
        '93aa591bc4ca510c520999e34229ee79' => __DIR__ . '/..' . '/sabre/xml/lib/Serializer/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sabre\\Xml\\' => 10,
            'Sabre\\VObject\\' => 14,
            'Sabre\\Uri\\' => 10,
        ),
        'J' => 
        array (
            'JeroenDesloovere\\VCard\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sabre\\Xml\\' => 
        array (
            0 => __DIR__ . '/..' . '/sabre/xml/lib',
        ),
        'Sabre\\VObject\\' => 
        array (
            0 => __DIR__ . '/..' . '/sabre/vobject/lib',
        ),
        'Sabre\\Uri\\' => 
        array (
            0 => __DIR__ . '/..' . '/sabre/uri/lib',
        ),
        'JeroenDesloovere\\VCard\\' => 
        array (
            0 => __DIR__ . '/..' . '/jeroendesloovere/vcard/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Behat\\Transliterator' => 
            array (
                0 => __DIR__ . '/..' . '/behat/transliterator/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7cd7024361e067b69e9c8ab9b9fa5452::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7cd7024361e067b69e9c8ab9b9fa5452::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7cd7024361e067b69e9c8ab9b9fa5452::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}