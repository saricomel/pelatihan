<?php

namespace App\Http\Controllers;
use App\Models\umkm;
use App\Models\pembinaan;
use App\Models\User;

use Illuminate\Http\Request;

class dashbordcontroller extends Controller
{
    public function welcome()
    {
        $umkm = umkm::count();
        $pembinaan = pembinaan::count();
        $user = User::count();

        return view('dashboard',[
          
            "pembinaan"=> $pembinaan,
            "umkm"=> $umkm,
            "user"=> $user,
            "title"=>"dashboard"
        ]);
        
    }

    
}

