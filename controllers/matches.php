<?php 

function goals($match_id, $to, $app)
{
    return (int) $app['database']->execute("SELECT COUNT(*) as count  FROM `goals` WHERE `match_id`=$match_id AND `to`=$to")[0]->count;
}


if(isset($_COOKIE['championship_id']))
{
    $championship = $app['database']->select(['title'], 'championships', ['id' => $_COOKIE['championship_id']])[0]->title;
}else
{
    $championship = $app['database']->select(['title'], 'championships', ['id' => date('M')])[0]->title;
}

$archives = $app['database']->execute("SELECT DATE_FORMAT(`time`, '%b') as 'name', COUNT(*) as 'count' FROM `matches` GROUP BY MONTH(`time`)");

$matches = array();
foreach ($archives as $archive) {
    $matches[$archive->name] = $app['database']->execute("SELECT *,
                                                            (SELECT `name` FROM `clubs` WHERE `id`=`club_id`) as `club_name`,
                                                            (SELECT `title` FROM `championships` WHERE `id`=`championship_id`) as `championship_name`,
                                                            HOUR(`time`) as hour, 
                                                            MINUTE(`time`) as minute, 
                                                            DAYNAME(`time`) as day_name, 
                                                            DAY(`time`) as day, 
                                                            MONTHNAME(`time`) as month_name, 
                                                            YEAR(`time`) as year 
                                                            FROM `matches` 
                                                            WHERE DATE_FORMAT(`time`, '%b')='$archive->name' 
                                                                AND `championship_id`=" . $_COOKIE["championship_id"]);    
}

require ('views/matches.view.php');
?>