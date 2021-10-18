<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Auctions;
use App\Models\AuctionCategories;
use App\Models\AuctionMembers;
use App\Models\AuctionHistory;
use App\Models\AuctionNotify;
use Auth;
use DB;
use Mail;
use Event; 
use App\Events\Notification;
use App\Events\AuctionRoom;


class AuctionsController extends Controller
  {
    public function allProducts(){

        $data = Auctions::join('auction_categories','auctions.id_cate','auction_categories.id_cate')->select('auctions.img_title','auctions.slug','auctions.asset_name','auctions.price_start','auctions.start_time_bid')->paginate(20);
        $total = Auctions::join('auction_categories','auctions.id_cate','auction_categories.id_cate')->count();
        return view('clients.assets.index',compact('data','total'));
    }

    public function detail($slug){

        $data = Auctions::where('slug',$slug)->first();

        if($data){

            $asset_related = Auctions::where([['id','<>',$data->id],['id_cate',$data->id_cate]])->take(5)->get();
            return view('clients.assets.detail',compact('data','asset_related'));

        }else{
            return view('errors.404');
        }
       
    }

    public function getProductByCate($slug){

        $cate = AuctionCategories::where('slug',$slug)->first();

        if($cate){

            $data = Auctions::join('auction_categories','auctions.id_cate','auction_categories.id_cate')->where('auctions.id_cate',$cate->id_cate)->select('auctions.img_title','auctions.slug','auctions.asset_name','auctions.price_start','auctions.start_time_bid')->paginate(20);
            $total = Auctions::join('auction_categories','auctions.id_cate','auction_categories.id_cate')->where('auctions.id_cate',$cate->id_cate)->count();
            $title = $cate->name_cate;

            return view('clients.assets.category',compact('data','total','title'));

        }else{
            return view('errors.404');
        }
       
    }


    public function notification(){

             $data = AuctionNotify::where('id_user',Auth::user()->id)->orderBy('created_at','desc')->paginate(20);
             $total = AuctionNotify::where('id_user',Auth::user()->id)->count();

             AuctionNotify::where('id_user',Auth::user()->id)->update(['is_read'=> 1]);

            return view('clients.notification.index',compact('data','total'));

    }

    public function listMemberAuction(Request $req){


        if(isset($req->mts) && $req->mts != ''){

            $data = Auctions::where('mts',$req->mts)->first();

            if($data){

                $members = AuctionMembers::join('users','users.id','auction_members.id_user')->where('auction_members.id_auction',$data->id)->get();

                return view('clients.auction.member',compact('members','data'));

            }else{

                 echo '
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Truy vấn không hợp lệ. Không tìm thấy dữ liệu !</strong>
                    </div>
                 ';
            } 

        }else{

            echo '
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Truy vấn không hợp lệ. Không tìm thấy dữ liệu !</strong>
                    </div>
                 ';
        }

    }


    public function confirmCompletion(Request $req){

        if(Auth::user()->role != 1 ){

            if(isset($req->id_user) && $req->id_user != '' && isset($req->id_auction) && $req->id_auction != ''){

                $user = Users::where('id_user',$req->id_user)->select('id','id_user')->first();

                $update =  AuctionMembers::where([['id_user',$user->id],['id_auction',$req->id_auction]])->update(['is_vertify' => 1]);

                if($update){

                    $notify = new AuctionNotify();
                    $notify->id_user = $user->id;
                    $notify->type = 0;
                    $notify->title = 'Thông báo xác nhận hoàn tất thủ tục';
                    $notify->message = 'Tài khoản của bạn đã được xác thực, bạn có thể tham gia đấu giá sản phẩm  ';
                    $notify->is_read = 0;
                    $notify->save();

                    $message = ['id_user'=> $user->id_user,
                                'message'=> AuctionNotify::where([['id_user',$user->id],['is_read',0]])
                                                                ->orderBY('created_at','desc')
                                                                ->get()
                                                                ->toArray()];

                    Event::fire(new Notification(json_encode($message)));

                    return 'success';
                }
            }

        }

        return redirect()->back();
    }

    public function roomAuction($slug){

        $data = Auctions::where('slug',$slug)->first();

        if($data){

            if(checkRegisterAuction(Auth::user()->id,$data->id,'is_vertified') || (Auth::user()->id == $data->bidder) || (Auth::user()->id == $data->created_by) ){

                if(strtotime($data->start_time_bid) <=time() && strtotime($data->end_time_bid) >=time()){


                    $update_stt = Auctions::where('id',$data->id)->update(['status' => 2]);

                    $auction_history = AuctionHistory::where('id_auction',$data->id)->orderBy('created_at','desc')->get();

                    if(Auth::user()->role != 1){
                        
                        $current_price = "";
                    }else{
                        $current_price = AuctionMembers::where([['id_user',Auth::user()->id],['id_auction',$data->id]])->select('price')->first()->price;

                    }

                    $members = AuctionMembers::join('users','users.id','auction_members.id_user')->where([['auction_members.id_auction',$data->id],['is_vertify',1]])->select('users.id_user','users.fullname','auction_members.status')->get();

                    return view('clients.auction.room',compact('data','auction_history','current_price','members'));


                }else if(strtotime($data->start_time_bid) > time()){

                    return redirect()->back()->with('error','Phiên đấu giá chưa đến giờ bắt đầu. Vùi lòng quay lại sau');

                }else if(strtotime($data->start_time_bid) < time()){

                    $update_stt = Auctions::where('id',$data->id)->update(['status' => 3]);

                    return redirect()->back()->with('error','Phiên đấu giá đã kết thúc !');
               }

            }else{

                return redirect()->back()->with('error','Tài khoản của bạn chưa được xác thực đăng ký phiên đấu giá này !');

            }

        }else{
            
            return view('errors.404');
        }


    }

    public function processAuction(Request $req, $process){

        $micro_date = microtime();
        $date_array = explode(" ",$micro_date);
        $date = date("Y-m-d H:i:s",$date_array[1]);

        if ($process == "offer_price"){

            $data = Auctions::where('mts',$req->mts)->select('current_price','id')->first();

            if($req->offer_price > $data->current_price  ){

                //Cập nhật giá cao nhất hiện tại của tài sản
                Auctions::where('mts',$req->mts)->update(["current_price"=>$req->offer_price]);
                //Cập nhật giá trả của người trả giá
                $check = AuctionMembers::where([['id_user',Auth::user()->id],['id_auction',$data->id]])->first();

                if($check->last_time_price == 0){

                    AuctionMembers::where([['id_user',Auth::user()->id],['id_auction',$data->id]])->update(["price"=>$req->offer_price]);

                }else{

                    AuctionMembers::where([['id_user',Auth::user()->id],['id_auction',$data->id]])->update([["price"=>$req->offer_price],["last_time_price"=>0]]);

                }
                //Tạo lịch sử trả giá của phiên đấu giá
                $history  = new AuctionHistory();
                $history->id_auction = $data->id;
                $history->id_user = Auth::user()->id;
                $history->created_at = $date;
                $history->content = Auth::user()->id_user ." vừa trả giá ". number_format($req->offer_price) . " VNĐ";
                $history->save();

                return "success";

            }

        }elseif ($process == "recovery_price"){

                $data = Auctions::where('mts',$req->mts)->select('current_price','id')->first();

                $second_price = AuctionMembers::where([['id_auction',$data->id],['status',1]])->orderBy('price','desc')->skip(1)->take(1)->select('price')->first()->price;

                if($req->offer_price > $second_price){

                    //Cập nhật giá cao nhất hiện tại của tài sản
                    Auctions::where('mts',$req->mts)->update(["current_price"=>$req->offer_price]);
                    //Cập nhật giá trả của người trả giá
                    $check = AuctionMembers::where([['id_user',Auth::user()->id],['id_auction',$data->id]])->first();

                    if($check->last_time_price == 0){

                        AuctionMembers::where([['id_user',Auth::user()->id],['id_auction',$data->id]])->update(["price"=>$req->offer_price]);

                    }else{

                        AuctionMembers::where([['id_user',Auth::user()->id],['id_auction',$data->id]])->update([["price"=>$req->offer_price],["last_time_price"=>0]]);

                    }
                    //Tạo lịch sử trả giá của phiên đấu giá
                    $history  = new AuctionHistory();
                    $history->id_auction = $data->id;
                    $history->id_user = Auth::user()->id;
                    $history->created_at = $date;
                    $history->content = Auth::user()->id_user ." vừa trả giá ". number_format($req->offer_price) . " VNĐ";
                    $history->save();

                    

                    return "success";

                }else{

                    return "error";
                }

            

        }elseif ($process == "end_auction"){

            $data = Auctions::where('mts',$req->mts)->select('current_price','id')->first();

            $history  = new AuctionHistory();
            $history->id_auction = $data->id;
            $history->id_user = Auth::user()->id;
            $history->created_at = $date;
            $history->content = Auth::user()->id_user ." đã xác nhận trả giá ". number_format($data->current_price) . " VNĐ";
            $history->save();

            Auctions::where('mts',$req->mts)->update(['status' => 3]);


        }elseif ($process == "dissmiss_auction"){

            $data = Auctions::where('mts',$req->mts)->select('current_price','id')->first();

            $user = AuctionMembers::where([['id_auction',$data->id],['status',1]])->orderBy('price','desc')->skip(1)->take(1)->select('id_user','price')->first();
            
            $history  = new AuctionHistory();
            $history->id_auction = $data->id;
            $history->id_user = Auth::user()->id;
            $history->created_at = $date;
            $history->content = Auth::user()->id_user ." không xác nhận trả giá ". number_format($data->current_price) . " VNĐ";
            $history->save();

            Auctions::where('mts',$req->mts)->update(['status' => 3,'current_price'=>$user->price]);

            return $user->id_user;

        }elseif ($process == "check_end_auction"){

            $data = Auctions::where('mts',$req->mts)->select('current_price','id')->first();

            $your_price =  AuctionMembers::where([['id_user',Auth::user()->id],['id_auction',$data->id]])->select('price')->first()->price;

            if($your_price == $data->current_price){

                return "success";

            }else{

                return "false";
            }


        }else{

          return json_encode(["status"=>404,"error"=>true]);

        }

    }


    public function createAuction(){


        $cats = AuctionCategories::all();
        // echo  date('m-d-Y H:i:s', strtotime('07/14/2021 01:33 PM') ); 

        // echo date('Y-m-d\TH:i',strtotime('07/14/2021 13:33:00'));
        return view('clients.auction.create',compact('cats'));
    }

    public function listAllAuctions(){

        $role = Auth::user()->role;

        if($role == 1){

            $title = "Danh sách tài sản đăng ký đấu giá";

            $total = AuctionMembers::join('auctions','auctions.id','auction_members.id_auction')->where('auction_members.id_user',Auth::user()->id)->count();

            $data = AuctionMembers::join('auctions','auctions.id','auction_members.id_auction')->where('auction_members.id_user',Auth::user()->id)->paginate(15);

            return view('clients.auction.list',compact('total','data','title'));


        }else if($role == 2){

            $title = "Danh sách tài sản";

            $total = Auctions::where('bidder',Auth::user()->id)->orWhere('created_by',Auth::user()->id)->count();

            $data = Auctions::where('bidder',Auth::user()->id)->orWhere('created_by',Auth::user()->id)->paginate(15);

            return view('clients.auction.list',compact('total','data','title'));

        }

        return redirect()->route('home');
    }

    public function editAuction(){

    }

    public function updateAuction(Request $req){

        // dd($req->all());
        $img_detail = "";
        $documents = "";
        $img_title = "";

        if ($req->hasfile('img_detail')) {
            foreach ($req->file('img_detail') as $file) {
                $name = time()."-".$file->getClientOriginalName();
                $file->move(public_path('upload\assets'),$name);
                $data1[] = $name;
            }

            $img_detail = json_encode($data1,JSON_UNESCAPED_UNICODE);
        }

        if ($req->hasfile('documents')) {
            foreach ($req->file('documents') as $file) {
                $name = time()."-".$file->getClientOriginalName();
                $file->move(public_path('upload\documents'),$name);
                $data2[] = $name;
            }

            $documents = json_encode($data2,JSON_UNESCAPED_UNICODE);
        }

        if ($req->hasfile('img_title')) {

            $img_title = time()."-".$req->file('img_title')->getClientOriginalName();
            $req->file('img_title')->move(public_path('upload\assets'),$img_title);
        }


        $data = new Auctions();
        $data->mts = "MTS-".rand(1,9).rand(99999,999999) ;
        $data->asset_name = $req->asset_name ;
        $data->slug = str_slug($req->asset_name).'-'.rand(999,9999).'.html';
        $data->price_start = $req->price_start;
        $data->start_time_reg = date('Y-m-d H:i:s', strtotime($req->start_time_reg) );
        $data->end_time_reg = date('Y-m-d H:i:s', strtotime($req->end_time_reg) );
        $data->fee = $req->fee;
        $data->price_step = $req->price_step;
        $data->max_step = $req->max_step;
        $data->deposit = $req->deposit;
        $data->method = $req->method;
        $data->owner = $req->owner;
        $data->place_asset = $req->place_asset;
        $data->view_time = $req->view_time;
        $data->organization = $req->organization;
        $data->start_time_bid = date('Y-m-d H:i:s', strtotime($req->start_time_bid) );
        $data->end_time_bid = date('Y-m-d H:i:s', strtotime($req->end_time_bid) );
        $data->documents = $documents;
        $data->img_title = $img_title;
        $data->img_detail = $img_detail;
        $data->description = $req->description;
        $data->created_by  = Auth::user()->id;
        $data->bidder = Auth::user()->id;
        $data->id_cate = $req->id_cate;
        $data->save();


        return redirect()->back()->with('success','Thêm mới thành công');

    }


    public function deleteAuction(){

    }


    public function auctionHistory(){

        $total = AuctionMembers::join('auctions','auctions.id','auction_members.id_auction')->where([['auction_members.id_user',Auth::user()->id],['auctions.status',3]])->count();
        $data = AuctionMembers::join('auctions','auctions.id','auction_members.id_auction')->where([['auction_members.id_user',Auth::user()->id],['auctions.status',3]])->paginate(10);

        return view('clients.auction.history',compact('data','total'));
    }
    

    public function auctionDetailHistory($slug){

        $auction = Auctions::where([['slug',$slug],['status',3]])->first();

        if($auction){

             $data =AuctionHistory::where('id_auction',$auction->id)->paginate(20);
             $total =AuctionHistory::where('id_auction',$auction->id)->count();

             return view('clients.auction.detail_history',compact('data','auction','total'));

        }

        return view('errors.404');

    }

    public function auctionReport($slug){

        $auction = Auctions::where('slug',$slug)->first();

        if($auction){

             $data =AuctionHistory::where('id_auction',$auction->id)->paginate(20);
             $total =AuctionHistory::where('id_auction',$auction->id)->count();

             return view('clients.auction.report',compact('data','auction','total'));

        }

        return view('errors.404');

    }


     public function room(Request $req){


        if(request()->segment(5) != ''){
            $metaTitle = ucfirst(str_replace('-',' ',request()->segment(4)));
        }else if(request()->segment(3) != ''){
            $metaTitle = ucfirst(str_replace('-',' ',request()->segment(3)));
        }else if(request()->segment(2) != ''){
            $metaTitle = ucfirst(str_replace('-',' ',request()->segment(2)));
        }else if(request()->segment(1) != ''){
            $metaTitle = ucfirst(str_replace('-',' ',request()->segment(1)));
        }

        
        $new_auctions = Auctions::where('status',1)->orderBY('created_at','desc')->take(5)->get();


        if($metaTitle == 'Các cuộc đấu giá'){

            $listAll = Auctions::all();
            
            return view('clients.room.index',compact('listAll','new_auctions','metaTitle'));

        }else if($metaTitle == 'Cuộc đấu giá sắp đấu giá'){

            $listAll = Auctions::where('status',1)->get();

            return view('clients.room.index',compact('listAll','new_auctions','metaTitle'));

        }else if($metaTitle == 'Cuộc đấu giá đang diễn ra'){

            $listAll = Auctions::where('status',2)->get(); 

            return view('clients.room.index',compact('listAll','new_auctions','metaTitle'));

        }else if($metaTitle == 'Cuộc đấu giá đã kết thúc'){

            $listAll = Auctions::where('status',3)->get();

            return view('clients.room.index',compact('listAll','new_auctions','metaTitle'));
        }


       
        return view('errors.404');
    }

    public function registerAuction(Request $req){

        if(isset($req->auction_asset_mts) && $req->auction_asset_mts != ''){

             $data = Auctions::where('mts',$req->auction_asset_mts)->select('id','asset_name')->first();

             if($data){

                $register = new AuctionMembers();
                $register->id_user = Auth::user()->id;
                $register->id_auction = $data->id;
                $register->save();

                Mail::send('mail.contact',[
                    'name'=> Auth::user()->fullname,
                    'content'=> 'Bạn đã đăng ký tham gia tài sản '.$data->asset_name.' , mã tài sản : '.$req->auction_asset_mts.'. Vui lòng hoàn tất chuyển khoản phí đăng ký tới ngân hàng Kỹ Thương Việt Nam Techcombank, số tài khoản: 102826335353535 để tiến hành tham dự đấu giá !'
                ],function($mail) use ($req){

                    $mail->to(Auth::user()->email,Auth::user()->fullname);
                    $mail->from('tandaiphatauction@gmail.com');
                    $mail->subject('Thông báo : Hoàn tất thủ tục phí tham gia đấu giá hệ thống đấu giá Tân Đại Phát');
                });


                return redirect()->back()->with('success','Đăng ký thành công');

             }

             
        }

       
    }



}
