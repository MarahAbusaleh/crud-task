<?php

namespace App\Http\Controllers;

use App\DataTables\CompaniesDataTable;
use App\Models\Company;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CompaniesController extends Controller
{

    public function index(CompaniesDataTable $dataTables)
    {
        return $dataTables->render('Admin.companies.index');
    }



    public function create()
    {
        return view('Admin.companies.create');
    }


    public function store(Request $request)
    {
        // Data Validate
        $request->validate([
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email'],
            'website' => ['required'],
            'logo' => ['required', 'image', 'max:4192'],
        ]);

        //handle the image
        $relativeImagePath = null;
        if ($request->hasFile('logo')) {
            $newImageName = uniqid() . '-' . $request->input('name') . '.' . $request->file('logo')->extension();
            $relativeImagePath = 'assets/images/' . $newImageName;
            $request->file('logo')->move(public_path('assets/images'), $newImageName);
        }

        Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => $relativeImagePath,
        ]);

        Alert::success('success', 'Company Added Successfully');
        return redirect()->route('Company.index');
    }


    public function show(Company $companies)
    {
        //
    }


    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('Admin.companies.edit', compact('company'));
    }


    public function update(Request $request, $id)
    {
        // Data Validate
        $request->validate([
            'name' => ['max:20'],
            'email' => ['email'],
            'website' => ['string'],
            'logo' => ['image', 'max:4192'],
        ]);

        $data = $request->except(['_token', '_method']);

        //handle the image

        $relativeImagePath = null;
        if ($request->hasFile('logo')) {
            $newImageName = uniqid() . '-' . $request->input('name') . '.' . $request->file('logo')->extension();
            $relativeImagePath = 'assets/images/' . $newImageName;
            $request->file('logo')->move(public_path('assets/images'), $newImageName);
            $data['logo'] = $relativeImagePath;
        }

        Company::where('id', $id)->update($data);

        Alert::success('success', 'Company Updated Successfully');
        return redirect(route('Company.index'));
    }


    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
