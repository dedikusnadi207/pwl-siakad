<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class FacultyController extends Controller
{
    public function index(Request $request)
    {
        $data = Faculty::firstOrNew(['id' => $request->id]);

        return view('admin.faculty.index', compact('data'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'short_name' => 'required|unique:faculties,short_name,'.$request->id.',id',
            'name' => 'required',
        ])->validate();
        Faculty::updateOrCreate(
            ['id' => $request->id],
            ['short_name' => $request->short_name, 'name' => $request->name],
        );

        return redirect('faculty')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = Faculty::find($id);
        if ($data) {
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(Faculty::query())
            ->addColumn('action', function ($data)
            {
                $url = url('faculty');
                return view('components.action', compact('data', 'url'));
            })
            ->make(true);
    }
}
