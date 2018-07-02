<?php

declare(strict_types = 1);

/**
 * Saito - The Threaded Web Forum
 *
 * @copyright Copyright (c) the Saito Project Developers 2014-2018
 * @link https://github.com/Schlaefer/saito-userranks
 * @license http://opensource.org/licenses/MIT
 */

namespace Siezi\SaitoUserranks\Lib;

use Cake\Core\InstanceConfigTrait;
use Saito\Event\SaitoEventListener;

class Userranks implements SaitoEventListener
{
    use InstanceConfigTrait;

    /**
     * @var array plugin-config
     */
    protected $_defaultConfig = [];

    /**
     * Constructor
     *
     * @param array $config plugin config
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    /**
     * {@inheritDoc}
     */
    public function implementedSaitoEvents()
    {
        return [
            // event => local method to call on event
            'Request.Saito.View.User.beforeFullProfile' => 'onUserranks'
        ];
    }

    /**
     * Shows userranks
     *
     * @param mixed $eventData event-data
     * @return array
     */
    public function onUserranks($eventData): array
    {
        $nPostings = $eventData['user']->get('entry_count');

        foreach ($this->getConfig('ranks') as $treshold => $title) {
            $rank = $title;
            if ($nPostings <= $treshold) {
                break;
            }
        }

        return [
            'title' => __d('siezi/saito_userranks', 'rank'),
            'content' => h($rank),
        ];
    }
}
