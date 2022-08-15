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

namespace LenderKit\Modules\SiteRequests\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use LenderKit\Modules\SiteRequests\Models\SiteRequest as SiteRequestModel;

/**
 * Class SiteRequest
 *
 * @package LenderKit\Mail
 */
class SiteRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Site Request
     *
     * @var SiteRequestModel
     */
    public $siteRequest;

    /**
     * SiteRequest constructor.
     *
     * @param SiteRequestModel $siteRequest
     */
    public function __construct(SiteRequestModel $siteRequest)
    {
        $this->siteRequest = $siteRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->siteRequest->subject)
            ->from($this->siteRequest->email, $this->siteRequest->name)
            ->view('site_requests::mail.site_request')
            ->with('siteRequest', $this->siteRequest)
            ->with('greeting', $this->greeting());
    }

    /**
     * Greeting
     *
     * @return string
     */
    protected function greeting()
    {
        return 'Hello, ' . config('app.name') . "'s admin!";
    }
}
