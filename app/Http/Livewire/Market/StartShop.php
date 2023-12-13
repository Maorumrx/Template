<?php

namespace App\Http\Livewire\Market;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Announcement as AnnouncementM;
use App\Models\Attachment;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use File;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StartShop extends Component
{
    use AuthorizesRequests, WithFileUploads;
    public $isOpen = 0;
    public $isDelete = 0;
    public $deleteid;
    public $isForm,$form_style,$isCreate,
    $isEdit,$showtable,$header_text,$delete_id,$audits;

    // Order
    public $order, $order_id, $order_type, $bu_tb_code, $due_date, $receive_qty, $remain,
    $qty, $total_sales, $state, $created_by;

    // Rule
    public $rules, $messages ;

    public $editid,$action;
    protected $listeners = ['edit','openDeleteModal'];
    protected $queryString = ['editid','action'];

    public function __construct()
    {
        parent::__construct();
        // dd();
        $this->rules = [
            'announcement_header' => 'required',
            'announcement_desc' => 'required',
        ];

        $this->messages = [
            // 'emp_code.unique' => 'มีรหัสนี้ในระบบแล้ว',
            'announcement_header.required' => 'กรุณาระบุหัวข้อ',
            'announcement_desc.required' => 'กรุณาระบุรายละเอียด',
        ];
    }

    public function mount()
    {   
        $order = Order::whereIn('state',['OPEN'])
            ->whereIn('order_type',['LOOKCHIN', 'MOOKRATA'])
            ->where('created_by',auth::user()->id)
            ->orderBy('order_id','DESC')
            ->first();
            
        if($order){
            $this->isEdit();
        }
        $this->header_text = "";
        if($this->editid){
            $this->edit($this->editid);
        }
    }

    public function render()
    {
        return view('livewire.market.start-shop');
    }

    public function create($value)
    {
        $this->order_type = $value;
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
        $this->order = [];
        $this->order_id = null;
        $this->order_type = null;
        $this->bu_tb_code = null;
        $this->due_date = null;
        $this->receive_qty = 0;
        $this->remain = 0;
        $this->qty = 0;
        $this->total_sales = 0;
        $this->state = null;
    }
    public function store()
    {
        DB::beginTransaction();
        $this->validate($this->rules);
        try {
            //code...
            $stmt = Order::updateOrCreate([
                'order_id' => $this->order_id,
            ], 
            [
                'order_type' => $this->order_type,
                'due_date' => Carbon::now(),
                'announcement_desc' => $this->announcement_desc,
                'created_by' => auth::user()->id,
                'active' => $this->active,
            ]);
            $stmt->save();
            DB::commit();
            // $this->edit($id);
            toastr()->success('Data has been saved successfully!', 'Congrats');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error($th .'Oops! Something went wrong!');
            DB::rollBack();
        }
        
    }
}
