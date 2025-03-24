<?php

namespace BasicDashboard\Web\Users\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        $this->profile_photo ??= "/Default/default_profile_pic.jpg";
        return [
            "id" => customEncoder($this->id),
            "name" => $this->name,
            "email" => $this->email,
            "status" => $this->status,
            "country" => $this->country->name,
            'role' => $this->roles->value('name'),
            'name_other' => $this->name_other,
            'phone' => $this->phone,
            'id_number' => $this->id_number,
            'date_of_birth' => $this->date_of_birth,
            'father_name' => $this->father_name,
            'father_name_other' => $this->father_name_other,
            'gender' => $this->gender,
            'martial_status' => $this->martial_status,
            'occupation' => $this->occupation,
            'profile_photo' => retrievePublicFile($this->profile_photo),
            'created_at' => $this->created_at ? Carbon::parse($this->created_at)->format('d/F/Y') : '---',
        ];
    }
}