<?php

namespace App\Exports;

use App\Info;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings {

    public function headings(): array {
        return [
           "Id", "Nepali Date", "Checkpoint", "Country", "Name", "Type",  "purposes", "Duration",
            "Age", "Gender", "Visa Period", "Passport Number"
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection() {

        return collect(Info::getInformations());
        // return Page::getUsers(); // Use this if you return data from Model without using toArray().
    }
}