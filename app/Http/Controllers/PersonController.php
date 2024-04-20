<?php

namespace App\Http\Controllers;

use App\Http\Requests\Person\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\PersonRepository;
use App\Http\Requests\Person\PersonRequest;
use Auth;
use App\Models\Company;

class PersonController extends Controller
{
    protected $personRepository; // Khai báo biến để lưu trữ repository
    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.person.login_admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Company = $this->personRepository->getCompany();
        return view('admin.pages.person.register', compact('Company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        $person = $this->personRepository->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_id' => $request->company_id
        ]);
        return redirect()->route('admin.login')->with('login_success', 'Sign Up Success !');

    }

    public function PostloginAdmin(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->with('notification', 'Login unsuccessful !');
        }
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function list_person()
    {
        $Person = $this->personRepository->getAll();
        $Company = $this->personRepository->getCompany();
        return view('admin.pages.person.person_list', compact('Person','Company'));
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
        $Person = $this->personRepository->find($id);
        $Company = $this->personRepository->getCompany();
        return view('admin.pages.person.person_edit', compact('Person','Company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChangePasswordRequest $request, string $id)
    {

        $Person = $this->personRepository->find($id);
        if (!$Person || !Hash::check($request->password_old, $Person->password)) {
            return redirect()->back()->with('notification', 'Incorrect password old');
        }
        if ($request->filled('password')) {
            $request->merge(['password' => Hash::make($request->password)]);
        }
        $result = $this->personRepository->update($id, $request->all());
        if ($result) {
            return redirect()->route('admin.account')->with('notification', 'Update Successful');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result  = $this->personRepository->find($id);
        if($result){
        $this->personRepository->delete($id);
        return redirect()->back()->with('notification','Cancellation Successful');
        }
    }
}
