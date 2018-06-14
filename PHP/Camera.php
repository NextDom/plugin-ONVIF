<?php

require_once __DIR__ . '/../../../script/core/ressources/ONVIF.class.php';

require_once "ONVIF.php";

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

$camera_un -> hydrate($_data);
$camera_un -> refresh();
/*
$camera_un -> gotohome(0.9,0.9,0.9);

$camera_un -> getnodes();

$camera_un -> getprofile();

$camera_un -> setimagesettings(60,60,60,60);

$camera_un->gethost();

$camera_un->getdeviceinfo();

$camera_un->getimage();

$camera_un->getstream();

$camera_un->getsnap();

$camera_un->getpresets();

$camera_un->getnodes();

$camera_un->getprofile();

$camera_un->getstatus();

$camera_un -> refresh();
$camera_un -> relativemove(1,1,1,1,1,1);

$camera_un -> setpreset(test);

$camera_un -> removepreset(10);

$camera_un -> gotopreset(1);

$camera_un -> setimagesettings(40,40,40,40);

$camera_un -> getnodes();
*/
