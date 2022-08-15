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

namespace LenderKit\Modules\SiteRequests;

use LenderKit\Enums\Subsystem;
use LenderKit\Modules\Setup\Services\Modules\Module;

class SiteRequestsModule extends Module
{
    public const SHORT_NAME = 'site_requests';

    protected array $subsystems = [
        Subsystem::API,
    ];

    protected ?string $apiShortName = 'siterequest';

    public function getTitle(): string
    {
        return __('site_requests::module.title');
    }

    public function getDescription(): string
    {
        return __('site_requests::module.description');
    }

    public function getShortDescription(): string
    {
        return __('site_requests::module.short_description');
    }
}
