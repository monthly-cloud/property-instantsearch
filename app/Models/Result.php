<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Result extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        $record = $this->toArray();

        unset($record['created_at'], $record['updated_at']);
        $record['available_from'] = Carbon::today()->timestamp;
        $record['_geoloc'] = [
            'lat' => (float) $record['lat'],
            'lng' => (float) $record['lng'],
        ];

        return $record;
    }
}
