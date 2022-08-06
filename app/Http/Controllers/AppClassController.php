<?php

namespace App\Http\Controllers;

use App\AppClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class AppClassController extends Controller
{
    public function index(Request $request)
    {
        $data = AppClass::firstOrNew(['id' => $request->id]);

        return view('admin.class.index', compact('data'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
        ])->validate();
        AppClass::updateOrCreate(
            ['id' => $request->id],
            ['name' => $request->name, 'type' => $request->type],
        );

        return redirect('class')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = AppClass::find($id);
        if ($data) {
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(AppClass::query())
            ->addColumn('action', function ($data)
            {
                return view('admin.class.action',compact('data'));
            })
            ->make(true);
    }

}
