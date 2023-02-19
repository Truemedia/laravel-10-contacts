<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Contact, Name};

class Persona extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personas';

    /**
     * Relations
     */
    public function contact() { return $this->hasOne(Contact::class); } // Contact
    public function names() { return $this->hasMany(Name::class); } // Names
}
