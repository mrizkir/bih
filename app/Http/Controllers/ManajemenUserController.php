<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManajemenUserController extends Controller
{
    public function iuIndex()
    {
      
      $data = User::orderBy('id', 'desc')->get();

      return view('admin.manajemen.user_tampil', [
        'title' => 'Manajemen User', 
        'sumber' => 'Admin',   
        'data' => $data
      ]);
    }
    public function iustore(Request $request)
    { 
      // return $request;
      $hasilvalidnya = $request->validate(
        [
            'name' => 'required|max:300',
            'username' => 'required|max:300',
            'password' => 'required', 
            'email' => 'required', 
        ]);

        if ($request->file('foto')) {
            $hasilvalidnya['foto'] = $request->file('foto')->store('img_user');
        } 

        $hasilvalidnya['name'] = $request->name;
        $hasilvalidnya['username'] = $request->username;  
        $hasilvalidnya['password'] = Hash::make($hasilvalidnya['password']); 
        $hasilvalidnya['nomor_hp'] = $request->nomor_hp;
        $hasilvalidnya['email'] = $request->email;
        $hasilvalidnya['theme'] = 'default';
        $hasilvalidnya['isdeleted'] = 0;        
        $hasilvalidnya['active'] = 1;
        $hasilvalidnya['defult_role'] = $request->defult_role;
       
        return dd($hasilvalidnya);
        User::create($hasilvalidnya);
    
        return redirect(route('user-iu.index'))->with('success', 'data berhasil disimpan');
    }

}
