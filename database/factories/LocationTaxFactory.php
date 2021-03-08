<?php

declare(strict_types=1);

namespace Tipoff\Taxes\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Tipoff\Locations\Models\Location;
use Tipoff\Taxes\Enum\TaxCode;
use Tipoff\Taxes\Models\LocationTax;
use Tipoff\Taxes\Models\Tax;

class LocationTaxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LocationTax::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'location_id'    => Location::factory()->create(),
            'tax_code'       => $this->faker->randomElement(TaxCode::getValues()),
            'tax_id'         => randomOrCreate(Tax::class),
            'creator_id'     => randomOrCreate(app('user')),
            'updater_id'     => randomOrCreate(app('user')),
        ];
    }
}
