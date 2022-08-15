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

namespace LenderKit\Modules\SiteRequests\Api\Http\Controllers;

use Illuminate\Http\Request;
use LenderKit\Api\Http\Controllers\ApiController;
use LenderKit\Modules\SiteRequests\Api\Http\Forms\SiteRequestForm;

class SiteRequestsController extends ApiController
{
    public function store(Request $request)
    {
        form(SiteRequestForm::class, $request->all())->process();

        return $this->jsonSuccess([
            'message' => __('Your request has been sent successfully.'),
        ]);
    }
}
