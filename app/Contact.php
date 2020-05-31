<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Contact extends Model
{
    use Searchable;

    protected $guarded = [];

    // 配列内のカラムをDateTime型に変換
    protected $dates = ['birthday'];

    public function setBirthdayAttribute($birthday)
    {
        // DB保存時にbirthdayをCarbonでパースしてミュテートする
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    /**
     * urlを生成
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function path()
    {
        return '/contacts/' . $this->id;
    }

    /**
     * 現在月と一致する誕生月のcontact情報を取得して返す
     *
     * @param $query
     * @return mixed
     */
    public function scopeBirthdays($query)
    {
        return $query->whereRaw('birthday like "%-' . now()->format('m') . '-%"');
    }

    /**
     * Contactに紐づくUserを取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
