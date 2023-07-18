<?php

use Filament\Tables\Filters\Filter;

class CustomDateRangeFilter extends Filter
{
    public function apply($query, $value)
    {
        if (! $value) {
            return $query;
        }

        [$start, $end] = explode(' - ', $value);

        return $query->whereBetween($this->column, [
            \Carbon\Carbon::parse($start)->startOfDay(),
            \Carbon\Carbon::parse($end)->endOfDay(),
        ]);
    }
}
