<?php

require_once __DIR__ . '/../../../script/core/ressources/HostONVIF.php';

require_once "HostONVIF.php";

$camera_un = new HostONVIF();

$_data = 
    [
// VALEURS PAR DEFAUT
// A CHANGER AVEC LES GET DE JEEDOM
  'Username' => 'admin',

  'Password' => 'admin',

  'IPadress' => '192.168.1.X',

  'Port' => '1234',
    ];

$camera_un->hydrate($_data);
/*
$camera_un->gethost();

$camera_un->getdeviceinfo();

$camera_un->getimage();

$camera_un->getnodes();

$camera_un->getstream();

$camera_un->getsnap();

$camera_un->getprofile();

$camera_un->getpresets();

$camera_un->relativemove(1,1,1,1,1,1);

$camera_un -> setpreset(test);

$camera_un -> removepreset(10);

$camera_un -> gotopreset(1);

$camera_un -> setimagesettings(40,40,40,40);
*/
