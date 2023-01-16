<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Jobs extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'type' => $this->type,
      'url' => $this->url,
      'created_at' => $this->created_at,
      'company' => $this->company,
      'company_url' => $this->company_url,
      'location' => $this->location,
      'title' => $this->title,
      'description' => $this->description,
      'how_to_apply' => $this->how_to_apply,
      'company_logo' => $this->company_logo,
    ];
  }
}
