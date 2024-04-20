<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Models\User;
use App\Http\Requests\User\UserRequest;
class UserController extends Controller
{
    protected $userRepository; // Khai báo biến để lưu trữ repository

    // Inject repository vào constructor
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = $this->userRepository->getAll();
        return view("admin.pages.user.user_list", compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Role = $this->userRepository->getRole();
        return view("admin.pages.user.user_create",compact('Role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = $this->userRepository->create($request->except('roles'));
        if ($user) {
            $roles = $request->input('roles', []); 
            $user->roles()->sync($roles);
            return redirect()->route('admin.user')->with('notification','Create Successful');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $User = $this->userRepository->find($id);
        if (!$User) {
            return redirect()->route('admin.user')->with('error', 'User not found');
        }
    
        $Role = $this->userRepository->getRole();
    
        return view("admin.pages.user.user_edit", compact('User', 'Role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = $this->userRepository->find($id);
        $result = $request->validated();

        $user->update([
            'full_name' => $result['full_name'],
            'gender' => $result['gender'],
            'phone_number' => $result['phone_number'],
            'birthdate' => $result['birthdate'],
            'address' => $result['address'],
        ]);
    
        if (isset($result['roles'])) {
            $user->roles()->sync($result['roles']);
        }
    
        return redirect()->route('admin.user')->with('notification', 'Update Successful');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->userRepository->find($id);
        if ($user){
            $this->userRepository->delete($id);
            return redirect()->route('admin.user')->with('notification', 'User deleted successfully');
        }else{
            return redirect()->route('admin.user')->with('notification', 'User was deleted ');
        }
      
    }
}
