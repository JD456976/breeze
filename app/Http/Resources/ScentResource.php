<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Scent */
class ScentResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
        ];
    }
}
