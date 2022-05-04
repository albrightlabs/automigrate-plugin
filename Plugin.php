<?php namespace Albrightlabs\AutoMigrate;

use Event;
use Artisan;
use Backend;
use Albrightlabs\AutoMigrate\Models\Settings;
use System\Classes\PluginBase;

/**
 * AutoMigrate Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Auto Migrate',
            'description' => 'Runs any migrations on backend user login.',
            'author'      => 'Albright Labs LLC',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Listens for the backend user login event and runs the migrate command
         */
        Event::listen('backend.user.login', function($user){

            // check if the option is enabled
            if(Settings::get('status', false)){

                // run the migrate command
                Artisan::call('october:migrate');
            }
        });
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'albrightlabs.automigrate.manage_settings' => [
                'tab' => 'Auto Migrate',
                'label' => 'Manage auto migration plugin settings'
            ],
        ];
    }

    /**
     * Registers the settings for this plugin.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'Auto Migrate',
                'description' => 'Manage support for running migrations on backend user login.',
                'category' => 'Migrations',
                'icon' => 'icon-database',
                'class' => \Albrightlabs\AutoMigrate\Models\Settings::class,
                'order' => 500,
                'keywords' => 'auto migrate database',
                'permissions' => ['albrightlabs.automigrate.manage_settings']
            ]
        ];
    }

}
