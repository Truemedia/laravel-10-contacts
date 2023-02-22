<?php namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Name;

class Persona extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->names->first( function($name) {
                return $name->isFirstName;
            })->value,
            'lastName' => $this->names->first( function($name) {
                return $name->isLastName;
            })->value,
            'email' => $this->contact->email,
            'telephone' => $this->contact->phone
        ];
    }
}
