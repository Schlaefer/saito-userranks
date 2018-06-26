<?php

declare(strict_types = 1);

/**
 * Saito - The Threaded Web Forum
 *
 * @copyright Copyright (c) the Saito Project Developers 2014-2018
 * @link https://github.com/Schlaefer/saito-userranks
 * @license http://opensource.org/licenses/MIT
 */

namespace Siezi\SaitoUserranks;

use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\TestSuite\TestCase;
use Siezi\SaitoUserranks\Lib\Userranks;

class UserranksMock extends Userranks
{

    public function userRank($numOPostings)
    {
        $eventData['user']['User']['number_of_entries'] = $numOPostings;

        return $this->onUserranks($eventData)['content'];
    }
}

class UserranksTest extends TestCase
{

    public function testUserranksIOFormat()
    {
        $eventData['user']['User']['number_of_entries'] = 0;
        $expected = ['title' => 'Rank', 'content' => 'Castaway'];
        $result = $this->Userranks->onUserranks($eventData);
        $this->assertEquals($expected, $result);
    }

    public function testUserranksLogic()
    {
        $expected = 'Castaway';
        $result = $this->Userranks->userRank(0);
        $this->assertEquals($expected, $result);

        $expected = 'Castaway';
        $result = $this->Userranks->userRank(10);
        $this->assertEquals($expected, $result);

        $expected = 'Other';
        $result = $this->Userranks->userRank(11);
        $this->assertEquals($expected, $result);

        $expected = 'Jacob';
        $result = $this->Userranks->userRank(99);
        $this->assertEquals($expected, $result);

        $expected = 'Jacob';
        $result = $this->Userranks->userRank(100);
        $this->assertEquals($expected, $result);

        $expected = 'Jacob';
        $result = $this->Userranks->userRank(101);
        $this->assertEquals($expected, $result);
    }

    public function setUp()
    {
        $this->Userranks = new UserranksMock([
            'ranks' => [
                '10' => 'Castaway',
                '20' => 'Other',
                '30' => 'Dharma',
                '100' => 'Jacob'
            ]
        ]);
        I18n::setLocale('en');
    }
}
