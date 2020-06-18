<?php

function redirect($dir)
{
    header('location:' .BASE_URL . $dir);
}

function linkCSS($dirCSS)
{
    $url = BASE_URL . $dirCSS;
    echo '<link rel="stylesheet" href="'.$url.'">';
}

function linkJS($dirJS)
{
    $url = BASE_URL . $dirJS;
    echo '<link rel="stylesheet" href="'.$url.'">';
}