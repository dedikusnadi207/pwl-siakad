<?php

namespace App\Executors\Colleger;

use App\Contracts\ProfileInterface;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Profile implements ProfileInterface {

    private FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function view()
    {
        return view('colleger.account.profile');
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'nik' => 'required|numeric',
            'npwp' => 'nullable|numeric',
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'photo' => 'nullable|file|max:800'
        ])->validate();
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $colleger = $user->colleger;
        $colleger->nik = $request->nik;
        $colleger->npwp = $request->npwp;
        $colleger->name = $request->name;
        $colleger->birth_place = $request->birth_place;
        $colleger->birth_date = $request->birth_date;
        $colleger->email = $request->email;
        $colleger->telephone = $request->telephone;
        $colleger->photo = $this->fileService->upload($request->file('photo'), 'colleger');
        $colleger->save();

        return redirect('account/profile')->with('success', __('common.data_saved'));
    }
}
