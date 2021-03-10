<?php

declare(strict_types=1);

namespace Tipoff\Feedback\Tests;

use Laravel\Nova\NovaCoreServiceProvider;
use Spatie\Permission\PermissionServiceProvider;
use Tipoff\Addresses\AddressesServiceProvider;
use Tipoff\Authorization\AuthorizationServiceProvider;
use Tipoff\Feedback\FeedbackServiceProvider;
use Tipoff\Feedback\Tests\Support\Providers\NovaPackageServiceProvider;
use Tipoff\Locations\LocationsServiceProvider;
use Tipoff\Support\SupportServiceProvider;
use Tipoff\TestSupport\BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            NovaCoreServiceProvider::class,
            NovaPackageServiceProvider::class,
            SupportServiceProvider::class,
            AuthorizationServiceProvider::class,
            PermissionServiceProvider::class,
            FeedbackServiceProvider::class,
            LocationsServiceProvider::class,
            AddressesServiceProvider::class,
        ];
    }
}
