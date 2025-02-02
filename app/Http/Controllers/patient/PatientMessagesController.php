<?php

namespace App\Http\Controllers\patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PatientMessagesController extends Controller
{
    
    public function index(){
        
        // Get the dentalclinic_id from the authenticated user
        $dentalclinicId = Auth::user()->dentalclinic_id;

        // Retrieve users (patients) from the same dental clinic, excluding the logged-in user
        $users = User::where('dentalclinic_id', $dentalclinicId)->where('id', '!=', auth()->id())->where('usertype', 'admin')->get();
        
        $usersWithLastMessage = $users->map(function ($user) {
            $lastMessage = Message::where(function ($query) use ($user) {
                $query->where('sender_id', auth()->id())
                      ->where('recipient_id', $user->id);
            })->orWhere(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                      ->where('recipient_id', auth()->id());
            })->latest()->first();

            $user->last_message = $lastMessage
                ? ($lastMessage->sender_id == auth()->id() ? 'You: ' : $user->name . ': ') . $lastMessage->message
                : 'No messages yet';

            return $user;
        });

        $messages = Message::all();

        return view('patient.messages.messages', compact('users', 'messages', 'usersWithLastMessage'));
    }

    public function storeMessage(Request $request){

        $request->validate([
            'recipient_id' => 'required|exists:users,id', // Ensure recipient exists in users table
            'message' => 'required|string',
        ]);

        // Create the message
        Message::create([
            'sender_id' => auth()->id(), // Assuming sender is the authenticated user
            'recipient_id' => $request->input('recipient_id'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('patient.messages')->with('success', 'Message sent successfully!');
    }
    
}