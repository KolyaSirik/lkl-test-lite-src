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

namespace LenderKit\Modules\SiteRequests\Api\Http\Requests;

use Exception;
use Illuminate\Support\Str;
use LenderKit\Api\Http\Requests\Request;

/**
 * Class SiteRequestRequest
 *
 * @package LenderKit\Modules\SiteRequests\Appi\Http\Requests
 */
class SiteRequestRequest extends Request
{
    /**
     * Rules
     *
     * @return array
     * @throws Exception
     */
    public function rules()
    {
        return [
            'subject' => 'nullable|string|max:255',
            'name'    => 'nullable|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ];
    }

    /**
     * Prepare For Validation
     */
    protected function prepareForValidation()
    {
        $this->replace(array_merge($this->all(), [
            'name'    => $this->input('name') ?? Str::before($this->input('email'), '@'),
            'subject' => $this->input('subject') ?? 'No subject',
        ]));
    }
}
