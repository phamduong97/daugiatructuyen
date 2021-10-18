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

        $this->validate($req,[
            'FirstName'=>'required',
            'MiddleName'=>'required',
            'LastName'=>'required',
            'phone_number'=>'required',
            'email'=>'required|unique:users,email|email',
            'birth'=>'required',
            'address'=>'required',
            'province'=>'required',
            'ward'=>'required',
            'gender'=>'required',
            'idCard_number'=>'required',
            'idCard_grantedDate'=>'required',
            'img_before'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'img_after'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'bank_id'=>'required',
            'bankAccount_number'=>'required',
            'bankAccount_Branch'=>'required',
            'bankAccount_Own'=>'required',
            'password'=>'required|min:8',
            're_password'=>'required|same:password'
        ],
        [
            'FirstName.required'=>'Hãy điền vào họ của bạn',
            'MiddleName.required'=>'Hãy điền vào tên đệm của bạn',
            'LastName.required'=>'Hãy điền vào tên của bạn',
            'phone_number.required'=>'Số điện thoại không được để trống',
            'email.unique'=>'Email này đã trùng với 1 tài khoản khác. Hãy thử lại!',
            'email.required'=>'Hãy nhập vào email',
            'email.email'=>'Email không đúng định dạng',
            'birth.required'=>'Ngày sinh không được để trống',
            'address.required'=>'Địa chỉ không được để trống',
            'province.required'=>'Tỉnh không được để trống',
            'ward.required'=>'Quận/huyện được để trống',
            'gender.required'=>'Giới tính không được để trống',
            'idCard_number.required'=>'Số CMT/CCCD không được để trống',
            'idCard_grantedDate.required'=>'Ngày cấp CMT/ Thẻ căn cước / Hộ chiếu  không được để trống',
            'img_before.required'=>'Ảnh mặt trướckhông được để trống',
            'img_before.image'=>'Ảnh mặt trước phải là file dạng ảnh',
            'img_before.mimes'=>'Ảnh mặt trước phải là ảnh có định dạng jpg,png,gif,svg',
            'img_after.mimes'=>'Ảnh mặt sau phải là ảnh có định dạng jpg,png,gif,svg',
            'img_after.image'=>'Ảnh mặt sau phải là file dạng ảnh',
            'img_after.required'=>'Ảnh mặt sau không được để trống',
            'bank_id.required'=>'Ngân hàng không được để trống',
            'bankAccount_number.required'=>'Tài khoản ngân hàng không được để trống',
            'bankAccount_Branch.required'=>'Tên chủ tài khoản không được để trống',
            'bankAccount_Own.required'=>'không được để trống',
            'password.min'=>'Mật khẩu tối đa 8 ký tự',
            'password.required'=>'Mật khẩu không được để trống',
            're_password.required'=>'Mật khẩu xác nhận không được để trống',
            're_password.same'=>'Mật khẩu xác nhận không chính xác'

        ]);

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

        $this->validate($req,[
            'FirstName2'=>'required',
            'MiddleName2'=>'required',
            'LastName2'=>'required',
            'position'=>'required',
            'phone_number2'=>'required',
            'email2'=>'required|unique:users,email|email',
            'birth2'=>'required',
            'address2'=>'required',
            'province2'=>'required',
            'ward2'=>'required',
            'gender2'=>'required',
            'idCard_number2'=>'required',
            'idCard_grantedDate2'=>'required',
            'img_before2'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'img_after2'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'bank_id2'=>'required',
            'bankAccount_number2'=>'required',
            'bankAccount_Branch2'=>'required',
            'bankAccount_Own2'=>'required',
            'password2'=>'required|min:8',
            're_password2'=>'required|same:password2',
            'name_company2'=>'required',
            'tax_code2'=>'required',
            'date_code_company2'=>'required',
            'address_company2'=>'required',
            'fileupload_company2'=>'required|mines:doc,docx,pdf'
        ],
        [
            'FirstName2.required'=>'Hãy điền vào họ của bạn',
            'MiddleName2.required'=>'Hãy điền vào tên đệm của bạn',
            'LastName2.required'=>'Hãy điền vào tên của bạn',
            'position2.required'=>'Chức vụ của người đại diện không được để trống',
            'phone_number2.required'=>'Số điện thoại không được để trống',   
            'email2.unique'=>'Email này đã trùng với 1 tài khoản khác. Hãy thử lại!',
            'email2.required'=>'Hãy nhập vào email',
            'email2.email'=>'Email không đúng định dạng',
            'birth2.required'=>'Ngày sinh không được để trống',
            'address2.required'=>'Địa chỉ không được để trống',
            'province2.required'=>'Tỉnh không được để trống',
            'ward2.required'=>'Quận/huyện được để trống',
            'gender2.required'=>'Giới tính không được để trống',
            'idCard_number2.required'=>'Số CMT/CCCD không được để trống',
            'idCard_grantedDate2.required'=>'Ngày cấp CMT/ Thẻ căn cước / Hộ chiếu  không được để trống',
            'img_before2.required'=>'Ảnh mặt trướckhông được để trống',
            'img_before2.image'=>'Ảnh mặt trước phải là file dạng ảnh',
            'img_before2.mimes'=>'Ảnh mặt trước phải là ảnh có định dạng jpg,png,gif,svg',
            'img_after2.mimes'=>'Ảnh mặt sau phải là ảnh có định dạng jpg,png,gif,svg',
            'img_after2.image'=>'Ảnh mặt sau phải là file dạng ảnh',
            'img_after2.required'=>'Ảnh mặt sau không được để trống',
            'bank_id2.required'=>'Ngân hàng không được để trống',
            'bankAccount_number2.required'=>'Tài khoản ngân hàng không được để trống',
            'bankAccount_Branch2.required'=>'Tên chủ tài khoản không được để trống',
            'bankAccount_Own2.required'=>'không được để trống',
            'password2.min'=>'Mật khẩu tối đa 8 ký tự',
            'password2.required'=>'Mật khẩu không được để trống',
            're_password2.required'=>'Mật khẩu xác nhận không được để trống',
            're_password2.same'=>'Mật khẩu xác nhận không chính xác',
            'tax_code2.required'=>'Mã số doanh nghiệp/Mã số thuế không được để trống',
            'date_code_company2.required'=>'Ngày cấp mã số doanh nghiệp/Mã số thuế không được để trống',
            'address_company2.required'=>'Nơi cấp mã số doanh nghiệp/Mã số thuế không được để trống',
            'fileupload_company2.required'=>'Giấy chứng nhận đăng ký kinh doanh không được để trống',
            'fileupload_company2.mimes'=>'Giấy chứng nhận đăng ký kinh doanh phải có định dạng pdf,doc,docx'
            
        ]);

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
        $data->password =  bcrypt($req->password2) ;
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


    }
}
