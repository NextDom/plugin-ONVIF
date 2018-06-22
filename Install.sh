touch /tmp/dependancy_Onvif_in_progress
echo ************************************
echo *   INSTALLATION DES DEPENDANCES   *
echo ************************************
echo 0 > /tmp/dependancy_Onvif_in_progress
sudo apt-get update
echo 25 > /tmp/dependancy_Onvif_in_progress
sudo apt-get upgrade
echo "Launch install of Onvif dependancy"
echo 50 > /tmp/dependancy_Onvif_in_progress
sudo npm install minimist
echo 75 > /tmp/dependancy_Onvif_in_progress
sudo npm install onvif 
echo 100 > /tmp/dependancy_Onvif_in_progress
echo "Everything is successfully installed!"
rm /tmp/dependancy_Onvif_in_progress
