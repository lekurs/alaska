<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 17/11/2017
 * Time: 13:56
 */

namespace src\models;


class Chapters
{
    private $idChapter;
    private $title;
    private $chapter;
    private $create_date;
    private $online;


    public function idChapter()
    {
        return $this->idChapter;
    }

    public function title()
    {
        return $this->title;
    }

    public function chapter()
    {
        return $this->chapter;
    }

    public function createDate()
    {
        return $this->create_date;
    }

    public function online()
    {
        return $this->online;
    }

    public function setIdChapter($id)
    {
        $id = (int) $id;
        if($id>0)
        {
            $this->idChapter = $id;
        }
    }

    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->title = $title;
        }
    }

    public function setChapter($chapter)
    {
        if(is_string($chapter))
        {
            $this->chapter = $chapter;
        }
    }

    public function setCreate_date($date)
    {
        $this->create_date = $date;
    }

    public function setOnline($online)
    {
        $online = (int) $online;
        $this->online = $online;
    }

}