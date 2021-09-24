<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backendSideBar = Menu::updateOrCreate([
            'name' => 'backend-sidebar',
            'description' => 'This is backend siderbar.',
            'deletable' => false
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'divider',
            'order' => 1,
            'divider_title' => 'Menus'
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 2,
            'title' => 'Dashboard',
            'url' =>'home',
            'icon_class' => 'far fa-building'
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 3,
            'title' => 'Pages',
            'url' =>'pages.index',
            'icon_class' => 'far fa-script-code'
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'divider',
            'order' => 4,
            'divider_title' => 'Access Control'
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 5,
            'title' => 'Roles',
            'url' =>'roles.index',
            'icon_class' => 'far fa-gem'
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 6,
            'title' => 'Users',
            'url' =>'users.index',
            'icon_class' => 'far fa-user'
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'divider',
            'order' => 7,
            'divider_title' => 'System'
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 8,
            'title' => 'Menus',
            'url' =>'menus.index',
            'icon_class' => 'far fa-list'
        ]);

        $backendSideBar->menuItems()->updateOrCreate([
            'type' => 'item',
            'order' => 9,
            'title' => 'Backups',
            'url' =>'backups.index',
            'icon_class' => 'far fa-cloud'
        ]);

        // $backendSideBar->menuItems()->updateOrCreate([
        //     'type' => 'item',
        //     'order' => 8,
        //     'title' => 'Settings',
        //     'url' =>'settings.index',
        //     'icon_class' => 'far fa-settings'
        // ]);

    }
}
