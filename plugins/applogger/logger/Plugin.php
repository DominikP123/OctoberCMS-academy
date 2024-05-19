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
    /* REVIEW - V migrácii pre logs máš foreign key na usera. V takýchto prípadoch treba v plugine nastaviť $require, čo zabezpečí že určitý plugin sa pripravený predtým ako nejaký iný.
    V tomto prípade by si mal nastaviť že Logger vyžaduje prítomnosť Usera, pretože keď sa tvorí logs table, tak je tam foreign key ktorý je závislý na existencii users table.
    Vlastne nastavuješ dependencies. */
    // public $require = ['AppUser.User'];

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
     * registerComponents used by the frontend.
     */
    public function registerComponents() // REVIEW Toto používaš?
    {
        return [
            'AppLogger\Logger\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions() // REVIEW Toto používaš?
    {
        return [
            'applogger.logger.some_permission' => [
                'tab' => 'Logger',
                'label' => 'Some permission'
            ],
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
