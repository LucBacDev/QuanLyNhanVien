<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleRequest;
use App\Http\Requests\Role\Role_editRequest;
use Illuminate\Http\Request;
use App\Repositories\User\RoleRepository;
use App\Models\Role;

class RoleController extends Controller
{
    protected $roleRepository; // Khai báo biến để lưu trữ repository

    // Inject repository vào constructor
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Role = $this->roleRepository->getAll();
        return view("admin.pages.role.role_list", compact('Role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.role.role_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $user = $this->roleRepository->getAll();
        $role = $this->roleRepository->create($request->all());
        if ($role) {
            return redirect()->route('admin.role')->with('notification','Create Successful');
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
        $Role = $this->roleRepository->find($id);
        return view('admin.pages.role.role_edit', compact('Role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Role_editRequest $request, string $id)
    {
        $result = $this->roleRepository->update($id,$request->all());
        if ($result) {
            return redirect()->route('admin.role')->with('notification','Update Successful');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result  = $this->roleRepository->find($id);
        if($result){
        $this->roleRepository->delete($id);
        return redirect()->back()->with('notification','Cancellation Successful');
        }
    }
}
