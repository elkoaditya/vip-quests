<?php

namespace App\Imports;

use App\Models\QuestVip;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class VipImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $col) {
            if ($col[0] == 'Nama') continue;
            if (QuestVip::where('name', $col[0])->first()) continue;
            if ($col[0] == null) continue;
            if ($col[1] == null) {
                $col[1] = '-';
            }
            QuestVip::create([
                'name' => $col[0],
                'jabatan' => $col[1],
            ]);
        }
    }
}
