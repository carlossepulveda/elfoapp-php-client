<?php

    require('elfoappMocks.php');

    class ElfoapplientTest extends PHPUnit_Framework_TestCase
    {

        public function testCallWithText()
        {
            $elfoapp = new MockElfoappClient("carlos.sepulveda@elfoapp.co","1234567890");

            $expectedRequest = array(
                                        "url" => "http://api.elfoapp.co/delivery", 
                                        "method" => "POST", 
                                        "headers" => array(
                                                            "Authorization" => "Basic Y2FybG9zLnNlcHVsdmVkYUBlbGZvYXBwLmNvOjEyMzQ1Njc4OTA=",
                                                            "X-API-Source" => "php-0.1"
                                                          ),
                                        "body" => "{\"to\":\"3001111111\",\"type\":\"string-tts\",\"text\":\"testing\"}"
                                    );


            $expectedResponse = "{\"id\":\"token123123\"}";
            $elfoapp->stubRequest($expectedRequest, $expectedResponse);


            $deliveryToken = $elfoapp->callWithText("3001111111","testing");

            // Assert
            $this->assertEquals("token123123",$deliveryToken);
        }

        public function testCallWithAudio()
        {
            $elfoapp = new MockElfoappClient("carlos.sepulveda@elfoapp.co","1234567890");

            $expectedRequest = array(
                                        "url" => "http://api.elfoapp.co/delivery", 
                                        "method" => "POST", 
                                        "headers" => array(
                                                            "Authorization" => "Basic Y2FybG9zLnNlcHVsdmVkYUBlbGZvYXBwLmNvOjEyMzQ1Njc4OTA=",
                                                            "X-API-Source" => "php-0.1"
                                                          ),
                                        "body" => "{\"to\":\"3001111111\",\"type\":\"string-sound\",\"audioB64\":\"dGVzdGluZy1tcDMtZmlsZQ==\"}"
                                    );


            $expectedResponse = "{\"id\":\"token123123\"}";
            $elfoapp->stubRequest($expectedRequest, $expectedResponse);


            $deliveryToken = $elfoapp->callWithAudio("3001111111","tests/testing-mp3-file.mp3");

            // Assert
            $this->assertEquals("token123123",$deliveryToken);
        }

    }
?>