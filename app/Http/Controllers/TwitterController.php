<?php

namespace App\Http\Controllers;
use Config;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TwitterController extends Controller
{
    //
    public function index()
    {
        $tweets = $this->getTweets();

        return view('welcome', compact('tweets'));
    }
    public function getTweets()
    {
        $stack = HandlerStack::create();
        $middleware = new Oauth1(
            [
                'consumer_key' => Config::get('twitter.consumer_key'),
                'consumer_secret' => Config::get('twitter.consumer_secret'),
                'token' => Config::get('twitter.access_token'),
                'token_secret' => Config::get('twitter.access_token_secret')
            ]
        );
        $stack->push($middleware);

        $client = new Client(
            [
            'base_uri' => 'https://api.twitter.com/1.1/',
            'handler' => $stack,
            'auth' => 'oauth'
            ]
        );
        $res = $client->get(
            'statuses/user_timeline.json',
            [
                'query' => [
                'screen_name' => 'laravelphp',
                'count' => '5',
                ]
            ]
        );
        dd(json_decode($res->getBody()), true);
    }
}
