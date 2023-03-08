<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\Supplies;
use App\Models\Search; 
use App\Models\Service as ServiceHw;
use App\Models\Komputer;
use App\Models\Departement;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Facades\Excel; 
use Livewire\WithPagination;
use Carbon\Carbon; 
use Livewire\WithFileUploads;
use PDF;
use Image;
use ImageResize;
class Service extends Component
{
    use WithFileUploads;
    public $query;
    public $ServiceHwid,$hw_type;
    public $active; 
    public $isModalOpen = 0;
    public $isModalEdit = 0;
    public $level = [];
    use WithPagination; 
    public $search = '';
    public   $searchTerm; 
    public $sortBy = 'month_date';
    public $sortAsc = true;
    public $item;
    public $file_Name;
    public $photo ;
    public $image_resize ;
    

    //public $idgen = IdGenerator::generate(['table' => 'ServiceHw','field'=>'ServiceHwid', 'length' => 10, 'prefix'=>date('ymd')]);
    public $idgen;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function openModalEdit()
    {
        $this->isModalEdit = true;
    }
    public function closeModalEdit()
    {
        $this->isModalEdit = false;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    private function resetCreateForm(){ 
        $this->ServiceHwid= ''; 
        $this->ip_comp= '';    
        $this->hostname_comp= ''; 
        $this->sku_supplies= ''; 
        $this->hw_type= ''; 
        $this->diagnose= ''; 
        $this->photo= ''; 
        $this-> barcode_supplies= ''; 
        $this->qty= ''; 
        $this->remark= ''; 
        $this->dept_comp= ''; 
        $this->month_date= ''; 
        $this->current_team_id= ''; 
        $this->active= '';        
        $this->photo= '';        
    }
    public function delete($id)
    {
        ServiceHw::find($id)->delete();
        session()->flash('message', 'Supplies deleted.');
    }
       

    public function render()
    {    
       // $path = storage_public('photo/' . $filename);
        $komputers=Komputer::SELECT('id','ip_comp', 'userpc', 'dept_comp')
        ->where('active', 1)->where('current_team_id', auth()->user()->current_team_id)->orderby('userpc')->get();
       // ->where('active', 1)->orderby('userpc')->get();
      //  }
        $dept=Departement::SELECT('id','group', 'dept')
        ->where('active', 1)->where('current_team_id', auth()->user()->current_team_id)->get();
        //dd($Komputer);
        //var_dump($Komputer->ip_comp); 
        $query='%'.$this->query.'%';       
        $searchs = ServiceHw::SELECT('id','ServiceHwid','ip_comp','hostname_comp','sku_supplies','hw_type',
        'diagnose','photo','barcode_supplies','qty','remark','dept_comp','month_date' ,'current_team_id','active')
        ->where('current_team_id', auth()->user()->current_team_id)
        ->where('branch_code', auth()->user()->branch_code)
        ->where('active', 1)
        ->whereYear('month_date', '=', Carbon::now()->year)
        ->when( $this->query, function($query) {
            return $query->where(function( $query) {
            $query->where('ip_comp', 'like', '%'.$this->query. '%')
                        ->orWhere('diagnose', 'like', '%' .$this->query. '%')
                        ->orWhere('ip_comp', 'like', '%' .$this->query. '%')
                        ->orWhere('hostname_comp', 'like', '%' .$this->query. '%')
                        ->orWhere('hw_type', 'like', '%' .$this->query. '%')
                        ->orWhere('ServiceHwid', 'like', '%' .$this->query. '%')
                        ->orWhere('sku_supplies', 'like', '%' .$this->query. '%');
             
            });
        })->when($this->active, function( $query) {
            return $query->active(); 
    })->orderBy( $this->sortBy, $this->sortAsc ? 'DESC' : 'ASC');
         
    $searchs = $searchs->paginate(10);
    return view('livewire.transaction.service', [
        'searchs' => $searchs,'komputers'=>$komputers,'dept'=>$dept
    ]);

    }
    public function export()
    { 
         session()->flash('message', 'On Development.');
    }
    public function markAsDisable(ServiceHw $item)
    {
        //$item->active = "Close";
        $item->active = false;
        $item->save();
        session()->flash('message', 'Disable Successfully.');
    }
    public function edit($id)
    {
        $searchs = ServiceHw::findOrFail($id);
        $this->searchs_id = $id;
        $this->ServiceHwid=$searchs->ServiceHwid;
        $this->ip_comp=$searchs->ip_comp; 
        $this->hostname_comp= $searchs->hostname_comp;
        $this->sku_supplies= $searchs->sku_supplies;
        $this->hw_type= $searchs->hw_type;
        $this->diagnose= $searchs->diagnose;
        $this->photo= $searchs->photo;
        $this->file_name= $searchs->file_name;
        $this->barcode_supplies= $searchs->barcode_supplies;
        $this->qty= $searchs->qty ;
        $this->month_date = $searchs->month_date;  
        $this->dept_comp= $searchs->dept_comp;
        $this->current_team_id= $searchs->current_team_id;
        $this->remark= $searchs->remark;    
        $this->openModalEdit();
    }
     

    public function store()
    {
        
        $this->validate([ 
            'ip_comp'=>'required|min:1',   
            'sku_supplies'=>'required|min:1', 
            'barcode_supplies'=>'required|min:1', 
            'qty'=>'required|min:1', 
            'diagnose'=>'required|max:120', 
            'dept_comp'=>'required' ,
            'photo' => 'required',
            'photo.*' => 'mimes:jpg|max:1024', 
        ]);
        $idgen = IdGenerator::generate(['table' => 'services','field'=>'ServiceHwid', 'length' => 10, 'prefix'=>date('ymd')]); 

       $file_name = $idgen. '.' .'jpg'; 
       $this->photo->storeAs('public', $file_name); 

        
      ServiceHw::Create([  
            'ServiceHwid'=> $idgen,           
            'ip_comp'=> $this->ip_comp,              
            'hostname_comp'=>$this->hostname_comp,
            'sku_supplies'=> $this->sku_supplies,
            'hw_type'=> $this->hw_type, 
            'diagnose'=>$this->diagnose, 
            'barcode_supplies'=> $this->barcode_supplies,
            'qty'=> $this->qty,
            'remark'=> $this->remark, 
            'month_date'=>Carbon::now(),             
            'dept_comp'=> $this->dept_comp,
            'branch_code'=>\Auth::user()->branch_code,
            'current_team_id'=>\Auth::user()->current_team_id,
            'active'=>true,
            'photo'=> $file_name,
            'file_name'=> $file_name
        ]);

        session()->flash('message', 'Data Created successfully.');
         
        $this->resetCreateForm();
        $this->closeModalPopover();
        
    }
    public function storeEdit()
    {
         
        $this->validate([
        'ip_comp'=>'required|min:1',  
        'hostname_comp'=>'required|min:1', 
        'sku_supplies'=>'required|min:1', 
        'barcode_supplies'=>'required|min:1', 
        'qty'=>'required|min:1',   
        'remark'=>'required|min:1', 
        'dept_comp'=>'required'
        ]);
          
        if ($this->searchs_id) {
            $record = ServiceHw::find($this->searchs_id);
            $record->update([
                'sku_supplies'=> $this->sku_supplies,
                'hw_type'=> $this->hw_type, 
                'diagnose'=>$this->diagnose, 
                'barcode_supplies'=> $this->barcode_supplies,
                'qty'=> $this->qty,
                'remark'=> $this->remark, 
                'dept_comp'=> $this->dept_comp 
            ]);
            $this->resetCreateForm();
            $this->updateMode = false;
        } 
             
            
            session()->flash('message', 'Usages Updated Successfully.');
            $this->resetCreateForm();
            $this->closeModalEdit();

        
    }

    public function exportPDF()
    {
       $ServiceHw = ServiceHw::limit(5)->get();
       $pdf = PDF::loadView('pdf', compact('contacts'));
        $pdf->setPaper('a4', 'potrait');
       return $pdf->stream();  // bisa langsung download klo pake metode download, tingggaal ganti stream ajah

    //return view ('pdf', compact('contacts'));
    }
     
}
