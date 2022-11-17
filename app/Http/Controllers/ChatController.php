<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
  public function save_message(Request $request)
  {

    $message = $request->get('message');
    // echo $message;

    $options = array(
      'cluster' => 'ap1',
      'useTLS' => false
    );
    $pusher = new \Pusher\Pusher(
      'cd9486769166e387ebfe',
      '9fed67a67aa4bf25bd3a',
      '1505749',
      $options
    );

    $data['message'] = $message;
    $pusher->trigger('chat_support', 'send_message', $data);
  }

  public function index()
  {
    return view('page_admin.trang_chat_support');
  }


  public function message_turn_off(Request $request)
  {

    $message = $request->get('message');
    // echo $message;

    $options = array(
      'cluster' => 'ap1',
      'useTLS' => false
    );
    $pusher = new \Pusher\Pusher(
      'cd9486769166e387ebfe',
      '9fed67a67aa4bf25bd3a',
      '1505749',
      $options
    );

    $data['message'] = $message;
    $pusher->trigger('chat_support', 'close_popup_admin', $data);
  }

}