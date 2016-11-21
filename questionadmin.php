<?php
    /*
    * This page displays the Question Admin page. It's more or less a static page (JS nonwithstanding), so no Smarty objects need assigning.
    */

    // Begin the login session!
    session_start();

    // Only allow access to the page if the user is logged in, otherwise, go to the login page
    if (!isset($_SESSION['email']) && $_SESSION['role'] >= 3) {
        header("Location: /forbidden.php");
        die();
    }

    // Include all Composer dependencies
    require_once __DIR__ . '/vendor/autoload.php';

    // Include the PHP Debug bar object
    use DebugBar\StandardDebugBar;
    $debugbar = new StandardDebugBar();
    $debugbarRenderer = $debugbar->getJavascriptRenderer();
    
    // Include the Smarty Framework for templating
    $dir = dirname(__FILE__);
    require("$dir/smarty/libs/Smarty.class.php");
    
    // Create Smarty object
    $smarty = new Smarty;

    // Pass the DebugBarRenderer to the view
    $smarty->assign('debugbarRenderer', $debugbarRenderer);
    
    // Display the associated template
    $smarty->display("$dir/views/questionadmin.tpl");
?>