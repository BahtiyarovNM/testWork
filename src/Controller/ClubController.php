<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 17.10.17
 * Time: 6:12
 */

namespace src\Controller;


use src\Entity\ClubVisitor;
use src\Entity\DanceClub;
use src\Entity\DanceMusic;

class ClubController
{
    public function indexAction()
    {

        $club = new DanceClub();
        $musicRnb = new DanceMusic("Rnb");
        $musicRnb->setNeededMovements(["покачивания телом вперед и назад", "ноги в полу-присяде", "руки согнуты в локтях", "головой вперед-назад"]);
        $musicElectrohouse = new DanceMusic("Electrohouse");
        $musicElectrohouse->setNeededMovements(["покачивание туловищем вперед-назад", "почти нет движения головой", "вращения руками", "ноги двигаются в ритме"]);
        $musicPop = new DanceMusic("Pop-music");
        $musicPop->setNeededMovements(["плавные движения туловищем", "плавные движения руками", "плавные движения ногами", "плавные движения головой."]);
        $musicHouse = new DanceMusic("House");
        $musicHouse->setNeededMovements($musicElectrohouse->getNeededMovements());
        $musicHipHop = new DanceMusic("HipHop");
        $musicHipHop->setNeededMovements($musicRnb->getNeededMovements());

        $club
            ->addMusic($musicRnb)
            ->addMusic($musicHipHop)
            ->addMusic($musicHouse)
            ->addMusic($musicElectrohouse)
            ->addMusic($musicPop);

        $visitor = new ClubVisitor('Коля', "Мальчик");
        $visitor->setDanceSkills(["покачивания телом вперед и назад", "ноги в полу-присяде", "руки согнуты в локтях", "головой вперед-назад"]);
        $club->addVisitor($visitor);
        $visitor = new ClubVisitor('Саша', "Мальчик");
        $visitor->setDanceSkills(['покачивания телом вперед и назад', 'плавные движения туловищем']);
        $club->addVisitor($visitor);
        /**
         * @var DanceMusic $curentMusic
         */
        foreach ($club->getPlayList() as $curentMusic) {
            echo "----Играет " . $curentMusic->getName() . "---- \n";
            $club->checkVisitorsAction($curentMusic);
        }


    }
}