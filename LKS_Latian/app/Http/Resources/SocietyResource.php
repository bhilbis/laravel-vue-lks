<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocietyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_society' => $this->id,
            'id_card_number' => $this->id_card_number,
            'name' => $this->name,
            'password' => $this->password,
            'born_date' => $this->born_date,
            // 'gender' => $this->gender == 'male' ? 'Laki - laki' : 'Perempuan',
            'gender' => $this->gender,
            'address' => $this->address,
            'regional_id' => $this->regional_id,
            'regional_name' => $this->regional->district
        ];
    }
}
