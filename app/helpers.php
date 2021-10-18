<?php 
use Illuminate\Support\Facades\DB;


if (! function_exists('getBank')) {

    function getBank($id_bank) {
       
         $data = App\Models\Bank::where('id_bank',$id_bank)->first();
         if($data){

            return $data->bank_name;
            
         }else{
             return "Không xác định";
         }

         return "Không xác định";
    }
}



if (! function_exists('getNameUser')) {

    function getNameUser($id_user) {
       
         $data = App\Models\Users::where('id',$id_user)->first();
         if($data){

            return $data->fullname;
            
         }else{
            
             return "Không xác định";
         }

         return "Không xác định";
    }
}



if (! function_exists('getAuctionCates')) {

    function getAuctionCates() {
       
         $data = DB::select('SELECT DISTINCT auction_categories.id_cate,auction_categories.name_cate,auction_categories.slug, auction_categories.img_cate,(SELECT COUNT(*) FROM auctions WHERE auctions.id_cate = auction_categories.id_cate) AS total FROM auction_categories');

         return $data;
    }
}


if (! function_exists('checkRegisterAuction')) {

    function checkRegisterAuction($id_user,$id_auction,$type) {

         if($type == 'register'){

            $data = App\Models\AuctionMembers::where([['id_user',$id_user],['id_auction',$id_auction]])->first();

            if($data){

                return true;
            }


         }elseif($type == 'is_vertified'){

            $data = App\Models\AuctionMembers::where([['id_user',$id_user],['id_auction',$id_auction],['is_vertify',1]])->first();

            if($data){

                return true;
            }


         }
        
         
         return false;
    }
}