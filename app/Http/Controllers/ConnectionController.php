<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hybridauth;
use App\Models\Connection;
use App\Models\FacebookPage;

class ConnectionController extends Controller
{

    public function get_api_config_of_facebook() {
        return [
            // Location where to redirect users once they authenticate with a provider
            'callback' => url()->current(),
            'keys' => [
                'id' => env('FACEBOOK_APP_ID'), // Required: your Facebook app id
                'secret' => env('FACEBOOK_APP_SECRET'),  // Required: your Facebook app secret,
                'scope' => 'email,pages_show_list,pages_read_engagement,pages_manage_posts,public_profile'
            ]
        ];
    }

    public function get_api_config_of_twitter() {
        return [
            // Location where to redirect users once they authenticate with a provider
            'callback' => url()->current(),
            'keys' => [
                'key' => env('TWITTER_CONSUMER_KEY'), // Required: your Twitter consumer key
                'secret' => env('TWITTER_CONSUMER_SECRET')  // Required: your Twitter consumer secret
            ]
        ];
    }

    public function connnect_with_facebook()
    {
        $config = $this->get_api_config_of_facebook();
        try{
            $adapter = new Hybridauth\Provider\Facebook($config); 

            $connection = new Connection;


            if ($connection->where('connection_type','facebook')->count() > 0) {

                $connection_data = $connection::where('connection_type','facebook')->first();
                $access_token = json_decode($connection_data->user_access_token_data)->access_token;
                $is_valid = validateFacebookAccessToken($access_token);

                if ($is_valid) {
                    $adapter->setAccessToken(json_decode($connection_data->user_access_token_data));
                } else {
                    $adapter->authenticate();
                    $facebook_user_id = json_decode(curl_get_file_contents('https://graph.facebook.com/me?fields=id&access_token='.$adapter->getAccessToken()['access_token']))->id;
                    $connection_data->connection_type = 'facebook';
                    $connection_data->user_id = $facebook_user_id;
                    $connection_data->user_access_token_data = json_encode($adapter->getAccessToken());
                    $connection_data->save();
                }
            } else {
                $adapter->authenticate();
                    $facebook_user_id = json_decode(curl_get_file_contents('https://graph.facebook.com/me?fields=id&access_token='.$adapter->getAccessToken()['access_token']))->id;
                $connection->connection_type = 'facebook';
                $connection->user_id = $facebook_user_id;
                $connection->user_access_token_data = json_encode($adapter->getAccessToken());
                $connection->save();
            }

            

            if ($adapter->isConnected()) {
                
                echo '  <html>
                        <head>
                            <title>Facebook Connected</title>
                        </head>
                        <body>
                            <p>Facebook is Successfully Connected. Closing the Window...</p>
                            <script>close();</script>
                        </body>
                        </html>';

            }

            // Getting All Pages Rows

            $pages = $adapter->getUserPages();
            
            $facebook_page = new FacebookPage;

            foreach ($pages as $page ) {
                $facebook_page->page_id = $page->id;
                $facebook_page->name = $page->name;
                $facebook_page->page_access_token = json_decode(curl_get_file_contents('https://graph.facebook.com/'.$page->id.'?fields=access_token&access_token='.$adapter->getAccessToken()['access_token']))->access_token;

                $facebook_page->save();

            }

        } catch(\Exception $e){
            echo 'Oops, we ran into an issue! ' . $e->getMessage();
        }
    }

    public function get_facebook_connected_pages()
    {
        $facebook_page = new FacebookPage;
        $rows = $facebook_page::all();

        $array = [];

        foreach($rows as $row) {
            $array[] = [
                'name' => $row['name'],
                'page_id' => $row['page_id'],
                'status' => $row['status'],
            ];
        }

        echo json_encode($array);
    }

    public function disconnnect_with_facebook()
    {
        $config = $this->get_api_config_of_facebook();
        $adapter = new Hybridauth\Provider\Facebook($config);

        if ($adapter->isConnected()) {
            $adapter->disconnect();
        }

        $connection = new Connection;
        $connection::where('connection_type','facebook')->delete();

        FacebookPage::truncate();
    }

    public function save_facebook_connection(Request $request)
    {
        $user_id = $request->post('user_id');
        $access_token = $request->post('access_token');
        $pages = json_decode($request->post('pages'),true);

        $connection = new Connection;

        $connection->connection_type = 'facebook';
        $connection->user_id = $user_id;
        $connection->user_access_token_data = json_encode($access_token);
        $connection->save();

        FacebookPage::truncate();
        foreach ($pages as $page ) {
            FacebookPage::create([
                'page_id' => $page['page_id'],
                'name' => $page['name'],
                'page_access_token' => $page['page_access_token']
            ]);

        }

        echo json_encode(['status'=>'success']);
    }

    public function is_facebook_connected() {

        $connection = new Connection;

        if ($connection->where('connection_type','facebook')->count() > 0) {
            echo json_encode(['status'=>'connected']);
        } else {
            echo json_encode(['status'=>'not-connected']);
        }
    }

    public function connect_with_twitter()
    {
        $config = $this->get_api_config_of_twitter();
        try{
            $adapter = new Hybridauth\Provider\Twitter($config); 

            $connection = new Connection;

            if ($connection->where('connection_type','twitter')->count() > 0) {
                $connection_data = $connection::where('connection_type','twitter')->first();
                $adapter->authenticate();

                $connection_data->user_access_token_data = json_encode($adapter->getAccessToken());
                $connection_data->save();
            } else {
                $adapter->authenticate();

                $connection->connection_type = 'twitter';
                $connection->user_access_token_data = json_encode($adapter->getAccessToken());
                $connection->save();
            }

            if ($adapter->isConnected()) {

                echo '  <html>
                        <head>
                            <title>Twitter Connected</title>
                        </head>
                        <body>
                            <p>Twitter is Successfully Connected. Closing the Window...</p>
                            <script>close();</script>
                        </body>
                        </html>';

            }

            // var_dump($adapter->setUserStatus(['status'=>'Tweet from Jannat Developer Website']));
                    
            // Disconnect the adapter (log out)
            // $adapter->disconnect();
        
        } catch(\Exception $e){
            echo 'Oops, we ran into an issue! ' . $e->getMessage();
        }
    }

    public function disconnect_with_twitter()
    {
        $config = $this->get_api_config_of_twitter();
        $adapter = new Hybridauth\Provider\Twitter($config);

        if ($adapter->isConnected()) {
            $adapter->disconnect();
        }
        $connection = new Connection;
        $connection::where('connection_type','twitter')->delete();
    }

    public function is_twitter_connected() {

        $connection = new Connection;

        if ($connection->where('connection_type','twitter')->count() > 0) {
            echo json_encode(['status'=>'connected']);
        } else {
            echo json_encode(['status'=>'not-connected']);
        }
    }

    public function update_facebook_connected_page_status(Request $request)
    {
        $page_id = $request->page_id;
        $status = $request->status;

        $facebook_page = FacebookPage::where('page_id',$page_id)->update([
            'status' => $status
        ]);

        echo json_encode(['status'=>'Facebook Connected Page Status Updated.']);
    }
}
