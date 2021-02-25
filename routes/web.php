<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// ALL PAGES 

Route::get('/', [App\Http\Controllers\pages\contentController::class, 'index']);
Route::get('/about-us', [App\Http\Controllers\pages\contentController::class, 'aboutus']);
Route::get('/how-it-works', [App\Http\Controllers\pages\contentController::class, 'howitworks']);
Route::get('/comments', [App\Http\Controllers\pages\contentController::class, 'comments']);
Route::get('/contact-us', [App\Http\Controllers\pages\contentController::class, 'contactus']);
// Route::get('/', [App\Http\Controllers\pages\contentController::class, 'index']);
Route::get('/client', [App\Http\Controllers\client\contentcontroller::class, 'index']);
Route::get('/writer', [App\Http\Controllers\writer\contentcontroller::class, 'index']);
Route::get('/admin', [App\Http\Controllers\admin\contentcontroller::class, 'index']);


// CLIENT LINKS

Route::get('/client/dashboard', [App\Http\Controllers\client\accountController::class, 'index'])->name('client');
Route::get('/client/register', [App\Http\Controllers\client\contentcontroller::class, 'register']);
Route::post('/client/createaccount', [App\Http\Controllers\client\contentcontroller::class, 'createaccount']);
Route::get('/client/verifyaccount/{token}', [App\Http\Controllers\client\contentcontroller::class, 'verifyaccount']);
Route::get('client/myacccount', [App\Http\Controllers\client\accountcontroller::class, 'myaccount']);
Route::get('client/submit-order', [App\Http\Controllers\client\accountcontroller::class, 'neworder']);
Route::post('client/upload_task', [App\Http\Controllers\client\accountcontroller::class, 'uploadorder']);
Route::get('client/jobreview/{token}', [App\Http\Controllers\client\accountcontroller::class, 'uploadpreview']);
Route::post('client/jobreview/topic', [App\Http\Controllers\client\accountcontroller::class, 'updatetitle']);
Route::post('client/jobreview/description', [App\Http\Controllers\client\accountcontroller::class, 'updatedescription']);
Route::post('client/jobreview/solutionformat', [App\Http\Controllers\client\accountcontroller::class, 'updatesolutionformat']);
Route::post('client/jobreview/attachments', [App\Http\Controllers\client\accountcontroller::class, 'updateattachments']);
Route::post('client/jobreview/lastdetails', [App\Http\Controllers\client\accountcontroller::class, 'updatelastdetails']);
Route::delete('client/jobreview/removetask/{token}', [App\Http\Controllers\client\accountcontroller::class, 'removetask']);
Route::get('client/jobreview/uploadadmin/{token}', [App\Http\Controllers\client\accountcontroller::class, 'uploadadmin']);
Route::get('client/drafts', [App\Http\Controllers\client\accountcontroller::class, 'pendingtasks']);
Route::get('client/myorders', [App\Http\Controllers\client\accountcontroller::class, 'myorders']);
Route::get('client/rejected-orders', [App\Http\Controllers\client\accountcontroller::class, 'rejectedorders']);
Route::get('client/my-notifications', [App\Http\Controllers\client\accountcontroller::class, 'mynotifications']);
Route::get('client/my-wallet', [App\Http\Controllers\client\accountcontroller::class, 'mywallet']);
Route::get('client/settings', [App\Http\Controllers\client\accountcontroller::class, 'mysettings']);
Route::get('client/remove-avatar', [App\Http\Controllers\client\accountcontroller::class, 'removeavatar']);
Route::post('client/update-avatar', [App\Http\Controllers\client\accountcontroller::class, 'updateavatar']);
Route::post('client/updateemail', [App\Http\Controllers\client\accountcontroller::class, 'updateemail']);
Route::post('client/update-phone-number', [App\Http\Controllers\client\accountcontroller::class, 'updatephone']);
Route::get('verifyaccount', [App\Http\Controllers\client\contentcontroller::class, 'validateaccount']);
Route::get('client/my-messages', [App\Http\Controllers\client\accountcontroller::class, 'allmessages']);
Route::get('client/chat-thread/{token}', [App\Http\Controllers\client\accountcontroller::class, 'chatthread']);
Route::post('client/send-chat-thread/{token}', [App\Http\Controllers\client\accountcontroller::class, 'sendresponse']);
Route::get('client/downloadfinal/{token}', [App\Http\Controllers\client\accountcontroller::class, 'downloadfinal']);
Route::post('client/request-order-revision/{token}', [App\Http\Controllers\client\accountcontroller::class, 'finalremarks']);
Route::post('client/updatepassword', [App\Http\Controllers\client\accountcontroller::class, 'updatepassword']);
Route::get('client/my-orders-prices', [App\Http\Controllers\client\accountcontroller::class, 'allmyorderprices']);
Route::get('client/checkout/{token', [App\Http\Controllers\client\accountcontroller::class, 'getExpressCheckout']);
Route::get('client/checkout/{token}', [App\Http\Controllers\client\accountcontroller::class, 'getExpressCheckout']);
Route::get('client/checkout-cancel', [App\Http\Controllers\client\accountcontroller::class, 'CancelPage'])->name('paypalcancel');
Route::get('client/checkout-succes', [App\Http\Controllers\client\accountcontroller::class, 'getExpressCheckoutSuccess'])->name('paypalsuccess');

