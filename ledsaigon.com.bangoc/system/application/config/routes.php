<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

| In some instances, however, fyou may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

| Please see the user guide for complete details:

|	http://codeigniter.com/user_guide/general/routing.html

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

| There area two reserved routes:

|	$route['default_controller'] = 'welcome';

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|	$route['404_override'] = 'errors/page_missing';

| This route will tell the Router what URI segments to use if those provided

| in the URL cannot be matched to a valid route.

*/

$route['default_controller'] = "indexcontroller";

$route['404_override'] = 'indexcontroller';

#home

$route['index.html']='indexcontroller';

$route['(vn|en)/index.html']='indexcontroller';

# langgues

$route['vn'] ='indexcontroller/selectLang/vn';

$route['en'] ='indexcontroller/selectLang/en';

$route['sitemap.html']='indexcontroller/sitemap';

$route['ban-do.html']='indexcontroller/bando';

$route['thuong-hieu.html']='indexcontroller/thuonghieu';

# contact

$route['(lien-he|contact).html']="contacts/contact";

$route['newsletter/(:any)']="contacts/newsletter/$1";

#news 

$route['(khuyen-mai|tin-tuc|cong-trinh|chinh-sach|du-an|dich-vu|thi-cong|chinh-sach|do-sang-ss).html']="news/listNews/$1";

$route['(khuyen-mai|chinh-sach|tin-tuc|du-an|dich-vu|thi-cong|chinh-sach|do-sang-ss)/page/(:num).html']="news/listNews/$1";

$route['gioi-thieu.html'] = 'news/detail/25';
#$route['khuyen-mai.html'] = 'news/detail/26';
$route['(:any)-p(:num).html'] = 'news/detail/$2';

# Gallery
$route['thu-vien.html'] = 'galleries/show';
$route['thu-vien/page/(:num).html'] = 'galleries/show';

# Exhibitors

$route['exhibition.html'] = 'exhibitors/listItem';

$route['exhibition/page/(:num).html'] = 'exhibitors/listItem';

$route['exhibition/(:any).html'] = 'exhibitors/detail/$1';

#coment

$route['phan-hoi.html/(:num)'] = 'comments/post/$1';

$route['video.html'] = 'galleries/video';

$route['video/page/(:num).html'] = 'galleries/video';

$route['video/watch-(:num).html'] = 'galleries/watchVideo/$1';

# users

$route['profile.html'] ='users/profile';

$route['(dang-nhap|login).html'] ='users/login';

$route['logout.html'] ='users/logout';

$route['change-pass.html'] ='users/changePass';

$route['dang-ky.html'] ='users/register';

$route['quen-mat-khau.html'] = 'users/lostPass';

$route['y-kien-khach-hang.html']='comments';

# cart

$route['shopping-(:num)-(:num).html'] ='shopping/addtocart/$1/$2';

$route['dat-hang.html']='shopping/manage';

$route['(cart|shopping|gio-hang).html']='shopping/manage';

$route['order.html']='shopping/order';

$route['dat-hang-thanh-cong.html']='shopping/orderSuccess';

#faq

$route['cau-hoi-thuong-gap.html']='faq/getStaticContent/cau-hoi-thuong-gap';

# static

$route['(quy-dinh|chinh-sach-chay-thu|huong-dan-mua-hang|chay-thu-mien-phi|huong-dan-ky-thuat|huong-dan-thanh-toan|chinh-sach-giao-nhan|qua-tang-khuyen-mai|chinh-sach-bao-hanh|he-thong-phan-phoi|huong-dan-thanh-toan-hoc-phi|dieu-khoan-dich-vu|giang-day-tai-braintest|chinh-sach-bao-mat|hop-tac-cung-braintest|chinh-sach-hoan-hoc-phi|tai-sao-chon-chung-toi|huong-dan-su-dung|phuong-thuc-thanh-toan|chinh-sach-giao-hang|hoi-dap|thanh-toan).html']='staticpages/getStaticContent/$1';

$route['tuyen-dung.html']='staticpages/getStaticContent/tuyen-dung';

$route['chinh-sach-quy-dinh-chung.html']='staticpages/getStaticContent/chinh-sach-quy-dinh-chung';

$route['quyen-loi-khach-hang.html']='staticpages/getStaticContent/quyen-loi-khach-hang';

$route['chuyen-gia.html']='staticpages/getStaticContent/chuyen-gia';







# Search

$route['search-name/(:any).html'] = 'products/searchWithAlpha/$1';

$route['tim-kiem.html'] = 'products/Search';

$route['tim-kiem/(:num).html'] = 'products/Search';

#products

$route['san-pham.html']='products/allProducts';

$route['san-pham/page/(:num).html']='products/allProducts/$1';



$route['san-pham-noi-bat.html']='products/proNoibat';

$route['san-pham-noi-bat/page/(:num).html']='products/proNoibat/$1';



$route['san-pham-moi-nhat.html']='products/proMoinhat';

$route['san-pham-moi-nhat/page/(:num).html']='products/proMoinhat/$1';



$route['san-pham-khuyen-mai.html']='products/proKhuyenmai';

$route['san-pham-khuyen-mai/page/(:num).html']='products/proKhuyenmai/$1';



$route['(:any)/page/(:num).html'] = 'products/listProductFromCate/$1';

$route['(:any)-a(:num).html'] = 'products/detailProduct/$2';

$route['(:any).html'] = 'products/listProductFromCate/$1';

# gallery

// trang quản lý

$route['admincp']="AdminCP/home";

$route['AdminCP']="AdminCP/home";

$route['admincp/login']="AdminCP/login";

$route['AdminCP/config']="AdminCP/home/config";

//$route['AdminCP/promotion/(:num)'] = "admin/promotion/index/$1";

/* End of file routes.php */

/* Location: ./application/config/routes.php */