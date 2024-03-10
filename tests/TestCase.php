<?php

namespace Sahapranta\LaravelRoadmap\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Sahapranta\LaravelRoadmap\LaravelRoadmapServiceProvider;

class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelRoadmapServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
