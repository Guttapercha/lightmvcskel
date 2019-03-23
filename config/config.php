<?php

$baseConfig['env'] = 'production'; // 'development' or 'production'

$baseConfig['appName'] = 'The LightMVC Framework Skeleton Application';

$baseConfig['doctrine']['ORM']['dem1'] = [
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'user'     => 'lightmvc_user',
    'password' => 'password',
    'dbname'   => 'lightmvctestdb',
];

require 'routes.config.php';

require 'view.config.php';

require 'middleware.config.php';