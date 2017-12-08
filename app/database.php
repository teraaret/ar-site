<?php

class DATABASE
{
    private $mysql;
    private $sql;

	private $host = 'localhost';
	private $user = 'root';
	private $password = 'kaiii';
	private $db_name = 'ar';

	function __construct() {
		$this->mysql = mysqli_connect($this->host, $this->user, $this->password, $this->db_name) or die('Database connection error');
		mysqli_set_charset($this->mysql, 'utf8');
	}
    
    static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
    
    public function load_all_posts()
    {
        $sql = "SELECT * FROM blog";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$data[] = $row;
		}
        $posts = array_reverse($data);
        return $posts;
    }
    
    public function load_post($id)
    {
        $sql = "SELECT * FROM blog WHERE id = $id";
        $result = mysqli_query($this->mysql, $sql);
        
        $post = mysqli_fetch_assoc($result);
        return $post;
    }
    
    public function load_by_tag($tag)
    {
        $sql = "SELECT * FROM blog WHERE tag = '$tag'";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$data[] = $row;
		}
        $posts = array_reverse($data);
        return $posts;
    }
    
    public function create_hero($link, $name, $bio, $setting, $faction, $family, $race, $gender)
    {
        $sql = "INSERT INTO `heroes` (`link`, `name`, `bio`, `setting`, `faction`, `family`, `race`, `gender`) VALUES ('$link', '$name', '$bio', '$setting', '$faction', '$family', '$race', '$gender')";
        $result = mysqli_query($this->mysql, $sql);
    }
    
    public function update_hero($link, $name, $bio, $setting, $faction, $family, $race, $gender, $id)
    {
        $sql = "UPDATE `heroes` SET `link` = '$link', `name` = '$name', `bio` = '$bio', `setting` = '$setting', `faction` = '$faction', `family` = '$family', `race` = '$race', `gender` = '$gender' WHERE `id` = '$id'";
        $result = mysqli_query($this->mysql, $sql);
    }
    
    public function delete_hero($link)
    {
        // Удоление героя
        $sql = "DELETE FROM `heroes` WHERE `link` = '$link'";
        $result = mysqli_query($this->mysql, $sql);
    } 
}

?>