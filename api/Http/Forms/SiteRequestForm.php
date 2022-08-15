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

namespace LenderKit\Modules\SiteRequests\Api\Http\Forms;

use Mail;
use Illuminate\Support\Str;
use LenderKit\Api\Forms\ApiForm;
use Illuminate\Support\Collection;
use LenderKit\Forms\Fields\TextField;
use LenderKit\Modules\SiteRequests\Models\SiteRequest;
use LenderKit\Modules\SiteRequests\Notifications\SiteRequest as SiteRequestMail;

class SiteRequestForm extends ApiForm
{
    public function fields(): Collection
    {
        $t = 'site_requests::forms_api.site_request.';

        return collect([
            TextField::make('subject')
                ->label(__("{$t}subject")),
            TextField::make('name')
                ->label(__("{$t}name")),
            TextField::make('email')
                ->label(__("{$t}email")),
            TextField::make('message')
                ->label(__("{$t}message")),
        ]);
    }

    public function rules(): array
    {
        return [
            'subject'   => 'nullable|string|max:255',
            'name'      => 'nullable|string|max:255',
            'email'     => 'required|email|max:255',
            'message'   => 'required|string',
            'dont_send' => 'boolean',
        ];
    }

    protected function beforeValidate(): void
    {
        $this->data->put('name', $this->data->get('name') ?? Str::before($this->data->get('email'), '@'));
        $this->data->put('subject', $this->data->get('subject') ?? 'No subject');
        $this->data->put('dont_send', to_bool($this->data->get('dont_send')));
    }

    public function handle(): SiteRequest
    {
        $siteRequest = SiteRequest::create($this->data->all());

        if (! $this->data->get('dont_send')) {
            Mail::to(config('mail.admin_email'))->send(
                app(SiteRequestMail::class, compact('siteRequest'))
            );
        }

        return $siteRequest;
    }
}
