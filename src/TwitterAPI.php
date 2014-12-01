<?php

class TwitterAPI {

    /**
     * Builds params and invoke twitter api
     *
     * @param string $url
     * @param string $method
     * @param array $fields
     * @return mixed
     */
    public function invokeApi($url, $method, $fields) {
        $authSettings = Config::getAuthSettings();
        $twitter = new TwitterAPIExchange($authSettings);
        switch ($method) {
            case Constants::REQUEST_METHOD_GET:
                $twitter = $twitter->setGetfield($fields);
                break;

            case Constants::REQUEST_METHOD_POST:
                $twitter = $twitter->setPostfields($fields);
                break;
        }
        $response = $twitter->buildOauth($url, $method)->performRequest();
        return json_decode($response, true);
    }

    /**
     * Get status of given user and status
     * 
     * @param string $userName
     * @param string|int $statusId
     * @return string
     */
    public function getStatuses($userName, $statusId) {
        $fields = '?url=' . Constants::TW_BASE_URL
        . $userName . '/status/' . $statusId;
        $url = Constants::TW_API_URL . '1.1/statuses/oembed.json';
        $apiResponse = $this->invokeApi($url, Constants::REQUEST_METHOD_GET, $fields);
        return $apiResponse['html'];
    }
}