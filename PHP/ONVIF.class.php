<?php
require_once __DIR__ . '/../../../../core/php/core.inc.php';

class HostONVIF

{
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


/**********************************************/
/*                                            */
/*-------------LISTE DES GETTERS--------------*/
/*                                            */
/**********************************************/


    public function __get($att)
    {
         echo "Get:$att";
         return $this->att;
    } 
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



/**********************************************/
/*                                            */
/*-------------LISTE DES SETTERS--------------*/
/*                                            */
/**********************************************/


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
/**********************************************/
/*                                            */
/*-------------LISTE DES FONCTIONS------------*/
/*                                            */
/**********************************************/


// Importe les donnees d'authentification de Jeedom
    public function hydrate(array $donnees)

    {

        foreach ($donnees as $key => $value)

            {
            // On récupère le nom du setter correspondant à l'attribut.

            $method = 'set'.ucfirst($key);


            // Si le setter correspondant existe.

            if (method_exists($this, $method))

                {
                // On appelle le setter.
                $this->$method($value);
                }

            } 
    }
    
// Valide les fichiers JSON renvoyés par les JavaScript
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

    echo "Aucune erreur \n";  
    
    }

/**********************************************/
/*                                            */
/*-----------------INTERVALES-----------------*/
/*                                            */
/**********************************************/

    /*
    NE FONCTIONNE PAS SUITE A UN BUG SUR LE PROJET ONVIF

    public function getcamera()
    {
       $commande = "node getcam.js";  
       $camerasdiscovery = shell_exec($commande);
       
       print_r($camerasdiscovery);
    }
    */

        public function intervalX($variable)
    {
        $Xminimum = $this -> getXmin();
        $Xmaximum = $this -> getXmax();

        if (gettype($variable) == integer || gettype($variable) == double)
        {
            if ($variable >= $Xminimum && $variable<=$Xmaximum)
            {
                // Aucun Probleme
            }
            else 
            {
                throw new Exception ('Les valeurs entrées n\'entre pas dans l\'interval des valeurs acceptées par la caméra');
            }
        }   
        else
        {
            throw new Exception ('Les valeurs entrées ne sont pas des nombres');
        }
    }


        public function intervalY($variable)
    {
        $Yminimum = $this -> getYmin();
        $Ymaximum = $this -> getYmax();

        if (gettype($variable) == integer || gettype($variable) == double)
        {
            if ($variable >= $Yminimum && $variable<=$Ymaximum)
            {
                // Aucun Probleme
            }
            else 
            {
                throw new Exception ('Les valeurs entrées n\'entre pas dans l\'interval des valeurs acceptées par la caméra');
            }
        }   
        else
        {
            throw new Exception ('Les valeurs entrées ne sont pas des nombres');
        }
    }


        public function intervalZ($variable)
    {
        $Zminimum = $this -> getZmin();
        $Zmaximum = $this -> getZmax();

        if (gettype($variable) == integer || gettype($variable) == double)
        {
            if ($variable >= $Zminimum && $variable<=$Zmaximum)
            {
                // Aucun Probleme
            }
            else 
            {
                throw new Exception ('Les valeurs entrées n\'entre pas dans l\'interval des valeurs acceptées par la caméra');
            }
        }   
        else
        {
            throw new Exception ('Les valeurs entrées ne sont pas des nombres');
        }
    }


        public function intervalPanTiltSpeed($variable)
    {
        $minimum = $this -> getPanTiltSpeedMin();
        $maximum = $this -> getPanTiltSpeedMax();

        if (gettype($variable) == integer || gettype($variable) == double)
        {
            if ($variable >= $minimum && $variable<=$maximum)
            {
                // Aucun Probleme
            }
            else 
            {
                throw new Exception ('Les valeurs entrées n\'entre pas dans l\'interval des valeurs acceptées par la caméra');
            }
        }   
        else
        {
            throw new Exception ('Les valeurs entrées ne sont pas des nombres');
        }
    }


        public function intervalZoomSpeed($variable)
    {
        $minimum = $this -> getZoomSpeedMin();
        $maximum = $this -> getZoomSpeedMax();

        if (gettype($variable) == integer || gettype($variable) == double)
        {
            if ($variable >= $minimum && $variable<=$maximum)
            {
                // Aucun Probleme
            }
            else 
            {
                throw new Exception ('Les valeurs entrées n\'entre pas dans l\'interval des valeurs acceptées par la caméra');
            }
        }   
        else
        {
            throw new Exception ('Les valeurs entrées ne sont pas des nombres');
        }
    }


        public function intervalXcontinuousSpeed($variable)
    {
        $minimum = $this -> getXspeedmin();
        $maximum = $this -> getXspeedmax();

        if (gettype($variable) == integer || gettype($variable) == double)
        {
            if ($variable >= $minimum && $variable<=$maximum)
            {
                // Aucun Probleme
            }
            else 
            {
                throw new Exception ('Les valeurs entrées n\'entre pas dans l\'interval des valeurs acceptées par la caméra');
            }
        }   
        else
        {
            throw new Exception ('Les valeurs entrées ne sont pas des nombres');
        }
    }


        public function intervalYcontinuousSpeed($variable)
    {
        $minimum = $this -> getYspeedmin();
        $maximum = $this -> getYspeedmax();

        if (gettype($variable) == integer || gettype($variable) == double)
        {
            if ($variable >= $minimum && $variable<=$maximum)
            {
                // Aucun Probleme
            }
            else 
            {
                throw new Exception ('Les valeurs entrées n\'entre pas dans l\'interval des valeurs acceptées par la caméra');
            }
        }   
        else
        {
            throw new Exception ('Les valeurs entrées ne sont pas des nombres');
        }
    }


        public function intervalZcontinuousSpeed($variable)
    {
        $minimum = $this -> getZspeedmin();
        $maximum = $this -> getZspeedmax();

        if (gettype($variable) == integer || gettype($variable) == double)
        {
            if ($variable >= $minimum && $variable<=$maximum)
            {
                // Aucun Probleme
            }
            else 
            {
                throw new Exception ('Les valeurs entrées n\'entre pas dans l\'interval des valeurs acceptées par la caméra');
            }
        }   
        else
        {
            throw new Exception ('Les valeurs entrées ne sont pas des nombres');
        }
    }


