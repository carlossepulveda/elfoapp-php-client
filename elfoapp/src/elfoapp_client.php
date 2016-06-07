<?php

    namespace Elfoapp\APIClient;

    require('api_client.php');
    require('resources/resource.php');
    require('resources/delivery_resource.php');

    use Elfoapp\APIClient\Resources\DeliveryResource as DeliveryResource;

    class ElfoappClient {

        protected $apiClient;

        public function __construct($u, $t) {
            $this->apiClient = new APIClient($u, $t);
        }

        public function callWithText($to, $txt, $campaign = null) {
            $delivery = new DeliveryResource($this->apiClient);
            $deliveryToken = $delivery->send($to, $txt, null, $campaign);

            return $deliveryToken;
        }

        public function callWithAudio($to, $audioPath, $campaign = null) {
            $delivery = new DeliveryResource($this->apiClient);
            $audioB64 = $this->getB64($audioPath);
            $deliveryToken = $delivery->send($to, null, $audioB64, $campaign);

            return $deliveryToken;
        }

        public function getDelivery($id) {
            $delivery = new DeliveryResource($this->apiClient);
            $deliveryData = $delivery->get($id);

            return $deliveryData;
        }

        private function getB64($path) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = base64_encode($data);
            return $base64;
        }

    }

?>
