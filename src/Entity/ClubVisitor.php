<?php

/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 17.10.17
 * Time: 2:53
 */
namespace src\Entity;

use src\BaseInterface\PersonInterface as BasePerson;

class ClubVisitor implements BasePerson
{
    protected $name;
    protected $gender;
    protected $danceSkills = [];

    function __construct($name, $gender)
    {
        if (strcasecmp($gender, "мальчик") || strcasecmp($gender, "девочка")) {
            $this->gender = $gender;
        } else {
            $this->gender = "Мальчик";
        }
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param array $danceSkills
     * @return ClubVisitor
     */
    public function setDanceSkills($danceSkills)
    {
        $this->danceSkills = $danceSkills;
        return $this;
    }

    /**
     * Add dance skill like "покачивания телом вперед и назад"
     * @param string $danceSkill
     * @return ClubVisitor
     */
    public function addDanceSkills($danceSkill)
    {
        $this->danceSkills[] = $danceSkill;
        return $this;
    }

    /**
     * @return array
     */
    public function getDanceSkills()
    {
        return $this->danceSkills;
    }

    protected function goToDrink()
    {
        echo "$this->name идет в бар пить водку( \n";
    }

    public function checkAction(DanceMusic $music)
    {

        if (count(array_intersect($music->getNeededMovements(),$this->danceSkills))==count($music->getNeededMovements())){

                echo $this->name." выполняет :".implode(",",$music->getNeededMovements())."\n";
                return true;

        } else {
            return $this->goToDrink();
        }
    }
}