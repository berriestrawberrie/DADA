<?php

namespace App\Exports;

use App\Models\Ceramic;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class QueryExports implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $table;
    protected $collection_id;
    protected $start;
    protected $end;

    public function __construct(string $table ,int $collection_id, int $start, int $end)
    {
        $this->table = $table; 
        $this->collection_id = $collection_id;
        $this->start = $start;
        $this->end = $end;
    }

    public function query()
    {
        return DB::table($this->table)
            ->where('collection_id', $this->collection_id)
            ->whereBetween('start_date', [$this->start, $this->end])
            ->orderBy('id');
    }

    public function headings(): array
    {
        return [
            'ID',
            'Collection ID',
            'collection',
            'Start Date',
            'End Date',
            'Created At',
            'Material',
            'status_code',
            'accession',
            'artifact_id'
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->collection_id,
            $row->collection,
            $row->start_date,
            $row->end_date,
            $row->created_at,
            $row->material,
            $row->status_code,
            $row->accession,
            $row->artifact_id,
        ];
    }
}