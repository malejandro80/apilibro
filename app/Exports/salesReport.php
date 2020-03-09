<?php

namespace App\Exports;

use App\client_book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class salesReport implements FromCollection
{
    use Exportable;

    public function __construct(int $idAuthor)
    {
        $this->idAuthor = $idAuthor;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return (new client_book())->sales($this->idAuthor);
    }
}
