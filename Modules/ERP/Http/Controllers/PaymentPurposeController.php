<?php

namespace Modules\ERP\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ERP\Entities\PaymentPurpose;

class PaymentPurposeController extends Controller
{
    public function store(Request $request)
    {
        return PaymentPurpose::create($request->all());
    }
}
