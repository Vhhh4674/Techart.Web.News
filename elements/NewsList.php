<?php
$currentPage = $_GET['page'];
if ($currentPage == null) {
    $currentPage = 1;
}
$newsService = new NewsService();
$newsCount = $newsService->getNewsCount();
$pageCount = ceil($newsCount / 4);

$news = $newsService->getNewsList($currentPage, 4);

updateNewsList($news);

function updateNewsList($news)
{
    echo "<table class=\"news-list\">";
    for ($i = 0; $i < sizeOf($news); $i ++) {
        if ($i == 0 || $i == 2)
            echo "<tr>";
        echo "<td onclick=\"window.location='details.php?id=" . $news[$i]->getId() . "'\">" . "<div class=\"date\"> " . date("d.m.Y", strtotime($news[$i]->getDate())) . "</div>" . "<div class=\"title\"> " . $news[$i]->getTitle() . "</div>" . "<div class=\"announce\"> " . $news[$i]->getAnnounce() . "</div>" . "<button class=\"details-button\" type=\"button\">Подробнее<i class=\"details-icon\"></i></button>" . "</td>";
        if ($i == 1 || $i == 3)
            echo "</tr>";
    }
    echo "</table>";
}

echo "<div class=\"pagination\">";
if ($currentPage != 1) {
    echo "<button class=\"previous-page-button\" onclick=\"window.location='index.php?page=" . $currentPage - 1 . "'\"><i class=\"previous-page-icon\"></i></button>";
}
for ($i = 1; $i <= $pageCount; $i ++) {
    if ($i == $currentPage) {
        echo "<button class=\"page-button current-page-button\" onclick=\"window.location='index.php?page=" . $i . "'\">" . $i . "</button>";
    } else {
        if (($i > $currentPage && $i <= $currentPage + 2) 
            || ($i < $currentPage && $i >= $currentPage - 2)) {
            echo "<button class=\"page-button\" onclick=\"window.location='index.php?page=" . $i . "'\">" . $i . "</button>";
        }
    }
}
if ($currentPage != $pageCount) {
    echo "<button class=\"next-page-button\" onclick=\"window.location='index.php?page=" . $currentPage + 1 . "'\"><i class=\"next-page-icon\"></i></button>";
}
echo "</div>";
