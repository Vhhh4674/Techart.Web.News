<?php
$id = $_GET['id'];

$newsService = new NewsService();
$news = $newsService->getNews($id);

echo "<div class=\"news-details-container\">"
    . "<div class=\"news-details\">" 
    . "<div class=\"path-main\" onclick=\"window.location='index.php'\"><a>Главная</a>" . " / " . "</div>" . $news->getTitle()
    . "<div class=\"title\"> ". $news->getTitle() . "</div>" 
    . "<div class=\"date\"> ". date("d.m.Y", strtotime($news->getDate(),)) . "</div>" 
    . "<div class=\"announce\"> ". $news->getAnnounce() . "</div>"
    . "<div class=\"content\"> ". $news->getContent() . "</div>"
    . "<button class=\"back-button\" onclick=\"window.location='index.php'\" type=\"button\"><i class=\"back-icon\"></i>Назад к новостям</button>"
    . "</div>"
    . "<img class=\"image\" src=\"images/" . $news->getImage() . "\">"
    . "</img>"
    . "</div>";