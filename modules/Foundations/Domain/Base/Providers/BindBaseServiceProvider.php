<?php

namespace BasicDashboard\Foundations\Domain\Base\Providers;

use Illuminate\Support\ServiceProvider;
use BasicDashboard\Foundations\Domain\Base\Repositories\BaseRepositoryInterface;
use BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent\BaseRepository;

/**
 * A service provider class used to bind interfaces to the implementation of the base.
 *
 * @author Nay Ba La
 * @copyright (c) 2022 - Zote Innovation, All Right Reserved.
 */
class BindBaseServiceProvider extends ServiceProvider
{
    /**
     * register the service providers.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BaseRepositoryInterface::class,
            BaseRepository::class
        );
    }
}
