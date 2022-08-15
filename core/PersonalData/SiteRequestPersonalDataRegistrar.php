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

use LenderKit\Modules\GDPR\Services\PersonalData\PersonalDataRegistrar;

/**
 * Class SiteRequestPersonalDataRegistrar
 * @package LenderKit\Modules\SiteRequests\PersonalData
 */
class SiteRequestPersonalDataRegistrar extends PersonalDataRegistrar
{

    /**
     * @inheritDoc
     */
    public function sources(): array
    {
        return [
            SiteRequestsDataSource::class
        ];
    }
}
