<?php

namespace App\Http\Resources\Merchant;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->resource->id,
            'logistics_company' => $this->resource->logisticsCompany->name,
            'tracking_number'   => $this->resource->tracking_number,
            'code'              => $this->resource->code,
            'title'             => $this->resource->coupon->title,
            'products'          => Product::whereIn('id', $this->resource->products)->get(['name'])->pluck('name'),
            'consignee'         => $this->resource->consignee,
            'phone'             => $this->resource->phone,
            'region'            => $this->resource->region,
            'address'           => $this->resource->address,
            'status'            => (int)$this->resource->status,
            'created_at'        => $this->resource->created_at->toDateTimeString(),
        ];
    }
}
