<?php
include ("classes/SqlConnection.php");

class NewsService {
    
    function getNewsList($page, $newsPerPage) {
        $sqlConnection = new SqlConnection();
        $sqlConnection->createConnection();
        $news = $sqlConnection->getNewsList($page, $newsPerPage);
        $sqlConnection->closeConnection();
        return $news;
    }
    
    function getLastNews() {
        $sqlConnection = new SqlConnection();
        $sqlConnection->createConnection();
        $lastNews = $sqlConnection->getLastNews();
        $sqlConnection->closeConnection();
        return $lastNews;
    }
    
    function getNews($id) {
        $sqlConnection = new SqlConnection();
        $sqlConnection->createConnection();
        $news = $sqlConnection->getNews($id);
        $sqlConnection->closeConnection();
        return $news;
    }
    
    function getNewsCount() {
        $sqlConnection = new SqlConnection();
        $sqlConnection->createConnection();
        $count = $sqlConnection->getNewsCount();
        $sqlConnection->closeConnection();
        return $count;
    }
}
