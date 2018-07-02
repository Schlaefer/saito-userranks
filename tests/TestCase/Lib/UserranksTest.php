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

use App\Model\Entity\User;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Siezi\SaitoUserranks\Lib\Userranks;
use Saito\Test\SaitoTestCase;

class UserranksMock extends Userranks
{

    public function userRank($numOPostings)
    {
        $eventData['user'] = (new User())->set('entry_count', $numOPostings);

        return $this->onUserranks($eventData)['content'];
    }
}

class UserranksTest extends SaitoTestCase
{

    public function testUserranksIOFormat()
    {
        $eventData['user'] = (new User())->set('entry_count', 0);
        $expected = [
            // @bogus, shoud be the translated string, but doesn't work in Cake 3.6 ¯\_(ツ)_/¯
            'title' => 'rank',
            'content' => 'Castaway'
        ];
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
        parent::setUp();
        I18n::useFallback(false);
        I18n::setLocale('en');
        $this->Userranks = new UserranksMock([
            'ranks' => [
                '10' => 'Castaway',
                '20' => 'Other',
                '30' => 'Dharma',
                '100' => 'Jacob'
            ]
        ]);
    }
}
