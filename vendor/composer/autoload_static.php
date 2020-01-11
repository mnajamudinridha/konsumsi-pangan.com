<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita7016487666fffead798e80eaab206da
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PhpOption\\' => 
            array (
                0 => __DIR__ . '/..' . '/phpoption/phpoption/src',
            ),
        ),
    );

    public static $classMap = array (
        'Dotenv\\Dotenv' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Dotenv.php',
        'Dotenv\\Environment\\AbstractVariables' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/AbstractVariables.php',
        'Dotenv\\Environment\\Adapter\\AdapterInterface' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/Adapter/AdapterInterface.php',
        'Dotenv\\Environment\\Adapter\\ApacheAdapter' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/Adapter/ApacheAdapter.php',
        'Dotenv\\Environment\\Adapter\\ArrayAdapter' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/Adapter/ArrayAdapter.php',
        'Dotenv\\Environment\\Adapter\\EnvConstAdapter' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/Adapter/EnvConstAdapter.php',
        'Dotenv\\Environment\\Adapter\\PutenvAdapter' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/Adapter/PutenvAdapter.php',
        'Dotenv\\Environment\\Adapter\\ServerConstAdapter' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/Adapter/ServerConstAdapter.php',
        'Dotenv\\Environment\\DotenvFactory' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/DotenvFactory.php',
        'Dotenv\\Environment\\DotenvVariables' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/DotenvVariables.php',
        'Dotenv\\Environment\\FactoryInterface' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/FactoryInterface.php',
        'Dotenv\\Environment\\VariablesInterface' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Environment/VariablesInterface.php',
        'Dotenv\\Exception\\ExceptionInterface' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Exception/ExceptionInterface.php',
        'Dotenv\\Exception\\InvalidFileException' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Exception/InvalidFileException.php',
        'Dotenv\\Exception\\InvalidPathException' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Exception/InvalidPathException.php',
        'Dotenv\\Exception\\ValidationException' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Exception/ValidationException.php',
        'Dotenv\\Lines' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Lines.php',
        'Dotenv\\Loader' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Loader.php',
        'Dotenv\\Parser' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Parser.php',
        'Dotenv\\Regex\\Error' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Regex/Error.php',
        'Dotenv\\Regex\\Regex' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Regex/Regex.php',
        'Dotenv\\Regex\\Result' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Regex/Result.php',
        'Dotenv\\Regex\\Success' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Regex/Success.php',
        'Dotenv\\Validator' => __DIR__ . '/..' . '/vlucas/phpdotenv/src/Validator.php',
        'PhpOption\\LazyOption' => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption/LazyOption.php',
        'PhpOption\\None' => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption/None.php',
        'PhpOption\\Option' => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption/Option.php',
        'PhpOption\\Some' => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption/Some.php',
        'Symfony\\Polyfill\\Ctype\\Ctype' => __DIR__ . '/..' . '/symfony/polyfill-ctype/Ctype.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita7016487666fffead798e80eaab206da::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita7016487666fffead798e80eaab206da::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita7016487666fffead798e80eaab206da::$prefixesPsr0;
            $loader->classMap = ComposerStaticInita7016487666fffead798e80eaab206da::$classMap;

        }, null, ClassLoader::class);
    }
}