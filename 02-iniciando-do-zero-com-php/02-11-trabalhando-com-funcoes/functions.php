<?php

function functionName($arg1, $arg2, $arg3)
{
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

function optionArgs($arg1, $arg2 = true, $arg3 = true)
{
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

function calcImc()
{
    global $weight;
    global $height;
    return $weight / ($height * $height);
}

function PayTotal($price)
{
    static $total;
    $total += $price;
    return "<p>O toral a pagar é R$ " . number_format($total, "2", ",", ".");
}

function myTeam()
{
    $teamNames = func_get_args();
    $teamCount = func_num_args();
    return [$teamNames, "Count" => $teamCount];
}
