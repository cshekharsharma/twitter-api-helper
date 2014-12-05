<?php
ini_set('display_errors', '1');

require_once 'src/TwitterAPI.php';

$authConfig = array(
    'oauth_access_token'        => "217699109-0xW22KbW7fYvffsCShtm1qActvMvsCdFJRagFbDH",
    'oauth_access_token_secret' => "CNybtK8V0LP2mX0Tt3QWIxRjnHVNMsncKwQNkyrZ7UUEs",
    'consumer_key'              => "xYoaHJh3neYgZGG9VGi2LFym8",
    'consumer_secret'           => "iBIHdVfdS8jvYs1ifiKRUBZ56pzXmLywHH90Nn6LsPUDExkYET"
);

$twitterApi = new TwitterAPI($authConfig);

$status = $twitterApi->getStatuses('cshekhar_sharma', '530624251746062336');
if (!empty($status)) {
    echo $status['html'];
}

/* echo $twitterApi->getUserInfobyScreenName('cshekhar_sharma');

echo $twitterApi->getUserInfobyUserId('217699109');
 */
