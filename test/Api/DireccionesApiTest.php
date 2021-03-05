<?php

namespace direcciones\simulacion\pe\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\Event\Emitter;
use \GuzzleHttp\Middleware;
use \GuzzleHttp\HandlerStack as handlerStack;

use \direcciones\simulacion\pe\Client\Configuration;
use \direcciones\simulacion\pe\Client\ApiException;
use \direcciones\simulacion\pe\Client\ObjectSerializer;
use \direcciones\simulacion\pe\Client\Model\Peticion;

class DireccionesApiTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $handler = \GuzzleHttp\HandlerStack::create();
        $config = new Configuration();
        $config->setHost('the_url');
        $this->x_api_key = "your_api_key";
        $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
        $this->apiInstance = new \direcciones\simulacion\pe\Client\Api\DireccionesApi($client, $config);
        
    }
    
    
    public function testDirecciones()
    {
        $request = new Peticion();

        $request->setTipoDocumento("1");
        $request->setNumeroDocumento("00439813");

        try {
            $result = $this->apiInstance->direcciones($this->x_api_key, $request);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling DireccionesApi->direcciones: ', $e->getMessage(), PHP_EOL;
        }
    }
}
