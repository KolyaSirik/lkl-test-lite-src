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

namespace LenderKit\Modules\SiteRequests\Admin\Grids\Filters;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use LenderKit\Admin\Grids\Filters\DateFilters;
use LenderKit\Modules\Grid\Concerns\FiltersSchema;
use LenderKit\Modules\Grid\Filter\Filter;
use LenderKit\Modules\Grid\Filter\QueryFilter;
use LenderKit\Modules\SiteRequests\Models\SiteRequest;

/**
 * Class SiteRequestsFilter
 *
 * @package LenderKit\Modules\SiteRequests\Grids\Filters
 */
class SiteRequestsFilter extends QueryFilter
{
    use DateFilters;

    /**
     * @var string
     */
    public static $translationsPath = 'site_requests::filters';

    /**
     * Filters
     *
     * @param FiltersSchema $filters
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function filters(FiltersSchema $filters)
    {
        $t = static::$translationsPath;

        $filters->append([
            Filter::make('search', __("{$t}.search")),
            Filter::make('created_at', __("{$t}.created_at"))->date(static::dateFilters()),
        ]);
    }

    /**
     * Created At
     *
     * @param null $value
     */
    public function createdAt($value = null): void
    {
        $this->dateFilter(SiteRequest::table() . '.created_at', $value);
    }

    /**
     * Created At Custom
     *
     * @param null $value
     */
    public function createdAtCustom($value = null): void
    {
        $this->dateFilterCustom(SiteRequest::table() . '.created_at', $value);
    }

    /**
     * Search
     *
     * @param string|null $search
     *
     * @return void
     */
    public function search(?string $search): void
    {
        $this->builder->where(function (Builder $query) use ($search) {
            $tableName = $this->builder->getModel()->getTable();

            return $query
                ->where("{$tableName}.id", 'like', "%{$search}%")
                ->orWhere("{$tableName}.subject", 'like', "%{$search}%")
                ->orWhere("{$tableName}.name", 'like', "%{$search}%")
                ->orWhere("{$tableName}.email", 'like', "%{$search}%")
                ->orWhere("{$tableName}.message", 'like', "%{$search}%");
        });
    }
}
