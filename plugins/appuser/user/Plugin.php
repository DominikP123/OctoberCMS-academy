<?php namespace AppUser\User;

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
            'name' => 'User',
            'description' => 'No description provided yet...',
            'author' => 'AppUser',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'users' => [
                'label'       => 'Users',
                'url'         => Backend::url('appuser/user/users'),
                'icon'        => 'icon-address-book',
                'permissions' => ['appuser.user.*'],
                'order'       => 500,
                'sideMenu' => [
                    'new_user' => [
                        'label'       => 'New User',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('appuser/user/users/create'),
                        'permissions' => ['appuser.user.access_users']
                    ],
                    'list_users' => [
                        'label'       => 'List Users',
                        'icon'        => 'icon-list',
                        'url'         => Backend::url('appuser/user/users'),
                        'permissions' => ['appuser.user.access_users']
                    ],
                ]
            ]
        ];
    }
}
