<?php

namespace Dev\Infrastructure\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    protected $table = 'cities';
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $fillable = ['id', 'name', 'description','lat' , 'lng'];
    public $translatable = ['name', 'description'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
