<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'names';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'context',
        'value'
    ];

    /**
     * Relations
     */
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class);
    }
}
