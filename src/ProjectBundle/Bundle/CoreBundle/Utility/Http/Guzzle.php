<?php

namespace ProjectBundle\Bundle\CoreBundle\Utility\Http;

use Guzzle\Http\Client;

class Guzzle implements HttpInterface
{
    protected $guzzle;
    protected $request;
    protected $response;
    protected $headers;

    public function __construct($url = null)
    {
        $this->guzzle = new Client($url);
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    public function getResponseBody()
    {
        return ($this->response) ? $this->response->getBody(true) : null;
    }

    public function getResponseCode()
    {
        return $this->response->getStatusCode();
    }

    public function get($url)
    {
        try {
            $this->request = $this->guzzle->get($url, $this->headers);
            $this->response = $this->request->send();
        } catch (\Exception $e) {
            // TODO: Do proper handling
        }
    }

    public function post($url, $data)
    {
        try {
            $this->request = $this->guzzle->post($url, $this->headers, $data);
            $this->response = $this->request->send();
        } catch (\Exception $e) {
            // TODO: Do proper handling
        }
    }

    public function put($url, $data)
    {
        try {
            $this->request = $this->guzzle->put($url, $this->headers, $data);
            $this->response = $this->request->send();
        } catch (\Exception $e) {
            // TODO: Do proper handling
        }
    }

    public function delete($url)
    {
        try {
            $this->request = $this->guzzle->delete($url, $this->headers);
            $this->response = $this->request->send();
        } catch (\Exception $e) {
            // TODO: Do proper handling
        }
    }

    public function getRawResponseMessage()
    {
        // TODO will implement later
    }

    public function getRawRequestMessage()
    {
        // TODO will implement later
    }
}