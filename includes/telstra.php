<?php

class Telstra {
  private $config;

  private $urls = array(
      "auth" => array(
        "url" => "https://sapi.telstra.com/v1/oauth/token",
      ),
      "sms" => array(
        "url"  => "https://tapi.telstra.com",
        "prov" => "/v2/messages/provisioning/subscriptions",
        "send" => "/v2/messages/sms",
      )
  );

  public function __construct($config) {
    $this->config = $config;
  }

  public function tokenauth($options = []){

    $token = $this->_curl($this->urls['auth']['url'], array_merge($options, $this->config));
    return $token['access_token'];

  }

  public function provision($options = []){

      $token = $this->tokenauth(array('grant_type' => 'client_credentials', 'scope' => 'NSMS'));

      if($token) return $this->_curl($this->urls['sms']['url'].$this->urls['sms']['prov'], $options, $token);
      else return "there has been an error";

  }

  public function sendsms($options = []) {

      $token = $this->tokenauth(array('grant_type' => 'client_credentials', 'scope' => 'NSMS'));

      if($token) return $this->_curl($this->urls['sms']['url'].$this->urls['sms']['send'], $options, $token);
      else return "there has been an error";
  }

  private function _curl($url, $values, $token = array()) {

    $curl = curl_init($url);

    if(!empty($token)) {
      $token = array('Content-Type: application/json', 'Authorization: Bearer ' . $token);
      $values = json_encode($values);
    }
    else $values = http_build_query($values);

    $options = array(
      CURLOPT_HTTPHEADER => $token,
      CURLOPT_VERBOSE  => true,
      CURLOPT_RETURNTRANSFER  => true,
      CURLOPT_POSTFIELDS  => $values,
      CURLOPT_CUSTOMREQUEST  => "POST",
      CURLOPT_TIMEOUT  => 10
    );

    curl_setopt_array($curl, $options);
    $rep = curl_exec($curl);
    
    curl_close($curl);

    return json_decode($rep, true);
  }
}
