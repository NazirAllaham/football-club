<?php 

$app = [];

$app['config'] = require 'config.php';

require 'core/Router.php';
require 'core/Request.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';

require 'classes/Post.php';
require 'classes/Player.php';

session_start();

$app['database'] = new QueryBuilder(
    Connection::make($app['config']['database'])
);

?>