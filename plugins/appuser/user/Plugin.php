<?php namespace AppUser\User;

use Backend;
use Route;
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
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        
    }

    protected function registerRoutes()
    {
       /* route::group(['prefix' => 'api'], function()
        {
            Route::post('register', 'appuser\user\controllers\TestController@register');
            Route::post('login', 'appuser\user\controllers\TestController@login');
        });*/
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'AppUser\User\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'appuser.user.some_permission' => [
                'tab' => 'User',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate
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