Route::get('/admin/dashboard', [App\Http\Controllers\admin\accountController::class, 'index'])->name('superadmin');
Route::get('admin/admin-notifications', [App\Http\Controllers\admin\accountController::class, 'notifications']);
Route::get('admin/available-orders', [App\Http\Controllers\admin\accountController::class, 'availableorders']);
Route::get('admin/order_details/{token}', [App\Http\Controllers\admin\accountController::class, 'orderdetails']);
Route::get('admin/all-writers', [App\Http\Controllers\admin\accountController::class, 'allwriters']);
Route::get('admin/writer_details/{token}', [App\Http\Controllers\admin\accountController::class, 'writerdetails']);
Route::get('admin/new-writer', [App\Http\Controllers\admin\accountController::class, 'addnewwriter']);
Route::post('admin/registerwriter', [App\Http\Controllers\admin\accountController::class, 'registerwriter']);
Route::get('admin/suspend-writer', [App\Http\Controllers\admin\accountController::class, 'suspendwriter']);
Route::get('admin/block_writer/{token}', [App\Http\Controllers\admin\accountController::class, 'blockwriter']);
Route::get('admin/blocked-writers', [App\Http\Controllers\admin\accountController::class, 'blockedwriters']);
Route::get('admin/unblock_writer/{token}', [App\Http\Controllers\admin\accountController::class, 'unblockwriter']);
Route::get('admin/delete_writer/{token}', [App\Http\Controllers\admin\accountController::class, 'deletewriter']);
Route::get('admin/all-clients', [App\Http\Controllers\admin\accountController::class, 'allclients']);
Route::get('admin/client_details/{token}', [App\Http\Controllers\admin\accountController::class, 'clientdetails']);
Route::get('admin/post_order/{token}', [App\Http\Controllers\admin\accountController::class, 'viewbidsplaced']);
Route::get('admin/activate_order/{token}', [App\Http\Controllers\admin\accountController::class, 'publishorder']);
Route::get('admin/assign_task/{token}/{client}', [App\Http\Controllers\admin\accountController::class, 'allocatetask']);
Route::get('admin/all-revisions', [App\Http\Controllers\admin\accountController::class, 'allrevisions']);
Route::get('admin/order_revision/{token}', [App\Http\Controllers\admin\accountController::class, 'orderrevisiondetails']);
Route::post('admin/notify-client-revision', [App\Http\Controllers\admin\accountController::class, 'notifyclientrevision']);
Route::get('admin/deadline-extension/{token}', [App\Http\Controllers\admin\accountController::class, 'opendeadlineextension']);
Route::post('admin/writer-deadline-extension-response/{token}', [App\Http\Controllers\admin\accountController::class, 'timeextensionresponse']);
Route::post('admin/start-chat-thread', [App\Http\Controllers\admin\accountController::class, 'startthread']);
Route::get('admin/open-thread/{token}', [App\Http\Controllers\admin\accountController::class, 'openthread']);
Route::post('admin/send-chat-message/{token}', [App\Http\Controllers\admin\accountController::class, 'sendthreadmessage']);


