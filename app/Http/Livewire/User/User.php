<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserM;

class User extends Component
{
    use AuthorizesRequests;
    
    public $isCreate,$isDelete,$delete_id,$isEdit,$isChangePassword;
    public $roles, $permission=[] , $permission_name,$select_roles=[];
    public $role_name,$role_id;
    public $password,$email,$username,$name, $password_confirmation, $user_id, $gate, $TableLine,$dep_id;
    public $lock,$register,$verify,$active,$isDisabled,$branches=[],$select_branch=[];

    // Rule
    protected $user_rule, $user_edit_rule, $user_edit_password_rule, $messages ;

    protected $listeners = ['edit','openDeleteModal'];

    
    public function __construct()
    {
        parent::__construct();
        // dd();
        $this->user_rule = [
            'username' => 'required|regex:/^[a-zA-Z_\s\d]{4,}$/|unique:users',
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|confirmed|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,18}$/',
        ];
        $this->$user_edit_rule = [
            'username' => 'required|regex:/^[a-zA-Z_\s\d]{4,}$/',
            'email' => 'required|email',
            'name' => 'required',
        ];

        $this->$user_edit_password_rule = [
            'password' => 'required|confirmed|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,18}$/',
        ];
        $this->messages = [
            'password.required' => 'กรุณาระบุรหัสผ่าน',
            'password.confirmed' => 'Password และ Confirmation Password จำเป็นต้องมีค่าตรงกัน',
            'password.regex' => 'รหัสผ่านจำเป็นต้องเป็นภาษาอังกฤษ ขั้นต่ำแปดตัวอักษร มากสุดสิบแปดตัวอักษร ตัวพิมพ์ใหญ่อย่างน้อย 1 ตัว ตัวพิมพ์เล็กอย่างน้อย 1 ตัว และห้ามมี Space ในรหัสผ่าน ',
            'username.required' => 'กรุณาระบุชื่อผู้ใช้งาน',
            'username.unique' => 'มีชื่อผู้ใช้งานนี้ในระบบแล้ว',
            'email.unique' => 'มีชื่ออีเมลนี้ในระบบแล้ว',
        ];
    }

    public function mount()
    {
        $this->getRole();
    }

    public function render()
    {
        return view('livewire.user.user');
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
        $this->isCreate = true;
        $this->isDisabled = '';
        $this->isEdit = false;
        $this->lock = 0;
        $this->verify = 0;
        $this->dep_id = null;
        $this->active = 1;
        $this->select_roles= [];
        $this->user_id = '';
        $this->username = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->gate = 0;
    }

    public function store()
    {
        
        DB::beginTransaction();
        if($this->isEdit){     
            $this->validate($this->user_edit_rule);
            if($this->password){
                $this->validate($this->user_edit_password_rule);
            }
        }else{
            $this->validate($this->user_rule);          
        }
        try{
            $stmt = UserM::updateOrCreate([
                'user_id' => $this->user_id,
            ], 
            [
                'username' => $this->username,
                'name' => $this->name,
                'email' => $this->email,
                'lock' => $this->lock,
                'verify' => $this->verify,
                'active' => $this->active,
            ]);
            $stmt->save();
            if($this->password){
                $stmt->password =  Hash::make($this->password);
            }
            $id = $stmt->user_id;
            DB::commit();
            $this->edit($id);
            toastr()->success('Data has been saved successfully!', 'Congrats');
        } catch (\Throwable $th) {
            toastr()->error('Oops! Something went wrong!');
            DB::rollBack();
        }
    }

    public function edit($id)
    {
        $this->editid = $id;
        $this->resetValidation();
        $stmt = AnnouncementM::findOrFail($id);
        $this->announcement_id = $id;
        $this->object_type = $stmt->object_type;
        $this->announcement_header = $stmt->announcement_header;
        $this->announcement_desc = $stmt->announcement_desc;
        $this->flag = $stmt->flag;
        $this->active = $stmt->active;
        $this->audits = $stmt->audits;
        // $attc = $stmt->attachment()->where('object_type', 'ANNOUNCEMENT')->first();
        // if ($attc) {                
        //     $this->image_file_url = $attc->file_name;
        // }
        $this->gallery = $stmt->attachment()->where('object_type', 'ANNOUNCEMENT')->orderby('file_type','desc')->get();
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
            $stmt = AnnouncementM::findOrFail($this->deleteid);
            $stmt->delete();
            $this->emit('builder');
            $this->dispatchBrowserEvent('toast', 
            [
                'toast_type' => 'success',
                'toast_msg' => 'ลบข้อมูลสำเร็จ',
            ]);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatchBrowserEvent('toast', 
            [
                'toast_type' => 'error',
                'toast_msg' => 'พบข้อผิดพลาด ไม่สามารถลบข้อมูลได้',
             ]);
        }
    }
}
