<?php


namespace app\models;


use yii\base\Model;

class Twitter
{

    public $screen_name;
    public $countNews;

public function __construct( $screen_name='tsnua', $countNews='1')
{

    $this->screen_name=$screen_name;
    $this->countNews = $countNews;
}

    public function buildBaseString($baseURI, $method, $params) {
        $r = array();
        ksort($params);
        foreach($params as $key=>$value){
            $r[] = "$key=" . rawurlencode($value);
        }
        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
    }

public function buildAuthorizationHeader($oauth) {
        $r = 'Authorization: OAuth ';
        $values = array();
        foreach($oauth as $key=>$value)
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        $r .= implode(', ', $values);
        return $r;
    }
//токен не действителен
public function returnTweet(){
        $oauth_access_token         = "1185971966500626432-DQYs4790ORYF6suzniNlTdd405px2R";
        $oauth_access_token_secret  = "gZl0d1gzu6rLGbH5ePJUGfHd7rhAsMfnOL9GQ4zNJMRHq";
        $consumer_key               = "RLe477foHbzvh8uVmZKMxI708";
        $consumer_secret            = "w1x6LAHYYAuCO2wNbZSG90PYWG6aWeLfdCeWf6vvZy6NEvcsCo";

        $twitter_timeline           = "user_timeline";  //  mentions_timeline / user_timeline / home_timeline / retweets_of_me


        $request = array(
            'screen_name'       => $this->screen_name,
            'count'             => $this->countNews
        );

        $oauth = array(
            'oauth_consumer_key'        => $consumer_key,
            'oauth_nonce'               => time(),
            'oauth_signature_method'    => 'HMAC-SHA1',
            'oauth_token'               => $oauth_access_token,
            'oauth_timestamp'           => time(),
            'oauth_version'             => '1.0'
        );


        $oauth = array_merge($oauth, $request);


        $base_info              = $this->buildBaseString("https://api.twitter.com/1.1/statuses/".$twitter_timeline.".json", 'GET', $oauth);
        $composite_key          = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
        $oauth_signature            = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature']   = $oauth_signature;


        $header = array($this->buildAuthorizationHeader($oauth), 'Expect:');
        $options = array( CURLOPT_HTTPHEADER => $header,
            CURLOPT_HEADER => false,
            CURLOPT_URL => "https://api.twitter.com/1.1/statuses/".$twitter_timeline.".json?". http_build_query($request),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false);

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $json = curl_exec($feed);
        curl_close($feed);

        return json_decode($json, true);
    }


}

