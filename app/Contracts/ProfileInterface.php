<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface ProfileInterface {
    public function view();

    public function save(Request $request);
}
