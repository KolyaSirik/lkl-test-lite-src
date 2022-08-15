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

namespace LenderKit\Modules\SiteRequests\Admin\Controllers;

use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use LenderKit\Admin\Controllers\AdminController;

/**
 * Class SiteRequestsController
 *
 * @package LenderKit\Modules\SiteRequests\Admin\Controllers
 */
class SiteRequestsController extends AdminController
{
    /**
     * Index
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('site_requests::site_requests.index');
    }
}
