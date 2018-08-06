<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PDF extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pdfs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['*'];

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;

    public function uploadedBy()
    {
        return $this->belongsTo(User::class, 'uploaded_by', 'id');
    }
}