// WRITER LINKS 
Route::get('/writer/dashboard', [App\Http\Controllers\writer\accountController::class, 'index'])->name('writer');
Route::get('/writer/dashboard/my-transactions', [App\Http\Controllers\writer\accountController::class, 'mytransactions']);;
Route::get('/writer/dashboard/my-notifications', [App\Http\Controllers\writer\accountController::class, 'mynotifications']);;
Route::get('/writer/dashboard/guidelines', [App\Http\Controllers\writer\accountController::class, 'guidelines']);
Route::get('/writer/order-details/{token}', [App\Http\Controllers\writer\accountController::class, 'orderdetails']);
Route::get('/writer/order-instructions/{token}', [App\Http\Controllers\writer\accountController::class, 'orderinstructions']);
Route::post('writer/placebid', [App\Http\Controllers\writer\accountController::class, 'placingbid']);
Route::get('writer/bid-order-details/{token}', [App\Http\Controllers\writer\accountController::class, 'placedbiddetails']);
Route::get('writer/delete-bid/{token}', [App\Http\Controllers\writer\accountController::class, 'deletebid']);
Route::get('writer/completed-jobs', [App\Http\Controllers\writer\accountController::class, 'completedjobs']);
Route::get('writer/revision-jobs', [App\Http\Controllers\writer\accountController::class, 'revisionjobs']);
Route::get('writer/accept-order/{token}', [App\Http\Controllers\writer\accountController::class, 'acceptorders']);
Route::post('writer/job-extension-time', [App\Http\Controllers\writer\accountController::class, 'jobextensiontimerequest']);
Route::get('writer/dashboard/time-extension-requests', [App\Http\Controllers\writer\accountController::class, 'alltimeextensions']);
Route::post('writer/upload-final-document', [App\Http\Controllers\writer\accountController::class, 'uploadcompletedwork']);
Route::get('writer/final-document-upload/{token}', [App\Http\Controllers\writer\accountController::class, 'finaldocument']);
Route::get('writer/my-messages', [App\Http\Controllers\writer\accountController::class, 'mymessages']);
Route::post('writer/start-chat-thread', [App\Http\Controllers\writer\accountController::class, 'startthread']); 
Route::get('writer/chat-thread/{token}', [App\Http\Controllers\writer\accountController::class, 'threadchats']); 
Route::get('writer/revision-order-details/{token}', [App\Http\Controllers\writer\accountController::class, 'revisionjobdetails']); 
Route::get('writer/myaccount', [App\Http\Controllers\writer\accountController::class, 'myaccount']); 
Route::get('writer/settings', [App\Http\Controllers\writer\accountController::class, 'mysettings']); 
Route::get('writer/remove-avatar', [App\Http\Controllers\writer\accountController::class, 'removeavatar']); 
Route::post('writer/update-avatar', [App\Http\Controllers\writer\accountController::class, 'updateavatar']); 
Route::post('writer/updatepassword', [App\Http\Controllers\writer\accountController::class, 'updatepassword']); 
Route::post('writer/updateemail', [App\Http\Controllers\writer\accountController::class, 'updateemail']); 
Route::post('writer/update-phone-number', [App\Http\Controllers\writer\accountController::class, 'updatephone']); 