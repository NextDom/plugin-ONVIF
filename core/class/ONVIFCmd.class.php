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

class ONVIFCmd extends cmd
{
    /*     * *************************Attributs****************************** */
    private $_Username;
    private $_Password;
    private $_IPadress;
    private $_Port;
    private $_VideoToken;
    private $_PTZToken; 
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



    /*     * *********************Methode d'instance************************* */

    /*
     * Non obligatoire permet de demander de ne pas supprimer les commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
      public function dontRemoveCmd() {
      return true;
      }
     */
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


    public function execute($_options = array())
    {

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
