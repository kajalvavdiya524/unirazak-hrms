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

Auth::routes();

Route::get('/register/{lang?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('/login/{lang?}', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/check', 'HomeController@check')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('/password/resets/{lang?}', 'Auth\LoginController@showLinkRequestForm')->name('change.langPass');

Route::get('/', 'HomeController@index')->name('home')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('/home', 'HomeController@index')->name('home')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('/home/getlanguvage', 'HomeController@getlanguvage')->name('home.getlanguvage');


Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::resource('settings', 'SettingsController');
    Route::post('email-settings', 'SettingsController@saveEmailSettings')->name('email.settings');
    Route::post('company-settings', 'SettingsController@saveCompanySettings')->name('company.settings');
    Route::post('payment-settings', 'SettingsController@savePaymentSettings')->name('payment.settings');
    Route::post('system-settings', 'SettingsController@saveSystemSettings')->name('system.settings');
    Route::get('company-setting', 'SettingsController@companyIndex')->name('company.setting');
    Route::get('company-email-setting/{name}', 'SettingsController@updateEmailStatus')->name('company.email.setting');
    Route::post('pusher-settings', 'SettingsController@savePusherSettings')->name('pusher.settings');
    Route::post('business-setting', 'SettingsController@saveBusinessSettings')->name('business.setting');

    Route::get('test-mail', 'SettingsController@testMail')->name('test.mail');
    Route::post('test-mail', 'SettingsController@testSendMail')->name('test.send.mail');

    Route::get('create/ip', 'SettingsController@createIp')->name('create.ip');
    Route::post('create/ip', 'SettingsController@storeIp')->name('store.ip');
    Route::get('edit/ip/{id}', 'SettingsController@editIp')->name('edit.ip');
    Route::post('edit/ip/{id}', 'SettingsController@updateIp')->name('update.ip');
    Route::delete('destroy/ip/{id}', 'SettingsController@destroyIp')->name('destroy.ip');
}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::get('/orders', 'StripePaymentController@index')->name('order.index');
    Route::get('/stripe/{code}', 'StripePaymentController@stripe')->name('stripe');
    Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

}
);

Route::get(
    '/test', [
               'as' => 'test.email',
               'uses' => 'SettingsController@testEmail',
           ]
)->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post(
    '/test/send', [
                    'as' => 'test.email.send',
                    'uses' => 'SettingsController@testEmailSend',
                ]
)->middleware(
    [
        'auth',
        'XSS',
    ]
);
// End

