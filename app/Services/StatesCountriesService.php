<?php

namespace App\Services;

use App\Models\State;

class StatesCountriesService
{
    public function __construct(
        protected State $state
    )
    {}
    public function getStatesCountries()
    {
        return $this->state->all()
            ->sortBy('name');
    }
}
