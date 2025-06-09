<?php
class News {
    private $id;
    private $date;
    private $title;
    private $announce;
    private $content;
    private $image;

/**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAnnounce()
    {
        return $this->announce;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }
    
    

    //     function __toString() {
//         return "ID:" . $this->id . " Date: " . $this->date . " Title: " . $this->title . " Announce: " . $this->announce . " Content: " . $this->content . " Image: " . $this->image;
//     }
    
    function __toString() {
        return "<div class=\"date\"> ". date("d.m.Y", strtotime($this->date,)) . "</div>" .
        "<div class=\"title\"> ". $this->title . "</div>" .
        "<div class=\"announce\"> ". $this->announce . "</div>";
    }
    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    
    
}