<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = User::orderByDesc('id');
        foreach (['id', 'status', 'is_admin'] as $field) {
            $request->whenFilled($field, function ($value) use ($query, $field) {
                $query->where($field, $value);
            });
        }
        foreach (['name', 'email'] as $field) {
            $request->whenFilled($field, function ($value) use ($query, $field) {
                $query->where($field, 'like', "%{$value}%");
            });
        }
        $users = $query->paginate(15);
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.pages.user.info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse 
     */
    public function store(UserStoreRequest $request): RedirectResponse 
    {
        $user = $request->validated();
        if (User::create($user)) {
            return redirect()->back()->with('successMsg', 'User created successfully');
        }
        return redirect()->back()->withErrors('User creation failed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('admin.pages.user.info', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserEditRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse 
     */
    public function update(UserEditRequest $request, User $user): RedirectResponse
    {
        // dd($request->validated());
        if ($user->update($request->validated())) {
            return redirect()->back()->with('successMsg', 'User updated successfully');
        }
        return redirect()->back()->withErrors('User update failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();
        } catch (\Exception $e) {
            return $this->fail('Không thể xoá: ' . $e->getMessage());
        }
        return $this->success('Đã xoá thành công');
    }
}
