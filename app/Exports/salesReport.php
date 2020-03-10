<?php

namespace App\Exports;

use App\client_book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class salesReport implements FromCollection
{
    use Exportable;

    public function __construct(object $request)
    {
        $this->id = $request->header('id');
        $this->desde = $request->header('desde');
        $this->hasta = $request->header('hasta');
        $this->status = $request->header('status');

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return (new client_book())->sales($this->id,$this->desde,$this->hasta,$this->status);
    }
}
