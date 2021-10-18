<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nhansu;
use App\Models\Donvi;

class EmployeeController extends Controller
{
  

    public function ListEmployee(){

        $total = Nhansu::join('donvi','nhansu.iddonvi','=','donvi.iddonvi')->count();
        $data = Nhansu::join('donvi','nhansu.iddonvi','=','donvi.iddonvi')->paginate(10);
    	return view('employee.list',compact('data','total'));
    }

    public function UpdateEmployee($id){
        $nhansu = Nhansu::where('idnhansu',$id)->first();
        $data = Donvi::all();
    	return view('employee.update',compact('data','nhansu'));
    }


    public function DetailEmployee($id){

        $data = Nhansu::where('idnhansu',$id)->first();
    	return view('employee.detail',compact('data'));
    }


    public function CreateEmployee(){

        $data = Donvi::all();
    	return view('employee.create',compact('data'));
    }

    public function DeleteEmployee($id){

        $data =  Nhansu::where('idnhansu',$id)->delete();
        return redirect()->back();
    }

    public function ImportEmployee(Request $req){
        // $this->validate($req,[
        //       'select_file'=>'required|mimes:xls,xlsx'
        //   ],
        //   [
             
        //       'select_file.required'=>'Hãy nhập 1 file Excel',
        //       'select_file.mimes'=>'Hãy chọn đúng file đuôi xls hoặc xlsx'
  
        //   ]);
        $filename = $req->file('select_file');
  
        $inputFileType = PHPExcel_IOFactory::identify($filename);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
  
        $objReader->setReadDataOnly(true);
  
        $objPHPExcel = $objReader->load("$filename");
  
        $total_sheets=$objPHPExcel->getSheetCount();
  
        $allSheetName=$objPHPExcel->getSheetNames();
        $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow    = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $arraydata = array();
        for ($row = 2; $row <= $highestRow;++$row)
        {
          for ($col = 0; $col <$highestColumnIndex;++$col)
          {
            $value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            $arraydata[$row-2][$col]=$value;
          }
        }

        print_r($arraydata);
  
  
        // $count = count($arraydata);
        // $macanbo = Session::get('usercode');
        // $tencanbo = Session::get('username');
        // for ($i=0; $i < $count; $i++) { 
        //    $phonebook = new Phonebook();
        //    $phonebook->tax_code = $arraydata[$i][0];
        //    $phonebook->id_number = $arraydata[$i][1];
        //    $phonebook->fullname = $arraydata[$i][2];
        //    $phonebook->email = $arraydata[$i][4];
        //    $phonebook->id_street = $arraydata[$i][6];
        //    $phonebook->phone = $arraydata[$i][3];
        //    $phonebook->address = $arraydata[$i][5];
        //    $phonebook->isok = $arraydata[$i][7];
        //    $phonebook->collect_channel = $arraydata[$i][8];
        //    $phonebook->manager_name = $tencanbo;
        //    $phonebook->manager_code = $macanbo;
        //    $phonebook->save();
  
        //     $macanbo = Session::get('usercode');
        //     $tencanbo = Session::get('username');
        //     $hanhdong = 'Đã lưu danh bạ chủ hộ '.$arraydata[$i][2].' mã số thuế '.$arraydata[$i][0];
        //     $diary = new Diary();
        //     $diary->code = $macanbo;
        //     $diary->name = $tencanbo;
        //     $diary->action = $hanhdong;
        //     $diary->save();
        // }
  
        // return redirect()->back()->with('thanhcong','Import danh bạ thành công');
      
       
     }


    public function SaveEmployee(Request $req){

    	$this->validate($req,[
            'email'=>'required',
            'hoten'=>'required',
            'iddonvi'=>'required',
            'tendonvi'=>'required',
            'quanhuyen'=>'required',
            'donvichuquan'=>'required',
            'diachi'=>'required',
            'sdt'=>'required'
        ],
        [
           
            'email.required'=>'Hãy nhập địa chỉ email',
            'hoten'=>'Hãy nhập họ tên',
            'iddonvi'=>'Hãy nhập loại trung tâm',
            'tendonvi'=>'Hãy nhập tên đơn vị',
            'quanhuyen'=>'Hãy nhập quận huyện',
            'donvichuquan'=>'Hãy nhập đơn vị chủ quản',
            'diachi'=>'Hãy nhập địa chỉ',
            'sdt'=>'Hãy nhập số điện thoại'
        ]);

        $user = new Nhansu();
        $user->tendvi = $req->tendonvi;
        $user->giamdoc = $req->hoten;
        $user->quanhuyen = $req->quanhuyen;
        $user->diachi = $req->diachi;
        $user->sdt = $req->sdt;
        $user->email = $req->email;
        $user->congty = $req->donvichuquan;
        $user->ctdk = $req->ctdk;
        $user->thoigiancap = $req->thoigiancap;
        $user->thoihan = $req->thoihan;
        $user->soqd = $req->soqd;
        $user->ghichu = $req->ghichu;
        $user->iddonvi = $req->iddonvi;
        $user->save();

        return redirect()->back()->with('thanhcong','Thêm mới thành công');
    }


    public function EditEmployee(Request $req){

    	$this->validate($req,[
            'email'=>'required',
            'hoten'=>'required',
            'iddonvi'=>'required',
            'tendonvi'=>'required',
            'quanhuyen'=>'required',
            'donvichuquan'=>'required',
            'diachi'=>'required',
            'sdt'=>'required'
        ],
        [
           
            'email.required'=>'Hãy nhập địa chỉ email',
            'hoten'=>'Hãy nhập họ tên',
            'iddonvi'=>'Hãy nhập loại trung tâm',
            'tendonvi'=>'Hãy nhập tên đơn vị',
            'quanhuyen'=>'Hãy nhập quận huyện',
            'donvichuquan'=>'Hãy nhập đơn vị chủ quản',
            'diachi'=>'Hãy nhập địa chỉ',
            'sdt'=>'Hãy nhập số điện thoại'
        ]);


        $update = Nhansu::where('idnhansu',$req->idnhansu)->update([

            'tendvi' => $req->tendonvi,
            'giamdoc' => $req->hoten,
            'quanhuyen' => $req->quanhuyen,
            'diachi' => $req->diachi,
            'sdt' => $req->sdt,
            'email' => $req->email,
            'congty' => $req->donvichuquan,
            'ctdk' => $req->ctdk,
            'thoigiancap' => $req->thoigiancap,
            'thoihan' => $req->thoihan,
            'soqd' => $req->soqd,
            'ghichu' => $req->ghichu,
            'iddonvi' => $req->iddonvi

        ]);

        return redirect()->back()->with('thanhcong','Cập nhật thành công');
    }

}
