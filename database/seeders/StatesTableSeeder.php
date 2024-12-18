<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //States Array
        $states = [
            'Alaska' => 'AK',
            'Alabama' => 'AL',
            'Arkansas' => 'AR',
            'Arizona' => 'AZ',
            'California' => 'CA',
            'Colorado' => 'CO',
            'Connecticut' => 'CT',
            'District of Columbia ' => 'DC',
            'Delaware' => 'DE',
            'Florida' => 'FL',
            'Georgia' => 'GA',
            'Hawaii' => 'HI',
            'Iowa' => 'IA',
            'Idaho' => 'ID',
            'Illinois' => 'IL',
            'Indiana' => 'IN',
            'Kansas' => 'KS',
            'Kentucky' => 'KY',
            'Louisiana' => 'LA',
            'Massachusetts' => 'MA',
            'Maryland' => 'MD',
            'Maine' => 'ME',
            'Michigan' => 'MI',
            'Minnesota' => 'MN',
            'Missouri' => 'MO',
            'Mississippi' => 'MS',
            'Montana' => 'MT',
            'North Carolina' => 'NC',
            'North Dakota' => 'ND',
            'Nebraska' => 'NE',
            'New Hampshire' => 'NH',
            'New Jersey' => 'NJ',
            'New Mexico' => 'NM',
            'Nevada' => 'NV',
            'New York' => 'NY',
            'Ohio' => 'OH',
            'Oklahoma' => 'OK',
            'Oregon' => 'OR',
            'Pennsylvania' => 'PA',
            'Rhode Island' => 'RI',
            'South Carolina' => 'SC',
            'South Dakota' => 'SD',
            'Tennessee' => 'TN',
            'Texas' => 'TX',
            'Utah' => 'UT',
            'Virginia' => 'VA',
            'Vermont' => 'VT',
            'Washington' => 'WA',
            'Wisconsin' => 'WI',
            'West Virginia' => 'WV',
            'Wyoming' => 'WY'
        ];

        if (Schema::hasTable('states')) {

            if (DB::table('states')->get()->count() == 0) {

                foreach ($states as $state => $abv) {

                    DB::table('states')->insert([
                        'name' => $state,
                        'abbreviation'  => $abv,
                    ]);
                }
            }
        }
    }
}
