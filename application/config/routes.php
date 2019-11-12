<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Login Route List
$route['admin-login-creds'] = 'Login/CheckLoginCreds';
// Dashboard Route list
$route['home-page'] = 'Dashboard/index';

// Settings Route List

$route['add-new-admin'] = 'Settings/AddNewAdmin';

// Stock Managemt Route list
$route['new-stock-entry'] = 'Stock/StockEntryView';
$route['all-stock-list'] = 'Stock/StockListView';

// Product Management Route List
$route['new-product-entry'] = 'Product/ProductEntryView';
$route['all-product-list'] = 'Product/ProductListView';
$route['new-product-code-entry'] = 'Product/ProductSkuEntryView';

// Representative Management Route List
$route['new-representative-entry'] = 'Representative/RepresentativeEntryView';
$route['all-representative-list'] = 'Representative/RepresentativeListView';

// Branch Management Route List
$route['new-branch-entry'] = 'Branch/BranchEntryView';
$route['all-branch-list'] = 'Branch/BranchListView';

// Pharmacy Management Route List
$route['new-pharmacy-entry'] = 'Pharmacy/PharmacyEntryView';
$route['all-pharmacy-list'] = 'Pharmacy/PharmacyListView';
$route['all-pharmacy-list-by-representative'] = 'Pharmacy/PharmacyListViewByRepresentative';
$route['get-pharmacy-by-representative'] = 'Pharmacy/PharmacyListRepresentative';

// Invoice Management Route List
$route['generate-new-invoice'] = 'Invoice/GenerateNewInvoice';
$route['list-of-all-invoice'] = 'Invoice/ListOfInvoice';
$route['invoice-list/(:any)'] = 'Invoice/SingleInvoiceView/$1';

// Summary List
$route['summary'] = 'Summary/SummaryList';

// Form routes list 
$route['store-represenative-data'] = 'Representative/StoreRepresentativeData';
$route['store-branch-data'] = 'Branch/StoreBranchData';
$route['store-pharmacy-data'] = 'Pharmacy/StorePharmacyData';
$route['store-product-data'] = 'Product/StoreProductData';
$route['get-product-update-data'] = 'Product/UpdateProductData';
$route['get-products-by-type'] = 'Product/GetProductListByType';
$route['get-representative-update-data'] = 'Representative/GetSingleRepresentativeData';
$route['get-update-pharmacy-data'] = 'Pharmacy/UpdatePharmacyData';
$route['get-update-branch-data'] = 'Branch/UpdateBranchData';


// Ajax route list
$route['get-representaive-list-by-branch'] = 'Representative/GetRepresentativeIDbyBranchID';
$route['get-pharmacy-list-by-re'] = 'Representative/GetPharmacyByRepresentativeID';
$route['get-product-list-by-type'] = 'Product/GetProductListByType';
$route['get-single-product-details'] = 'Product/GetSingleProductDetails';
$route['get-pharmacy-list-by-representative'] = 'Pharmacy/GetPharmacyRepresentativeID';
$route['get-representative-data'] = 'Representative/GetRepresentativeDatabyId';
$route['get-pharmacy-update-data'] = 'Pharmacy/GetPharmacyDatabyId';
$route['get-branch-update-data'] = 'Branch/GetBranchDatabyId';

// Print

$route['print-invoice/(:any)/(:any)'] = 'Invoice/PrintInvoice/$1/$2';
$route['print-all-invoice/(:any)/(:any)'] = 'Invoice/PrintAllInvoice/$1/$2';


$route['database-backup'] = 'Dashboard/DatabaseBackup';
$route['password-recover'] = 'Login/CheckEmailForPasswordRecovery';



