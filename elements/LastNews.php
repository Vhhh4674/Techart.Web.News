<?php
$newsService = new NewsService();
$last = $newsService->getLastNews();

echo "<div class=\"last-news\" onclick=\"window.location='details.php?id=" . $last->getId() . "'\" style=\"background-image:url(images/" . $last->getImage() . "); background-repeat: no-repeat;\">" 
    . "<div class=\"last-news-title\">" . $last->getTitle() . "</div>"
    . "<div class=\"last-news-announce\">" . $last->getAnnounce() . "</div>"
    . "</div>";