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

namespace LenderKit\Modules\SiteRequests\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use LenderKit\Admin\Services\Menu\SidebarMenu;
use LenderKit\Modules\Grid\Concerns\LoadGrids;
use LenderKit\Modules\Setup\Traits\ConfiguresServiceProvider;
use LenderKit\Modules\SiteRequests\Admin\Services\Menu\SidebarMenuExtender;
use LenderKit\Modules\SiteRequests\SiteRequestsModule;
use LenderKit\Traits\Modules\ModulePath;

/**
 * Class AdminSiteRequestsServiceProvider
 *
 * @package LenderKit\Modules\SiteRequests\Providers
 */
class SiteRequestsAdminServiceProvider extends ServiceProvider
{
    use ConfiguresServiceProvider, ModulePath, LoadGrids;

    protected function configure(): void
    {
        $this->shortname(SiteRequestsModule::SHORT_NAME)
            ->adminNamespace('\\LenderKit\\Modules\\SiteRequests\\Admin\\')
            ->hasRoutes('web')
            ->extendClasses([
                SidebarMenu::class => SidebarMenuExtender::class,
            ]);
    }
}
