<?php
    define("SITEBASEDIR", realpath(dirname(__FILE__)).'/');
    require_once(SITEBASEDIR.'config.php');
    require_once(SITEBASEDIR.'Models/DBInit.php');
    require_once(SITEBASEDIR.'Controllers/Common.php');

    session_start();
    $page_list = array('hospitalisation','kineVisit','login','medicalCheck','patientPage','proPage','psychoVisit','register','registerPro'); //Add new pages here
    $page = $_GET['page'];
    if( isset($page) && in_array($page, $page_list) ) {
        require_once(SITEBASEDIR.'Models/'.$page.'Model.php');
        require_once(SITEBASEDIR.'Controllers/'.$page.'Controller.php');
    }

?>
