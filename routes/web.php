<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('welcome');
 
Auth::routes();

 Route::post('users/login', [App\Http\Controllers\UserController::class, 'login'])->name('users.login');
 Route::post('users/register', [App\Http\Controllers\UserController::class, 'register'])->name('users.register');
 
 Route::any('search-results/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search-results.search');
 Route::any('search-results/modal-search', [App\Http\Controllers\SearchController::class, 'modalSearch'])->name('search-results.modal-search');
 
 Route::get('search-results/search-list', [App\Http\Controllers\SearchController::class, 'searchList'])->name('search-results.search-list');
 
 Route::get('disciplines/discipline-list', [App\Http\Controllers\DisciplineController::class, 'disciplineList'])->name('disciplines.discipline-list');
 Route::get('disciplines/all-discipline-list', [App\Http\Controllers\DisciplineController::class, 'allDisciplineList'])->name('disciplines.all-discipline-list');
 
 Route::any('courses/course-list', [App\Http\Controllers\CourseController::class, 'courseList'])->name('courses.course-list');
 Route::get('courses/course-details', [App\Http\Controllers\CourseController::class, 'courseDetails'])->name('courses.course-details');
 
 Route::any('courses/report-screen-shot', [App\Http\Controllers\CourseController::class, 'reportScreenShot'])->name('courses.report-screen-shot');
	

