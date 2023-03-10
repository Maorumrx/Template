<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Announcement;
use App\Models\Attachment;
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
    public $image_file, $image_file_url, $gallery = [];
    public $inputFile = [], $attachfile = [], $file_id, $condit_2;

    public $editid, $action;
    protected $listeners = ['directory', 'openDeleteModal'];
    protected $queryString = ['editid', 'action'];

    public function mount()
    {
        $this->header_text = "";
        // $this->showtable = true;
        $this->announcement = Announcement::query()
            ->where('active',1)
            ->orderby('flag','desc')
            ->orderby('created_at','desc')
            ->get();
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
