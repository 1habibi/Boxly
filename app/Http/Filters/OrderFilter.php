<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends AbstractFilter
{
    public const CUSTOMER_ID = 'customer_id';
    public const ORDER_STATUS_ID = 'order_status_id';

    protected function getCallbacks(): array
    {
        return [
            self::CUSTOMER_ID => [$this, 'customer_id'],
            self::ORDER_STATUS_ID => [$this, 'order_status_id'],
        ];
    }

    public function customer_id(Builder $builder, $value){
        $builder->where('customer_id', $value);
    }

    public function order_status_id(Builder $builder, $value){
        $builder->where('order_status_id', $value);
    }

}
