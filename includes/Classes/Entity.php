<?php

class Entity
{
    private $conn, $data;

    function __construct(PDO $con, $input)
    {
        $this->conn = $con;
        if (is_array($input)) {
            $this->data = $input;
        } else {
            $query = $this->conn->prepare("SELECT * FROM entities WHERE id=:id;");
            $query->bindValue(":id", $input);
            $query->execute();
            $this->data = $query->fetch(PDO::FETCH_ASSOC);
        }

    }

    public function getId()
    {
        return $this->data['id'];
    }
    public function getName()
    {
        return $this->data['name'];
    }
    public function getCategoryID()
    {
        return $this->data['categoryId'];
    }

    public function getThumbnail()
    {
        return $this->data['thumbnail'];
    }
    public function getPreview()
    {
        return $this->data['preview'];
    }
    public function getSeason()
    {
        $id = $this->getId();
        $query = $this->conn->prepare("SELECT * FROM videos WHERE entityID=:id AND isMovie=0 ORDER BY season,episode ASC;");
        $query->bindValue(":id", $id);
        $query->execute();

        $seasons = [];
        $videos = [];
        $currentSeason = null;

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            if ($currentSeason != null && $currentSeason != $row['season']) {
                $seasons[] = new Season($currentSeason, $videos);
                $videos = [];
            }
            $currentSeason = $row['season'];
            $videos[] = new Video($this->conn, $row);

        }
        if (sizeof($videos) !== 0) {
            $seasons[] = new Season($currentSeason, $videos);
        }

        return $seasons;
    }

}