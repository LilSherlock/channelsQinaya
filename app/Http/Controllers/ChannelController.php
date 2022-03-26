<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\channel;

class ChannelController extends Controller
{
    public function store(Request $request) {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'logo' => 'required',
            'url' => 'required',
            'categoryName' => 'required',
            'categorySlug' => 'required',
            'countryName' => 'required',
            'countryCode' => 'required',
            'languageName' => 'required',
            'languageCode' => 'required',
            'tvgId' => 'required',
            'tvgName' => 'required',
            'tvgUrl' => 'required',
        ]);
        $temp = $validatedData->errors()->all();

        if ($validatedData->fails()) {
            return response()->json(['Status' => false,'Message'=>$temp[0]], 400);            
        }

        $channel = channel::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'url' => $request->url,
            'categoryName' => $request->categoryName,
            'categorySlug' => $request->categorySlug,
            'countryName' => $request->countryName,
            'countryCode' => $request->countryCode,
            'languageName' => $request->languageName,
            'languageCode' => $request->languageCode,
            'tvgId' => $request->tvgId,
            'tvgName' => $request->tvgName,
            'tvgUrl' => $request->tvgUrl,

        ]);

        $channels = channel::all();

        foreach ($channels as $channel) {
            $array [] = [
                'name' => $channel->name,
                'logo' => $channel->logo,
                'url' => $channel->url,
                'categories' => [
                    'name' => $channel->categoryName,
                    'slug' => $channel->categorySlug,
                ],
                'country' => [
                    'name' => $channel->countryName,
                    'code' => $channel->countryCode,
                ],
                'language' => [
                    'name' => $channel->languageName,
                    'code' => $channel->languageCode,
                ],
                'tvg' => [
                    'id' => $channel->tvgId,
                    'name' => $channel->tvgName,
                    'url' => $channel->tvgUrl,
                ],
            ];
        }
        return $array;

    }

    public function get() {
        $channels = channel::all();

        if (!$channels) {

            return 'No channels found';
        }

        foreach ($channels as $channel) {
            $array [] = [
                'name' => $channel->name,
                'logo' => $channel->logo,
                'url' => $channel->url,
                'categories' => [
                    'name' => $channel->categoryName,
                    'slug' => $channel->categorySlug,
                ],
                'country' => [
                    'name' => $channel->countryName,
                    'code' => $channel->countryCode,
                ],
                'language' => [
                    'name' => $channel->languageName,
                    'code' => $channel->languageCode,
                ],
                'tvg' => [
                    'id' => $channel->tvgId,
                    'name' => $channel->tvgName,
                    'url' => $channel->tvgUrl,
                ],
            ];
        }
        return $array;
    }
}
