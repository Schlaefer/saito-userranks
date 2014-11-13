<?php

	//= don't activate on CLI-tests
	if (php_sapi_name() === 'cli') {
		return;
	}

	//= load plugin settings
	$settings = Saito\Plugin::loadConfig('Userranks');

	//= create Userranks class
	App::uses('Userranks', 'Userranks.Lib');
	$Userranks = new Userranks($settings);

	//= attach Userranks class to the Saito Event Manager
	App::uses('SaitoEventManager', 'Lib/Saito/Event');
	SaitoEventManager::getInstance()->attach($Userranks);

