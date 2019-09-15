<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Deploy extends Controller
{
    protected $config;

    function __construct()
    {
        $this->config = [
            'api_key' => 'aXbFgk6erexPQUfkXTtqbYOFRiT6Nk',
            'api_url' => "https://api.cloudways.com/api/v1",
            'email' => 'tshaqalaih@mercycorps.org',
            'server_id' => '322091',
            'application_id' => '987223', // change this
            'branch' => 'master',
            'repository' => 'git@github.com:gsglaravel/anycourse.git' // change this
        ];
    }

    function index()
    {
//Fetch Access Token
        $tokenResponse = $this->_callCloudwaysAPI('POST', '/oauth/access_token', null
            , [
                'email' => $this->config['email'],
                'api_key' => $this->config['api_key']
            ]
        );
        $accessToken = $tokenResponse->access_token;
        $gitPullResponse = $this->_callCloudwaysAPI('POST', '/git/pull', $accessToken, [
            'server_id' => $this->config['server_id'],
            'app_id' => $this->config['application_id'],
            'git_url' => $this->config['repository'],
            'branch_name' => $this->config['branch']
            /* Uncomment it if you want to use deploy path, Also add the new parameter in your link
            'deploy_path' => $_GET['deploy_path']
            */
        ]);
        echo(json_encode($gitPullResponse));
    }

//Use this function to contact CW API
    private function _callCloudwaysAPI($method, $url, $accessToken, $post = [])
    {
        $baseURL = $this->config['api_url'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_URL, $baseURL . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Set Authorization Header
        if ($accessToken) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $accessToken]);
        }
//Set Post Parameters
        $encoded = '';
        if (count($post)) {
            foreach ($post as $name => $value) {
                $encoded .= urlencode($name) . '=' . urlencode($value) . '&';
            }
            $encoded = substr($encoded, 0, strlen($encoded) - 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpcode != '200') {
            die('An error occurred code: ' . $httpcode . ' output: ' . substr($output, 0, 10000));
        }
        curl_close($ch);
        return json_decode($output);
    }
}
