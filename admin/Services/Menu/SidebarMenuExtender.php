<?php
/**
 * @copyright Lenderkit OÜ is the owner or the licensee of all intellectual property rights in this file.
 *    These are protected by copyright laws and treaties around the world.
 *    You must not make copies via any medium or download any extracts from any part of this file unless expressly authorised to do so.
 *
 * @license https://lenderkit.com/license
 * @see https://lenderkit.com/
 *
 * @package LenderKit\Modules\SiteRequests
 */

declare(strict_types=1);

namespace LenderKit\Modules\SiteRequests\Admin\Services\Menu;

use Illuminate\Support\Facades\Route;
use LenderKit\Admin\Services\Menu\AdminMenuExtender;
use LenderKit\Admin\Services\Menu\Menu;

/**
 * Class SidebarMenuExtender
 *
 * @package LenderKit\Modules\SiteRequests\Admin\Services\Menu
 */
class SidebarMenuExtender extends AdminMenuExtender
{
    /**
     * Menu Items
     *
     * @param Menu $menu
     *
     * @return mixed|void
     */
    public function menuItems(Menu $menu)
    {
        $menu->find('platform')->submenu()->append([
            [
                'title'       => __('site_requests::admin.menu.platform.site_requests'),
                'key'         => 'site_requests',
                'url'         => route($routeName = 'site_requests::index'),
                'displayable' => Route::allowed($routeName),
            ],
        ]);
    }
}
