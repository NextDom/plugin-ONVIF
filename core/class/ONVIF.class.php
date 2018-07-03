<?php

/*
 * This file is part of the NextDom software (https://github.com/NextDom or http://nextdom.github.io).
 * Copyright (c) 2018 NextDom.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, version 2.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */


/* * ***************************Includes********************************* */
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';
require_once 'ONVIFCmd.class.php';

class ONVIF extends eqLogic
{
    /*     * *************************Attributs****************************** */
    private $_Username;
    private $_Password;
    private $_IPadress;
    private $_Port;
    private $_VideoToken;
    private $_PTZToken; 
    private $_data;
    private $_Xmin;
    private $_Xmax;
    private $_Ymin;
    private $_Ymax;
    private $_Zmin;
    private $_Zmax;
    private $_Xspeedmin;
    private $_Xspeedmax;
    private $_Yspeedmin;
    private $_Yspeedmax;
    private $_Zspeedmin;
    private $_Zspeedmax;
    private $_ZoomSpeedMin;
    private $_ZoomSpeedMax;
    private $_PanTiltSpeedMin;
    private $_PanTiltSpeedMax;
    private $_nombrecamera;


    /*     * ***********************Methode static*************************** */

    /*
     * Fonction exécutée automatiquement toutes les minutes par Jeedom
      public static function cron() {

      }
     */


    /*
     * Fonction exécutée automatiquement toutes les heures par Jeedom
      public static function cronHourly() {

      }
     */

    /*
     * Fonction exécutée automatiquement tous les jours par Jeedom
      public static function cronDaily() {

      }
     */


    /*     * *********************Méthodes d'instance************************* */

    public function preInsert()
    {

    }

    public function postInsert()
    {

    }

    public function preSave()
    {

    }

    public function postSave()
    {

    }

    public function preUpdate()
    {

    }

    public function postUpdate()
    {

    }

    public function preRemove()
    {

    }

    public function postRemove()
    {

    }

    /*
     * Non obligatoire mais permet de modifier l'affichage du widget si vous en avez besoin
      public function toHtml($_version = 'dashboard') {

      }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action après modification de variable de configuration
      public static function postConfig_<Variable>() {
      }
     */

    /*
     * Non obligatoire mais ca permet de déclencher une action avant modification de variable de configuration
      public static function preConfig_<Variable>() {
      }
     */

/**********************************************/
/*                                            */
/*---------------LISTE DES INFOS--------------*/
/*                                            */
/**********************************************/
    
    public function getcamera()
    {
       $commande = "node GetCamera.js";  
       $camerasdiscovery = shell_exec($commande);
       
       print_r($camerasdiscovery);
       $this -> json_validate($camerasdiscovery);
       // Le fichier est maintenant vérifié

       $cam = json_decode($camerasdiscovery);

       $nombrecam = $cam[0];
       $this -> setnombrecamera($nombrecam);
       echo"Il y a ", $nombrecam," cameras","\n";
       $j = 0;
       for($i = 1; $i <= $nombrecam; $i++) 
       {
       $j ++;
       ${'ip'.$i} = $cam[$j];
       $j ++;
       ${'port'.$i} = $cam[$j];
       print_r('ip '.$i);
       echo ":\n";
       print_r(${'ip'.$i});
       echo "\n";
       print_r('port '.$i);
       echo ":\n";
       print_r(${'port'.$i});
       echo "\n";
       }       
    }



    public function gethost()
    {
        //THIS COMMAND GIVE TO $name THE NAME OF THE CAM


        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        
        $commande = "node gethost.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $host = shell_exec($commande);


        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($host);

        // SI LE FICHIER EST VALIDE
        $hostjson = json_decode($host, true);

        // NOM SUR LE RESEAU
        $name = $hostjson['host']['name'];

              
    }

    public function getdeviceinfo()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getdeviceinfo.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;


        //Display final shell command
        //echo $commande,"\n";

        $info = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($info);

        // SI LE FICHIER EST VALIDE ALORS
        $infojson = json_decode($info, true);
        

