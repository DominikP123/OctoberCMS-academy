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

    // REVIEW: funkcie čo nepoužívaš môžeš dať kľudne preč nech sa kód lahšie číta
    //done
    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'AppLogger\Logger\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'applogger.logger.some_permission' => [
                'tab' => 'Logger',
                'label' => 'Some permission'
            ],
        ];
    }

    // REVIEW: Celý Log plugin nefunguje ako panel v CMS, mal by si pridať controller pre tento plugin a nastaviť registerNavigation aby sa tam zobrazoval (podobne ako User plugin)
    //done
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
