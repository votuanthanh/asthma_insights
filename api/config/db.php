<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.getenv('MYSQL_HOST').';dbname='.getenv('MYSQL_DATABASE'),
    'username' => getenv('MYSQL_USERNAME'),
    'password' => getenv('MYSQL_PASSWORD'),
    'charset' => 'utf8',
];
