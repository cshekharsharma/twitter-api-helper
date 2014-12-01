<?php

class Config {

    /**
     * Set access tokens here - see: https://dev.twitter.com/apps/
     */
    private static $authSettings = array(
        'oauth_access_token'        => "217699109-0xW22KbW7fYvffsCShtm1qActvMvsCdFJRagFbDH",
        'oauth_access_token_secret' => "CNybtK8V0LP2mX0Tt3QWIxRjnHVNMsncKwQNkyrZ7UUEs",
        'consumer_key'              => "xYoaHJh3neYgZGG9VGi2LFym8",
        'consumer_secret'           => "iBIHdVfdS8jvYs1ifiKRUBZ56pzXmLywHH90Nn6LsPUDExkYET"
    );

    public static function getAuthSettings() {
        return self::$authSettings;
    }
}