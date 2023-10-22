<?php

namespace App\Admin\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Models\Donors\Donor;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Layout\Content;

class VivinoCheckerController extends Controller
{
    use HasResourceActions;
    public function index(Content $content)
    {
        $donors = Donor::with('links')->get()->keyBy('id')->toJson();
        return $content->body("<vivino-checker :donors='".$donors."'/>");
    }

}


