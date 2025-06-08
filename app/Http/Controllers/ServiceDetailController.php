<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;

class ServiceDetailController extends Controller
{
    public function show($slug = null)
    {
        if ($slug) {
            $service = \App\Models\ServiceDetail::where('slug', $slug)->firstOrFail();
        } else {
            $service = \App\Models\ServiceDetail::first();
        }
        $allServices = \App\Models\ServiceDetail::all();

        return view('service-details', compact('service', 'allServices'));
    }
}
