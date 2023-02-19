<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    private const FIRST_NAME_CONTEXT = 'first_name';
    private const LAST_NAME_CONTEXT = 'last_name';

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

    public static function firstName(string $name) : self
    {
        return new self([
            'context' => static::LAST_NAME_CONTEXT, 'value' => $name
        ]);
    }

    public static function lastName(string $name) : self
    {
        return new self([
            'context' => static::FIRST_NAME_CONTEXT, 'value' => $name
        ]);
    }
}
