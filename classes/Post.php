<?php 

namespace App;

class Post 
{
    public $id;
    public $publisher_id;
    public $title;
    public $short_title;
    public $body;
    public $created_at;
    public $updated_at;

    public function __construct()
    {
        $this->short_title = substr($this->title, 0, 47);
        if(strlen($this->title) > 47)
        {
            $this->short_title = $this->short_title . "...";
        }
    }

    public function gallery($app, $filter="all")
    {
        $arr = array();
        
        if($filter !== "videos") {
            $arr = array_merge($arr, $app['database']->fetchPostImages($this->id));
        }

        if($filter !== "images") {
            $arr = array_merge($arr, $app['database']->fetchPostVideos($this->id));
        }
        
        return $arr;
    }

    public function has($app, $table)
    {
        $count = $app['database']->select(['count(*) as count'], $table, ['post_id' => $this->id])[0]->count;
        $count = (int) $count;
        return $count > 0 ? true:false;
    }
}

?>