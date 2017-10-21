<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 17.10.17
 * Time: 6:00
 */

namespace src\Entity;

use src\BaseInterface\ClubInterface;

class DanceClub implements ClubInterface
{
    protected $musicPlaylist;
    protected $visitors;

    /**
     * @param DanceMusic $music
     * @return DanceClub
     */
    public function addMusic(DanceMusic $music)
    {
        $this->musicPlaylist[] = $music;
        return $this;
    }

    /**
     * Add club visitor
     * @param ClubVisitor $person
     * @return DanceClub
     */
    public function addVisitor(ClubVisitor $person)
    {
        $this->visitors[] = $person;
        return $this;
    }

    /**
     * @return  array
     */
    public function getPlayList()
    {
        return $this->musicPlaylist;
    }

    /**
     * @return  array
     */
    public function getVisitors()
    {
        return $this->visitors;
    }

    /**
     * Add club visitor
     * @param DanceMusic $curentMusic
     */
    public function checkVisitorsAction(DanceMusic $curentMusic)
    {
        /**
         * @var ClubVisitor $visitor
         */
        foreach ($this->visitors as $visitor) {
            $visitor->checkAction($curentMusic);
        }
    }

}