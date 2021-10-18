<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  /*-----------------------Trang chủ client---------------------------------    */
Route::get('/','Clients\HomeController@home')->name('home');

/*-----------------------Authentication customers and bidders---------------------------------    */
Route::get('/Đăng-ký-tài-khoản','Clients\UserController@signup')->name('signup');
Route::post('/Đăng-ký-tài-khoản/cá-nhân','Clients\UserController@registerBidderPersonal')->name('register-bidder-personal');
Route::post('/Đăng-ký-tài-khoản/tổ-chức','Clients\UserController@registerBidderOrg')->name('register-bidder-org');
Route::get('/Liên-hệ','Clients\HomeController@contact')->name('contact');

/*-------------------------Liên hệ hỏi đáp----------------------------*/
Route::post('/lien-he/gui-lien-he','Clients\HomeController@saveContact')->name('save-contact');

  /*-----------------------Hiển thị và tìm kiếm tin tức--------------------------------    */
Route::get('/tin-tức','Clients\HomeController@news')->name('news');
Route::get('/tin-tức/{slug}','Clients\HomeController@newsByCategory')->name('newsByCategory');
Route::get('/tin-tức/chi-tiet/{slug}','Clients\HomeController@detailnews')->name('detail-news');
Route::get('/tìm-kiếm-bài-viết','Clients\HomeController@searchNews')->name('search-news');

  /*-----------------------Authentication customers and bidders modules---------------------------------    */
Route::group(['prefix'=>'/user','as'=>'user.','middleware'=>['checkLogin']],function(){
  /*-----------------------Thông tin cá nhân---------------------------------    */
  Route::get('/Profile','Clients\HomeController@profile')->name('profile');
  /*-----------------------Tạo phiên đấu giá---------------------------------    */
  Route::get('/Tạo-phiên-đấu-giá','Clients\AuctionsController@createAuction')->name('create-auction');
  /*-----------------------Xem danh sách phiên đấu giá---------------------------------    */
  Route::get('/Danh-sách-phiên-đấu-giá','Clients\AuctionsController@listAllAuctions')->name('list-all-auctions');
  /*-----------------------Chỉnh sửa phiên đấu giá---------------------------------    */
  Route::get('/Chỉnh-sửa-phiên-đấu-giá/{slug}','Clients\AuctionsController@editAuction')->name('edit-auction');
  /*-----------------------Cập nhật thông tin phiên đấu giá---------------------------------    */
  Route::post('/Cập-nhật-phiên-đấu-giá','Clients\AuctionsController@updateAuction')->name('update-auction');
  /*-----------------------Xóa phiên đấu giá---------------------------------    */
  Route::get('/Xóa-phiên-đấu-giá/{id_auction}','Clients\AuctionsController@deleteAuction')->name('delete-auction');
  /*-----------------------Xem lịch sử các phiên đấu giá---------------------------------    */
  Route::get('/Lịch-sử-đấu-giá','Clients\AuctionsController@auctionHistory')->name('auction-history');
   /*-----------------------Xem chi tiết lịch sử phiên đấu giá---------------------------------    */
   Route::get('/Lịch-sử/{slug}','Clients\AuctionsController@auctionDetailHistory')->name('auction-detail-history');
    /*-----------------------Xuất biên bản phiên đấu giá---------------------------------    */
  Route::get('/Biên-bản-đấu-giá/{slug}','Clients\AuctionsController@auctionReport')->name('auction-report');
  /*-----------------------Xem thông báo ---------------------------------    */
  Route::get('/Thông-báo','Clients\AuctionsController@notification')->name('notification');
   /*-----------------------Đăng ký tham gia phiên đấu giá---------------------------------    */
  Route::post('/Đăng-ký-tham-gia-đấu-giá','Clients\AuctionsController@registerAuction')->name('register-auction');
     /*-----------------------Xem thành viên tham gia phiên đấu giá---------------------------------    */
  Route::post('/Thành-viên-tham-gia-đấu-giá','Clients\AuctionsController@listMemberAuction')->name('list-member-auction');

  /*-----------------------Xác thực tham gia phiên đấu giá---------------------------------    */
  Route::post('/Xác-thực-tham-gia-đấu-giá','Clients\AuctionsController@confirmCompletion')->name('confirm-completion');
    /*-----------------------Phiên đấu giá---------------------------------    */
  Route::get('/Phiên-đấu-giá/{slug}','Clients\AuctionsController@roomAuction')->name('room-auction');
   /*-----------------------Phiên đấu giá---------------------------------    */
  Route::post('/Xử-lý-phiên-đấu-giá/{process}','Clients\AuctionsController@processAuction')->name('process-auction');

 });


