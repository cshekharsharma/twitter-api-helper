<?php

/**
 * Twitter Rest API (v1.1) helper class for eaiser api access (unofficial).
 *
 * @author  Chandra Shekhar <shekharsharma705@gmail.com>
 * @license MIT License
 * @version 1.0.0
 * @link    http://github.com/cshekharsharma/twitter-api-helper
 */
class TwitterAPI {

    /**
     * Contains API authentication info. Must be initialized before any API call
     *
     * @var array
     */
    private $authConfig = null;

    /**
     * TwitterAPI constructor
     *
     * @param array $authConfig
     */
    public function __construct(array $authConfig) {
        require_once 'src/Autoloader.php';
        $this->authConfig = $authConfig;
    }

    /**
     * Builds params and invoke twitter api
     *
     * @param string $url
     * @param string $method
     * @param array $fields
     * @return mixed
     */
    private function invokeApi($url, $method, $fields) {
        try {
            $twitter = new Twitter($this->authConfig);
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
        } catch (Exception $e) {
            return array();
        }
    }

    /**
     * Returns full API url to be called.
     *
     * @param string $urlkey
     * @return string
     */
    private function getFullUrl($relativeUrl) {
        return Constants::TW_API_URL . '1.1/' . $relativeUrl;
    }

    /**
     * Get status of given user and status
     *
     * @param string $userName
     * @param string|int $statusId
     * @return string - HTML of twitter status
     */
    public function getStatuses($userName, $statusId) {
        $url = $this->getFullUrl('statuses/oembed.json');
        $fields = '?url=' . Constants::TW_BASE_URL
        . $userName . '/status/' . $statusId;
        return $this->invokeApi($url, Constants::REQUEST_METHOD_GET, $fields);
    }

    /**
     * Get all user information for given User Name (screen name)
     *
     * @param string $userName
     */
    public function getUserInfobyScreenName($userName) {
        $url = $this->getFullUrl('users/show.json');
        $fields = '?screen_name=' . $userName;
        return $this->invokeApi($url, Constants::REQUEST_METHOD_GET, $fields);
    }


    /**
     * Get all user information for given User Id
     *
     * @param string $userId
     */
    public function getUserInfobyUserId($userId) {
        $url = $this->getFullUrl('users/show.json');
        $fields = '?user_id=' . $userId;
        return $this->invokeApi($url, Constants::REQUEST_METHOD_GET, $fields);
    }
}