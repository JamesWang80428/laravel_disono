<?php
/**
 * @author          Archie, Disono (webmonsph@gmail.com)
 * @link            https://github.com/disono/Laravel-Template
 * @copyright       Webmons Development Studio. (webmons.com), 2016-2018
 * @license         Apache, 2.0 https://github.com/disono/Laravel-Template/blob/master/LICENSE
 */

namespace App\Models;

use App\Models\Vendor\BaseModel;

class UserPhone extends BaseModel
{
    protected static $tableName = 'user_phones';
    protected static $writableColumns = [
        'user_id', 'ext', 'phone', 'is_verified'
    ];

    public function __construct(array $attributes = [])
    {
        $this->fillable(self::$writableColumns);
        parent::__construct($attributes);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}