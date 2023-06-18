<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CustomerFilter extends AbstractFilter
{
    public const SURNAME = 'surname';

    protected function getCallbacks(): array
    {
        return [
            self::SURNAME => [$this, 'surname'],
        ];
    }

    public function surname(Builder $builder, $value){
        $builder->where('surname', 'like', "%{$value}");
    }

}
