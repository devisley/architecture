<?php
/**
 * Created by PhpStorm.
 * User: Ruslan
 * Date: 06.04.2019
 * Time: 22:45
 */

require "UrlObject.php";

class UrlHandler
{
    private $url;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl(string $url): void
    {
        $this->url = preg_replace("|^.+?://(.*?/)|", "", $url);
    }


    /**
     * @return null|UrlObject Объект для работы с URL
     */
    public function getUrlObject() {

        if (!isset($this->url)) {
            return null;
        }

        $urlObject = new UrlObject();
        preg_match('|^(.*)\/|', $this->url, $matches);
        $urlObject->controller = $matches[1];
        $matches = null;
        preg_match('/\/(.*)\?/', $this->url, $matches);
        if (!$matches) {
            preg_match('/\/(.*)$/', $this->url, $matches);
        }
        $urlObject->action = $matches[1];
        $matches = null;
        preg_match('/\?(.*)$/', $this->url, $matches);
        if ($matches) {
            $urlObject->GET = $this->parseGetParameters($matches[1]);
        }

        return $urlObject;
    }

    private function parseGetParameters(string $url) {
        $getArray = explode( '&', $url);
        $result = [];

        foreach ($getArray as $item) {
            $explodeArray = explode( '=', $item);
            $result[$explodeArray[0]] = $explodeArray[1];
        }

        return $result;
    }

}

//$url = "https://mysite.local/mycontroller/myaction?id=1&lang=ru&sort=asc";
//
//$urlHandler = new UrlHandler();
//$urlHandler->setUrl($url);
//
//var_dump($urlHandler->getUrlObject());