Route::get('/Các-cuộc-đấu-giá','Clients\AuctionsController@room')->name('all-auctions');
Route::get('/Cuộc-đấu-giá/cuộc-đấu-giá-sắp-đấu-giá','Clients\AuctionsController@room')->name('auction-room-1');
Route::get('/Cuộc-đấu-giá/cuộc-đấu-giá-đang-diễn-ra','Clients\AuctionsController@room')->name('auction-room-2');
Route::get('/Cuộc-đấu-giá/cuộc-đấu-giá-đã-kết-thúc','Clients\AuctionsController@room')->name('auction-room-3');

Route::get('/Giới-thiệu','Clients\HomeController@introduce')->name('introduce');

Route::get('/Tất-cả-tài-sản','Clients\AuctionsController@allProducts')->name('all-products');
Route::get('/Danh-mục-tài-sản/{slug}','Clients\AuctionsController@getProductByCate')->name('product-by-cate');
Route::get('/Tài-sản/-/{slug}','Clients\AuctionsController@detail')->name('view-detail-product');

Route::post('/Đăng-nhập','Clients\UserController@loginAccount')->name('login-account');
Route::get('/Đăng-xuất','Clients\UserController@logoutAccount')->name('logout-account');


 // ------------------Authentication admin-----------------------------
 Route::get('/admin','Admin\UserController@Login')->name('login')->middleware('checkLogout');
 Route::post('/login','Admin\UserController@getLogin')->name('getLogin');
 Route::get('/logout','Admin\UserController@Logout')->name('logout');

 //---------------------------------Quản trị website-----------------------------------------
 Route::group(['prefix'=>'/quan-tri','as'=>'admin.','middleware'=>['CheckAdmin']],function(){

     //-----------------------------Trang chủ------------------
     Route::get('trang-chu','Admin\AdminController@Home')->name('home');

     //-----------------------------Quản lý tài khoản đấu giá----------
     Route::get('/them-moi-nhan-su','Admin\EmployeeController@CreateEmployee')->name('create-employee');
     Route::post('/luu-nhan-su','Admin\EmployeeController@SaveEmployee')->name('save-employee');
     Route::post('/import-nhan-su','Admin\EmployeeController@ImportEmployee')->name('import-employee');
     Route::get('/danh-sach-nhan-su','Admin\EmployeeController@ListEmployee')->name('list-employee');
     Route::get('/cap-nhat-nhan-su/{id}','Admin\EmployeeController@UpdateEmployee')->name('update-employee');
     Route::post('/sua-nhan-su','Admin\EmployeeController@EditEmployee')->name('edit-employee');
     Route::get('/chi-tiet-nhan-su/{id}','Admin\EmployeeController@DetailEmployee')->name('detail-employee');
     Route::get('/xoa-nhan-su/{id}','Admin\EmployeeController@DeleteEmployee')->name('delete-employee');

       //-----------------------------Quản lý danh mục tin tức----------------------
  	Route::get('/danh-muc-tin-tuc','Admin\BlogController@ListTypeBlog')->name('list_type_blog');
  	Route::get('/xoa-danh-muc','Admin\BlogController@DeleteTypeBlog')->name('delete_type_blog');
  	Route::post('/them-moi-danh-muc','Admin\BlogController@SaveTypeBlog')->name('save_type_blog');
  	Route::post('/cap-nhat-danh-muc','Admin\BlogController@UpdateTypeBlog')->name('update_type_blog');

  	//-----------------------------Quản lý tin tức-------------------
  	Route::get('/danh-sach-blog','Admin\BlogController@ListBlog')->name('list_blog');
  	Route::get('/chi-tiet-blog/{id}','Admin\BlogController@DetailBlog')->name('detail_blog');
  	Route::get('/tao-blog','Admin\BlogController@CreateBlog')->name('create_blog');
  	Route::post('/luu-blog','Admin\BlogController@SaveBlog')->name('save_blog');
  	Route::get('/cap-nhat-blog/{id}','Admin\BlogController@UpdateNewBlog')->name('update_new_blog');
  	Route::post('/cap-nhat-blog','Admin\BlogController@UpdateBlog')->name('update_blog');
    Route::get('/xoa-blog','Admin\BlogController@DeleteBlog')->name('delete_blog');

  	//-----------------------------Tiểu sử---------------------
  	Route::get('/tieu-su-cua-toi','Admin\BlogController@Profile')->name('profile');
  	Route::post('/luu-tieu-su','Admin\BlogController@CreateProfile')->name('create_profile');

  	//-----------------------------Liên hệ trang---------------------
  	Route::get('/lien-he','Admin\BlogController@Contact')->name('contact');

  	//-----------------------------Cài đặt tin tức trang--------------------
  	Route::get('cai-dat','Admin\BlogController@Settings')->name('settings');
  	Route::post('luu-cai-dat','Admin\BlogController@SaveSettings')->name('save_settings');

     //-----------------------------Quản lý người dùng----------
     Route::get('/danh-sach-tai-khoan-he-thong','Admin\AdminController@ManageUsers')->name('manage-users');
     Route::get('/danh-sach-tai-khoan-dau-gia','Admin\AdminController@listAllBidders')->name('all-bidders');
     Route::get('/them-moi-tai-khoan','Admin\AdminController@CreateUsers')->name('create-users');
     Route::post('/them-moi-tai-khoan','Admin\AdminController@SaveUsers')->name('save-users');
     Route::post('/cap-nhat-trang-thai-tai-khoan-dau-gia','Admin\AdminController@updateStatusBidder')->name('update-status-bidder');
     Route::get('/xem-ho-so/{code}','Admin\AdminController@viewBidder')->name('view-bidder');
     Route::get('/xac-thuc-tai-khoan/{code}','Admin\AdminController@confirmBidder')->name('confirm-bidder');
     Route::get('/xoa-tai-khoan/{code}','Admin\AdminController@DeleteUsers')->name('delete-users')->middleware('CheckAdmin');

     //-----------------------------Quản lý đơn vị----------
     Route::get('/danh-sach-phong-ban','Admin\AdminController@ManageRoom')->name('manage-room');
     Route::post('/them-don-vi','Admin\AdminController@SaveRoom')->name('save-room');
     Route::get('/sua-don-vi/{iddonvi}','Admin\AdminController@EditRoom')->name('edit-room');
     Route::post('/cap-nhat-don-vi','Admin\AdminController@UpdateRoom')->name('update-room');
     Route::get('/xoa-don-vi/{iddonvi}','Admin\AdminController@DeleteRoom')->name('delete-room');

     //-----------------------------Quản lý chức vụ----------
     Route::get('/danh-sach-chuc-vu','Admin\AdminController@ManagePosition')->name('manage-position');

     //-----------------------------Quản lý báo cáo----------
     Route::get('ho-so-hoan-thanh-100','Admin\ReportController@ListComplete100')->name('list-complete-100');
     Route::get('ho-so-hoan-thanh-50','Admin\ReportController@ListComplete50')->name('list-complete-50');
     Route::get('ho-so-trong-thang','Admin\ReportController@ListMonth')->name('list-month');

     //-----------------------------Quản lý tài liệu----------
     Route::get('danh-muc-tai-lieu','Admin\AdminController@ListTypeDocument')->name('list-type-document');
     Route::get('danh-sach-tai-lieu','Admin\AdminController@ListDocument')->name('list-document');



 });