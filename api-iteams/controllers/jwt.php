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
}
