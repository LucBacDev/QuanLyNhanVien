<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Company\CompanyRepository;
class CompanyController extends Controller
{
    protected $companyRepository; // Khai báo biến để lưu trữ repository

    // Inject repository vào constructor
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Company = $this->companyRepository->getAll();
        return view("admin.pages.company.company_list", compact('Company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.company.company_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Company = $this->companyRepository->create($request->all());
        if ($Company) {
            return redirect()->route('admin.company')->with('notification','Create Successful');
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
        $Company = $this->companyRepository->find($id);
        return view('admin.pages.company.company_edit', compact('Company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = $this->companyRepository->update($id,$request->all());
        if ($result) {
            return redirect()->route('admin.company')->with('notification','Update Successful');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = $this->companyRepository->find($id);
        if ($company){
            $this->companyRepository->delete($id);
            return redirect()->route('admin.company')->with('notification', 'Company deleted successfully');
        }else{
            return redirect()->route('admin.company')->with('notification', 'Company was deleted ');
        }
    }
}
