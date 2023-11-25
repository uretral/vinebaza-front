<?php

namespace App\Admin\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Models\Donors\Donor;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Layout\Content;
use Livewire\Attributes\On;

class VivinoVController extends Controller
{
    use HasResourceActions;

    public function index(Content $content): Content
    {
        return $content->view('admin.v', [
            'donors' => Donor::with('links')->get()->keyBy('id')->toJson()
        ]);
    }

}


