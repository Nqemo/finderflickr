<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

// use App\Http\Requests;
// use App\Photo;
// use App\Http\Resources\Photo as PhotoResource;
// use JeroenG\Flickr\FlickrLaravelFacade as Flickr;

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
        
        $params = 'per_page=5&page=1&format=json&nojsoncallback=1';
        // $fakeflickUrl = 'https://www.flickr.com/services/rest/?method=flickr.photos.getRecent&api_key=4fae6b45c7e8b26635fd81f9009fce0b&per_page=5&page=1&format=json&nojsoncallback=1';
        
        $request = $flickr['url'].'?method='.$flickr['methods']['random'].'&api_key='.$flickr['key'].'&'.$params;

        $response = Http::get($request);

        $statusCode = $response->status();

        $responseBody = json_decode($response->getBody(), true);
        
        dd($responseBody);
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
    public function show(Request $request)
    {
        // params request
        $tagFind = '&tags='.$request->route('tag');
        // $flickUrl = 'https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=4fae6b45c7e8b26635fd81f9009fce0b' .$tagFind.'&per_page=5&page=1&format=json&nojsoncallback=1';
        
        $flickr = Config::get('app.flickr');
        
        $params = 'per_page=5&page=1&format=json&nojsoncallback=1';
        // $fakeflickUrl = 'https://www.flickr.com/services/rest/?method=flickr.photos.getRecent&api_key=4fae6b45c7e8b26635fd81f9009fce0b&per_page=5&page=1&format=json&nojsoncallback=1';
        
        $request = $flickr['url'].'?method='.$flickr['methods']['search'].'&api_key='.$flickr['key'].$tagFind.'&'.$params;

        $response = Http::get($request);

        $statusCode = $response->status();

        $responseBody = json_decode($response->getBody(), true);
        
        dd($responseBody);
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
