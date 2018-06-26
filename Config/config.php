<?php

declare(strict_types = 1);

/**
 * Saito - The Threaded Web Forum
 *
 * @copyright Copyright (c) the Saito Project Developers 2014-2018
 * @link https://github.com/Schlaefer/saito-userranks
 * @license http://opensource.org/licenses/MIT
 */

return [
    // plugin-name
    'Siezi/SaitoUserranks' => [
        'ranks' => [
            // treshold => title
            100 => 'Rookie', // 0-100 first entry starts from 0
            200 => 'Regular', // 100-200
            1000 => 'Veteran', // 200-1000
            10000 => 'Retiree' // 1000+ last entry is from the second to last upwards
        ]
    ]
];
