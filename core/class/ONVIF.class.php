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
require_once __DIR__ . '/../../../../core/php/core.inc.php';
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

/**********************************************/
/*                                            */
/*---------------LISTE DES INFOS--------------*/
/*                                            */
/**********************************************/
    
       public function json_validate($_test)
    {
    // Decode pour test erreur
    $result = json_decode($_test);


    if(json_last_error() != JSON_ERROR_NONE) 
    {
        throw new Exception(json_last_error());
         // Exit sur exeption
        echo "Erreur \n";
        echo $_error;
    }
    // Fin sans erreur
    $_test2 = json_decode($_test);
    if ($_test2 =='null' || $_test2 =='')
    {
        throw new Exception('Fichier Vide');
    }

    log::add('ONVIF','debug','Aucune erreur dans le décodage du JSON');  
    
    }

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

       for($i = 1; $i <= $nombrecam; $i++) 
       {
        $eqLogic = new self();
        $eqLogic->setLogicalId('camera' . $i);
        $eqLogic->setName('camera'.$i);
        $eqLogic->setEqType_name('ONVIF');
        $eqLogic->setIsVisible(0);
        $eqLogic->setIsEnable(1);
        $j ++;
        ${'ip'.$i} = $cam[$j];
        log::add('ONVIF','debug','Création de l\'équipement Camera'$i);
        $j ++;
        ${'port'.$i} = $cam[$j];
        log::add('ONVIF','debug','Affectation de l\'ip '${'ip'.$i} 'à l\'équipement Camera'$i);
        log::add('ONVIF','debug','Affectation du port '${'port'.$i} 'à l\'équipement Camera'$i);
        $eqLogic->setConfiguration('adresseip', ${'ip'.$i});
        $eqLogic->setConfiguration('port', ${'port'.$i});
        $eqLogic->save();
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
      return $this;
    }


    public function setPassword($Password)
    {
      $this->_Password = $Password;
      return $this;
    }
    
    
    public function setIPadress($IPadress)
    {
      $this->_IPadress = $IPadress;
      return $this;
    }
    
    
    public function setPort($Port)
    {
      $this->_Port = $Port;
      return $this;
    }
    

    public function setXmin($XMIN)
    {
      $this->_Xmin = $XMIN;
      return $this;
    }

    public function setXmax($XMAX)
    {
      $this->_Xmax = $XMAX;
      return $this;
    }

    public function setYmin($YMIN)
    {
      $this->_Ymin = $YMIN;
        
    }

    public function setYmax($YMAX)
    {
      $this->_Ymin = $YMAX;
      return $this;
    }

    public function setZmin($ZMIN)
    {
      $this->_Zmin = $ZMIN;
      return $this;
    }

    public function setZmax($ZMAX)
    {
      $this->_Zmax = $ZMAX;
      return $this;
    }

    public function setXspeedmin($XSPEEDMIN)
    {
      $this->_Xspeedmin = $XSPEEDMIN;
      return $this;
    }

    public function setXspeedmax($XSPEEDMAX)
    {
      $this->_Xspeedmax = $XSPEEDMAX;
      return $this;
    }
    
    public function setYspeedmin($YSPEEDMIN)
    {
      $this->_Yspeedmin = $YSPEEDMIN;
      return $this;
    }

    public function setYspeedmax($YSPEEDMAX)
    {
      $this->_Yspeedmax = $YSPEEDMAX;
      return $this;
    }
    
    public function setZspeedmin($ZSPEEDMIN)
    {
      $this->_Zspeedmin = $ZSPEEDMIN;
      return $this;
    }

    public function setZspeedmax($ZSPEEDMAX)
    {
      $this->_Zspeedmax = $ZSPEEDMAX;
      return $this;
    }
    
    public function setPanTiltSpeedMin($AbsXSpeed)
    {
        $this->_PanTiltSpeedMin = $AbsXSpeed;
        return $this;
    }
    
    
    public function setPanTiltSpeedMax($AbsXSpeed)
    {
        $this->_PanTiltSpeedMax = $AbsXSpeed;
        return $this;
    }
    
    public function setZoomSpeedMin($AbsZSpeed)
    {
        $this->_ZoomSpeedMin = $AbsZSpeed;
        return $this;
    }
    
    
    public function setZoomSpeedMax($AbsZSpeed)
    {
        $this->_ZoomSpeedMax = $AbsZSpeed;
        return $this;
    }

    public function setnombrecamera($nbcam)
    {
        $this->_nombrecamera = $nbcam;
        return $this;
    }
}
