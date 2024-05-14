<?php namespace AppUser\User;

use AppUser\User\Classes\AuthService;
use Backend;
use System\Classes\PluginBase;
use AppUser\User\Classes\LoginService;
use AppUser\User\Classes\LogOutService;
use AppUser\User\Classes\RegisterService;


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
        $this->app->singleton('AuthService', function ($app) {
            return new AuthService();
        });
        //$this->app->singleton('LoginService', function ($app) {
         //   return new LoginService();
       // });
        $this->app->singleton('LogOutService', function ($app) {
            return new LogOutService();
        });
        $this->app->singleton('RegisterService', function ($app) {
            return new RegisterService();
        });
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
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
