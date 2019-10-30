<?php

namespace App\Http\Controllers;

use App\Shorty;
use Illuminate\Http\Request;
use Validator;
use DB;

class ShortyController extends Controller
{
	/**
	* Store shorten url
	*
	* @param  Request $request
    * @param  Instance eloquent model
	* @return json
	*/
    public function shorten(Request $request, Shorty $shorty)
    {
        $param = $request->all();
        if (! isset($request->shortcode) || $request->shortcode == '') {
            $param['shortcode'] = str_random(6);
        }

    	// Validate
        $validator = Validator::make($param, [
            'url' => ['required', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
            'shortcode' => ['nullable', 'regex:/^[0-9a-zA-Z_]{6}$/', 'unique:shortens']
        ]);

        if ($validator->fails()) {
            return response()->default(422, 'Failed validation', $validator->errors());
        }

        if (! $check_url_location = $this->url_exists($param['url'])) {
            return response()->default(404, 'The URL is not present');
        }

        // create shorten
        $saveData = $shorty->saveData($param);
        if ($saveData['error'] == true) {
            return response()->default(400, $saveData['message']);
        }

        return response()->default(201, 'success', ['shortcode' => $saveData['message']]);
    }

    /**
    * Find shortcode URL location
    *
    * @param  Request $request
    * @param  Instance eloquent model
    * @return location header of shorterned URL
    */
    public function findShortCode(Request $request, Shorty $shorty)
    {
        try {
            $shortcode = $request->shortcode;
            if ($shorten = $shorty->where('shortcode', $shortcode)->first()) {
                if ($check_url_location = $this->url_exists($shorten->url)) {
                    $update = $shorten->update(['redirect_count' => $shorten->redirect_count + 1, 'last_seen_date' => now()]);
                    return response()->json(['location' => $shorten->url], 302)->header('Location', $shorten->url);
                } else {
                    return response()->default(404, 'The URL is not present');
                }
            } else {
                return response()->default(404, 'The shortcode cannot be found in the system');
            }
        } catch (\Exception $e) {  
            return response()->default(400, $e->getMessage());
        }
    }

    /**
    * Get stats of shorten
    *
    * @param  Request $request
    * @param  Instance eloquent model
    * @return json
    */
    public function Stats(Request $request, Shorty $shorty)
    {
        try {
            $shortcode = $request->shortcode;
            if ($shorten = $shorty->where('shortcode', $shortcode)->first()) {
                $response['startDate'] = $shorten->created_at;
                if ($shorten->last_seen_date) {
                    $response['lastSeenDate'] = $shorten->last_seen_date;
                }
                $response['redirectCount'] = $shorten->redirect_count;

                return response()->default(200, 'success', [$response]);
            } else {
                return response()->default(404, 'The shortcode cannot be found in the system');
            }
        } catch (\Exception $e) {
            return response()->default(400, $e->getMessage());
        }
    }

    public function url_exists($url)
    {
        // $file_headers = @get_headers($url);
        // if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        //     $exists = false;
        // }
        // else {
        //     $exists = true;
        // }

        // return $exists;

            if (!$fp = curl_init($url)) return false;
            return true;
    }
}
