<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 06.04.2019
 * Time: 21:58
 */

/**
 * Class Settings Паттерн Registry
 */
class Settings
{
    private static $instance;

    private $ip;
    private $port;
    private $user;
    private $password;

    private function __construct()
    {
    }

    /**
     * @return self
     */
    public static function instance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp(string $ip): void
    {
        $filteredIp = filter_var($ip, FILTER_VALIDATE_IP);

        if ($filteredIp) {
            $this->ip = $filteredIp;
        }
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort(int $port): void
    {
        if ($port > 0 && $port < 65536) {
            $this->port = $port;
        }
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


}

$settings = Settings::instance();

$settings->setIp('192.168.0.2');
$settings->setPort(2345);
$settings->setUser('root');
$settings->setPassword('123456');

var_dump($settings);