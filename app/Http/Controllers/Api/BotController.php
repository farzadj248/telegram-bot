<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TelegramUsers;
use App\Telegram\Telegram;

class BotController extends Controller
{

    protected  $telegram;

    public function __construct()
    {
        $this->telegram = new Telegram();
    }

    public function index()
    {
        return $this->getWebhookInfo();


        // $text = $this->telegram->Text();
        // $chat_id = $this->telegram->ChatID();
        // $data = $this->telegram->getData();
        // $callback_query = $this->telegram->Callback_Query();

        // if ($text == '/start') {
        //     $content = ['chat_id' => $chat_id, 'text' => 'Welcome to Test GameBot !'];
        //     $this->telegram->sendMessage($content);
        // }


        // $text = $telegram->Text();
        // $chat_id = $telegram->ChatID();

        // if ($text == '/start') {
        //     $option = [["\xF0\x9F\x90\xAE"], ['Git', 'Credit']];
        //     // Create a permanent custom keyboard
        //     $keyb = $this->telegram->buildKeyBoard($option, $onetime = false);
        //     $content = ['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Welcome to CowBot \xF0\x9F\x90\xAE \nPlease type /cowsay or click the Cow button !"];
        //     $this->telegram->sendMessage($content);
        // }

        // $this->enterYourMobileNumber();
        // return $this->enterYouullName();
        // return $this->getUsers();
        return $this->setMyWebhook();
        // return $this->deleteMyWebhook();
        // $this->sendMessage();
        // return $this->showMenu("546020319");

        // return $this->telegram->getMe();
    }

    public function test()
    {
        $token ="724612926:AAGg1QGAbOFNia4qRe9pMJ8D0c94NvLgnrw";
        $chat_id = '546020319';
        $message = 'Hello from PHP!';

        $api_url = 'https://api.telegram.org/bot'. $token;
        $ch = curl_init($api_url. '/sendMessage');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'chat_id' => $chat_id,
            'text' => $message
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, true);

        if ($response['ok']) {
            echo 'Message sent successfully!';
        } else {
            echo 'Error sending message: '. $response['description'];
        }
    }

    public function enterYourMobileNumber()
    {
        $chat_id = "546020319";
        $message = "شماره موبایل خود را وارد کنید.";
        return $this->sendMessage($chat_id ,$message);
    }

    public function enterYouullName()
    {
        $chat_id = "546020319";
        $message = "نام و نام خانوادگی خود را وارد کنید.";
        return $this->sendMessage($chat_id ,$message);
    }

    public function sendSponserList(){

    }

    public function getUsers()
    {
        $messages = $this->telegram->getUpdates();

        $result=[];
        if($messages['ok']){
            foreach ($messages['result'] as $key=>$value) {
                $new_user = $value['message']['from'];
                $result[]=$new_user;
                $user = TelegramUsers::where('user_id',$new_user['id'])->first();
                if(!$user) {
                    TelegramUsers::create([
                        "user_id" => $new_user['id'],
                        'first_name' => $new_user['first_name'] ?? '',
                        'last_name' => $new_user['last_name'] ?? '',
                        'username' => $new_user['username'] ?? '',
                        // 'mobile' => $new_user['mobile'],
                        // 'avatar' => $new_user['avatar'],
                        'is_bot' => $new_user['is_bot'] ?? false
                    ]);
                }
            }
        }

        // $telegram->getUserProfilePhotos(['user_id' => $user_id]);
       return response()->json([
            'success' => $messages['ok'],
            'data' => $result
       ]);
    }

    public function sendMessage($chat_id,$reply)
    {
        $content = ['chat_id' => $chat_id, 'text' => $reply];
        $messages = $this->telegram->sendMessage($content);

        return response()->json([
            'success' => $messages['ok'],
        ]);
    }

    public function showMenu($chat_id)
    {
        $option = array(
            array($this->telegram->buildKeyboardButton("free tour"), $this->telegram->buildKeyboardButton("3.point")),
            array($this->telegram->buildKeyboardButton("خرید اشتراک"), $this->telegram->buildKeyboardButton("لیست جوایز")),
            array($this->telegram->buildKeyboardButton("refferal"), $this->telegram->buildKeyboardButton("points")),
            array($this->telegram->buildKeyboardButton("swap")),
            array($this->telegram->buildKeyboardButton("حکم شرعی بازی")),
            array($this->telegram->buildKeyboardButton("راهنمایی"), $this->telegram->buildKeyboardButton("قوانین")),
        );

        $keyb = $this->telegram->buildKeyBoard($option, $onetime=false);
        $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb);
        $messages = $this->telegram->sendMessage($content);
        return response()->json([
            'success' => $messages['ok'],
        ]);
    }

    public function setMyWebhook()
    {
        $response = $this->telegram->setWebhook("https://65.21.100.130/api");
        return response()->json([
            'success' => $response['ok'],
            'message' => $response['description'] ?? ''
        ]);
    }

    public function deleteMyWebhook()
    {
        $response = $this->telegram->deleteWebhook();
        return response()->json([
            'success' => $response['ok'],
            'message' => $response['description'] ?? ''
        ]);
    }

    public function getWebhookInfo()
    {
        $token = '724612926:AAGg1QGAbOFNia4qRe9pMJ8D0c94NvLgnrw'; // Replace with your bot token

        $api_url = 'https://api.telegram.org/bot' . $token . '/getWebhookInfo';

        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);

        if ($response['ok']) {
            return $response['result'];
        } else {
            echo 'Error: ' . $response['description'];
        }
    }
}
