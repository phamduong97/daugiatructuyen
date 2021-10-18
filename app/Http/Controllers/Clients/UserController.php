<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Users;
use App\Models\AuctionNotify;
use App\User;
use Mail;
use Hash;
use Session;
use Auth;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UserController extends Controller
{
    public function signup(){

        if(!Auth::check()){
          $banks = Bank::all();
          return view('clients.authen.signup',compact('banks'));
        }else{
          return redirect()->route('home');
        }

    }

    public function loginAccount(Request $request){

        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ],
        [
            'email.required'=>'Hãy nhập email',
            'password.required'=>'Mật khẩu không được để trống'

        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                Session::put('userid',Auth::user()->id_user);
                Session::put('username',Auth::user()->fullname);
                return redirect()->route('user.profile');

        }else{

            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại. Sai tài khoản hoặc mật khẩu']);

        }
    }

    public function logoutAccount(){
        Session::flush();
        return redirect()->route('home');
    }

    public function registerBidderPersonal(Request $req){

        $fileExtension1 = $req->file('img_before')->getClientOriginalExtension(); // Lấy tên của file
        $fileExtension2 = $req->file('img_after')->getClientOriginalExtension(); // Lấy tên của file

        // Filename cực shock để khỏi bị trùng
        $img_before = time() . "_" . rand(0,99) . "." . $fileExtension1;
        $img_after = time() . "_" . rand(0,99) . "." . $fileExtension2;

        // Thư mục upload
        $uploadPath = public_path('upload\cmnd');

        // Bắt đầu chuyển file vào thư mục
        $req->file('img_before')->move($uploadPath, $img_before);
        $req->file('img_after')->move($uploadPath, $img_after);

        $data = new Users();
        $data->id_user = "ACT".time() . rand(10,99) ;
        $data->firstname = $req->FirstName;
        $data->middlename = $req->MiddleName ;
        $data->lastname = $req->LastName ;
        $data->fullname = $req->FirstName." ".$req->MiddleName." ".$req->LastName  ;
        $data->phone = $req->phone_number ;
        $data->email = $req->email ;
        $data->birth =  date("d/m/Y", strtotime($req->birth)) ;
        $data->address = $req->address ;
        $data->province = $req->province ;
        $data->district = $req->district ;
        $data->ward = $req->ward ;
        $data->gender = $req->gender ;
        $data->cmnd = $req->idCard_number ;
        $data->date_range = date("d/m/Y", strtotime($req->idCard_grantedDate)) ;
        $data->place_range = $req->idCard_GrantedPlace ;
        $data->img_before = $img_before ;
        $data->img_after = $img_after;
        $data->bank_id = $req->bank_id ;
        $data->bank_number = $req->bankAccount_number ;
        $data->bank_branch = $req->bankAccount_Branch ;
        $data->	bank_owner_name = $req->bankAccount_Own ;
        $data->type = 1;
        $data->role = 1;
        $data->password =  bcrypt($req->password) ;
        $data->stt = 1;
        $data->save();

        Mail::send('mail.contact',[
            'name'=> $req->LastName,
            'content'=> 'Bạn đã đăng ký thành công tài khoản đấu giá. Vui lòng kiểm tra email ngay sau khi chúng tôi xác nhận tài khoản !'
        ],function($mail) use ($req){

            $mail->to($req->email,$req->LastName);
            $mail->from('tandaiphatauction@gmail.com');
            $mail->subject('Thông báo : đăng ký thành công tài khoản hệ thống đấu giá Tân Đại Phát');
        });

        $notify = new AuctionNotify();
        $notify->id_user = $data->id;
        $notify->type = 0;
        $notify->title = 'Thông báo đăng ký tài khoản';
        $notify->message = 'Bạn đã đăng ký tài khoản thành công, cảm ơn đã sử dụng hệ thống của chúng tôi ! ';
        $notify->is_read = 0;
        $notify->save();

        return redirect()->back()->with('success','Thêm mới thành công');

    }

    public function registerBidderOrg(Request $req){

        $fileExtension1 = $req->file('img_before2')->getClientOriginalExtension(); // Lấy tên của file ảnh 1
        $fileExtension2 = $req->file('img_after2')->getClientOriginalExtension(); // Lấy tên của file anh 2
        $fileExtension3 = $req->file('fileupload_company')->getClientOriginalExtension(); // Lấy tên của file công ty

        // Filename cực shock để khỏi bị trùng
        $img_before = time() . "_" . rand(0,99) . "." . $fileExtension1;
        $img_after = time() . "_" . rand(0,99) . "." . $fileExtension2;
        $fileupload_company = time() . "_" . rand(0,99) . "." . $fileExtension3;

        // Thư mục upload
        $uploadPath1 = public_path('upload\cmnd');
        $uploadPath2 = public_path('upload\certificates');

        // Bắt đầu chuyển file vào thư mục
        $req->file('img_before2')->move($uploadPath1, $img_before);
        $req->file('img_after2')->move($uploadPath1, $img_after);
        $req->file('fileupload_company')->move($uploadPath2, $fileupload_company);

        $data = new Users();
        $data->id_user = "ACT".time() . rand(10,99) ;
        $data->firstname = $req->FirstName2;
        $data->middlename = $req->MiddleName2 ;
        $data->lastname = $req->LastName2 ;
        $data->fullname = $req->FirstName2." ".$req->MiddleName2." ".$req->LastName2  ;
        $data->represent_position = $req->position ;
        $data->phone = $req->phone_number2 ;
        $data->email = $req->email2 ;
        $data->birth =  date("d/m/Y", strtotime($req->birth2)) ;
        $data->address = $req->address2 ;
        $data->province = $req->province2 ;
        $data->district = $req->district2 ;
        $data->ward = $req->ward2 ;
        $data->gender = $req->gender2 ;
        $data->cmnd = $req->idCard_number2 ;
        $data->date_range = date("d/m/Y", strtotime($req->idCard_grantedDate2)) ;
        $data->place_range = $req->idCard_GrantedPlace2 ;
        $data->img_before = $img_before ;
        $data->img_after = $img_after;
        $data->bank_id = $req->bank_id2 ;
        $data->bank_number = $req->bankAccount_number2 ;
        $data->bank_branch = $req->bankAccount_Branch2 ;
        $data->	bank_owner_name = $req->bankAccount_Own2 ;
        $data->org_name = $req->name_company2;
        $data->tax_code = $req->tax_code2 ;
        $data->date_range_tax = date("d/m/Y", strtotime($req->date_code_company2)) ;
        $data->address_range_tax = $req->place_code_company2 ;
        $data->org_address = $req->address_company2 ;
        $data->certificate = $fileupload_company ;
        $data->type = 2;
        $data->role = 1;
        $data->password =  bcrypt($req->password) ;
        $data->stt = 1;
        $data->save();

        Mail::send('mail.contact',[
            'name'=> $req->LastName2,
            'content'=> 'Bạn đã đăng ký thành công tài khoản đấu giá. Vui lòng kiểm tra email ngay sau khi chúng tôi xác nhận tài khoản !'
        ],function($mail) use ($req){

            $mail->to($req->email2,$req->LastName2);
            $mail->from('tandaiphatauction@gmail.com');
            $mail->subject('Thông báo : đăng ký thành công tài khoản hệ thống đấu giá Tân Đại Phát');
        });

        
        $notify = new AuctionNotify();
        $notify->id_user = $data->id;
        $notify->type = 0;
        $notify->title = 'Thông báo đăng ký tài khoản';
        $notify->message = 'Bạn đã đăng ký tài khoản thành công, cảm ơn đã sử dụng hệ thống của chúng tôi ! ';
        $notify->is_read = 0;
        $notify->save();

        return redirect()->back()->with('success','Thêm mới thành công');

        //         array:30 [▼
        // "_token" => "61XjvlYDCkjt3HH14dNOiFKraBT6KXZaRdxwud5d"
        // "FirstName2" => "Pham"
        // "MiddleName2" => "Văn"
        // "LastName2" => "Duong"
        // "position" => "giám đốc"
        // "phone_number2" => "0904654926"
        // "email2" => "phamduong9337info@gmail.com"
        // "password2" => "123456"
        // "re_password2" => "123456"
        // "birth2" => "2021-07-23"
        // "province2" => "Ha Noi"
        // "district2" => "thanh xuân"
        // "ward2" => "nhân chính"
        // "address2" => "hà nội"
        // "gender2" => "Nam"
        // "idCard_number2" => "133234335355"
        // "idCard_grantedDate2" => "2021-07-17"
        // "idCard_GrantedPlace2" => "131333224343"
        // "bankAccount_number2" => "3434242423"
        // "bank_id2" => "1000015"
        // "bankAccount_Branch2" => "mễ trì"
        // "bankAccount_Own2" => "nam phạm"
        // "name-company2" => "unity"
        // "tax-code2" => "12333234433"
        // "date-code-company2" => "2021-07-17"
        // "place-code-company2" => "unity"
        // "address-company2" => "unity"
        // "img_before2" => UploadedFile {#248 ▶}
        // "img_after2" => UploadedFile {#249 ▶}
        // "fileupload-company" => UploadedFile {#255 ▶}
        // ]

    }
}
