<?php
class JWT {
    public function generateToken($header, $payload, $secret, int $validation) {
        if($validation > 0) {
            $maintenant = new DateTime;
            $payload['iat'] = $maintenant->getTimestamp();
            $payload['exp'] = ($maintenant->getTimestamp()) + $validation;
        }

        $headerBase64 = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode(json_encode($header, JSON_FORCE_OBJECT)));
        $payloadBase64 = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode(json_encode($payload, JSON_FORCE_OBJECT)));
        $secretBase64 = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($secret));

        $signature = hash_hmac('sha256', $headerBase64.'.'.$payloadBase64, $secretBase64, true);
        $signatureBase64 = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        
        return $headerBase64.'.'.$payloadBase64.'.'.$signatureBase64;
    }

    private function getHeader(string $token) {
        $tableau=explode('.', !empty($token)?$token:".");
        return json_decode(base64_decode(str_replace(['-', '_', ''], ['+', '/', '='], $tableau[0])), true);
    }

    private function getPayload(string $token) {
        $tableau=explode('.', !empty($token)?$token:".");
        return json_decode(base64_decode(str_replace(['-', '_', ''], ['+', '/', '='], $tableau[1])), true);
    }

    private function getInfoPayload(array $donnees) {
        if(!empty($donnees) && !empty(trim($donnees['id']))) {
            $resultats = [
                'id' => $donnees['id'],
                'prenom_usuel' => $donnees['prenom_usuel'],
                'mail' => $donnees['mail']
            ];
        }
        else {
            throw new Exception("Erreur: token vide !");
            exit;
        }
        return $resultats;
    }

    private function verifyTokenReceived() {
        if(isset($_SERVER['Authorization'])) {
            $token = trim($_SERVER['Authorization']);
        }
        elseif(isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $token = trim($_SERVER['HTTP_AUTHORIZATION']);
        }
        elseif(function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            if(isset($requestHeaders['Authorisation'])) {
                $token = trim($requestHeaders['Authorisation']);
            }
        }
        else {
            http_response_code(401);
            throw new Exception("Erreur: permission non accordée !");
            exit;
        }
        return !empty($token) ? $token : "";
    }

    public function isValidToken(string $secret) {
        $token = $this->verifyTokenReceived();
        if(!isset($token) && !preg_match('#Bearer\s(\S+)#', $token)) {
            http_response_code(402);
            throw new Exception("Erreur: permission non accordée !");
            exit;
        }
        
        $token = str_replace('Bearer ', '', $token);
        $header = $this->getHeader($token);
        $payload = $this->getPayload($token);
        $verifyToken = $this->generateToken($header, $payload, $secret, 0);

        if($token === $verifyToken) {
            $reponses = $this->getInfoPayload($payload);
        }
        else {
            http_response_code(402);
            throw new Exception("Erreur: permission non accordée !");
            exit;
        }
        return $reponses;        
    }
}
