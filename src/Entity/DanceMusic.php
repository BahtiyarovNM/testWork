<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 17.10.17
 * Time: 3:38
 */

namespace src\Entity;


use src\BaseInterface\MusicInterface as BaseMusic;

class DanceMusic implements BaseMusic
{
    private $name;
    private $neededMovements;

      public function __construct($name)
    {
        $this->name=$name;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getNeededMovements()
    {
        return $this->neededMovements;
    }

    /**
     * @param array $neededMovements
     * @return DanceMusic
     */
    public function setNeededMovements($neededMovements)
    {
        $this->neededMovements = $neededMovements;
        return $this;
    }
    /**
     * Add needed movement like "покачивания телом вперед и назад"
     * @param string $neededMovement
     * @return DanceMusic
     */
    public function addNeededMovements($neededMovement)
    {
        $this->neededMovements[] = $neededMovement;
        return $this;
    }
}