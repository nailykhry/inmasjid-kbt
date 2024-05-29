<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{

    public function index(){
        $me = User::find(Auth::id());
        $users = User::get();
        $title = "Users Data";

        return view("admin.userList", compact('me', 'users', 'title'));
    }

    public function create(){
        return view('admin.createUser');
    }

    public function store(Request $request){

        try{
            $this->validate($request, [
                'role' => 'required|in:user,admin'
            ]);
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        try{
            if($request->input('role') == 'user'){
                $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'password' => ['required', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                    ],
                    'phone' => 'numeric',
                    'divisi' => 'required|in:Teknik,Operasional,Teknologi Informasi',
                    'cabang' => 'required|in:Terminal Nilam,Terminal Jamrud,Pelindo Subreg Jawa'
                ]);
            }
            else{
                $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'password' =>['required', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                    ],
                    'phone' => 'numeric',
                ]);
            }

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            $newUser            = new User();
            $newUser->email     = $request->email;
            $newUser->name      = $request->name;
            $newUser->username  = $request->username;
            $newUser->password  = Hash::make($request->password);
            $newUser->role      = $request->role;
            $newUser->phone     = $request->phone;
            $newUser->divisi    = $request->divisi;
            $newUser->cabang    = $request->cabang;
            $newUser->status    = "aktif";

            $newUser->save();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        return redirect('/admin/users')->with('success', 'Sukses menambahkan user');
    }

    public function edit($id){
        $user = User::find($id);

        return view('admin.editUser', compact('user'));
    }

    public function update($id, Request $request){
        $user = User::find($id);

        try{
            $this->validate($request, [
                'role' => 'required|in:user,admin'
            ]);
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        try{
            if($request->input('role') == 'user'){
                $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'phone' => 'numeric',
                    'password' => $request->filled('password') ? [ 'required', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                    ] : 'nullable',
                    'divisi' => 'required|in:Teknik,Operasional,Teknologi Informasi',
                    'cabang' => 'required|in:Terminal Nilam,Terminal Jamrud,Pelindo Subreg Jawa'
                ]);
            }
            else{
                $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'password' => $request->filled('password') ? [ 'required', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                    ] : 'nullable',
                    'phone' => 'numeric',
                ]);
            }

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            $user->email    = $request->email;
            $user->name     = $request->name;
            $user->username = $request->username;
            $user->password = $request->password ? Hash::make($request->password) : $user->password;
            $user->role     = $request->role;
            $user->phone    = $request->phone;
            $user->divisi   = $request->divisi;
            $user->cabang   = $request->cabang;
            $user->status   = $request->status ? 'aktif' : 'nonaktif';

            $user->save();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'invalid input!');
        }

        if (Auth::user()->role == 'admin') {
            return redirect('/admin/users')->with('success', 'Sukses memperbarui user');
        } else {
            return redirect()->back()->with('success', 'Sukses memperbarui user');
        }

    }

    public function destroy($id){
        $user = User::find($id);

        $user->delete();

        return redirect('/admin/users')->with('success', 'Sukses menghapus user');
    }

    public function downloadExcel(){
        return Excel::download(new ExportUser, now().'-users.xlsx');
    }
}
