<?php
ini_set('display_errors', '1');

require_once 'Autoloader.php';

$twitterApi = new TwitterAPI();

echo $twitterApi->getStatuses('cshekhar_sharma', '530624251746062336');
