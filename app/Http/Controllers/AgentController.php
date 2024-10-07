<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdatePasswordRequest;

use App\Helpers\DataHelper;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Auth;

class AgentController extends Controller
{
    public function agentLogout()
    {
        Auth::logout();
		return redirect(url('/'));
    }
	
	public function changePassword($id) {
		$user=User::findOrFail($id);
		return view('agents.change-password', compact(['user']));
	}
	
	public function updatePassword(UpdatePasswordRequest $request,User $user) {
		
		if(!Hash::check($request->old_password, $user->password)) {
			return redirect()->back()->with(['error' => 'Invaild old password']);
		}
		
		$user->fill($request->all());
		$user->password = Hash::make($request->password);
		$user->save();
		
		return redirect(route('agent-home'))->with(['success' => 'Password updated successfully']);
	
	} 
}
