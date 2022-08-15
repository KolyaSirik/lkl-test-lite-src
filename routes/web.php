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

use LenderKit\Modules\SiteRequests\Admin\Controllers\SiteRequestsController;

Route::group([
    'prefix'     => 'site-requests',
    'middleware' => config('admin.middleware', 'web'),
    'as'         => 'site_requests::',
], function () {
    Route::get('/', [SiteRequestsController::class, 'index'])->name('index')
        ->middleware('can:site_requests::admin:site_requests.site_requests_list.view');
});
