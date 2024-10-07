<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Reader\Exception;

use PhpOffice\PhpSpreadsheet\Writer\Xls;

use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Support\Facades\Hash;

use Auth;


class ExcelController extends Controller
{
	
	//Import Users
	function importUsers(Request $request){

       $this->validate($request, [

           'uploaded_file' => 'required|file|mimes:xls,xlsx'

       ]);

       $the_file = $request->file('uploaded_file');

       try{

           $spreadsheet = IOFactory::load($the_file->getRealPath());

           $sheet        = $spreadsheet->getActiveSheet();

           $row_limit    = $sheet->getHighestDataRow();

           $column_limit = $sheet->getHighestDataColumn();

           $row_range    = range( 2, $row_limit );

           $column_range = range( 'F', $column_limit );

           $startcount = 2;

           $data = array();

           foreach ( $row_range as $row ) {

               $data[] = [

                   'name' =>$sheet->getCell( 'A' . $row )->getValue(),

                   'email' => $sheet->getCell( 'B' . $row )->getValue(),

                   'mobile' => $sheet->getCell( 'C' . $row )->getValue(),

                  // 'password' => Hash::make(DataHelper::getPassword()),
                   'password' => Hash::make($sheet->getCell( 'D' . $row )->getValue()),

                   'photo' => $sheet->getCell( 'E' . $row )->getValue(),
                   
				   'status' => $sheet->getCell( 'F' . $row )->getValue(),

                   'role_id' =>$sheet->getCell( 'G' . $row )->getValue(),

               ];

               $startcount++;

           }
           DB::table('users')->insert($data);

       } catch (Exception $e) {

           $error_code = $e->errorInfo[1];
           return redirect(route('users.index'))->withErrors('There was a problem uploading the data!');

       }

       return redirect(route('users.index'))->withSuccess('Great! Data has been successfully uploaded.');
	}
	
	//Export Users
	function exportUsers(){

       $data = DB::table('users')->orderBy('id', 'DESC')->get();

       $data_array [] = array("name","email","mobile","status");

       foreach($data as $data_item){

           $data_array[] = array(

				'name' =>$data_item->name,

				'email' => $data_item->email,

				'mobile' => $data_item->mobile,

				'status' => $data_item->status,

				//'role_id' =>$data_item->role_id

           );

       }

		$this->ExportExcel($data_array);

		return redirect(route('users.index'))->withSuccess('Great! Data has been successfully uploaded.');

	}
	
	//Import Universities
	function importUniversities(Request $request){

       $this->validate($request, [

           'uploaded_file' => 'required|file|mimes:xls,xlsx'

       ]);

       $the_file = $request->file('uploaded_file');

       try{

           $spreadsheet = IOFactory::load($the_file->getRealPath());

           $sheet        = $spreadsheet->getActiveSheet();

           $row_limit    = $sheet->getHighestDataRow();

           $column_limit = $sheet->getHighestDataColumn();

           $row_range    = range( 2, $row_limit );

           $column_range = range( 'G', $column_limit );

           $startcount = 2;

           $data = array();
		   
		   $userid=Auth::user()->id;

           foreach ( $row_range as $row ) {

               $data[] = [

                   'university' => $sheet->getCell( 'A' . $row )->getValue(),

                   'code' => $sheet->getCell( 'B' . $row )->getValue(),

                   'description' => $sheet->getCell( 'C' . $row )->getValue(),

                   'website' => $sheet->getCell( 'D' . $row )->getValue(),

                   'country_id' => $sheet->getCell( 'E' . $row )->getValue(),
                   
				   'state_id' => $sheet->getCell( 'F' . $row )->getValue(),

                   'city_id' => $sheet->getCell( 'G' . $row )->getValue(),
				   'created_by' => $userid,
               ];

               $startcount++;

           }
		
           DB::table('universities')->insert($data);

       }catch(\Illuminate\Database\QueryException $ex){ 
			//dd($ex); 
				return redirect(route('universities.index'))->with(['error'=>'There was a problem uploading the data!, please upload minimum 2 records in excel file!']);
		// Note any method of class PDOException can be called on $ex.
		}
		catch (Exception $e) {
			$error_code = $e->errorInfo[1];
			return redirect(route('universities.index'))->withErrors('There was a problem uploading the data!');
		}

       return redirect(route('universities.index'))->withSuccess('Great! Data has been successfully uploaded.');
	}

