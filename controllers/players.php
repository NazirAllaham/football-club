<?php 

use App\Player;

$players = $app['database']->select(['*'], 'players', ['club_id' => 1], Player::class);

if(isset($_SESSION['player']))
    echo $_SESSION['player'];

require 'views/players.view.php';

$_SESSION = array();

?>