<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class PhotoController extends Controller
{
    /**
     * Display a random listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flickr = Config::get('app.flickr');
        
        $params = 'per_page='.env('PER_PAGE').'&page=1&format=json&nojsoncallback=1';
        
        $request = $flickr['url'].'?method='.$flickr['methods']['random'].'&api_key='.$flickr['key'].'&'.$params;

        $response = Http::get($request);

        $statusCode = $response->status();
        
        $responseBody = json_decode($response->getBody(), true);
        
        // TODO: pending bug handling

        return $responseBody;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display a filtered listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        // params request
        $tagFind = '&tags='.$request->route('tag');
        
        $flickr = Config::get('app.flickr');
        
        $params = 'per_page='.env('PER_PAGE').'&page=1&format=json&nojsoncallback=1';
        
        $request = $flickr['url'].'?method='.$flickr['methods']['search'].'&api_key='.$flickr['key'].$tagFind.'&'.$params;

        $response = Http::get($request);

        $statusCode = $response->status();

        $responseBody = json_decode($response->getBody(), true);
        
        //TODO: pending bug handling

        return $responseBody;
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
