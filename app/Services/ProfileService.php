<?php

namespace App\Services;

use App\Contracts\ProfileInterface;
use App\Executors\Admin\Profile as AdminProfile;
use App\Executors\Colleger\Profile as CollegerProfile;
use App\Executors\Lecturer\Profile as LecturerProfile;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileService {

    private ProfileInterface $profile;
    private AdminProfile $adminProfile;
    private LecturerProfile $lecturerProfile;
    private CollegerProfile $collegerProfile;

    public function __construct(
        AdminProfile $adminProfile,
        LecturerProfile $lecturerProfile,
        CollegerProfile $collegerProfile
    ) {
        $this->adminProfile = $adminProfile;
        $this->lecturerProfile = $lecturerProfile;
        $this->collegerProfile = $collegerProfile;
    }

    public function init(User $user)
    {
        if ($user->isAdmin()) {
            $this->profile = $this->adminProfile;
        } elseif ($user->isLecturer()) {
            $this->profile = $this->lecturerProfile;
        } elseif ($user->isColleger()) {
            $this->profile = $this->collegerProfile;
        }
    }

    public function view()
    {
        return $this->profile->view();
    }

    public function save(Request $request)
    {
        return $this->profile->save($request);
    }

    public function changePassword(Request $request)
    {
        Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ])->validate();
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect('account/profile')->with('error', __('auth.old_password_doesnt_match'));
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        Auth::logout();

        return redirect('/');
    }
}
