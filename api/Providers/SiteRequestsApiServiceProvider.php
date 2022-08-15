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

namespace LenderKit\Modules\SiteRequests\Api\Providers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;
use LenderKit\Admin\Services\Menu\SidebarMenu;
use LenderKit\Modules\GoogleRecaptcha\Api\Forms\Extenders\RecaptchaFormExtender;
use LenderKit\Modules\Setup\Traits\ConfiguresServiceProvider;
use LenderKit\Modules\SiteRequests\Admin\Services\Menu\SidebarMenuExtender;
use LenderKit\Modules\SiteRequests\Api\Http\Forms\SiteRequestForm;
use LenderKit\Modules\SiteRequests\SiteRequestsModule;
use LenderKit\Services\ApiDoc\Traits\LoadsApiDocs;
use LenderKit\Traits\Modules\ModulePath;
use LenderKit\ViewComposers\MailViewComposer;
use ReflectionException;

/**
 * Class SiteRequestsApiServiceProvider
 *
 * @package LenderKit\Modules\SiteRequests\Api\Providers
 */
class SiteRequestsApiServiceProvider extends ServiceProvider
{
    use ConfiguresServiceProvider, ModulePath, LoadsApiDocs;

    protected function configure(): void
    {
        $this->shortname(SiteRequestsModule::SHORT_NAME)
            ->hasRoutes('api')
            ->supports('GoogleRecaptcha')
            ->hasApiDocs()
            ->extendClasses([
                SidebarMenu::class => SidebarMenuExtender::class,
            ]);
    }

    /**
     * @throws ReflectionException
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $this->bootConfigurations();

        view()->composer(
            [
                'core::layouts.mail',
                'site_requests::mail.site_request',
            ],
            MailViewComposer::class
        );
    }

    protected function supportsGoogleRecaptcha(): void
    {
        $this->loadApiDocsFrom($this->modulePath('resources/swagger-recaptcha'), 'google_recaptcha_site_request');

        $this->extendClasses([
            SiteRequestForm::class => RecaptchaFormExtender::class,
        ]);
    }
}
