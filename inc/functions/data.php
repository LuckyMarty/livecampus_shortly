<?php
require_once __DIR__ . '/util.php';


// ****** CHARLES ******
// ****** THOMAS  ******
// TODO: Données





function data()
{
    return json_decode(file_get_contents(rootPath() . 'data.json'), true);
}


function pageData(string $page):array
{
    return data()['page'][$page];
}


function siteData():array
{
    return data()['site'];
}