<?php

function dd(...$data)
{

    die(var_dump(...$data));
}


function redirect($page)
{
    header("Location: $page");
}
