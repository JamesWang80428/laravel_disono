<?php
/**
 * @author          Archie, Disono (webmonsph@gmail.com)
 * @link            https://github.com/disono/Laravel-Template
 * @copyright       Webmons Development Studio. (webmons.com), 2016-2018
 * @license         Apache, 2.0 https://github.com/disono/Laravel-Template/blob/master/LICENSE
 */

namespace App\Models;

use App\Models\Vendor\BaseModel;

class Page extends BaseModel
{
    protected static $tableName = 'pages';
    protected static $writableColumns = [
        'page_category_id', 'user_id',
        'name', 'content', 'slug', 'template',
        'is_draft', 'is_email_to_subscriber',
        'post_at', 'expired_at',
    ];

    protected static $inputDates = ['post_at', 'expired_at'];
    protected static $inputBooleans = ['is_draft', 'is_email_to_subscriber'];

    protected static $files = ['cover_photo'];
    protected static $imageOptions = ['tag' => 'cover_photo'];

    public function __construct(array $attributes = [])
    {
        $this->fillable(self::$writableColumns);
        parent::__construct($attributes);
    }

    /**
     * List of select
     *
     * @return array
     */
    protected static function rawQuerySelectList()
    {
        return [
            'page_category_slug' => 'SELECT name FROM page_categories WHERE pages.page_category_id = page_categories.id LIMIT 1'
        ];
    }

    /**
     * Add formatting to data
     *
     * @param $row
     * @return mixed
     */
    protected static function dataFormatting($row)
    {
        $row->small_content = str_limit(strip_tags($row->content), 22);
        $row->url = url('p/' . $row->slug);

        $row->formatted_created_at = humanDate($row->created_at, true);
        $row->post_at = ($row->post_at) ? humanDate($row->post_at, true) : null;
        $row->expired_at = ($row->expired_at) ? humanDate($row->expired_at, true) : null;

        $row->has_cover = self::coverPhoto($row->id);
        $row->cover = fetchImage($row->has_cover, 'assets/img/placeholders/no_image.png');

        return $row;
    }

    /**
     * Get avatar
     *
     * @param $page_id
     * @return null
     */
    private static function coverPhoto($page_id)
    {
        $file = File::where('table_name', 'pages')->where('table_id', $page_id)->where('tag', 'cover_photo')
            ->orderBy('created_at', 'DESC')->first();
        return ($file) ? $file->file_name : null;
    }

    public function pageCategory()
    {
        return $this->belongsTo('App\Models\PageCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
