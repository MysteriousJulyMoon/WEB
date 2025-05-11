<?php
class ApiClient 
{
    private string $Url;
    private string $authHeader;

    public function __construct(string $baseUrl, string $username, string $password) 
    {
        $this->Url = rtrim($baseUrl, '/');
        $credentials = base64_encode("$username:$password");
        $this->authHeader = "Authorization: Basic $credentials";
    }

    private function request(string $method, string $endPoint, ?array $data = null) 
    {
        $url = $this->Url . '/' . ltrim($endPoint, '/');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [$this->authHeader, 'Content-Type: application/json']);

        if ($data !== null) 
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['status' => $code, 'error' => $error ?: null, 'body' => json_decode($response, true)];
    }

    public function get(string $endpoint) 
    {
        return $this->request('GET', $endpoint);
    }
    public function put(string $endpoint, array $data) 
    {
        return $this->request('PUT', $endpoint, $data);
    }
    public function post(string $endpoint, array $data) 
    {
        return $this->request('POST', $endpoint, $data);
    }    
    public function delete(string $endpoint) 
    {
        return $this->request('DELETE', $endpoint);
    }
}
?>