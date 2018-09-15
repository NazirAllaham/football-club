<?php 

use App\Post;
use App\Player;

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo) 
    {
        $this->pdo = $pdo;
    }

    public function execute($statement)
    {
        $statement = $this->pdo->prepare($statement);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function select($columns, $table, $conditions, $className = "")
    {
        $statement = "select ";
        foreach ($columns as $column) {
            $statement = $statement . $column;
        }
        $statement = $statement . " from $table where ";
        if(count($conditions) > 0)
        {
            foreach ($conditions as $key => $value)
                $statement = $statement . " $key=$value ";
        }else
        {
            $statement = $statement . "1";
        }

        $statement = $this->pdo->prepare($statement);
        
        $statement->execute();

        if($className !== "")
            return $statement->fetchAll(PDO::FETCH_CLASS, $className);
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function where($table, $conditions)
    {
        $statement = "select * from $table where ";

        if(count($conditions) > 0)
        {
            foreach ($conditions as $key => $value)
                $statement = $statement . " $key=$value ";
        }else
        {
            $statement = $statement . "1";
        }

        $statement = $this->pdo->prepare($statement);
        
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, Post::class);
    }

    public function selectAll($table)
    {
        $statment = $this->pdo->prepare("select * from {$table}");

        $statment->execute();

        return $statment->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectAllPosts()
    {
        $statement = $this->pdo->prepare("select * from `posts`");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, Post::class);
    }

    public function fetchPostImages($post_id)
    {
        $statement = $this->pdo->prepare("select `href` from `images` where `post_id` = $post_id");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function fetchPostVideos($post_id)
    {
        $statement = $this->pdo->prepare("select `href` from `videos` where `post_id` = $post_id");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
}

?>