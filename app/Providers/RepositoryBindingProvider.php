<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BasicDashboard\Foundations\Domain\Settings\Setting;
use BasicDashboard\Foundations\Domain\Pages\Repositories\Eloquent\PageRepository;
use BasicDashboard\Foundations\Domain\Pages\Repositories\PageRepositoryInterface;
use BasicDashboard\Foundations\Domain\Roles\Repositories\Eloquent\RoleRepository;
use BasicDashboard\Foundations\Domain\Roles\Repositories\RoleRepositoryInterface;
use BasicDashboard\Foundations\Domain\Audits\Repositories\AuditRepositoryInterface;
use BasicDashboard\Foundations\Domain\Audits\Repositories\Eloquent\AuditRepository;
use BasicDashboard\Foundations\Domain\Articles\Repositories\ArticleRepositoryInterface;
use BasicDashboard\Foundations\Domain\Articles\Repositories\Eloquent\ArticleRepository;
use BasicDashboard\Foundations\Domain\Settings\Repositories\Eloquent\SettingRepository;
use BasicDashboard\Foundations\Domain\Settings\Repositories\SettingRepositoryInterface;
use BasicDashboard\Foundations\Domain\Addresses\Repositories\AddressRepositoryInterface;
use BasicDashboard\Foundations\Domain\Addresses\Repositories\Eloquent\AddressRepository;
use BasicDashboard\Foundations\Domain\Countries\Repositories\CountryRepositoryInterface;
use BasicDashboard\Foundations\Domain\Countries\Repositories\Eloquent\CountryRepository;
use BasicDashboard\Foundations\Domain\Categories\Repositories\CategoryRepositoryInterface;
use BasicDashboard\Foundations\Domain\Categories\Repositories\Eloquent\CategoryRepository;
use BasicDashboard\Foundations\Domain\ContactForms\Repositories\ContactFormRepositoryInterface;
use BasicDashboard\Foundations\Domain\ContactForms\Repositories\Eloquent\ContactFormRepository;
use BasicDashboard\Foundations\Domain\Currencies\Repositories\CurrencyRepositoryInterface;
use BasicDashboard\Foundations\Domain\Currencies\Repositories\Eloquent\CurrencyRepository;
use BasicDashboard\Foundations\Domain\Subcategories\Repositories\Eloquent\SubcategoryRepository;
use BasicDashboard\Foundations\Domain\Subcategories\Repositories\SubcategoryRepositoryInterface;
use BasicDashboard\Foundations\Domain\Notifications\Repositories\Eloquent\NotificationRepository;
use BasicDashboard\Foundations\Domain\Notifications\Repositories\NotificationRepositoryInterface;
use BasicDashboard\Foundations\Domain\SponsorAds\Repositories\Eloquent\SponsorAdRepository;
use BasicDashboard\Foundations\Domain\SponsorAds\Repositories\SponsorAdRepositoryInterface;
use BasicDashboard\Foundations\Domain\Users\Repositories\Eloquent\UserRepository;
use BasicDashboard\Foundations\Domain\Users\Repositories\UserRepositoryInterface;

class RepositoryBindingProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AddressRepositoryInterface::class,AddressRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class,ArticleRepository::class);
        $this->app->bind(AuditRepositoryInterface::class,AuditRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(CountryRepositoryInterface::class,CountryRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class,CurrencyRepository::class);
        $this->app->bind(SubcategoryRepositoryInterface::class,SubcategoryRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class,NotificationRepository::class);
        $this->app->bind(PageRepositoryInterface::class,PageRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(SettingRepositoryInterface::class,SettingRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(SponsorAdRepositoryInterface::class,SponsorAdRepository::class);
        $this->app->bind(ContactFormRepositoryInterface::class,ContactFormRepository::class);
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