        // INFO VALUES
        $Manufacturer = $infojson['info']['manufacturer'];
        $Model = $infojson['info']['model'];
        $Firmware = $infojson['info']['firmwareVersion'];
        $Serial = $infojson['info']['serialNumber'];       
    }

    public function getimage()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getimage.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;


        //Display final shell command
        //echo $commande,"\n";

        $image = shell_exec($commande);
        
        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($image);

        // SI LE FICHIER EST VALIDE ALORS
        $imagejson = json_decode($image, true);


        // IMAGE SETTINGS
        $brightness = $imagejson['stream']['brightness'];
        $colorSaturation = $imagejson['stream']['colorSaturation'];
        $contrast = $imagejson['stream']['contrast'];
        $sharpness = $imagejson['stream']['sharpness'];

    }

    public function getnodes()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getnodes.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;


        //Display final shell command
        //echo $commande,"\n";

        $node = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($node);

        // SI LE FICHIER EST VALIDE ALORS

        $nodejson = json_decode($node, true);


        // NODES VALUES
        $XRangeMax = $nodejson['nodes']['000']['supportedPTZSpaces']['absolutePanTiltPositionSpace']['XRange']['max'];
        $XRangeMin = $nodejson['nodes']['000']['supportedPTZSpaces']['absolutePanTiltPositionSpace']['XRange']['min'];
        $YRangeMax = $nodejson['nodes']['000']['supportedPTZSpaces']['absolutePanTiltPositionSpace']['YRange']['max'];
        $YRangeMin = $nodejson['nodes']['000']['supportedPTZSpaces']['absolutePanTiltPositionSpace']['YRange']['min'];
        $ZRangeMax = $nodejson['nodes']['000']['supportedPTZSpaces']['absoluteZoomPositionSpace']['XRange']['max'];
        $ZRangeMin = $nodejson['nodes']['000']['supportedPTZSpaces']['absoluteZoomPositionSpace']['XRange']['min'];
        $PresetMax = $nodejson['nodes']['000']['maximumNumberOfPresets'];
        $HomeSupport = $nodejson['nodes']['000']['homeSupported'];
        $PatrolMax = $nodejson['nodes']['000']['extension']['supportedPresetTour']['maximumNumberOfPresetTours'];
        $PanspeedMin = $nodejson['nodes']['000']['supportedPTZSpaces']['panTiltSpeedSpace']['XRange']['min'];
        $PanspeedMax = $nodejson['nodes']['000']['supportedPTZSpaces']['panTiltSpeedSpace']['XRange']['max'];
        $ZoomspeedMin = $nodejson['nodes']['000']['supportedPTZSpaces']['zoomSpeedSpace']['XRange']['min'];
        $ZoomspeedMax = $nodejson['nodes']['000']['supportedPTZSpaces']['zoomSpeedSpace']['XRange']['max']; 
        $XContinuousspeedmin = $nodejson['nodes']['000']['supportedPTZSpaces']['continuousPanTiltVelocitySpace']['XRange']['min']; 
        $XContinuousspeedmax =  $nodejson['nodes']['000']['supportedPTZSpaces']['continuousPanTiltVelocitySpace']['XRange']['max'];
        $YContinuousspeedmin = $nodejson['nodes']['000']['supportedPTZSpaces']['continuousPanTiltVelocitySpace']['YRange']['min']; 
        $YContinuousspeedmax =  $nodejson['nodes']['000']['supportedPTZSpaces']['continuousPanTiltVelocitySpace']['YRange']['max'];
        $ZContinuousspeedmin = $nodejson['nodes']['000']['supportedPTZSpaces']['continuousZoomVelocitySpace']['XRange']['min']; 
        $ZContinuousspeedmax =  $nodejson['nodes']['000']['supportedPTZSpaces']['continuousZoomVelocitySpace']['XRange']['max'];



        // PUT VALUES TO PRIVATE VARIABLES
        $this -> setXmin($XRangeMin);
        $this -> setXmax($XRangeMax);
        $this -> setYmin($YRangeMin);
        $this -> setYmax($YRangeMax);
        $this -> setZmin($ZRangeMin);
        $this -> setZmax($ZRangeMax);
        $this -> setXspeedmin($XContinuousspeedmin);
        $this -> setXspeedmax($XContinuousspeedmax);        
        $this -> setYspeedmin($YContinuousspeedmin);
        $this -> setYspeedmax($YContinuousspeedmax);
        $this -> setZspeedmin($ZContinuousspeedmin);
        $this -> setZspeedmax($ZContinuousspeedmax);
        $this -> setZoomSpeedMin($ZoomspeedMin);
        $this -> setZoomSpeedMax($ZoomspeedMax);
        $this -> setPanTiltSpeedMin($PanspeedMin);
        $this -> setPanTiltSpeedMax($PanspeedMax);
    }


    public function getstream()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getstream.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;


        //Display final shell command
        //echo $commande,"\n";

        $stream = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($stream);

        // SI LE FICHIER EST VALIDE ALORS
        $streamjson = json_decode($stream, true);

        // STREAM URL
        $StreamUri = $streamjson['stream']['uri'];

    }
    public function getsnap()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getsnapshot.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $snap = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($snap);

        // SI LE FICHIER EST VALIDE ALORS
        $snapjson = json_decode($snap, true);


        // SNAP URL
        $SnapUri = $snapjson['snap']['uri'];
    }

    public function getstatus()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getStatus.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $statuscam = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($statuscam);

        // SI LE FICHIER EST VALIDE ALORS
        $statuscamjson = json_decode($statuscam, true);


        // STATUS X/Y/Z/MVT (IDLE/NOT)
        $PositionX = $statuscamjson['status']['position']['x'];
        $PositionY = $statuscamjson['status']['position']['y'];
        $PositionZ = $statuscamjson['status']['position']['zoom'];
        $MoveStatusPT = $statuscamjson['status']['moveStatus']['panTilt'];
        $MoveStatusZ = $statuscamjson['status']['moveStatus']['zoom'];
    }

    public function getprofile()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getprofile.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $profile = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($profile);

        // SI LE FICHIER EST VALIDE ALORS
        $profilejson = json_decode($profile, true);

        // PROFILE NAME/TOKEN
        $profilename = $profilejson['Profile']['0']['name'];
        $VideoSourceToken = $profilejson['Profile']['0']['videoSourceConfiguration']['$']['token'];
        $VideoEncoderToken = $profilejson['Profile']['0']['videoEncoderConfiguration']['$']['token'];
        $VideoAnalyticsToken = $profilejson['Profile']['0']['videoAnalyticsConfiguration']['$']['token'];
        $MetadataToken = $profilejson['Profile']['0']['metadataConfiguration']['$']['token'];
        $PTZToken = $profilejson['Profile']['0']['PTZConfiguration']['$']['token'];
        $PTZdefaultspeedX = $profilejson['Profile']['0']['PTZConfiguration']['defaultPTZSpeed']['panTilt']['$']['x'];
        $PTZdefaultspeedY = $profilejson['Profile']['0']['PTZConfiguration']['defaultPTZSpeed']['panTilt']['$']['y'];
        $PTZdefaultspeedZ = $profilejson['Profile']['0']['PTZConfiguration']['defaultPTZSpeed']['zoom']['$']['x'];
    }

    public function getpresets()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node getPresets.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $presets = shell_exec($commande);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($presets);

        // SI LE FICHIER EST VALIDE ALORS
        $presetsjson = json_decode($presets, true);
    } 

    public function refresh()
    {

        $this -> getdeviceinfo();
        $this -> gethost();
        $this -> getprofile();
        $this -> getsnap();
        $this -> getnodes();
        $this -> getimage();
        $this -> getstream();
        $this -> getpresets();
        $this -> getnodes();
    }
