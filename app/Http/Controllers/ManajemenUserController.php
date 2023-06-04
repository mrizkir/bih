<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Spatie\Permission\Models\Role;

class ManajemenUserController extends Controller
{
    public function iuIndex()
    {       
      $data = User::orderBy('id', 'desc')->get();

      $daftar_role = Role::get()
      ->pluck('name', 'name')
      ->prepend('PILIH LEVEL', '')
      ->toArray();
      
      return view('admin.manajemen.user_tampil', [
        'title' => 'Manajemen User', 
        'menu_active' => 'menu-manajemen-user',
        'sub_menu_active' => 'none',
        'page_active' => 'manajemen-user',
        'sumber' => 'Admin',   
        'data' => $data,
        'daftar_role' => $daftar_role,
      ]);
    }
    public function iuStore(Request $request)
    { 
      return $request->defult_role;
      $data = $request->validate(
        [
            'name' => 'required|max:300',
            'username' => 'required|max:300',
            'password' => 'required', 
            'email' => 'required', 
            'foto' => 'required | image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

     
        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('img_user');
        } 
   
        $data['name'] = $request->name;
        $data['username'] = $request->username;  
        $data['password'] = Hash::make($data['password']); 
        $data['nomor_hp'] = $request->nomor_hp;
        $data['email'] = $request->email;
        $data['theme'] = 'default';
        $data['isdeleted'] = 0;        
        $data['active'] = 1; 
        $data['default_role'] = $request->default_role; 
       
        $user = User::create($data);
        $user->assignRole($request->default_role);

        return redirect(route('user-iu.index'))->with('success', 'data berhasil disimpan');
    }

}
