<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\CountryRequest;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Repositories\User\CountryRepository;
class CountryController extends Controller
{
    protected $countryRepository; // Khai báo biến để lưu trữ repository

    // Inject repository vào constructor
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Country = $this->countryRepository->getAll();
        return view("admin.pages.country.country_list", compact('Country'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.country.country_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {

        $Country = $this->countryRepository->create($request->all());
        if ($Country) {
            return redirect()->route('admin.country')->with('notification','Create Successful');
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
        $Country = $this->countryRepository->find($id);
        return view('admin.pages.country.country_edit', compact('Country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, string $id)
    {
        $result = $this->countryRepository->update($id,$request->all());
        if ($result) {
            return redirect()->route('admin.country')->with('notification','Update Successful');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = $this->countryRepository->find($id);
        if ($country){
            $this->countryRepository->delete($id);
            return redirect()->route('admin.country')->with('notification', 'Country deleted successfully');
        }else{
            return redirect()->route('admin.country')->with('notification', 'Country was deleted ');
        }
    }
}
