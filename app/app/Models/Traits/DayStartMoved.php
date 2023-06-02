<?php

namespace App\Models\Traits;

use Carbon\Carbon;

trait DayStartMoved
{
    public function setUpdatedAtAttribute(Carbon $date): void
    {
        $this->setAttr($date, 'updated_at');
    }

    public function setDeletedAtAttribute(Carbon $date): void
    {
        $this->setAttr($date, 'deleted_at');
    }

    private function setAttr(Carbon $date, string $attr): void
    {
        $hour = $date->hour;

        if ($hour < 9) {
            $date = $date->subDay();
        }

        $this->attributes[$attr] = $date;
    }
}
