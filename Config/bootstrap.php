<?php

declare(strict_types = 1);

/**
 * Saito - The Threaded Web Forum
 *
 * @copyright Copyright (c) the Saito Project Developers 2014-2018
 * @link https://github.com/Schlaefer/saito-userranks
 * @license http://opensource.org/licenses/MIT
 */

use Saito\Event\SaitoEventManager;
use Saito\Plugin;
use Siezi\SaitoUserranks\Lib\Userranks;

//= don't activate on CLI-tests
if (php_sapi_name() === 'cli') {
    return;
}

//= load plugin settings
$settings = Plugin::loadConfig('Siezi/SaitoUserranks');

//= create Userranks class
$Userranks = new Userranks($settings);

//= attach Userranks class to the Saito Event Manager
SaitoEventManager::getInstance()->attach($Userranks);
