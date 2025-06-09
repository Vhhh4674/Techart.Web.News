<?php
include ("classes/News.php");

class SqlConnection
{
    private $HOSTNAME = "";

    private $USERNAME = "qqq";

    private $PASSWORD = "123";

    private $TABLE = "NEWS";
    
    private $conn = null;

    public function createConnection()
    {
        $this->conn = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->TABLE);
        if ($this->conn == false) {
            $message = "Ошибка: Невозможно подключиться к БД " . mysqli_connect_error();
            echo "<script>console.log('" . $message . "');</script>";
        } else {
            echo "<script>console.log('Соединение установлено успешно.');</script>";
        }
    }
    
    public function closeConnection() {
        $this->conn->close();
        echo "<script>console.log('Соединение c базой прервано.');</script>";
    }

    /* public function getNewsList()
    {
        $sql = 'SELECT id, date, title, announce FROM news ORDER BY Date DESC LIMIT 4';
        $result = mysqli_query($this->conn , $sql); 
        $news_list = array();
 
        while ($row = mysqli_fetch_object($result, "News")) {
            $news_list[] = $row;
        }
        return $news_list;
    } */
    
    public function getNewsList($page, $newsPerPage)
    {
        $sql = 'SELECT id, date, title, announce FROM news ORDER BY Date DESC OFFSET ' 
            . ($page - 1) * $newsPerPage . ' ROWS FETCH NEXT ' 
            . $newsPerPage . ' ROWS ONLY';
        $result = mysqli_query($this->conn , $sql);
        $news_list = array();
        
        while ($row = mysqli_fetch_object($result, "News")) {
            $news_list[] = $row;
        }
        return $news_list;
    }
    
    public function getNews($id) {
        $sql = 'SELECT id, title, announce, date, content, image FROM news WHERE id=' . $id;
        $result = mysqli_query($this->conn , $sql);
        
        while ($row = mysqli_fetch_object($result, "News")) {
            return $row;
        }
        return null;
    }

    public function getLastNews()
    {
        $sql = 'SELECT id, title, date, announce, image FROM news ORDER BY date DESC LIMIT 1';
        $result = mysqli_query($this->conn , $sql);
        
        while ($row = mysqli_fetch_object($result, "News")) {
            return $row;
        }
        return null;
    }
    
    public function getNewsCount() {
        $sql = 'SELECT COUNT(*) AS \'count\' FROM news';
        $result = mysqli_query($this->conn , $sql);
        $data = mysqli_fetch_assoc($result);
        return $data['count'];
    }
}
    