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
        $activeUrl = url('class');

        return view('admin.class.index', compact('data', 'activeUrl'));
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
                $url = url('class');
                return view('components.action', compact('data', 'url'));
            })
            ->make(true);
    }
}
