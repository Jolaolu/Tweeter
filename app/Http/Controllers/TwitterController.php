<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TwitterController extends Controller
{
    public function index()
    {
        $tweets = $this->getTweets();

        return view('tweets', compact('tweets'));
    }
    public function getTweets()
    {
        $stack = HandlerStack::create();
        $middleware = new Oauth1(
            [
                'consumer_key' => Config('services.twitter.consumer_key'),
                'consumer_secret' => Config('services.twitter.consumer_secret'),
                'token' => Config('services.twitter.access_token'),
                'token_secret' => Config('services.twitter.access_token_secret')
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
            'statuses/mentions_timeline.json',
            [
                'query' => [
                'screen_name' => 'myTweeterbot',
                'count' => '100',
                ]
            ]
        );

        $responses = json_decode($res->getBody());


        foreach ($responses as $response) {

                dd($response);

        }

    }
    public function getTweetContents()
    {
        $TweetContents = $this->getTweets();
    }
}
//  echo '<pre>';
    //response->entities->hashtags
// echo '</pre>';
