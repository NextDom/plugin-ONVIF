plugin-ONVIF

[![license](https://img.shields.io/github/license/NextDom/plugin-ONVIF.svg)](./LICENSE) [![GitHub contributors](https://img.shields.io/github/contributors/NextDom/plugin-ONVIF.svg)](../../graphs/contributors) [![GitHub release](https://img.shields.io/github/release/NextDom/plugin-ONVIF.svg)](../../releases) [![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/_USERNAME) [![Waffle.io - Columns and their card count](https://badge.waffle.io/NextDom/plugin-ONVIF.svg?columns=all)](https://waffle.io/NextDom/plugin-ONVIF)

### Master: [![Build Status](https://travis-ci.org/NextDom/plugin-ONVIF.svg?branch=master)](https://travis-ci.org/NextDom/plugin-ONVIF)  [![Coverage Status](https://coveralls.io/repos/github/NextDom/plugin-ONVIF/badge.svg?branch=master)](https://coveralls.io/github/NextDom/plugin-ONVIF?branch=master)

### Develop: [![Build Status](https://travis-ci.org/NextDom/plugin-ONVIF.svg?branch=develop)](https://travis-ci.org/NextDom/plugin-ONVIF)  [![Coverage Status](https://coveralls.io/repos/github/NextDom/plugin-ONVIF/badge.svg?branch=develop)](https://coveralls.io/github/NextDom/plugin-ONVIF?branch=develop)

# Présentation:

Ce plugin permet de controler les caméras supportant le protocole ONVIF. 

Dependances requises:

`npm install onvif`

`npm install minimist`

# Les commandes supportées:

## Actions supportées dans Jeedom:

* GoToHome : Permet d'aller à la position par défaut de la caméra, cette position est modifiable.
* GoToPreset : Permet à la caméra d'aller à une position prédéfini sous la forme de preset PTZ par l'utilisateur.
* RelativeMove : Permet à la caméra d'effectuer un mouvement relatif par rapport à la position initiale.
* SetPreset : Créer un preset au niveau de la position actuelle de la caméra, ce preset peut être appelé avec la fonction GoToPreset.
* RemovePreset : Supprime un preset enregistré sur la caméra.
* SetImageSettings : Permet de controler les paramètres de l'image a travers quatres fonctions:
** Luminosité
** Contraste
** Saturation
** Netteté

## Infos supportées dans Jeedom:

INFO
# FORUM
[Forum Nextdom](https://www.nextdom.org/plugin-onvif/plugin-onvif)

# TO DO
Les commandes a inclure sont ici :
[FORUM](https://www.jeedom.com/forum/viewtopic.php?f=134&t=37495)

# Documentation du plugin, comment créér un plugin:

*Effacer cette section dans votre plugin*

[Documentation principale](https://github.com/rjullien/plugin-ONVIF/blob/develop/docs/fr_FR/index-ONVIF.md)

[Comment documenter un plug-in](https://github.com/NextDom/NextDom/wiki/Documentation-d'un-Plugin)

[Comment tester un plugin](https://github.com/NextDom/NextDom/wiki/Tester-un-plugin-avec-travis-ci)

[Comment creer l'icône](https://github.com/NextDom/NextDom/wiki/07-Cr%C3%A9ation-d'une-icone-plugin)

[Les bonnes pratiques](https://github.com/NextDom/NextDom/wiki/Bonnes-pratiques-pour-les-plugins)

[Créér un plugun au standard NextDom](https://github.com/NextDom/NextDom/wiki/PROJET-:-Crit%C3%A8re-de-validation-d'un-plugin)

# Documentation du plugin:
[![Read the Docs](https://img.shields.io/readthedocs/pip.svg)](docs/fr_FR/presentation.md)
[présentation](docs/fr_FR/presentation.md) [configuration](docs/fr_FR/configuration.md) [faq](docs/fr_FR/faq.md) [changelog](docs/fr_FR/changelog.md)

# Documentation complète:

[![Read the Docs](plugin_info/ONVIF_icon.png)](https://NextDom.github.io/plugin-ONVIF)


[![Support via PayPal](https://cdn.rawgit.com/twolfson/paypal-github-button/1.0.0/dist/button.svg)](https://www.paypal.me/_USERNAME/)

[![Join the chat at https://gitter.im/NextDom/plugin-ONVIF](https://badges.gitter.im/NextDom/plugin-ONVIF.svg)](https://gitter.im/NextDom/plugin-ONVIF?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
