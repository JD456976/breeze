<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\Size;
use App\Models\Tin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Tin */
class TinResource extends JsonResource
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
            'color' => new ColorResource(Color::find($this->color_id)),
            'size' => new SizeResource(Size::find($this->size_id)),
            'media' => $this->getFirstMediaUrl('tins'),
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
        ];
    }
}
