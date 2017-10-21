<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 14.08.17
 * Time: 22:41
 */

use src\Controller\ClubController;
spl_autoload_register(function ($class) {
    require_once  str_replace('\\', '/', $class). '.php';
});
$clubController=new ClubController();
$clubController->indexAction();