/*     * **********************Getteur Setteur*************************** */
    /***********************************/
    /*             GETTEURS            */
    /***********************************/
    public function getUsername()
    {
        
        return $this->_Username;
    }
    
    public function getPassword()
    {
        return $this->_Password; 
    }
    
    public function getIPadress()
    {
        return $this->_IPadress;
    }
    
    public function getPort()
    {
        return $this->_Port;
    }

    public function getXmin()
    {
        return $this->_Xmin;
    }
        
    public function getXmax()
    {
        return $this->_Xmax;
    }
        
    public function getYmin()
    {
        return $this->_Ymin;
    }
        
    public function getYmax()
    {
        return $this->_Ymax;
    }
        
    public function getZmin()
    {
        return $this->_Zmin;
    }

    public function getZmax()
    {
        return $this->_Zmax;
    }
        
    public function getXspeedmin()
    {
        return $this->_Xspeedmin;
    }
        
    public function getXspeedmax()
    {
        return $this->_Xspeedmax;
    }
  
    public function getYspeedmin()
    {
        return $this->_Yspeedmin;
    }
        
    public function getYspeedmax()
    {
        return $this->_Yspeedmax;
    }
    
    public function getZspeedmin()
    {
        return $this->_Zspeedmin;
    }
        
    public function getZspeedmax()
    {
        return $this->_Zspeedmax;
    }

    public function getPanTiltSpeedMin()
    {
        return $this->_PanTiltSpeedMin;
    }
    
    public function getPanTiltSpeedMax()
    {
        return $this->_PanTiltSpeedMax;
    }

    public function getZoomSpeedMin()
    {
        return $this->_ZoomSpeedMin;
    }
    
    public function getZoomSpeedMax()
    {
        return $this->_ZoomSpeedMax;
    }

    public function getnombrecamera()
    {
        return $this->_nombrecamera;
    }


    /***********************************/
    /*             SETTEURS            */
    /***********************************/

    public function setUsername($Username)
    {
      $this->_Username = $Username;
    }


    public function setPassword($Password)
    {
      $this->_Password = $Password;
    }
    
    
    public function setIPadress($IPadress)
    {
      $this->_IPadress = $IPadress;
    }
    
    
    public function setPort($Port)
    {
  
      $this->_Port = $Port;
    }
    

    public function setXmin($XMIN)
    {
  
      $this->_Xmin = $XMIN;
    }

    public function setXmax($XMAX)
    {
  
      $this->_Xmax = $XMAX;
    }

    public function setYmin($YMIN)
    {
  
      $this->_Ymin = $YMIN;
    }

    public function setYmax($YMAX)
    {
  
      $this->_Ymin = $YMAX;
    }

    public function setZmin($ZMIN)
    {
  
      $this->_Zmin = $ZMIN;
    }

    public function setZmax($ZMAX)
    {
  
      $this->_Zmax = $ZMAX;
    }

    public function setXspeedmin($XSPEEDMIN)
    {
  
      $this->_Xspeedmin = $XSPEEDMIN;
    }

    public function setXspeedmax($XSPEEDMAX)
    {
  
      $this->_Xspeedmax = $XSPEEDMAX;
    }
    
    public function setYspeedmin($YSPEEDMIN)
    {
  
      $this->_Yspeedmin = $YSPEEDMIN;
    }

    public function setYspeedmax($YSPEEDMAX)
    {
  
      $this->_Yspeedmax = $YSPEEDMAX;
    }
    
    public function setZspeedmin($ZSPEEDMIN)
    {
  
      $this->_Zspeedmin = $ZSPEEDMIN;
    }

    public function setZspeedmax($ZSPEEDMAX)
    {
  
      $this->_Zspeedmax = $ZSPEEDMAX;
    }
    
    public function setPanTiltSpeedMin($AbsXSpeed)
    {
        $this->_PanTiltSpeedMin = $AbsXSpeed;
    }
    
    
    public function setPanTiltSpeedMax($AbsXSpeed)
    {
        $this->_PanTiltSpeedMax = $AbsXSpeed;
    }
    
    public function setZoomSpeedMin($AbsZSpeed)
    {
        $this->_ZoomSpeedMin = $AbsZSpeed;
    }
    
    
    public function setZoomSpeedMax($AbsZSpeed)
    {
        $this->_ZoomSpeedMax = $AbsZSpeed;
    }

    public function setnombrecamera($nbcam)
    {
        $this->_nombrecamera = $nbcam;
    }
}
