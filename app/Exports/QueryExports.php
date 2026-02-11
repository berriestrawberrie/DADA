<?php

namespace App\Exports;

use App\Models\Ceramic;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QueryExports implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $collection_id;
    protected $start;
    protected $end;

    public function __construct(int $collection_id, int $start, int $end)
    {
        $this->collection_id = $collection_id;
        $this->start = $start;
        $this->end = $end;
    }

    public function query()
    {
        return Ceramic::query()
            ->where('collection_id', $this->collection_id)
            ->whereBetween('start_date', [$this->start, $this->end]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Collection ID',
            'Start Date',
            'End Date',
            'Name',
            'Created At',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->collection_id,
            $row->start_date,
            $row->end_date,
            $row->name,
            $row->created_at,
        ];
    }
}