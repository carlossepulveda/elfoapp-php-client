<?php

    namespace Elfoapp\APIClient\Resources;

    class Resource {

        protected $apiClient;

        public function __construct($apiClient) {
            $this->apiClient = $apiClient;
        }
    }
?>