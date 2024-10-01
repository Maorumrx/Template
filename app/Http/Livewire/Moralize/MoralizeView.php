<?php

namespace App\Http\Livewire\Moralize;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Moralize;
use App\Models\Attachment;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use File;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MoralizeView extends Component
{
    use AuthorizesRequests, WithFileUploads;
    public $isOpen = 0;
    public $isDelete = 0;
    public $deleteid;
    public $isForm, $form_style, $isCreate,
        $isEdit, $showtable, $header_text, $delete_id, $audits;

    // moralize
    public $moralize;

    // Image
    public $image_file, $image_file_url, $gallery = [];
    public $inputFile = [], $attachfile = [], $file_id, $condit_2;

    // Rule
    public $rules, $messages;

    public $editid, $action;
    protected $listeners = ['edit', 'openDeleteModal'];
    protected $queryString = ['editid', 'action'];
    
    
    public function render()
    {
        $this->gallery = Moralize::query()
        ->leftjoin('attachments',function ($join){
            $join->on('moralizes.moralize_id','attachments.object_id')
            ->where('attachments.object_type', 'MORALIZE')
            ->where('attachments.deleted_at', null);
        })
        ->orderBy('moralizes.moralize_id', 'DESC')
        ->limit(9)
        ->get();
        // $this->gallery = attachment::where('object_type', 'MORALIZE')->orderby('file_type', 'desc')->get();
        return view('livewire.moralize.moralize-view');
    }
}
