<?php

namespace App\Http\Livewire\MasterData;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Moralize as MoralizeM;
use App\Models\Attachment;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use File;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Moralize extends Component
{
    use AuthorizesRequests, WithFileUploads;
    public $isOpen = 0;
    public $isDelete = 0;
    public $deleteid;
    public $isForm, $form_style, $isCreate,
        $isEdit, $showtable, $header_text, $delete_id, $audits;

    // Announce
    public $moralize_id, $moralize_name, $moralize_desc;

    // Image
    public $image_file, $image_file_url, $gallery = [];
    public $inputFile = [], $attachfile = [], $file_id, $condit_2;

    // Rule
    public $rules, $messages;

    public $editid, $action;
    protected $listeners = ['edit', 'openDeleteModal'];
    protected $queryString = ['editid', 'action'];

    public function __construct()
    {
        parent::__construct();
        $this->rules = [
            'moralize_name' => 'required',
            'moralize_desc' => 'required',
        ];

        $this->messages = [
            'moralize_name.required' => 'กรุณาระบุชิ่อ',
            'moralize_desc.required' => 'กรุณาระบุรายละเอียด',
        ];
    }

    public function mount()
    {
        $this->header_text = "ข้อมูลพนักงาน";
        // $this->showtable = true;
        if ($this->editid) {
            $this->edit($this->editid);
        }
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.master-data.moralize.moralize');
    }



    public function loadData()
    {
        $this->inputFile = [];
        $this->attachfile = Attachment::where('object_type', 'MORALIZE')
        ->where('object_id', $this->moralize_id)
        ->get();
    }

    public function create()
    {
        $this->isCreate();
        $this->resetInputFields();
        $this->resetValidation();
    }

    public function isCreate()
    {
        $this->isCreate = true;
        $this->isEdit = false;
        $this->showtable = false;
        $this->editid = null;
        $this->isForm = true;
    }

    public function isEdit()
    {
        $this->isEdit = true;
        $this->isCreate = false;
        $this->showtable = false;
        $this->isForm = true;
    }

    public function back()
    {
        $this->isForm = false;
        $this->resetInputFields();
        $this->resetValidation();
        $this->emit('builder');
    }

    private function resetInputFields()
    {
        $this->moralize_id = null;
        $this->moralize_name = null;
        $this->moralize_desc = null;
        $this->editid = null;

        $this->image_file = null;
        $this->image_file_url = null;
        $this->inputFile = [];
    }
    public function store()
    {
        DB::beginTransaction();
        $this->validate($this->rules);
        try {
            $stmt = MoralizeM::updateOrCreate(
                [
                    'moralize_id' => $this->moralize_id,
                ],
                [
                    'moralize_name' => $this->moralize_name,
                    'moralize_desc' => $this->moralize_desc,
                ]
            );
            $stmt->save();
            $id = $stmt->moralize_id;
            if ($this->image_file) {
                $file_path_info = 'moralize';
                try {
                    foreach ($this->image_file as $item):
                        // dd($this->image_file);
                        $file = $item;
                        $file_name = $file->hashName();
                        $file_type = $file->getClientOriginalExtension();
                        $file_size = $file->getSize();
                        $file_path = $file_path_info . '/' . $file_name;
                        $condit_1 = $file->getClientOriginalName();
                        Storage::put($file_path_info, $file);
                        $attach = new Attachment;
                        $attach->object_type = 'MORALIZE';
                        $attach->object_id = $id;
                        $attach->file_name = $file_name;
                        $attach->file_type = $file_type;
                        $attach->file_size = $file_size;
                        $attach->file_path = $file_path;
                        $attach->condit_1 = $condit_1;
                        $attach->created_by = Auth::User()->id;
                        $attach->save();
                    endforeach;
                    $attac = Attachment::where('object_id', $id)
                        ->where('object_type', 'MORALIZE')
                        ->delete();
                    $attac = new Attachment([
                        'object_id' => $id,
                        'object_type' => 'MORALIZE',
                        'file_name' => $file_name,
                        'file_type' => $file_type,
                        'file_size' => $file_size,
                        'file_path' => $file_path,
                        'condit_1' => $condit_1,
                    ]);
                    $attac->save();
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
            $this->edit($id);
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

    public function edit($id)
    {
        $this->editid = $id;
        $this->resetValidation();
        $stmt = MoralizeM::findOrFail($id);
        $this->moralize_id = $id;
        $this->moralize_name = $stmt->moralize_name;
        $this->moralize_desc = $stmt->moralize_desc;
        $this->audits = $stmt->audits;
        // $attc = $stmt->attachment()->where('object_type', 'ANNOUNCEMENT')->first();
        // if ($attc) {                
        //     $this->image_file_url = $attc->file_name;
        // }
        $this->gallery = $stmt->attachment()->where('object_type', 'MORALIZE')->orderby('file_type', 'desc')->get();
        $this->loadData();
        $this->isEdit();
    }

    public function openDeleteModal($id)
    {
        $this->deleteid = $id;
        $this->dispatchBrowserEvent('modal-delete', []);
    }

    public function delete_modal_confirm()
    {
        try {
            $stmt = MoralizeM::findOrFail($this->deleteid);
            $stmt->delete();
            $this->emit('builder');
            $this->dispatchBrowserEvent(
                'toast',
                [
                    'toast_type' => 'success',
                    'toast_msg' => 'ลบข้อมูลสำเร็จ',
                ]
            );
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatchBrowserEvent(
                'toast',
                [
                    'toast_type' => 'error',
                    'toast_msg' => 'พบข้อผิดพลาด ไม่สามารถลบข้อมูลได้',
                ]
            );
        }
    }
}
