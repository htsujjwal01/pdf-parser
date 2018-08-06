<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PDFParsedContent extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pdfs_parsed_content';

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

    public function pdfDetail()
    {
        return $this->belongsTo(PDF::class, 'pdf_id', 'id');
    }

}
