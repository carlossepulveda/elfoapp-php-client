<?php

    namespace Elfoapp\APIClient\Resources;

    class DeliveryResource extends Resource{

        public function send($to, $txt, $audio, $campaign) {
        	$data = array("to" => $to);
            if (isset($txt)) {
                $data['type'] = 'string-tts';
                $data['text'] = $txt;
            }
            if (isset($audio)) {
                $data['type'] = 'string-sound';
                $data['audioB64'] = $audio;
            }

        	if (isset($campaign)) {
                $data['campaign'] = $campaign;
            }
            $response = $this->apiClient->post('delivery', $data);

            return $response->id;
        }

        public function get($id) {
            return $this->apiClient->get('delivery/' . $id);
        }
    }
?>