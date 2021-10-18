<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users;
use App\Models\Donvi;
use App\Events\Notification;
use App\Models\AuctionNotify;
use Event; 
use Hash;
use Session;
use Auth;
use Mail;


class AdminController extends Controller
{
    public function Home(){
    	return view('admin.admin.home');
    }


    public function ManageUsers(){
        $total = Users::where('role','<>',1)->count();
    	$data = Users::where('role','<>',1)->paginate(20);
    	return view('admin.account.manage-users',compact('data','total'));
    }

    public function listAllBidders(){

        $total = Users::where('role',1)->count();
        $data = Users::where('role',1)->orderBy('created_at','desc')->paginate(20);
        return view('admin.account.all-bidders',compact('data','total'));
    }

    public function viewBidder($code){

        $data = Users::where('id_user',$code)->first();

        if($data){
            return view('admin.account.view-bidder',compact('data'));
        }else{
            return view('errors.404');
        }
    }

    public function confirmBidder($code){

        $data = Users::where('id_user',$code)->first();

        if($data){

            Users::where('id_user',$code)->update(['is_vertified'=>1]);

            Mail::send('mail.contact',[
                'name'=> $data->fullname,
                'content'=> 'Tài khoản ký đấu giá của bạn đã được xác thực. Bạn có thể đăng nhập tài khoản để đăng ký tham gia đấu giá tài sản !'
            ],function($mail) use ($data){

                $mail->to($data->email,$data->fullname);
                $mail->from('tandaiphatauction@gmail.com');
                $mail->subject('Thông báo : xác thực thành công tài khoản hệ thống đấu giá Tân Đại Phát');
            });

                
            $notify = new AuctionNotify();
            $notify->id_user = $data->id;
            $notify->type = 0;
            $notify->title = 'Thông báo xác thực tài khoản';
            $notify->message = 'Tài khoản ký đấu giá của bạn đã được xác thực. Bạn có thể đăng nhập tài khoản để đăng ký tham gia đấu giá tài sản ! ';
            $notify->is_read = 0;
            $notify->save();

            
            $message = ['id_user'=> $code,
            'message'=> AuctionNotify::where([['id_user',$data->id],['is_read',0]])
                                            ->orderBY('created_at','desc')
                                            ->get()
                                            ->toArray()];

            Event::fire(new Notification(json_encode($message)));       

            return redirect()->back()->with('success','Xác nhận thành công');

        }else{
            return redirect()->back();
        }
    }

    public function updateStatusBidder(Request $req){

        if(isset($req->id) && $req->id != ''){
            $data = Users::where('id',$req->id)->first();

            if($data->stt == 1){
                $query = Users::where('id',$req->id)->update(['stt'=>0]);
            }else if($data->stt == 0){
                $query = Users::where('id',$req->id)->update(['stt'=>1]);
            }

        }

    }


    public function CreateUsers(){

    	return view('admin.account.create');
    }

    public function SaveUsers(Request $req){

    	$this->validate($req,[
            'email'=>'required|unique:users,email',
            'password'=>'required|min:6|max:20',
            'name'=>'required',
            'role'=>'required',
        ],
        [

            'email.required'=>'Hãy nhập địa chỉ email',
            'email.unique'=>'Email đã thuộc về 1 tài khoản',
            'name.required'=>'Hãy nhập tên cán bộ',
            'password.min'=>'Mật khẩu tối đa 6 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự',
            'password.required'=>'Mật khẩu không không được để trống',
            'role.required'=>'Hãy chọn quyền'
        ]);

        $code=  "ACT".time() . rand(10,99) ;
        $user = new Users();
        $user->fullname = $req->name;
        $user->email = $req->email;
        $user->birth = date("d/m/Y", strtotime($req->birth));
        $user->phone = $req->phone;
        $user->role = $req->role;
        $user->stt = 1;
        $user->id_user = $code;
        $user->password = bcrypt($req->password);
        $user->is_vertified= 1;
        $user->stt= 1;
        $user->save();

        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function DeleteUsers($code){
        $data = Users::where('idcode',$code)->delete();
        return redirect()->back();
    }

    public function ManageRoom(){
        $data = Donvi::paginate(10);
        $total = Donvi::all()->count();
        return view('room.index',compact('data','total'));
    }

    public function SaveRoom(Request $req){
        $donvi = new Donvi();
        $donvi->tendonvi = $req->tendonvi;
        $donvi->ghichu = $req->ghichu;
        $donvi->save();
        return redirect()->back()->with('thanhcong','Thêm mới đơn vị thành công');
    }


    public function DeleteRoom($iddonvi){

        $query = Donvi::where('iddonvi',$iddonvi)->delete();
        return redirect()->back();
    }

    public function EditRoom($iddonvi){

        $data = Donvi::where('iddonvi',$iddonvi)->first();
        return view('room.edit',compact('data'));
    }


    public function UpdateRoom(Request $req){

        $data = Donvi::where('iddonvi',$req->iddonvi)->update(['tendonvi'=>$req->tendonvi,'ghichu'=>$req->ghichu]);
        return redirect()->route('admin.manage-room');
    }

    public function ManagePosition(){
        return view('position.index');
    }

     public function ListDocument(){
        return view('document.list');
    }

     public function ListTypeDocument(){
        return view('document.list-type');
    }





}
