<?php

/**
 * Custom Runtime AutoLoader class for APP.
 * It contains path-map of all classes for loading when needed
 */
class Autoloader {

    private $classPathMap;

    public function __construct() {
        $this->classPathMap = array(
            'Config' => 'Config.php',
            'Constants' => 'Constants.php',
            'TwitterAPI' => 'TwitterAPI.php',
            'TwitterAPIExchange' => 'TwitterAPIExchange.php',
        );
    }

    /**
     * Find class path for given class and loads it by including class file.
     *
     * @param string $className
     */
    public function loadClass($className) {
        $classPath = $this->getClassPath($className);
        try {
            if (!empty($classPath)) {
                require_once $classPath;
            }
        } catch (Exception $e) {
            die('Class' . $className . 'not found');
        }
    }

    private function getClassPath($className) {
        if (!empty($this->classPathMap[$className])) {
            return $this->classPathMap[$className];
        } else {
            return false;
        }
    }
}

$autoloader = new AutoLoader();

// Registering autoloader function for app
spl_autoload_register(array($autoloader, 'loadClass'));
