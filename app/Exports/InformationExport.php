<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Info;


class InformationExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $information;

    public function __construct( $information)
    {
        $this->information = $information;
    }

    public function headings(): array
    {
        return [
            "Id", "Nepali Date", "Checkpoint", "Country", "Name", "Type", "purposes", "Duration",
            "Age", "Gender", "Visa Period", "Passport Number"
        ];
    }

    public function array(): array
    {
        return $this->information;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return $this->information;
    }
}
