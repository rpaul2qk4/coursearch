<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Helpers\DataHelper;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		//$this->authorize('index', User::class);
        $users=User::all();
		return view('users.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		//$this->authorize('create', User::class);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminUserRequest $request)
    {
		//$this->authorize('store', User::class);
		
		try{	
				$user = new User();
				$user->fill($request->all());		
				$user->password = Hash::make('abcd1234');	
				$user->status = 'Active';		
				
				if ($request->file('photo')) {
					
					$fileType = $_FILES['photo']['type'];
			
					$fileActualExt = explode('/',$fileType);
					$allowed = array('jpeg','jpg','png');

					if(!in_array($fileActualExt[1],$allowed)){
						return redirect()->back()->with('error','Please upload image jpg/jpeg/png types only!'); 
					} 
					
					$user->photo = $request->file('photo')->store('user_photos','public');		
				} 
				
				$user->save();
			} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('users.index'))->with(['error' => 'Email id is already exists!!']);
				}
			}
        return redirect(route('users.index'))->with(['success'=>'1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
		//$this->authorize('view', User::class);
		$user=User::findOrFail($id);
        return view('users.show',compact(['user']));
    }  
	/**
     * Display the specified resource.
     */
    public function profile($id)
    {		
		$user=User::findOrFail($id);
		if ($user->id != auth()->user()->id) {
			return redirect()->back()->with(['error'=>'Sorry! You don\'t have permission to access on this server.']);
			//abort(403);
		}
        return view('users.profile',compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
		$user=User::findOrFail($id);
		$states=State::where('country_id',$user->country_id)->get()->pluck('state','id')->prepend('Select');
        return view('users.edit',compact(['user','states']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function profileEdit($id)
    {
		$user=User::findOrFail($id);
		if ($user->id != auth()->user()->id) {
			return redirect()->back()->with(['error'=>'Sorry! You don\'t have permission to access on this server.']);
			//abort(403);
		}
        return view('users.profile-edit',compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
		//$this->authorize('update', User::class);
		
		$user=User::findOrFail($id);
    
		if ($request->file('photo')) {
			
			if(!empty($user->photo)){
			
				$path=explode('/',$user->photo);
				//p($path);
				if(file_exists($path[1])){
					
					unlink($path[1]);
				}
			} 
			$user->fill($request->all());	
			$fileType = $_FILES['photo']['type'];
	
			$fileActualExt = explode('/',$fileType);
			
			$allowed = array('jpeg','jpg','png');

			if(!in_array($fileActualExt[1],$allowed)){
				return redirect()->back()->with('error','Please upload image jpg/jpeg/png types only!'); 
			} 
			  
			$user->photo = $request->file('photo')->store('user_photos','public');		
		
		}else{
			$user->fill($request->all());	
		}
		
		$user->save();
		
        return redirect(route('users.index'))->with(['success'=>'1 Record updated successfully!']);
    } 
	
	/**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request, $id)
    {
		
		$user=User::findOrFail($id);
		if ($user->id != auth()->user()->id) {
			return redirect()->back()->with(['error'=>'Sorry! You don\'t have permission to access on this server.']);
			abort(403);
		}
		if ($request->file('photo')) {
			
			if(!empty($user->photo)){
			
				$path=explode('/',$user->photo);
				//p($path);
				if(file_exists($path[1])){
					
					unlink($path[1]);
				}
			} 
			$user->fill($request->all());	
			$fileType = $_FILES['photo']['type'];
	
			$fileActualExt = explode('/',$fileType);
			
			$allowed = array('jpeg','jpg','png');

			if(!in_array($fileActualExt[1],$allowed)){
				return redirect()->back()->with('error','Please upload image jpg/jpeg/png types only!'); 
			} 
			  
			$user->photo = $request->file('photo')->store('user_photos','public');		
		
		}else{
			$user->fill($request->all());	
		}
		
		$user->save();
		
        return redirect(route('users.profile',$user->id))->with(['success'=>'1 Record updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
      
		/* if(!empty($user->photo)){
			
			$path=explode('/',$user->photo);
			
			if(file_exists($path[1])){
				
				unlink($path[1]);
			}
		} */
		
		$user->delete();
		
        return redirect(route('users.index'))->with(['success'=>'1 Record deleted successfully!']);

    }
	
	public function login(Request $request)
    {
		
        $credentials = $request->only('email', 'password');
		
		//p($credentials);
        
		if (Auth::attempt($credentials)) {				
				if(!strcmp(Auth::user()->role->role,'Admin'))
					return redirect(route('home'));	
				else if(!strcmp(Auth::user()->role->role,'User')){
					if(!Auth::user()->flag){
						Auth::logout();
						return redirect(url('/'))->with(['error' => 'Temporarily out of service!']);
					}else{
						return redirect(route('user-home'));
					}							
				}else
					return redirect(route('agent-home'));			
        } else {
            // Authentication failed
            return redirect(url('/'))->with(['error' => 'Invalid credentials']);
        }
    } 
	
    public function userLogout()
    {
        Auth::logout();
		return redirect(url('/'));
    }
	
	
	public function register(Request $request) {
		
		 $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'mobile' => 'required|min:10|max:10',
            'role_id' => '',
            'password' => 'required|min:8|confirmed'
        ]);
//p($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role_id' => 2,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('user-home')
        ->withSuccess('You have successfully registered & logged in!');
	}
	
	public function changePassword($id) {
		$user=User::findOrFail($id);
		if ($user->id != auth()->user()->id) {
			return redirect()->back()->with(['error'=>'Sorry! You don\'t have permission to access / on this server.']);
			//abort(403);
		}
		return view('users.change-password', compact(['user']));
	}
	
	public function updatePassword(UpdatePasswordRequest $request,$id) {
		$user=User::findOrFail($id);
		if ($user->id != auth()->user()->id) {
			return redirect()->back()->with(['error'=>'Sorry! You don\'t have permission to access on this server.']);
			abort(403);
		}
		if(!Hash::check($request->old_password, $user->password)) {
			return redirect()->back()->with(['error' => 'Invaild old password']);
		}
		
		$user->fill($request->all());
		$user->password = Hash::make($request->password);
		$user->save();
		
		return redirect(route('home'))->with(['success' => 'Password updated successfully']);
	
	} 
	
	public function permission($id,$flag)
    {
		$user=User::findOrFail($id);
		$user->flag=$flag;
		$user->save();
		if($flag){
			$msg='Permitted the account of Mr/Mrs. '.$user->name;
		}else{
			$msg='Stopped the account of Mr/Mrs.'.$user->name;
		}
        return redirect(route('users.index'))->with(['success'=>$msg]);
 
    }
}
