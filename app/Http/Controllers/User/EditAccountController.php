<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditAccountRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class EditAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = 'Tài khoản';
        $user = Auth::user();
        return view('user.pages.editaccount', compact('user', 'title'));
    }

    public function update(EditAccountRequest $request)
    {
        $data = $request->validated();
    
        if (isset($data['new_password'])) {
            $data['password'] = Hash::make($data['new_password']);
        }
        unset($data['new_password']);
        $user = Auth::user();
        $user->update($data);
        return redirect()->back()->with('successMsg', 'Cập nhật tài khoản thành công');
    }
}
