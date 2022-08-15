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

use LenderKit\Modules\SiteRequests\Api\Http\Controllers\SiteRequestsController;

Route::group([
    'prefix'     => 'v1',
    'as'         => 'site_requests::',
    'middleware' => config('api.middleware'),
], function () {
    Route::group(['prefix' => 'public', 'as' => 'public.'], function () {
        Route::post('site-request', [SiteRequestsController::class, 'store'])->name('store');
    });
});
