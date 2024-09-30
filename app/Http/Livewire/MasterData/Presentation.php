<?php

namespace App\Http\Livewire\MasterData;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Announcement as AnnouncementM;
use App\Models\Attachment;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use File;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Presentation extends Component
{
    use AuthorizesRequests, WithFileUploads;
    public $isOpen = 0;
    public $isDelete = 0;
    public $deleteid;
    public $isForm, $form_style, $isCreate,
        $isEdit, $showtable, $header_text, $delete_id, $audits;

    // Announce
    public $announcement_id, $object_type, $announcement_header, $announcement_desc,
        $flag, $active;

    // Image
    public $image_file, $image_file_url, $gallery = [];
    public $inputFile = [], $attachfile = [], $file_id, $condit_2;

    // Rule
    public $rules, $messages;

    public $editid, $action;
    protected $listeners = ['edit', 'openDeleteModal'];
    protected $queryString = ['editid', 'action'];

    public function mount()
    {
        // $this->header_text = "ข้อมูลพนักงาน";
        $this->showtable = true;
        // if ($this->editid) {
        //     $this->edit($this->editid);
        // }
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.master-data.presentation.presentation');
    }

    public function loadData()
    {
        $this->gallery = attachment::where('object_type', 'PRESENTATION')->orderby('file_type', 'desc')->get();
    }

    private function resetInputFields()
    {
        $this->image_file = null;
        $this->image_file_url = null;
        $this->inputFile = [];
    }

    public function store()
    {
        DB::beginTransaction();
        try {
            if ($this->image_file) {

                $file_path_info = 'presentation';
                try {
                    foreach ($this->image_file as $item):
                        $file = $item;
                        $file_name = $file->hashName();
                        $file_type = $file->getClientOriginalExtension();
                        $file_size = $file->getSize();
                        $file_path = $file_path_info . '/' . $file_name;
                        $condit_1 = $file->getClientOriginalName();

                        Storage::put($file_path_info, $file);
                        $attach = new Attachment;
                        $attach->object_type = 'PRESENTATION';
                        $attach->object_id = 0;
                        $attach->file_name = $file_name;
                        $attach->file_type = $file_type;
                        $attach->file_size = $file_size;
                        $attach->file_path = $file_path;
                        $attach->condit_1 = $condit_1;
                        $attach->created_by = Auth::User()->id;
                        $attach->save();
                    endforeach;
                    // $attac = Attachment::where('object_id', $id)
                    //     ->where('object_type', 'ANNOUNCEMENT')
                    //     ->delete();
                    // $attac = new Attachment([
                    //     'object_id' => $id,
                    //     'object_type' => 'ANNOUNCEMENT',
                    //     'file_name' => $file_name,
                    //     'file_type' => $file_type,
                    //     'file_size' => $file_size,
                    //     'file_path' => $file_path,
                    //     'condit_1' => $condit_1,
                    // ]);
                    // $attac->save();
                    DB::commit();
                } catch (\Throwable $th) {
                    Storage::delete($file_path_info . '/' . $file_name);

                    session()->flash('error', $th . 'error updated.');
                    $this->dispatchBrowserEvent(
                        'toast',
                        [
                            'toast_type' => 'error',
                            'toast_msg' => $th->getMessage(),
                        ]
                    );
                    return;
                }
            }
            DB::commit();
            $this->loadData();
            toastr()->success('Data has been saved successfully!', 'Congrats');
            // session()->flash('success', 'Successfully updated.');
            // $this->dispatchBrowserEvent('toast', 
            // [
            //     'toast_type' => 'success',
            //     'toast_msg' => 'บันทึกข้อมูลสำเร็จ',
            // ]);
        } catch (\Throwable $th) {
            toastr()->error($th . 'Oops! Something went wrong!');
            // $this->dispatchBrowserEvent('toast', 
            // [
            //     'toast_type' => 'error',
            //     'toast_msg' => $th->getmessage(),
            // ]);
            DB::rollBack();
        }
    }

    public function edit()
    {
        $this->resetInputFields();
        $this->gallery = attachment::where('object_type', 'PRESENTATION')->orderby('file_type', 'desc')->get();
    }

    public function delete_img($id) 
    {
        if($id){
            $attm = attachment::find($id);
            $attm->delete();
            $this->loadData();
            toastr()->success('Data has been deleted successfully!', 'Congrats');
        }
    }
}
