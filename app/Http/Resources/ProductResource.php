<?php

namespace App\Http\Resources;

use App\Models\Color;
use App\Models\Product;
use App\Models\Scent;
use App\Models\Size;
use App\Models\Tin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Product */
class ProductResource extends JsonResource
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
            'tin_id' => $this->tin_id,
            'color_id' => $this->color_id,
            'scent_id' => $this->scent_id,
            'cost' => $this->cost,
            'media' => $this->getFirstMediaUrl('products'),
            'created_at' => Carbon::parse($this->created_at)->format('M j, Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('M j, Y'),
            'color' => new ColorResource(Color::find($this->color_id)),
            'scent' => new ScentResource(Scent::find($this->scent_id)),
            'tin' => new TinResource(Tin::find($this->scent_id)),
            'color_count' => $this->color_count,
            'scent_count' => $this->scent_count,
            'tin_count' => $this->tin_count,
        ];
    }
}