/**********************************************/
/*                                            */
/*---------------LISTE DES INFOS--------------*/
/*                                            */
/**********************************************/
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

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($host);

        $hostjson = json_decode($host, true);

        // NOM SUR LE RESEAU
        $name = $hostjson['host']['name'];

        //DISPLAY NAME
        
        /* 
        echo "HOST \n";
        echo "Nom ",$name,"\n";
        echo "\n";
        */
              
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
        //print_r($info);

        
        $infojson = json_decode($info, true);
        

        // INFO VALUES
        $Manufacturer = $infojson['info']['manufacturer'];
        $Model = $infojson['info']['model'];
        $Firmware = $infojson['info']['firmwareVersion'];
        $Serial = $infojson['info']['serialNumber'];


        //DISPLAY
        /*
        echo "INFO \n";
        echo "Manufacturer ",$Manufacturer,"\n";
        echo "Modele ",$Model,"\n";
        echo "FM ",$Firmware,"\n";
        echo "SN ",$Serial,"\n";
        echo "\n";  
        */          
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
        //print_r($info);

        
        $imagejson = json_decode($image, true);


        // IMAGE SETTINGS
        $brightness = $imagejson['stream']['brightness'];
        $colorSaturation = $imagejson['stream']['colorSaturation'];
        $contrast = $imagejson['stream']['contrast'];
        $sharpness = $imagejson['stream']['sharpness'];


        // DISPLAY IMAGE SETTINGS
        /*
        echo "IMAGE \n";
        echo "Luminosite ",$brightness,"\n";
        echo "Saturation ",$colorSaturation,"\n";
        echo "Contraste ",$contrast,"\n";
        echo "Sharpness ",$sharpness,"\n";
        echo "\n";
        */
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
        // print_r($node);


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
        

        // DISPLAY NODES VALUES
        /*
        echo "NODES \n";
        echo "Xmax ",$XRangeMax,"\n";
        echo "Xmin ",$XRangeMin,"\n";
        echo "Ymax ",$YRangeMax,"\n";
        echo "Ymin ",$YRangeMin,"\n";
        echo "Zmax ",$ZRangeMax,"\n";
        echo "Zmin ",$ZRangeMin,"\n";
        echo "Nombre Max de Presets ",$PresetMax,"\n";
        echo "Nombre Max de Patrouille ",$PatrolMax,"\n";
        echo "Home Support ",$HomeSupport,"\n";
        echo "\n";
        echo "Pan Speed Min ",$PanspeedMin,"\n";
        echo "Pan Speed Max ",$PanspeedMax,"\n";
        echo "Zoom Speed Min ",$ZoomspeedMin,"\n";
        echo "Zoom Speed Max ",$ZoomspeedMax,"\n";
        echo "X continuous speed min ",$XContinuousspeedmin,"\n";
        echo "X continuous speed max ",$XContinuousspeedmax,"\n";
        echo "Y continuous speed min ",$YContinuousspeedmin,"\n";
        echo "Y continuous speed max ",$YContinuousspeedmax,"\n";
        echo "Z continuous speed min ",$ZContinuousspeedmin,"\n";
        echo "Z continuous speed max ",$ZContinuousspeedmax,"\n";
        */
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
        //print_r($info);


        $streamjson = json_decode($stream, true);


        // STREAM URL
        $StreamUri = $streamjson['stream']['uri'];


        // DISPLAY STREAM URL
        /*
        echo "STREAM \n";
        echo "Stream URL ",$StreamUri,"\n";
        echo "\n";
        */

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
        //print_r($info);


        $snapjson = json_decode($snap, true);


        // SNAP URL
        $SnapUri = $snapjson['snap']['uri'];

        // DISPLAY SNAP URL
        /*
        echo "SNAP \n";
        echo "Snap URL ",$SnapUri,"\n";
        echo "\n";
        */
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
        print_r($statuscam);


        $statuscamjson = json_decode($statuscam, true);


        // STATUS X/Y/Z/MVT (IDLE/NOT)
        $PositionX = $statuscamjson['status']['position']['x'];
        $PositionY = $statuscamjson['status']['position']['y'];
        $PositionZ = $statuscamjson['status']['position']['zoom'];
        $MoveStatusPT = $statuscamjson['status']['moveStatus']['panTilt'];
        $MoveStatusZ = $statuscamjson['status']['moveStatus']['zoom'];

        // DISPLAY COORD + IDLE/NOT
        /*
        echo "STATUS \n";
        echo "Position X ",$PositionX,"\n";
        echo "Position Y ",$PositionY,"\n";
        echo "Position Z ",$PositionZ,"\n";
        echo "Status Pan Tilt ",$MoveStatusPT,"\n";
        echo "Status Zoom ",$MoveStatusZ,"\n";
        echo "\n";
        */
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
        //print_r($profile);


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

        // DISPLAY TOKEN
        /*
        echo "TOKEN \n";
        echo "Nom du profil ",$profilename,"\n";
        echo "Video Source Token ",$VideoSourceToken,"\n";
        echo "Video Encoder Token ",$VideoEncoderToken,"\n";
        echo "Video Analytics Token ",$VideoAnalyticsToken,"\n";
        echo "Metadata Token ",$MetadataToken,"\n";
        echo "PTZ Token ",$PTZToken,"\n";
        echo "Vitesse default X ",$PTZdefaultspeedX,"\n";
        echo "Vitesse default Y ",$PTZdefaultspeedY,"\n";
        echo "Vitesse default Z ",$PTZdefaultspeedZ,"\n";
        echo "\n";
        */
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
        //print_r($info);


        // SI LE FICHIER EST VALIDE ALORS
        $presetsjson = json_decode($presets, true);

        // FOREACH PRESETS

        // DISPLAY JSON PRESET
        /*
        echo "Presets \n";
        echo "Liste ",$presets,"\n";
        echo "\n";
        */
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


