<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Announcement;
use App\Models\Attachment;
use App\Models\Moralize;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use File;
use Image;
use DB;
use Auth;
class Dashboard extends Component
{
    use AuthorizesRequests, WithFileUploads;
    public $isOpen = 0;
    public $isDelete = 0;
    public $isForm, $form_style, $isCreate, $announcement, $directory,
        $isEdit, $showtable, $header_text, $delete_id, $audits;

    // Announcement
    public $announcement_id, $object_type, $announcement_header, $announcement_desc,
        $flag, $active;

    // Image
    public $image_file, $image_file_url, $gallery = [], $Image_gallery = [];
    public $inputFile = [], $attachfile = [], $file_id, $condit_2;

    public $editid, $action;
    protected $listeners = ['directory', 'openDeleteModal'];
    protected $queryString = ['editid', 'action'];

    public function mount()
    {
        $this->header_text = "";
        // $this->showtable = true;
        $this->announcement = Announcement::query()
            ->with('attachment_img')
            ->where('announcements.active',1)
            ->orderby('announcements.flag','desc')
            ->orderby('announcements.created_at','desc')
            ->get();
        $this->gallery = Moralize::query()
        ->leftjoin('attachments', function ($join) {
            $join->on('moralizes.moralize_id', 'attachments.object_id')
            ->where('attachments.object_type', 'MORALIZE')
            ->where('attachments.deleted_at', null);
        })
        ->orderBy('moralizes.moralize_id', 'DESC')
        ->limit(3)
        ->get();
        $this->Image_gallery = Attachment::where('object_type', 'PRESENTATION')->whereIn('file_type',['png','jpg'])->orderby('file_type', 'desc')->limit(5)->get()->toArray();

    }

    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }

    public function isEdit()
    {
        $this->isEdit = true;
        $this->isCreate = false;
        $this->showtable = false;
        $this->isForm = true;
    }

    public function directory()
    {
        $this->directory = true;
        $this->isForm = false;
    }

    public function back()
    {
        $this->isForm = false;
        
        // $this->resetInputFields();
        // $this->resetValidation();
        $this->emit('builder');
    }

    public function detail($id)
    {
        $stmt = Announcement::find($id);
        $this->announcement_header = $stmt->announcement_header;
        $this->announcement_desc = $stmt->announcement_desc;
        $this->flag = $stmt->flag;
        $this->gallery = $stmt->attachment()->where('object_type', 'ANNOUNCEMENT')->orderby('file_type', 'desc')->get();
        // dd($this->gallery);
        $this->isEdit();
    }
}
