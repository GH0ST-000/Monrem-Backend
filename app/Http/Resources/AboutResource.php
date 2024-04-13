<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    public static $wrap = false;

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'header'=>$this->header,
            'subheader'=>$this->subheader,
            'description'=>$this->description,
            'images'=>$this->images

        ];
    }
}