Route::resource('user', 'UserController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('employee/json', 'EmployeeController@json')->name('employee.json')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('branch/employee/json', 'EmployeeController@employeeJson')->name('branch.employee.json')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('employee-profile', 'EmployeeController@profile')->name('employee.profile')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('show-employee-profile/{id}', 'EmployeeController@profileShow')->name('show.employee.profile')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('lastlogin', 'EmployeeController@lastLogin')->name('lastlogin')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('employee', 'EmployeeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('department', 'DepartmentController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('designation', 'DesignationController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('document', 'DocumentController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('branch', 'BranchController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('awardtype', 'AwardTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('award', 'AwardController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('termination', 'TerminationController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('termination/changeaction', 'TerminationController@changeaction')->name('termination.changeaction')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('terminationtype', 'TerminationTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('announcement/getdepartment', 'AnnouncementController@getdepartment')->name('announcement.getdepartment')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('announcement/getemployee', 'AnnouncementController@getemployee')->name('announcement.getemployee')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('announcement', 'AnnouncementController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::get('holiday/calender', 'HolidayController@calender')->name('holiday.calender')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('importView','HolidayController@importView')->name('importView');

Route::post('importExcel', 'HolidayController@importExcel')->name('importExcel');

Route::resource('holiday', 'HolidayController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::get('employee/salary/{eid}', 'SetSalaryController@employeeBasicSalary')->name('employee.basic.salary')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('allowances/create/{eid}', 'AllowanceController@allowanceCreate')->name('allowances.create')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('commissions/create/{eid}', 'CommissionController@commissionCreate')->name('commissions.create')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('loans/create/{eid}', 'LoanController@loanCreate')->name('loans.create')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('saturationdeductions/create/{eid}', 'SaturationDeductionController@saturationdeductionCreate')->name('saturationdeductions.create')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('otherpayments/create/{eid}', 'OtherPaymentController@otherpaymentCreate')->name('otherpayments.create')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('overtimes/create/{eid}', 'OvertimeController@overtimeCreate')->name('overtimes.create')->middleware(
    [
        'auth',
        'XSS',
    ]
);


//payslip

Route::resource('paysliptype', 'PayslipTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('allowance', 'AllowanceController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('commission', 'CommissionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('allowanceoption', 'AllowanceOptionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('loanoption', 'LoanOptionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('deductionoption', 'DeductionOptionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('loan', 'LoanController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('saturationdeduction', 'SaturationDeductionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('otherpayment', 'OtherPaymentController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('overtime', 'OvertimeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('event/getdepartment', 'EventController@getdepartment')->name('event.getdepartment')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('event/getemployee', 'EventController@getemployee')->name('event.getemployee')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('event', 'EventController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('meeting/getdepartment', 'MeetingController@getdepartment')->name('meeting.getdepartment')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('meeting/getemployee', 'MeetingController@getemployee')->name('meeting.getemployee')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('meeting', 'MeetingController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('employee/update/sallary/{id}', 'SetSalaryController@employeeUpdateSalary')->name('employee.salary.update')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('salary/employeeSalary', 'SetSalaryController@employeeSalary')->name('employeesalary')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('setsalary', 'SetSalaryController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('payslip/paysalary/{id}/{date}', 'PaySlipController@paysalary')->name('payslip.paysalary')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('payslip/bulk_pay_create/{date}', 'PaySlipController@bulk_pay_create')->name('payslip.bulk_pay_create')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('payslip/bulkpayment/{date}', 'PaySlipController@bulkpayment')->name('payslip.bulkpayment')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('payslip/search_json', 'PaySlipController@search_json')->name('payslip.search_json')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('payslip/employeepayslip', 'PaySlipController@employeepayslip')->name('payslip.employeepayslip')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('payslip/showemployee/{id}', 'PaySlipController@showemployee')->name('payslip.showemployee')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('payslip/editemployee/{id}', 'PaySlipController@editemployee')->name('payslip.editemployee')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('payslip/editemployee/{id}', 'PaySlipController@updateEmployee')->name('payslip.updateemployee')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('payslip/pdf/{id}/{m}', 'PaySlipController@pdf')->name('payslip.pdf')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('payslip/payslipPdf/{id}', 'PaySlipController@payslipPdf')->name('payslip.payslipPdf')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('payslip/send/{id}/{m}', 'PaySlipController@send')->name('payslip.send')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('payslip/delete/{id}', 'PaySlipController@destroy')->name('payslip.delete')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('payslip', 'PaySlipController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('resignation', 'ResignationController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('travel', 'TravelController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('travel/changeaction', 'TravelController@changeaction')->name('travel.changeaction')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('promotion', 'PromotionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
//
Route::post('promotion/changeaction', 'PromotionController@changeaction')->name('promotion.changeaction')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('transfer/changeaction', 'TransferController@changeaction')->name('transfer.changeaction')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('resignation/changeaction', 'ResignationController@changeaction')->name('resignation.changeaction')->middleware(
    [
        'auth',
        'XSS',
    ]
);
//
Route::resource('transfer', 'TransferController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('complaint', 'ComplaintController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('warning', 'WarningController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('/comment/add', 'CommentController@store')->name('comment.add')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('profile', 'UserController@profile')->name('profile')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('edit-profile', 'UserController@editprofile')->name('update.account')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('accountlist', 'AccountListController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('accountbalance', 'AccountListController@account_balance')->name('accountbalance')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::get('leave/{id}/action', 'LeaveController@action')->name('leave.action')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('leave/changeaction', 'LeaveController@changeaction')->name('leave.changeaction')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('leave/jsoncount', 'LeaveController@jsoncount')->name('leave.jsoncount')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('leave', 'LeaveController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('ticket/{id}/reply', 'TicketController@reply')->name('ticket.reply')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('ticket/changereply', 'TicketController@changereply')->name('ticket.changereply')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('ticket', 'TicketController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('attendanceemployee/bulkattendance', 'AttendanceEmployeeController@bulkAttendance')->name('attendanceemployee.bulkattendance')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('attendanceemployee/bulkattendance', 'AttendanceEmployeeController@bulkAttendanceData')->name('attendanceemployee.bulkattendance')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('attendanceemployee/attendance', 'AttendanceEmployeeController@attendance')->name('attendanceemployee.attendance')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('attendanceemployee', 'AttendanceEmployeeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('timesheet', 'TimeSheetController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('expensetype', 'ExpenseTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('incometype', 'IncomeTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('paymenttype', 'PaymentTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('leavetype', 'LeaveTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('payees', 'PayeesController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('payer', 'PayerController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('deposit', 'DepositController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('expense', 'ExpenseController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('transferbalance', 'TransferBalanceController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){
    Route::get('change-language/{lang}', 'LanguageController@changeLanquage')->name('change.language');
    Route::get('manage-language/{lang}', 'LanguageController@manageLanguage')->name('manage.language');
    Route::post('store-language-data/{lang}', 'LanguageController@storeLanguageData')->name('store.language.data');
    Route::get('create-language', 'LanguageController@createLanguage')->name('create.language');
    Route::post('store-language', 'LanguageController@storeLanguage')->name('store.language');
    Route::delete('/lang/{lang}', 'LanguageController@destroyLang')->name('lang.destroy');
}
);

Route::resource('roles', 'RoleController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('permissions', 'PermissionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('user/{id}/plan', 'UserController@upgradePlan')->name('plan.upgrade')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('user/{id}/plan/{pid}', 'UserController@activePlan')->name('plan.active')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('plans', 'PlanController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('change-password', 'UserController@updatePassword')->name('update.password');

Route::resource('coupons', 'CouponController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('account-assets', 'AssetController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('document-upload', 'DucumentUploadController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('indicator', 'IndicatorController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('appraisal', 'AppraisalController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('goaltype', 'GoalTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('goaltracking', 'GoalTrackingController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('company-policy', 'CompanyPolicyController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('trainingtype', 'TrainingTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('trainer', 'TrainerController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('training/status', 'TrainingController@updateStatus')->name('training.status')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('training/create-form/{id}', 'TrainingController@trainingLinkCreateAccess')->name('training.create-form')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('training/approve-status/{id}', 'TrainingController@approvestatus')->name('training.approve-status')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('training/submitStatusApprove', 'TrainingController@submitapprovestatus')->name('training.submitStatusApprove')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('training/filter-join-trainerList', 'TrainingController@FilterTrainerList')->name('training.filter-join-trainerList')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('training/joinTraning', 'TrainingController@joinTraning')->name('training.joinTraning')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('training/joinTrainingList', 'TrainingController@joinTrainingList')->name('training.joinTrainingList')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('training/join-status/{id}', 'TrainingController@joinstatus')->name('training.join-status')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('training/join', 'TrainingController@joinSubmit')->name('training.join')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('training/rating-form/{id}', 'TrainingController@RatingForm')->name('training.rating-form')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('training/evalution-form/{id}', 'TrainingController@EvalutionForm')->name('training.evalution-form')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('training/submit-evalution-form', 'TrainingController@SubmitEvalutionForm')->name('training.submit-evalution-form')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('training', 'TrainingController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::post('plan-pay-with-paypal', 'PaypalController@planPayWithPaypal')->name('plan.pay.with.paypal')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('{id}/plan-get-payment-status', 'PaypalController@planGetPaymentStatus')->name('plan.get.payment.status')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get(
    '/apply-coupon', [
                       'as' => 'apply.coupon',
                       'uses' => 'CouponController@applyCoupon',
                   ]
)->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::get('report/income-expense', 'ReportController@incomeVsExpense')->name('report.income-expense')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('report/leave', 'ReportController@leave')->name('report.leave')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('employee/{id}/leave/{status}/{type}/{month}/{year}', 'ReportController@employeeLeave')->name('report.employee.leave')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('report/account-statement', 'ReportController@accountStatement')->name('report.account.statement')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('report/payroll', 'ReportController@payroll')->name('report.payroll')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('report/monthly/attendance', 'ReportController@monthlyAttendance')->name('report.monthly.attendance')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('report/attendance/{month}/{branch}/{department}', 'ReportController@exportCsv')->name('report.attendance')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('report/timesheet', 'ReportController@timesheet')->name('report.timesheet')->middleware(
    [
        'auth',
        'XSS',
    ]
);


//------------------------------------  Recurtment --------------------------------

Route::resource('job-category', 'JobCategoryController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('job-stage', 'JobStageController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('job-stage/order', 'JobStageController@order')->name('job.stage.order')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('job', 'JobController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('career/{id}/{lang}', 'JobController@career')->name('career');
Route::get('job/requirement/{code}/{lang}', 'JobController@jobRequirement')->name('job.requirement');
Route::get('job/apply/{code}/{lang}', 'JobController@jobApply')->name('job.apply');
Route::post('job/apply/data/{code}', 'JobController@jobApplyData')->name('job.apply.data');


Route::get('job-application/candidate', 'JobApplicationController@candidate')->name('job.application.candidate')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('job-application', 'JobApplicationController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('job-application/order', 'JobApplicationController@order')->name('job.application.order')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('job-application/{id}/rating', 'JobApplicationController@rating')->name('job.application.rating')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::delete('job-application/{id}/archive', 'JobApplicationController@archive')->name('job.application.archive')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('job-application/{id}/skill/store', 'JobApplicationController@addSkill')->name('job.application.skill.store')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('job-application/{id}/note/store', 'JobApplicationController@addNote')->name('job.application.note.store')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::delete('job-application/{id}/note/destroy', 'JobApplicationController@destroyNote')->name('job.application.note.destroy')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('job-application/getByJob', 'JobApplicationController@getByJob')->name('get.job.application')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::get('job-onboard', 'JobApplicationController@jobOnBoard')->name('job.on.board')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('job-onboard/create/{id}', 'JobApplicationController@jobBoardCreate')->name('job.on.board.create')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('job-onboard/store/{id}', 'JobApplicationController@jobBoardStore')->name('job.on.board.store')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('job-onboard/edit/{id}', 'JobApplicationController@jobBoardEdit')->name('job.on.board.edit')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('job-onboard/update/{id}', 'JobApplicationController@jobBoardUpdate')->name('job.on.board.update')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::delete('job-onboard/delete/{id}', 'JobApplicationController@jobBoardDelete')->name('job.on.board.delete')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('job-onboard/convert/{id}', 'JobApplicationController@jobBoardConvert')->name('job.on.board.convert')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::post('job-onboard/convert/{id}', 'JobApplicationController@jobBoardConvertData')->name('job.on.board.convert')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::post('job-application/stage/change', 'JobApplicationController@stageChange')->name('job.application.stage.change')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('custom-question', 'CustomQuestionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('interview-schedule', 'InterviewScheduleController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('interview-schedule/create/{id?}', 'InterviewScheduleController@create')->name('interview-schedule.create')->middleware(
    [
        'auth',
        'XSS',
    ]
);
//================================= Custom Landing Page ====================================//

Route::get('/landingpage', 'LandingPageSectionController@index')->name('custom_landing_page.index')->middleware(['auth','XSS']);
Route::get('/LandingPage/show/{id}', 'LandingPageSectionController@show');
Route::post('/LandingPage/setConetent', 'LandingPageSectionController@setConetent')->middleware(['auth','XSS']);
Route::get('/get_landing_page_section/{name}', function($name) {
    $plans = \DB::table('plans')->get();

    return view('custom_landing_page.'.$name,compact('plans'));
});
Route::post('/LandingPage/removeSection/{id}', 'LandingPageSectionController@removeSection')->middleware(['auth','XSS']);
Route::post('/LandingPage/setOrder', 'LandingPageSectionController@setOrder')->middleware(['auth','XSS']);
Route::post('/LandingPage/copySection', 'LandingPageSectionController@copySection')->middleware(['auth','XSS']);


//================================= Payment Gateways  ====================================//

Route::post('/plan-pay-with-paystack',['as' => 'plan.pay.with.paystack','uses' =>'PaystackPaymentController@planPayWithPaystack'])->middleware(['auth','XSS']);
Route::get('/plan/paystack/{pay_id}/{plan_id}', ['as' => 'plan.paystack','uses' => 'PaystackPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-flaterwave',['as' => 'plan.pay.with.flaterwave','uses' =>'FlutterwavePaymentController@planPayWithFlutterwave'])->middleware(['auth','XSS']);
Route::get('/plan/flaterwave/{txref}/{plan_id}', ['as' => 'plan.flaterwave','uses' => 'FlutterwavePaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-razorpay',['as' => 'plan.pay.with.razorpay','uses' =>'RazorpayPaymentController@planPayWithRazorpay'])->middleware(['auth','XSS']);
Route::get('/plan/razorpay/{txref}/{plan_id}', ['as' => 'plan.razorpay','uses' => 'RazorpayPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-paytm',['as' => 'plan.pay.with.paytm','uses' =>'PaytmPaymentController@planPayWithPaytm'])->middleware(['auth','XSS']);
Route::post('/plan/paytm/{plan}', ['as' => 'plan.paytm','uses' => 'PaytmPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-mercado',['as' => 'plan.pay.with.mercado','uses' =>'MercadoPaymentController@planPayWithMercado'])->middleware(['auth','XSS']);
Route::post('/plan/mercado', ['as' => 'plan.mercado','uses' => 'MercadoPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-mollie',['as' => 'plan.pay.with.mollie','uses' =>'MolliePaymentController@planPayWithMollie'])->middleware(['auth','XSS']);
Route::get('/plan/mollie/{plan}', ['as' => 'plan.mollie','uses' => 'MolliePaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-skrill',['as' => 'plan.pay.with.skrill','uses' =>'SkrillPaymentController@planPayWithSkrill'])->middleware(['auth','XSS']);
Route::get('/plan/skrill/{plan}', ['as' => 'plan.skrill','uses' => 'SkrillPaymentController@getPaymentStatus']);

Route::post('/plan-pay-with-coingate',['as' => 'plan.pay.with.coingate','uses' =>'CoingatePaymentController@planPayWithCoingate'])->middleware(['auth','XSS']);
Route::get('/plan/coingate/{plan}', ['as' => 'plan.coingate','uses' => 'CoingatePaymentController@getPaymentStatus']);


Route::resource('competencies', 'CompetenciesController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