Route::middleware(['auth'])->group(function (){   
	
	//profile
	Route::get('users/{id}/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('users.profile');
	Route::get('users/{id}/profile-edit', [App\Http\Controllers\UserController::class, 'profileEdit'])->name('users.profile-edit');
	Route::post('users/{id}/profile-update', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('users.profile-update');
	
	//Change Password	
	Route::get('/users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.change-password');
	Route::post('/users/{id}/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.update-password');
	
//User Roots
	Route::middleware(['user'])->group(function (){   
		Route::get('/user-home', [App\Http\Controllers\HomeController::class, 'userIndex'])->name('user-home');
		Route::post('specializations/comparison-report', [App\Http\Controllers\SpecializationController::class, 'comparisonReport'])->name('specializations.comparison-report');
		Route::post('specializations/comparison', [App\Http\Controllers\SpecializationController::class, 'comparison'])->name('specializations.comparison');

	});
	
//Agent Roots
	Route::middleware(['agent'])->group(function (){   
		Route::get('/agent-home', [App\Http\Controllers\HomeController::class, 'agentIndex'])->name('agent-home');
	});
	
//Admin Roots
	Route::middleware(['admin'])->group(function (){
	   
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
		
		//Users
		Route::get('users/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
		Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
		Route::post('users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
		Route::get('users/{id}/show', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
		Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
		Route::post('users/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
		Route::get('users/{id}/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
		
		/* //profile
		Route::get('users/{id}/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('users.profile');
		Route::get('users/{id}/profile-edit', [App\Http\Controllers\UserController::class, 'profileEdit'])->name('users.profile-edit');
		Route::post('users/{id}/profile-update', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('users.profile-update');
		
		//Change Password	
		Route::get('/users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.change-password');
		Route::post('/users/{id}/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.update-password');
		 */
		//Users Import and export
		Route::post('users/import', [App\Http\Controllers\ExcelController::class,'importUsers'])->name('users.import');
		Route::get('users/export', [App\Http\Controllers\ExcelController::class,'exportUsers'])->name('users.export');

		//Roles
		Route::get('roles/index', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
		Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');
		Route::post('roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
		Route::get('roles/{id}/show', [App\Http\Controllers\RoleController::class, 'show'])->name('roles.show');
		Route::get('roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
		Route::post('roles/{id}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
		Route::get('roles/{id}/delete', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.delete');
		
		//Countries
		Route::get('countries/index', [App\Http\Controllers\CountryController::class, 'index'])->name('countries.index');
		Route::get('countries/create', [App\Http\Controllers\CountryController::class, 'create'])->name('countries.create');
		Route::post('countries/store', [App\Http\Controllers\CountryController::class, 'store'])->name('countries.store');
		Route::get('countries/{id}/show', [App\Http\Controllers\CountryController::class, 'show'])->name('countries.show');
		Route::get('countries/{id}/edit', [App\Http\Controllers\CountryController::class, 'edit'])->name('countries.edit');
		Route::post('countries/{id}/update', [App\Http\Controllers\CountryController::class, 'update'])->name('countries.update');
		Route::get('countries/{id}/delete', [App\Http\Controllers\CountryController::class, 'destroy'])->name('countries.delete');

		//States
		Route::get('states/{id}/index', [App\Http\Controllers\StateController::class, 'index'])->name('states.index');
		Route::get('states/{id}/create', [App\Http\Controllers\StateController::class, 'create'])->name('states.create');
		Route::post('states/{id}/store', [App\Http\Controllers\StateController::class, 'store'])->name('states.store');
		Route::get('states/{id}/show', [App\Http\Controllers\StateController::class, 'show'])->name('states.show');
		Route::get('states/{id}/edit', [App\Http\Controllers\StateController::class, 'edit'])->name('states.edit');
		Route::post('states/{id}/update', [App\Http\Controllers\StateController::class, 'update'])->name('states.update');
		Route::get('states/{id}/delete', [App\Http\Controllers\StateController::class, 'destroy'])->name('states.delete');

		//Cities
		Route::get('cities/{id}/index', [App\Http\Controllers\CityController::class, 'index'])->name('cities.index');
		Route::get('cities/{id}/create', [App\Http\Controllers\CityController::class, 'create'])->name('cities.create');
		Route::post('cities/{id}/store', [App\Http\Controllers\CityController::class, 'store'])->name('cities.store');
		Route::get('cities/{id}/show', [App\Http\Controllers\CityController::class, 'show'])->name('cities.show');
		Route::get('cities/{id}/edit', [App\Http\Controllers\CityController::class, 'edit'])->name('cities.edit');
		Route::post('cities/{id}/update', [App\Http\Controllers\CityController::class, 'update'])->name('cities.update');
		Route::get('cities/{id}/delete', [App\Http\Controllers\CityController::class, 'destroy'])->name('cities.delete');

		//Programs
		Route::get('programs/index', [App\Http\Controllers\ProgramController::class, 'index'])->name('programs.index');
		Route::get('programs/create', [App\Http\Controllers\ProgramController::class, 'create'])->name('programs.create');
		Route::post('programs/store', [App\Http\Controllers\ProgramController::class, 'store'])->name('programs.store');
		Route::get('programs/{id}/show', [App\Http\Controllers\ProgramController::class, 'show'])->name('programs.show');
		Route::get('programs/{id}/edit', [App\Http\Controllers\ProgramController::class, 'edit'])->name('programs.edit');
		Route::post('programs/{id}/update', [App\Http\Controllers\ProgramController::class, 'update'])->name('programs.update');
		Route::get('programs/{id}/delete', [App\Http\Controllers\ProgramController::class, 'destroy'])->name('programs.delete');

		//Disciplines
		Route::get('disciplines/index', [App\Http\Controllers\DisciplineController::class, 'index'])->name('disciplines.index');
		Route::get('disciplines/create', [App\Http\Controllers\DisciplineController::class, 'create'])->name('disciplines.create');
		Route::post('disciplines/store', [App\Http\Controllers\DisciplineController::class, 'store'])->name('disciplines.store');
		Route::get('disciplines/{id}/show', [App\Http\Controllers\DisciplineController::class, 'show'])->name('disciplines.show');
		Route::get('disciplines/{id}/edit', [App\Http\Controllers\DisciplineController::class, 'edit'])->name('disciplines.edit');
		Route::post('disciplines/{id}/update', [App\Http\Controllers\DisciplineController::class, 'update'])->name('disciplines.update');
		Route::get('disciplines/{id}/delete', [App\Http\Controllers\DisciplineController::class, 'destroy'])->name('disciplines.delete');

		
		//Branches
		Route::get('branches/{id}/index', [App\Http\Controllers\BranchController::class, 'index'])->name('branches.index');
		Route::get('branches/{id}/create', [App\Http\Controllers\BranchController::class, 'create'])->name('branches.create');
		Route::post('branches/{id}/store', [App\Http\Controllers\BranchController::class, 'store'])->name('branches.store');
		Route::get('branches/{id}/show', [App\Http\Controllers\BranchController::class, 'show'])->name('branches.show');
		Route::get('branches/{id}/edit', [App\Http\Controllers\BranchController::class, 'edit'])->name('branches.edit');
		Route::post('branches/{id}/update', [App\Http\Controllers\BranchController::class, 'update'])->name('branches.update');
		Route::get('branches/{id}/delete', [App\Http\Controllers\BranchController::class, 'destroy'])->name('branches.delete');
		
		//Campus Programs
		Route::get('campus_programs/{id}/index', [App\Http\Controllers\CampusProgramController::class, 'index'])->name('campus_programs.index');
		Route::get('campus_programs/{id}/create', [App\Http\Controllers\CampusProgramController::class, 'create'])->name('campus_programs.create');
		Route::post('campus_programs/{id}/store', [App\Http\Controllers\CampusProgramController::class, 'store'])->name('campus_programs.store');
		Route::get('campus_programs/{id}/show', [App\Http\Controllers\CampusProgramController::class, 'show'])->name('campus_programs.show');
		Route::get('campus_programs/{id}/edit', [App\Http\Controllers\CampusProgramController::class, 'edit'])->name('campus_programs.edit');
		Route::post('campus_programs/{id}/update', [App\Http\Controllers\CampusProgramController::class, 'update'])->name('campus_programs.update');
		Route::get('campus_programs/{id}/delete', [App\Http\Controllers\CampusProgramController::class, 'destroy'])->name('campus_programs.delete');

		//Program Disciplines
		Route::get('program_disciplines/{id}/index', [App\Http\Controllers\ProgramDisciplineController::class, 'index'])->name('program_disciplines.index');
		Route::get('program_disciplines/{id}/create', [App\Http\Controllers\ProgramDisciplineController::class, 'create'])->name('program_disciplines.create');
		Route::post('program_disciplines/{id}/store', [App\Http\Controllers\ProgramDisciplineController::class, 'store'])->name('program_disciplines.store');
		Route::get('program_disciplines/{id}/show', [App\Http\Controllers\ProgramDisciplineController::class, 'show'])->name('program_disciplines.show');
		Route::get('program_disciplines/{id}/edit', [App\Http\Controllers\ProgramDisciplineController::class, 'edit'])->name('program_disciplines.edit');
		Route::post('program_disciplines/{id}/update', [App\Http\Controllers\ProgramDisciplineController::class, 'update'])->name('program_disciplines.update');
		Route::get('program_disciplines/{id}/delete', [App\Http\Controllers\ProgramDisciplineController::class, 'destroy'])->name('program_disciplines.delete');

		
		//Discipline Branches
		Route::get('discipline_branches/{id}/index', [App\Http\Controllers\DisciplineBranchController::class, 'index'])->name('discipline_branches.index');
		Route::get('discipline_branches/{id}/create', [App\Http\Controllers\DisciplineBranchController::class, 'create'])->name('discipline_branches.create');
		Route::post('discipline_branches/{id}/store', [App\Http\Controllers\DisciplineBranchController::class, 'store'])->name('discipline_branches.store');
		Route::get('discipline_branches/{id}/show', [App\Http\Controllers\DisciplineBranchController::class, 'show'])->name('discipline_branches.show');
		Route::get('discipline_branches/{id}/edit', [App\Http\Controllers\DisciplineBranchController::class, 'edit'])->name('discipline_branches.edit');
		Route::post('discipline_branches/{id}/update', [App\Http\Controllers\DisciplineBranchController::class, 'update'])->name('discipline_branches.update');
		Route::get('discipline_branches/{id}/delete', [App\Http\Controllers\DisciplineBranchController::class, 'destroy'])->name('discipline_branches.delete');

		//Branch Specializations
		Route::get('branch_specializations/{id}/index', [App\Http\Controllers\BranchSpecializationController::class, 'index'])->name('branch_specializations.index');
		Route::get('branch_specializations/{id}/create', [App\Http\Controllers\BranchSpecializationController::class, 'create'])->name('branch_specializations.create');
		Route::post('branch_specializations/{id}/store', [App\Http\Controllers\BranchSpecializationController::class, 'store'])->name('branch_specializations.store');
		Route::get('branch_specializations/{id}/show', [App\Http\Controllers\BranchSpecializationController::class, 'show'])->name('branch_specializations.show');
		Route::get('branch_specializations/{id}/edit', [App\Http\Controllers\BranchSpecializationController::class, 'edit'])->name('branch_specializations.edit');
		Route::post('branch_specializations/{id}/update', [App\Http\Controllers\BranchSpecializationController::class, 'update'])->name('branch_specializations.update');
		Route::get('branch_specializations/{id}/delete', [App\Http\Controllers\BranchSpecializationController::class, 'destroy'])->name('branch_specializations.delete');
			
		//Specializations
		Route::get('specializations/{id}/index', [App\Http\Controllers\SpecializationController::class, 'index'])->name('specializations.index');
		Route::get('specializations/{id}/create', [App\Http\Controllers\SpecializationController::class, 'create'])->name('specializations.create');
		Route::post('specializations/{id}/store', [App\Http\Controllers\SpecializationController::class, 'store'])->name('specializations.store');
		Route::get('specializations/{id}/show', [App\Http\Controllers\SpecializationController::class, 'show'])->name('specializations.show');
		Route::get('specializations/{id}/edit', [App\Http\Controllers\SpecializationController::class, 'edit'])->name('specializations.edit');
		Route::post('specializations/{id}/update', [App\Http\Controllers\SpecializationController::class, 'update'])->name('specializations.update');
		Route::get('specializations/{id}/delete', [App\Http\Controllers\SpecializationController::class, 'destroy'])->name('specializations.delete');
		
		
		//Universities
		Route::get('universities/index', [App\Http\Controllers\UniversityController::class, 'index'])->name('universities.index');
		Route::get('universities/create', [App\Http\Controllers\UniversityController::class, 'create'])->name('universities.create');
		Route::post('universities/store', [App\Http\Controllers\UniversityController::class, 'store'])->name('universities.store');
		Route::get('universities/{id}/show', [App\Http\Controllers\UniversityController::class, 'show'])->name('universities.show');
		Route::get('universities/{id}/edit', [App\Http\Controllers\UniversityController::class, 'edit'])->name('universities.edit');
		Route::post('universities/{id}/update', [App\Http\Controllers\UniversityController::class, 'update'])->name('universities.update');
		Route::get('universities/{id}/delete', [App\Http\Controllers\UniversityController::class, 'destroy'])->name('universities.delete');
			
		//Campuses
		Route::get('campuses/{id}/index', [App\Http\Controllers\CampusController::class, 'index'])->name('campuses.index');
		Route::get('campuses/{id}/create', [App\Http\Controllers\CampusController::class, 'create'])->name('campuses.create');
		Route::post('campuses/{id}/store', [App\Http\Controllers\CampusController::class, 'store'])->name('campuses.store');
		Route::get('campuses/{id}/show', [App\Http\Controllers\CampusController::class, 'show'])->name('campuses.show');
		Route::get('campuses/{id}/edit', [App\Http\Controllers\CampusController::class, 'edit'])->name('campuses.edit');
		Route::post('campuses/{id}/update', [App\Http\Controllers\CampusController::class, 'update'])->name('campuses.update');
		Route::get('campuses/{id}/delete', [App\Http\Controllers\CampusController::class, 'destroy'])->name('campuses.delete');
		//Users Import and export
		Route::post('universities/import', [App\Http\Controllers\ExcelController::class,'importUniversities'])->name('universities.import');
		Route::get('universities/export', [App\Http\Controllers\ExcelController::class,'exportUniversities'])->name('universities.export');

		//Attendance
		Route::get('attendances/index', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendances.index');
		Route::get('attendances/create', [App\Http\Controllers\AttendanceController::class, 'create'])->name('attendances.create');
		Route::post('attendances/store', [App\Http\Controllers\AttendanceController::class, 'store'])->name('attendances.store');
		Route::get('attendances/{id}/show', [App\Http\Controllers\AttendanceController::class, 'show'])->name('attendances.show');
		Route::get('attendances/{id}/edit', [App\Http\Controllers\AttendanceController::class, 'edit'])->name('attendances.edit');
		Route::post('attendances/{id}/update', [App\Http\Controllers\AttendanceController::class, 'update'])->name('attendances.update');
		Route::get('attendances/{id}/delete', [App\Http\Controllers\AttendanceController::class, 'destroy'])->name('attendances.delete');

		//Duration
		Route::get('durations/index', [App\Http\Controllers\DurationController::class, 'index'])->name('durations.index');
		Route::get('durations/create', [App\Http\Controllers\DurationController::class, 'create'])->name('durations.create');
		Route::post('durations/store', [App\Http\Controllers\DurationController::class, 'store'])->name('durations.store');
		Route::get('durations/{id}/show', [App\Http\Controllers\DurationController::class, 'show'])->name('durations.show');
		Route::get('durations/{id}/edit', [App\Http\Controllers\DurationController::class, 'edit'])->name('durations.edit');
		Route::post('durations/{id}/update', [App\Http\Controllers\DurationController::class, 'update'])->name('durations.update');
		Route::get('durations/{id}/delete', [App\Http\Controllers\DurationController::class, 'destroy'])->name('durations.delete');
		
		//Requirement
		Route::get('requirements/index', [App\Http\Controllers\RequirementController::class, 'index'])->name('requirements.index');
		Route::get('requirements/create', [App\Http\Controllers\RequirementController::class, 'create'])->name('requirements.create');
		Route::post('requirements/store', [App\Http\Controllers\RequirementController::class, 'store'])->name('requirements.store');
		Route::get('requirements/{id}/show', [App\Http\Controllers\RequirementController::class, 'show'])->name('requirements.show');
		Route::get('requirements/{id}/edit', [App\Http\Controllers\RequirementController::class, 'edit'])->name('requirements.edit');
		Route::post('requirements/{id}/update', [App\Http\Controllers\RequirementController::class, 'update'])->name('requirements.update');
		Route::get('requirements/{id}/delete', [App\Http\Controllers\RequirementController::class, 'destroy'])->name('requirements.delete');

		//Format
		Route::get('formats/index', [App\Http\Controllers\FormatController::class, 'index'])->name('formats.index');
		Route::get('formats/create', [App\Http\Controllers\FormatController::class, 'create'])->name('formats.create');
		Route::post('formats/store', [App\Http\Controllers\FormatController::class, 'store'])->name('formats.store');
		Route::get('formats/{id}/show', [App\Http\Controllers\FormatController::class, 'show'])->name('formats.show');
		Route::get('formats/{id}/edit', [App\Http\Controllers\FormatController::class, 'edit'])->name('formats.edit');
		Route::post('formats/{id}/update', [App\Http\Controllers\FormatController::class, 'update'])->name('formats.update');
		Route::get('formats/{id}/delete', [App\Http\Controllers\FormatController::class, 'destroy'])->name('formats.delete');

		//Course
		Route::get('courses/{id}/index', [App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');
		Route::get('courses/{id}/create', [App\Http\Controllers\CourseController::class, 'create'])->name('courses.create');
		Route::post('courses/{id}/store', [App\Http\Controllers\CourseController::class, 'store'])->name('courses.store');
		Route::get('courses/{id}/show', [App\Http\Controllers\CourseController::class, 'show'])->name('courses.show');
		Route::get('courses/{id}/edit', [App\Http\Controllers\CourseController::class, 'edit'])->name('courses.edit');
		Route::post('courses/{id}/update', [App\Http\Controllers\CourseController::class, 'update'])->name('courses.update');
		Route::get('courses/{id}/delete', [App\Http\Controllers\CourseController::class, 'destroy'])->name('courses.delete');

		//BankLoan
		Route::get('bank_loans/index', [App\Http\Controllers\BankLoanController::class, 'index'])->name('bank_loans.index');
		Route::get('bank_loans/create', [App\Http\Controllers\BankLoanController::class, 'create'])->name('bank_loans.create');
		Route::post('bank_loans/store', [App\Http\Controllers\BankLoanController::class, 'store'])->name('bank_loans.store');
		Route::get('bank_loans/{id}/show', [App\Http\Controllers\BankLoanController::class, 'show'])->name('bank_loans.show');
		Route::get('bank_loans/{id}/edit', [App\Http\Controllers\BankLoanController::class, 'edit'])->name('bank_loans.edit');
		Route::post('bank_loans/{id}/update', [App\Http\Controllers\BankLoanController::class, 'update'])->name('bank_loans.update');
		Route::get('bank_loans/{id}/delete', [App\Http\Controllers\BankLoanController::class, 'destroy'])->name('bank_loans.delete');

		//UploadDocs
		Route::get('upload_docs/index', [App\Http\Controllers\UploadDocController::class, 'index'])->name('upload_docs.index');
		Route::get('upload_docs/create', [App\Http\Controllers\UploadDocController::class, 'create'])->name('upload_docs.create');
		Route::post('upload_docs/store', [App\Http\Controllers\UploadDocController::class, 'store'])->name('upload_docs.store');
		Route::get('upload_docs/{id}/show', [App\Http\Controllers\UploadDocController::class, 'show'])->name('upload_docs.show');
		Route::get('upload_docs/{id}/edit', [App\Http\Controllers\UploadDocController::class, 'edit'])->name('upload_docs.edit');
		Route::post('upload_docs/{id}/update', [App\Http\Controllers\UploadDocController::class, 'update'])->name('upload_docs.update');
		Route::get('upload_docs/{id}/delete', [App\Http\Controllers\UploadDocController::class, 'destroy'])->name('upload_docs.delete');
		Route::get('upload_docs/{id}/delete', [App\Http\Controllers\UploadDocController::class, 'destroy'])->name('upload_docs.delete');

		//ReqDocs
		Route::get('req_docs/index', [App\Http\Controllers\ReqDocController::class, 'index'])->name('req_docs.index');
		Route::get('req_docs/create', [App\Http\Controllers\ReqDocController::class, 'create'])->name('req_docs.create');
		Route::post('req_docs/store', [App\Http\Controllers\ReqDocController::class, 'store'])->name('req_docs.store');
		Route::get('req_docs/{id}/show', [App\Http\Controllers\ReqDocController::class, 'show'])->name('req_docs.show');
		Route::get('req_docs/{id}/edit', [App\Http\Controllers\ReqDocController::class, 'edit'])->name('req_docs.edit');
		Route::post('req_docs/{id}/update', [App\Http\Controllers\ReqDocController::class, 'update'])->name('req_docs.update');
		Route::get('req_docs/{id}/delete', [App\Http\Controllers\ReqDocController::class, 'destroy'])->name('req_docs.delete');

		//VisaProcess
		Route::get('visa-processes/index', [App\Http\Controllers\VisaProcessController::class, 'index'])->name('visa-processes.index');
		Route::get('visa-processes/create', [App\Http\Controllers\VisaProcessController::class, 'create'])->name('visa-processes.create');
		Route::post('visa-processes/store', [App\Http\Controllers\VisaProcessController::class, 'store'])->name('visa-processes.store');
		Route::get('visa-processes/{id}/show/{did?}', [App\Http\Controllers\VisaProcessController::class, 'show'])->name('visa-processes.show');
		Route::get('visa-processes/{id}/edit', [App\Http\Controllers\VisaProcessController::class, 'edit'])->name('visa-processes.edit');
		Route::post('visa-processes/{id}/update', [App\Http\Controllers\VisaProcessController::class, 'update'])->name('visa-processes.update');
		Route::get('visa-processes/{id}/delete', [App\Http\Controllers\VisaProcessController::class, 'destroy'])->name('visa-processes.delete');
		
		//Scholorships
		Route::get('scholorships/index', [App\Http\Controllers\ScholorshipController::class, 'index'])->name('scholorships.index');
		Route::get('scholorships/create', [App\Http\Controllers\ScholorshipController::class, 'create'])->name('scholorships.create');
		Route::post('scholorships/store', [App\Http\Controllers\ScholorshipController::class, 'store'])->name('scholorships.store');
		Route::get('scholorships/{id}/show/{did?}', [App\Http\Controllers\ScholorshipController::class, 'show'])->name('scholorships.show');
		Route::get('scholorships/{id}/edit', [App\Http\Controllers\ScholorshipController::class, 'edit'])->name('scholorships.edit');
		Route::post('scholorships/{id}/update', [App\Http\Controllers\ScholorshipController::class, 'update'])->name('scholorships.update');
		Route::get('scholorships/{id}/delete', [App\Http\Controllers\ScholorshipController::class, 'destroy'])->name('scholorships.delete');
		
		//StandardOperatingProcedure
		Route::get('standard-operating-procedures/index', [App\Http\Controllers\StandardOperatingProcedureController::class, 'index'])->name('standard-operating-procedures.index');
		Route::get('standard-operating-procedures/create', [App\Http\Controllers\StandardOperatingProcedureController::class, 'create'])->name('standard-operating-procedures.create');
		Route::post('standard-operating-procedures/store', [App\Http\Controllers\StandardOperatingProcedureController::class, 'store'])->name('standard-operating-procedures.store');
		Route::get('standard-operating-procedures/{id}/show/{did?}', [App\Http\Controllers\StandardOperatingProcedureController::class, 'show'])->name('standard-operating-procedures.show');
		Route::get('standard-operating-procedures/{id}/edit', [App\Http\Controllers\StandardOperatingProcedureController::class, 'edit'])->name('standard-operating-procedures.edit');
		Route::post('standard-operating-procedures/{id}/update', [App\Http\Controllers\StandardOperatingProcedureController::class, 'update'])->name('standard-operating-procedures.update');
		Route::get('standard-operating-procedures/{id}/delete', [App\Http\Controllers\StandardOperatingProcedureController::class, 'destroy'])->name('standard-operating-procedures.delete');

		//AddClient
		Route::get('add_clients', [App\Http\Controllers\AddClientController::class, 'index'])->name('add_clients.index');
		Route::get('add_clients/create', [App\Http\Controllers\AddClientController::class, 'create'])->name('add_clients.create');
		Route::post('add_clients/store', [App\Http\Controllers\AddClientController::class, 'store'])->name('add_clients.store');
		Route::get('add_clients/{id}/edit', [App\Http\Controllers\AddClientController::class, 'edit'])->name('add_clients.edit');
		Route::post('add_clients/{id}/update', [App\Http\Controllers\AddClientController::class, 'update'])->name('add_clients.update');
		Route::get('add_clients/{id}/show', [App\Http\Controllers\AddClientController::class, 'show'])->name('add_clients.show');
		Route::get('add_clients/{id}/details', [App\Http\Controllers\AddClientController::class, 'details'])->name('add_clients.details');
		Route::get('add_clients/{id}/delete', [App\Http\Controllers\AddClientController::class, 'destroy'])->name('add_clients.delete');
		
		//Advertisements		
		Route::post('advertisements/{id}/update', [App\Http\Controllers\AdvertisementController::class, 'update'])->name('advertisements.update');
		Route::get('advertisements/{id}/delete', [App\Http\Controllers\AdvertisementController::class, 'destroy'])->name('advertisements.delete');
		
		
		//Excel Upload
		
		Route::get('import-export-excelfile', [App\Http\Controllers\ExcelController::class,'excelImportExport'])->name('import-export-excelfile');
		Route::post('excel/import', [App\Http\Controllers\ExcelController::class,'importData'])->name('excel.import');
		Route::get('excel/export', [App\Http\Controllers\ExcelController::class,'exportData'])->name('excel.export');
		
		//Permissions		
		Route::get('users/permission/{id}/{flag}', [App\Http\Controllers\UserController::class, 'permission'])->name('users.permission');
		
		//Semister		
		Route::get('semister-delete/{id}', [App\Http\Controllers\SemisterController::class, 'destroy'])->name('semister-delete');
	
	});
	
});

Route::get('/storagelink', function () {
   Artisan::call('storage:link');
});

Route::get('/migrate', function () {
   Artisan::call('migrate');
});


	Route::get('branch_specializations/{id}/course-view', [App\Http\Controllers\BranchSpecializationController::class, 'courseView'])->name('branch_specializations.course-view');
	
	Route::get('get-universities/{id}', [App\Http\Controllers\BranchSpecializationController::class, 'getUniversities'])->name('get-universities');  
	Route::get('get-campuses/{id}', [App\Http\Controllers\BranchSpecializationController::class, 'getCampuses'])->name('get-campuses');  
	Route::get('get-specializations/{id}', [App\Http\Controllers\BranchSpecializationController::class, 'getSpecializations'])->name('get-specializations');  
	Route::get('get-disp-specializations/{id}', [App\Http\Controllers\StandardOperatingProcedureController::class, 'getDispSpecializations'])->name('get-disp-specializations');  
	
	Route::get('get-sop-specializations/{id}', [App\Http\Controllers\StandardOperatingProcedureController::class, 'getSopSpecializations'])->name('get-sop-specializations');  
	Route::get('get-courses/{id}', [App\Http\Controllers\BranchSpecializationController::class, 'getCourses'])->name('get-courses');  
	
	Route::get('get-agents/{id}', [App\Http\Controllers\VisaProcessController::class, 'getAgents'])->name('get-agents');  
	Route::get('get-states/{id}', [App\Http\Controllers\UniversityController::class, 'getState'])->name('get-states');  
	Route::get('get-cities/{id}', [App\Http\Controllers\UniversityController::class, 'getCity'])->name('get-cities');  
	//Comparison
	//Route::post('specializations/comparison-report', [App\Http\Controllers\SpecializationController::class, 'comparisonReport'])->name('specializations.comparison-report');
	//Route::post('specializations/comparison', [App\Http\Controllers\SpecializationController::class, 'comparison'])->name('specializations.comparison');
	Route::post('search-results/comparison', [App\Http\Controllers\SearchController::class, 'comparison'])->name('search-results.comparison');
	
	
	Route::any('requirements/req-docs-details', [App\Http\Controllers\PublicController::class, 'reqDocsDetails'])->name('requirements.req-docs-details');
	Route::any('requirements/loan-details', [App\Http\Controllers\PublicController::class, 'loanDetails'])->name('requirements.loan-details');
	Route::any('requirements/visa-processing-details', [App\Http\Controllers\PublicController::class, 'visaProcessingDetails'])->name('requirements.visa-processing-details');
	Route::any('requirements/scholorship-details', [App\Http\Controllers\PublicController::class, 'scholorshipDetails'])->name('requirements.scholorship-details');

Route::get('/viewfile/{folder}/{filename}', function ($folder, $filename) {	
		$filepath =  Storage::path("$folder/$filename");
		return response()->file($filepath);
	})->name('viewfile');

Route::get('/download/{folder}/{filename}', function ($folder, $filename) {
       $file =  Storage::get("$folder/$filename");
       return response($file, 200)->header('Content-Type', 'image/jpeg');
	})->name('download');
	
