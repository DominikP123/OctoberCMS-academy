<?php namespace AppLogger\Logger;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    public $require = ['AppUser.User'];

    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Logger',
            'description' => 'No description provided yet...',
            'author' => 'AppLogger',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'logger' => [
                'label' => 'Logger',
                'url' => Backend::url('AppLogger/Logger/Loggers'),
                'icon' => 'icon-comments',
                'permissions' => ['applogger.logger.*'],
                'order' => 500,
            ],
        ];
    }
}
