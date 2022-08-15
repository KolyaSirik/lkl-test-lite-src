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

namespace LenderKit\Modules\SiteRequests\Admin\Grids;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Gate;
use LenderKit\ACL\PermissionsFactory;
use LenderKit\Modules\Grid\Concerns\ColumnsSchema;
use LenderKit\Modules\Grid\Core\Column;
use LenderKit\Modules\Grid\Core\Grid;
use LenderKit\Modules\Grid\Core\QueryGrid;
use LenderKit\Modules\SiteRequests\Admin\Grids\Filters\SiteRequestsFilter;
use LenderKit\Modules\SiteRequests\Models\SiteRequest;
use LenderKit\Modules\SiteRequests\Permissions\SiteRequestPermissions;

/**
 * Class SiteRequestsGrid
 *
 * @package LenderKit\Admin\Grids\SiteRequests
 */
class SiteRequestsGrid extends QueryGrid
{
    /**
     * @var string
     */
    public $filter = SiteRequestsFilter::class;

    /**
     * @var string
     */
    public static $translationsPath = 'site_requests::grids.site_requests.columns';

    /**
     * Authorize
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows(PermissionsFactory::pageView(
            SiteRequest::class,
            'site_requests_list',
            SiteRequestPermissions::NAMESPACE
        ));
    }

    /**
     * @inheritDoc
     */
    public function query(): Builder|Relation
    {
        return SiteRequest::query();
    }

    /**
     * Columns
     *
     * @param ColumnsSchema $columns
     *
     * @return mixed|void
     */
    public function columns(ColumnsSchema $columns)
    {
        $t = static::$translationsPath;

        $columns->append([
            Column::make('id', __("{$t}.id"))->sortable(),
            Column::make('created_at', __("{$t}.created_at"))->sortable(),
            Column::make('name', __("{$t}.name"))->sortable(),
            Column::make('email', __("{$t}.email"))->sortable(),
            Column::make('subject', __("{$t}.subject"))->sortable(),
            Column::make('message', __("{$t}.message"))->sortable(),
        ]);
    }

    /**
     * Apply Sorting
     *
     * @return Grid
     */
    public function applySorting(): Grid
    {
        foreach ($this->requestData->sort as $sort) {
            $column = $sort['column'];
            $direction = $sort['direction'];

            switch ($column) {
                case 'id':
                case 'subject':
                case 'name':
                case 'email':
                case 'message':
                case 'created_at':
                    $this->defaultFieldSorting($column, $direction);
                    break;
            }
        }

        return $this->defaultSorting();
    }
}
