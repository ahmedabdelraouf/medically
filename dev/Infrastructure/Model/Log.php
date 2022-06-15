<?php

namespace Dev\Infrastructure\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property false|mixed|string start_time
 * @property mixed|string url
 * @property mixed|string method
 * @property false|mixed|string body
 * @property false|mixed|string header
 * @property mixed|string|null ip_address
 * @property false|mixed|string response
 * @property int|mixed status_code
 */
class Log extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'start_time',
        'method',
        'url',
        'header',
        'body',
        'ip_address',
        'status_code',
        'response',
    ];

}
