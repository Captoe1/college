<?php 
require_once 'INewsDB.class.php';
class NewsDB implements INewsDB{
    const DB_NAME = 'news.db';
    private $_db;


    public function saveNews($title, $category, $description, $source)
    {
        $dt = time('H:i:s');
        $sql = "INSERT INTO msgs (title, category, description, source, datetime) 
                VALUES ('$title', '$category', '$description', '$source', '$dt')";
        return $this->_db->exec($sql);
    }
    public function getNews()
    {
        $sql = "SELECT title, category, description, source FROM msgs";
        $result = $this->_db->query($sql);
        $arr = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $arr[] = $row;
        }
        return $arr;
    }
    public function showNews($id)
    {
        $sql = "SELECT * FROM msgs ORDER BY id=$id";
        $result = $this->_db->query($sql);
        $arr = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $arr[] = $row;
        }
        return $arr;
     
    }

    public function __construct()
    {
        if (!file_exists(self::DB_NAME)) {
            $this->_db = new SQLite3(self::DB_NAME);

            $sql = 'CREATE TABLE msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER
            )';
            $this->_db->exec($sql);

            $sql1 = 'CREATE TABLE category(
                id INTEGER,
                name TEXT
            )';
            $this->_db->exec($sql1);

            $sql2 = "INSERT INTO category(id, name)
            SELECT 1 as id, 'Политика' as name
            UNION SELECT 2 as id, 'Культура' as nam
            UNION SELECT 3 as id, 'Спорт' as name ";
            $this->_db->exec($sql2);
            
        } else {
            $this->_db = new SQLite3(self::DB_NAME);
        }
    }

    public function __destruct() {
        unset($this->_db);
    }

    
}

$news = new NewsDB();

?>