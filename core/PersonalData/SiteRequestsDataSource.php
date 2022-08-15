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

namespace LenderKit\Modules\SiteRequests\PersonalData;

use LenderKit\Models\User;
use LenderKit\Modules\GDPR\Services\PersonalData\BaseDataSource;
use LenderKit\Modules\GDPR\Services\PersonalData\CollectionDataSource;
use LenderKit\Modules\SiteRequests\Models\SiteRequest;

/***
 * Class SiteRequestsDataSource
 *
 * @package LenderKit\Modules\SiteRequests\PersonalData
 */
class SiteRequestsDataSource extends CollectionDataSource
{
    /**
     * @var string
     */
    protected $group = BaseDataSource::GROUP_OTHER;

    /**
     * @var string
     */
    protected $translationPath = 'site_requests::gdpr.sources.site_requests';

    /**
     * Collection
     *
     * @param User $user
     *
     * @return mixed
     */
    protected function collection(User $user)
    {
        return SiteRequest::where('email', $user->email)->get();
    }
}
