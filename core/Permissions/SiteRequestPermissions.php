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

namespace LenderKit\Modules\SiteRequests\Permissions;

use LenderKit\ACL\ACLActions;
use LenderKit\Models\Role;
use LenderKit\Modules\ACL\Core\CollectorExtender;
use LenderKit\Modules\SiteRequests\Models\SiteRequest;
use Permission;

/**
 * Class SiteRequestPermissions
 *
 * @package LenderKit\Modules\SiteRequests\Permissions
 */
class SiteRequestPermissions extends CollectorExtender
{
    public const NAMESPACE = 'site_requests';

    /**
     * Collect
     */
    public function collect(): void
    {
        Permission::group(['namespace' => static::NAMESPACE], function () {
            Permission::group(['resource' => SiteRequest::table()], function () {
                Permission::group(['subsystem' => Role::SUBSYSTEM_ADMIN], function () {
                    // TODO: replace with admin page classes when ready.
                    Permission::add('site_requests_list.' . ACLActions::PAGE_VIEW);
                });
            });
        });
    }
}
