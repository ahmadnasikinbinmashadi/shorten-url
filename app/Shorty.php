<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Shorty extends Model
{
    protected $table = 'shortens';

    protected $fillable = ['url', 'shortcode', 'redirect_count', 'last_seen_date']; 

    public function saveData($request)
    {
        try {
        	DB::beginTransaction();
            $model = self::fill($request);
            $model->save();

        	DB::commit();
            $response['error'] = false;
            $response['message'] = $model->shortcode;
            return $response;
        } catch (\Exception $e) {
        	DB::rollack();
            $response['error'] = true;
            $response['message'] = $e->getMessage();
        	return $response;
        }
    }
}
