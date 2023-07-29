<?php

namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class RiwayatQueryBuilder extends Builder
{
    public function withUserId($id)
    {
        return $this->where('id_user', $id);
    }

    public function orderByCreationTime($order)
    {
        return $this->orderBy('created_at', $order);
    }
}