/**********************************************/
/*                                            */
/*--------------LISTE DES ACTIONS-------------*/
/*                                            */
/**********************************************/

        public function gotohome($Xspeed,$Yspeed,$Zspeed)
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $this -> intervalPanTiltSpeed($Xspeed);
        $this -> intervalPanTiltSpeed($Yspeed);
        $this -> intervalZoomSpeed($Zspeed);

        $commande = "node gotohome.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;
        $commande .= " --Xspeed=";
        $commande .= $Xspeed;
        $commande .= " --Yspeed=";
        $commande .= $Yspeed;
        $commande .= " --Zspeed=";
        $commande .= $Zspeed;


        //Display final shell command
        //echo $commande,"\n";

        $gotohome = shell_exec($commande);
        // echo $gotohome;
    } 
        public function relativemove($X,$Y,$Z,$Xspeed,$Yspeed,$Zspeed)
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $this -> intervalXcontinuousSpeed($Xspeed);
        $this -> intervalYcontinuousSpeed($Yspeed);
        $this -> intervalZcontinuousSpeed($Zspeed);

        $commande = "node relativemove.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;
        $commande .= " --X=";
        $commande .= $X;
        $commande .= " --Y=";
        $commande .= $Y;
        $commande .= " --Z=";
        $commande .= $Z;
        $commande .= " --Xspeed=";
        $commande .= $Xspeed;
        $commande .= " --Yspeed=";
        $commande .= $Yspeed;
        $commande .= " --Zspeed=";
        $commande .= $Zspeed;


        //Display final shell command
        //echo $commande,"\n";

        $relativemove = shell_exec($commande);
        // echo $gotohome;
    } 


        public function removepreset($token)
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node removepreset.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;
        $commande .= " --PresetToken=";
        $commande .= $token;


        //Display final shell command
        //echo $commande,"\n";

        $removepreset = shell_exec($commande);
        // echo $removepreset;
    } 

        public function setpreset($name)
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node setpreset.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;
        $commande .= " --PresetName=";
        $commande .= $name;


        //Display final shell command
        //echo $commande,"\n";

        $setpreset = shell_exec($commande);
        // echo $setpreset;
    } 

        public function gotopreset($token)
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node gotopreset.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;
        $commande .= " --PresetToken=";
        $commande .= $token;


        //Display final shell command
        //echo $commande,"\n";

        $gotopreset = shell_exec($commande);
        // echo $gotopreset;
    } 

        public function reboot()
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande = "node reboot.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $reboot = shell_exec($commande);
        // echo $reboot;
    }

        public function setimagesettings($brightness,$colorsaturation,$contrast,$sharpness)
    {

        $Port     = $this->_Port;
        $IPadress = $this->_IPadress;
        $Password = $this->_Password;
        $Username = $this->_Username;

        $commande2 = "node getimage.js  --Username=";
        $commande2 .= $Username;
        $commande2 .= " --Password=";
        $commande2 .= $Password;
        $commande2 .= " --IPadress=";
        $commande2 .= $IPadress;
        $commande2 .= " --Port=";
        $commande2 .= $Port;

        //Display final shell command
        //echo $commande,"\n";

        $image1 = shell_exec($commande2);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($image1);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($image1);

        
        $image1json = json_decode($image1, true);


        // IMAGE SETTINGS
        $brightness1 = $image1json['stream']['brightness'];
        $colorSaturation1 = $image1json['stream']['colorSaturation'];
        $contrast1 = $image1json['stream']['contrast'];
        $sharpness1 = $image1json['stream']['sharpness'];


        $commande = "node setimagesettings.js  --Username=";
        $commande .= $Username;
        $commande .= " --Password=";
        $commande .= $Password;
        $commande .= " --IPadress=";
        $commande .= $IPadress;
        $commande .= " --Port=";
        $commande .= $Port;
        $commande .= " --Brightness=";
        $commande .= $brightness;
        $commande .= " --ColorSaturation=";
        $commande .= $colorsaturation;
        $commande .= " --Contrast=";
        $commande .= $contrast;
        $commande .= " --Sharpness=";
        $commande .= $sharpness;
        //Display final shell command
        //echo $commande,"\n";

        $setimage = shell_exec($commande);


        $image2 = shell_exec($commande2);
        

        // TEST DE LA VALIDITE DE LA SORTIE DU SCRIPT
        $this -> json_validate($image2);

        // SI LE FICHIER EST VALIDE ALORS
        //print_r($image2);

        
        $image2json = json_decode($image2, true);


        // IMAGE SETTINGS
        $brightness2 = $image2json['stream']['brightness'];
        $colorSaturation2 = $image2json['stream']['colorSaturation'];
        $contrast2 = $image2json['stream']['contrast'];
        $sharpness2 = $image2json['stream']['sharpness'];

        if ($brightness1 == $brightness2 && $colorSaturation1 == $colorSaturation2 && $contrast1 == $contrast2 && $sharpness1 == $sharpness2)
        {
            throw new Exception ('Valeurs non modifiées, veuillez réessayer ou les valeurs peuvent être hors de la portée de votre caméra');
        }
        else
        {
            echo "Aucune Erreur, Process Termine";
        }
    }
}
