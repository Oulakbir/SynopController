<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
class UserManagementController extends Controller
{
    // index page
    public function index()
    {
        $user_table = User::all();
        return view('usertable', compact('user_table'));
    }

    // update record
    public function updateRecord(Request $request)
    {   
        //dd($request->user_id,$request->name,$request->email);
        DB::beginTransaction();
        try {

            $updateRecord = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            User::where("id", $request->user_id)->update($updateRecord);
            Toastr::success('Updated user successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)', 'Error');
            return redirect()->back();
        }
    }

    /** delete record */
    public function deleteRecord(Request $request)
    {
        try {

            User::destroy($request->id);
            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)', 'Error');
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('post');
    }
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Créer un nouvel utilisateur
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Rediriger l'administrateur vers la page de liste des utilisateurs ou une autre page de confirmation
        return redirect()->route('user/table')->with('success', 'User created successfully!');
    }

}