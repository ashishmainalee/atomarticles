<?php

namespace App\Http\Controllers\Backend;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(8);
        return view('backend.messages.index')
                    ->with('messages', $messages);
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('backend.messages.show')
                    ->with('message', $message);
    }

    public function destroy($id)
    {
      $message = Message::findOrFail($id);
      $result = $message->delete();
      
      if($result) {
             session()->flash('success', 'Message deleted Successfully!');
        } else {
             session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.messages');
    }
}
