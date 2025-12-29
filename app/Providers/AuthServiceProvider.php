<?php

namespace App\Providers;

use App\Models\LogHarian;
use App\Policies\LogHarianPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Mapping model → policy
     */
    protected $policies = [
        LogHarian::class => LogHarianPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
