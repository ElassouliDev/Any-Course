<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
const API_KEY = "aXbFgk6erexPQUfkXTtqbYOFRiT6Nk";
const API_URL = "http://phplaravel-322091-987223.cloudwaysapps.com/";
const EMAIL = "dev.aliwaell@gmail.com";
class Deploy extends Controller
{

    /* examples
    const BranchName = "master";
    const GitUrl = "git@bitbucket.org:user22/repo_name.git";
    */
//Use this function to contact CW API
    function index()
    {
        function callCloudwaysAPI($method, $url, $accessToken, $post = [])
        {
            $baseURL = API_URL;
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

//Fetch Access Token
        $tokenResponse = callCloudwaysAPI('POST', '/oauth/access_token', null
            , [
                'email' => EMAIL,
                'api_key' => API_KEY
            ]);
        $accessToken = $tokenResponse->access_token;
        $gitPullResponse = callCloudWaysAPI('POST', '/git/pull', $accessToken, [
            'server_id' => '322091',
            'app_id' => '987223',
            'git_url' => 'https://github.com/gsglaravel/anycourse.git',
            'branch_name' => 'master'
            /* Uncomment it if you want to use deploy path, Also add the new parameter in your link
            'deploy_path' => $_GET['deploy_path']
            */
        ]);
        echo(json_encode($gitPullResponse));
    }
}
