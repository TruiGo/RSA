<?php
    
class mycrypt {

    private $private_key = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQC/n6Z1/xCaKRCSfXfURZMgFHBVkXFAxP9Guyl2DxUUfDPXIa+M
AetZ1KYZcCVbxu04iD1wtHGP5lRVIPkPStz7kN8Qf4qyvsC3ZORnX5YcLOKc0JoS
ATMY4m2aHulzIuQ5BMVfGTHuEoKuUD2O2Gar5Op+1miIhb/jj52aXvoNswIDAQAB
AoGAHc5lhCEiofgVPdQKWZhg5DKJrqWq6LDj+f1G6NfUCQG1F
1HIRAUBribqyjPAm9fwvKb50I4uJTMi5y4JBj/87kseo25Qn0ADk4pn3oFS8aWwd
B0M/lSCTj+IyISsGHm0CQQDEAdmrBLuriQCYs2XprDdTN7OMrDEge6qd3JTDji+J
Aw+DohnAvuME0M1soNoNYvw30sdsXeRS74mEOlZvRVQt
-----END RSA PRIVATE KEY-----';

    private $public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAAaHulzIuQ5BMVfGTHuEoKuUD2O2Gar5Op+
1miIhb/jj52aXvoNswIDAQAB
-----END PUBLIC KEY-----';



    public $pubkey;
    public $privkey;

    function __construct() {
        $this->pubkey = public_key;
        $this->privkey = private_key;

    }

    public function encrypt($data) {
        if (openssl_public_encrypt($data, $encrypted, $this->pubkey))
            $data = base64_encode($encrypted);
        else
            throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');

        return $data;
    }

    public function decrypt($data) {
        if (openssl_private_decrypt(base64_decode($data), $decrypted, $this->privkey))
            $data = $decrypted;
        else
            $data = '';

        return $data;
    }


    function encrypt_data($publickey,$data)
    {

        if($publickey != ""){
            $this -> pubkey = $publickey;
        }
        $crypt_res = "";
        for($i=0;$i<((strlen($data) - strlen($data)%117)/117+1); $i++)
        {
            $crypt_res = $crypt_res.($this -> encrypt(mb_strcut($data, $i*117, 117, 'utf-8')));
        }
        return $crypt_res;
    }

    function decrypt_data($privatekey,$data)
    {
        if($privatekey != ""){  // if null use default
            $this ->privkey = $privatekey;
        }
        $decrypt_res = "";
        $datas = explode('=',$data);
        foreach ($datas as $value)
        {
            $decrypt_res = $decrypt_res.$this-> decrypt($value);
        }
        return $decrypt_res;
    }

}
