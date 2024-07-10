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
    public $order, $order_id, $order_type, $bu_tb_code, $due_date, $investment,
    $receive_qty, $remain, $qty = 0, $total_all = 0, $total_sales = 0, $state, $created_by;

    // Rule
    public $receive_rules, $remain_rules, $messages ;

    public $editid,$action;
    protected $listeners = ['edit','openDeleteModal'];
    protected $queryString = ['editid','action'];

    public function __construct()
    {
        parent::__construct();
        
        $this->receive_rules = [
            'investment' => 'required',
            'receive_qty' => 'required',
        ];

        $this->remain_rules = [
            'remain' => 'required',
        ];

        $this->messages = [
            'investment.required' => 'กรุณาระบุ',
            'receive_qty.required' => 'กรุณาระบุ',
            'remain.required' => 'กรุณาระบุ',
        ];
    }

    public function mount()
    {   
        $this->header_text = null;
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
        $order = Order::where('order_type',$value)
            ->where('created_by',auth::user()->id)
            ->whereIn('state',['เปิดร้าน'])
            ->orderBy('order_id','DESC')
            ->first();

        if($order){
            $this->editid = $order->order_id;
            return redirect()->to('/the-order?editid='.$this->editid);
        }else{
            $this->isCreate();
            $this->resetInputFields();
            $this->resetValidation();
            $this->order_type = $value;
        }
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
        $this->investment = null;
        $this->receive_qty = null;
        $this->remain = null;
        $this->qty = 0;
        $this->total_all = 0;
        $this->total_sales = 0;
        $this->state = null;
        $this->created_by = null;
        $this->editid = null;
    }

    public function store()
    {
        DB::beginTransaction();
        $this->validate($this->receive_rules);
        try {
            //code...
            $stmt = Order::updateOrCreate([
                'order_id' => $this->order_id,
            ], 
            [
                'order_type' => $this->order_type,
                'due_date' => null,
                'investment' => $this->investment,
                'receive_qty' => $this->receive_qty,
                'remain' => $this->remain,
                'qty' => $this->qty,
                'total_sales' => $this->total_sales,
                'created_by' => auth::user()->id,
            ]);
            $stmt->save();
            $stmt->state()->transitionTo('เปิดร้าน');
            $id = $stmt->order_id;
            DB::commit();
            return redirect()->to('/the-order?editid='.$id);
            toastr()->success('Data has been saved successfully!', 'Congrats');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error($th .'Oops! Something went wrong!');
            DB::rollBack();
        }
        
    }
    
    public function edit($id)
    {
        $this->editid = $id;
        $this->resetValidation();
        $stmt = Order::findOrFail($id);
        $this->order_id = $id;
        $this->order_type = $stmt->order_type;
        $this->due_date = $stmt->due_date;
        $this->investment = $stmt->investment;
        $this->receive_qty = $stmt->receive_qty;
        $this->remain = $stmt->remain;
        $this->qty = $stmt->qty;
        $this->total_sales = $stmt->total_sales;
        $this->created_by = $stmt->created_by;
        $this->state = $stmt->state;
        $this->total_all = $stmt->investment + $stmt->total_sales;

        $this->isEdit();
    }

    public function updatedRemain($value)
    {
        $price = 10;
        $amount = 0;
        if ($value) {
            # code...
            $remain = (int)$value;
            if ($remain <= $this->receive_qty) {
                $amount = $this->receive_qty - $remain;
                $this->qty = $amount;
                $this->total_sales = $this->qty * $price;
                $this->total_all = $this->investment + $this->total_sales;
            }else{
                toastr()->error('เกิดข้อผิดพลาดจำนวน "คงเหลือ" มากกว่าจำนวน "รับเข้า" ', 'Error');
                return;
            }
        }
        return;
    }

    public function close($value)
    {
        DB::beginTransaction();
        $this->validate($this->remain_rules);
        try {
            //code...
            $stmt = Order::updateOrCreate([
                'order_id' => $value,
            ], 
            [
                'order_type' => $this->order_type,
                'due_date' => Carbon::now(),
                'investment' => $this->investment,
                'receive_qty' => $this->receive_qty,
                'remain' => $this->remain,
                'qty' => $this->qty,
                'total_sales' => $this->total_sales,
            ]);
            $stmt->save();
            $stmt->state()->transitionTo('ปิดร้าน');
            $id = $stmt->order_id;
            DB::commit();
            return redirect()->to('/the-order?editid='.$id);
            toastr()->success('Data has been saved successfully!', 'Congrats');
        } catch (\Throwable $th) {
            //throw $th;
            toastr()->error($th .'Oops! Something went wrong!');
            DB::rollBack();
        }
    }
}
