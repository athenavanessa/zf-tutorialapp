<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

$dbopts = parse_url(getenv('DATABASE_URL'));

return [
    'db' => [
        'driver' => 'Pdo',
        //'dsn'    => sprintf('sqlite:%s/data/zftutorial.db', realpath(getcwd())),
        //'dsn'    => 'mysql:dbname=zf3;hostname=localhost',
        //'driver_options' => [
        //    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        //],
        //'dsn' => 'pgsql:host=localhost;dbname=zf3',
        'dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"] . ';port=' . $dbopts["port"],
        'username' => $dbopts["user"],
        'password' => $dbopts["pass"]    
    ],
];
