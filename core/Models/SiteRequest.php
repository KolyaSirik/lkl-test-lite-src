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

namespace LenderKit\Modules\SiteRequests\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use LenderKit\Models\Model;
use LenderKit\Traits\Models\WithCustom;

/**
 * The SiteRequest object is used to hold information about messages from contact form.
 *
 * @property int $id An Unique Identifier for the SiteRequest.
 * @property string $subject The subject of message.
 * @property string $name The name of user who send the message.
 * @property string $email The user's email
 * @property string $message The text of message.
 * @property Carbon|null $created_at Date on which the SiteRequest was created.
 * @property Carbon|null $updated_at Date on which the SiteRequest was updated.
 * @mixin Eloquent
 * @property object $custom This attribute holds an array of custom User fields, which can be used to hold any data relating to a SiteRequest that do not fit the default SiteRequest object model.
 * @method static Builder|SiteRequest newModelQuery()
 * @method static Builder|SiteRequest newQuery()
 * @method static Builder|SiteRequest query()
 */
class SiteRequest extends Model
{
    use WithCustom;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'subject', 'email', 'message'];
}
