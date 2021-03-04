<?php

declare(strict_types=1);

namespace Tipoff\Taxes\Tests\Feature\Nova;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tipoff\Taxes\Models\Tax;
use Tipoff\Taxes\Tests\TestCase;

class TaxResourceTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function index()
    {
        Tax::factory()->count(4)->create();

        $this->actingAs(self::createPermissionedUser('view taxes', true));

        $response = $this->getJson('nova-api/taxes')->assertOk();

        $this->assertCount(4, $response->json('resources'));
    }
}
