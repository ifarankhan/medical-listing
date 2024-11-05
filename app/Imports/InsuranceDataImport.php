<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;

class InsuranceDataImport implements ToModel
{
    use Importable;

    protected bool $isFirstRow = true;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if ($this->isFirstRow) {
            // Skip the first row
            $this->isFirstRow = false;
            return null;
        }

        if (array_filter($row)) {

            $slug = Str::slug($row[0]);
            // Check if a record with the same slug already exists
            if (Category::where('slug', $slug)->exists()) {
                // Skip importing this row
                return null;
            }

            return new Category([
                'name' => $row[0],
                'slug' => $slug,
            ]);
        }

        return null;
    }
}