	//Export Universities
	function exportUniversities(){

       $data = DB::table('universities')->orderBy('id', 'DESC')->get();

       $data_array [] = array("name","email","mobile","photo","status","role_id");

       foreach($data as $data_item){

           $data_array[] = array(

               'name' =>$data_item->name,

               'email' => $data_item->email,

               'mobile' => $data_item->mobile,

               'photo' => $data_item->photo,

               'status' => $data_item->status,

               'role_id' =>$data_item->role_id

           );

       }

		$this->ExportExcel($data_array);

		return redirect(route('universities.index'))->withSuccess('Great! Data has been successfully uploaded.');

	}



	

   /**

    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

    */

	function excelImportExport(){

       return view('import-export-excelfile');

	}
   
	function index(){

       $data = DB::table('tbl_customer')->orderBy('CustomerID', 'DESC')->paginate(5);

       return view('excel.index', compact('data'));

	}




   /**

    * @param Request $request

    * @return \Illuminate\Http\RedirectResponse

    * @throws \Illuminate\Validation\ValidationException

    * @throws \PhpOffice\PhpSpreadsheet\Exception

    */

	function importData(Request $request){

       $this->validate($request, [

           'uploaded_file' => 'required|file|mimes:xls,xlsx'

       ]);

       $the_file = $request->file('uploaded_file');

       try{

           $spreadsheet = IOFactory::load($the_file->getRealPath());

           $sheet        = $spreadsheet->getActiveSheet();

           $row_limit    = $sheet->getHighestDataRow();

           $column_limit = $sheet->getHighestDataColumn();

           $row_range    = range( 2, $row_limit );

           $column_range = range( 'F', $column_limit );

           $startcount = 2;

           $data = array();

           foreach ( $row_range as $row ) {

               $data[] = [

                   'CustomerName' =>$sheet->getCell( 'A' . $row )->getValue(),

                   'Gender' => $sheet->getCell( 'B' . $row )->getValue(),

                   'Address' => $sheet->getCell( 'C' . $row )->getValue(),

                   'City' => $sheet->getCell( 'D' . $row )->getValue(),

                   'PostalCode' => $sheet->getCell( 'E' . $row )->getValue(),

                   'Country' =>$sheet->getCell( 'F' . $row )->getValue(),

               ];

               $startcount++;

           }

           DB::table('tbl_customer')->insert($data);

		} catch (Exception $e) {

           $error_code = $e->errorInfo[1];

           return back()->withErrors('There was a problem uploading the data!');

		}

       return back()->withSuccess('Great! Data has been successfully uploaded.');

	}

   /**

    * @param $customer_data

    */

   public function ExportExcel($customer_data){

       ini_set('max_execution_time', 0);

       ini_set('memory_limit', '4000M');




       try {

           $spreadSheet = new Spreadsheet();

           $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);

           $spreadSheet->getActiveSheet()->fromArray($customer_data);

           $Excel_writer = new Xls($spreadSheet);

           header('Content-Type: application/vnd.ms-excel');

           header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');

           header('Cache-Control: max-age=0');

           ob_end_clean();

           $Excel_writer->save('php://output');

           exit();

       } catch (Exception $e) {

           return;

       }

   }

   /**

    *This function loads the customer data from the database then converts it

    * into an Array that will be exported to Excel

    */

   function exportData(){

       $data = DB::table('tbl_customer')->orderBy('CustomerID', 'DESC')->get();

       $data_array [] = array("CustomerName","Gender","Address","City","PostalCode","Country");

       foreach($data as $data_item){

           $data_array[] = array(

               'CustomerName' =>$data_item->CustomerName,

               'Gender' => $data_item->Gender,

               'Address' => $data_item->Address,

               'City' => $data_item->City,

               'PostalCode' => $data_item->PostalCode,

               'Country' =>$data_item->Country

           );

       }

       $this->ExportExcel($data_array);

   }
   

}