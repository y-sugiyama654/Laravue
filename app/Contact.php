<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    // 配列内のカラムをDateTime型に変換
    protected $dates = ['birthday'];

    public function setBirthdayAttribute($birthday)
    {
        // DB保存時にbirthdayをCarbonでパースしてミュテートする
        $this->attributes['birthday'] = Carbon::parse($birthday);
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
