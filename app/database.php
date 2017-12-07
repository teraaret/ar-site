<?php

class DATABASE
{
    private $mysql;
    private $sql;

	private $host = 'localhost';
	private $user = 'root';
	private $password = '';
	private $db_name = 'magenta';

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
    
    //    СТРАНИЧКА НОВОСТЕЙ
    
    //    Загрузить все существующие новости
    public function all_news()
    {
        $sql = "SELECT * FROM news";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$data[] = $row;
		}
        $news = array_reverse($data);
        return $news;
    }
    
    //    Загрузить конкретную новость через айди
    public function load_new($id)
    {
        $sql = "SELECT * FROM news WHERE id = $id";
        $result = mysqli_query($this->mysql, $sql);
        
        $new = mysqli_fetch_assoc($result);
        return $new;
    }
    
    //    Добавить новую новость и картинку
    public function create_new($sql)
    {
        mysqli_query($this->mysql, $sql) or die('Something is fuck');
    }
    
    public function delete_new($id)
    {
        // Удоление героя
        $sql = "DELETE FROM `news` WHERE `id` = '$id'";
        $result = mysqli_query($this->mysql, $sql);
    }
    
    // IDEAS
    
    public function all_ideas()
    {
        $sql = "SELECT * FROM ideas";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$data[] = $row;
		}
        $ideas = array_reverse($data);
        return $ideas;
    }
    
    public function create_idea($title, $text)
    {
        $sql = "INSERT INTO ideas (title, text) VALUES ('$title', '$text')";
        $result = mysqli_query($this->mysql, $sql);
    }
    
    //    СТРАНИЧКА РАС
    
    public function load_families()
    {
        $sql = "SELECT * FROM families";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$families[] = $row;
		}
        return $families;
    }
    
    public function load_all_races()
    {
        $sql = "SELECT * FROM races";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$allraces[] = $row;
		}
        return $allraces;
    }
    
    public function load_races($family)
    {
        $sql = "SELECT * FROM races WHERE family = '$family'";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$races[] = $row;
		}
        return $races;
    }
    
    public function load_one_race($race)
    {
        $sql = "SELECT * FROM races WHERE name = '$race'";
        $result = mysqli_query($this->mysql, $sql);
        
        $race = mysqli_fetch_assoc($result);
        return $race;
    }
    
    // Страница персонажей
    // Возвращает отсортированный массив $heroes
    public function load_all_heroes()
    {
        $sql = "SELECT * FROM heroes";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$data[] = $row;
		}
        return $data;
    }
    
    public function load_one_hero($hero)
    {
        $sql = "SELECT * FROM heroes WHERE link = '$hero'";
        $result = mysqli_query($this->mysql, $sql);
        
        $hero = mysqli_fetch_assoc($result);
        return $hero;
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
    
//    COUNTRIES
    public function load_all_countries()
    {
        $sql = "SELECT * FROM countries";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$data[] = $row;
		}
        return $data;
    }
    
    // history
    
    public function load_all_history()
    {
        $sql = "SELECT * FROM history ORDER BY date";
        $result = mysqli_query($this->mysql, $sql);
        
        while ($row = mysqli_fetch_assoc($result)) 
        {
			$data[] = $row;
		}
        return $data;
    }
}

?>