<?php
require_once 'Hooks.php';

function hello_world()
{
    echo "Hello world";
}

$hooks = new Hooks();

$hooks->add("hook", "hello_world");
$hooks->execute("hook");