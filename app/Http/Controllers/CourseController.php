<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Discipline;
use App\Models\BranchSpecialization;
use App\Models\Program;
use App\Models\State;
use App\Models\ScreenShot;
use App\Models\University;
use App\Models\Requirement;
use App\Models\Campus;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Helpers\AppHelper;

class CourseController extends Controller
{
 	
	public function courseList(Request $request)
    {
		//die('sssss');
		
		$course_list_data=$request->course_list_data;
		$reqId=Requirement::where('requirement','GRE')->get()->first()->id;
		//p($course_list_data);
		
		if(empty($course_list_data['deadline_my'])){
			$course_list_data['deadline_my']=null;
		}
		
		if(empty($course_list_data['semisters'])){
			$course_list_data['semisters']=null;
		}
		
		
		//echo"<pre>";print_r($request->all());echo"</pre>";die();
		
		
		if(empty($course_list_data['disciplines'][0])){
			
			return redirect()->back()->with(['error'=>'You must have to select discipline!!']);
			//return redirect(route('search-results.search'))->with(['error'=>'You must have to select discipline!!']);
		}
		if(count($course_list_data)>1){
			if(!empty($course_list_data) && !empty($course_list_data['country']) && $course_list_data['country'][0]!=0){
				$states=State::where('country_id',$course_list_data['country'][0])->get()->pluck('state','id')->prepend('Select state','');
				$country_universities=University::where('country_id',$course_list_data['country'][0])->get()->pluck('university','id')->prepend('Select university','');
							
				$country_universities_ids=University::where('country_id',$course_list_data['country'][0])->get()->unique()->pluck('id');
				$country_discipline_ids=BranchSpecialization::whereIn('university_id',$country_universities_ids->toArray())->get()->unique()->pluck('discipline_id');
				$disciplines=Discipline::whereIn('id',$country_discipline_ids->toArray())->get();
				
				if(!empty($course_list_data) && !empty($course_list_data['country']) && $course_list_data['country'][0]!=0 && !empty($course_list_data['state']) && $course_list_data['state'][0]!=0){
					
					$states=State::where('country_id',$course_list_data['country'][0])->where('id',$course_list_data['state'][0])->get()->pluck('state','id')->prepend('Select state','');
								
					$country_universities_ids=University::where('country_id',$course_list_data['country'][0])->where('state_id',$course_list_data['state'][0])->get()->unique()->pluck('id');
					$country_discipline_ids=BranchSpecialization::whereIn('university_id',$country_universities_ids->toArray())->get()->unique()->pluck('discipline_id');
					$disciplines=Discipline::whereIn('id',$country_discipline_ids->toArray())->get();
				
					$state_universities=University::where('country_id',$course_list_data['country'][0])->where('state_id',$course_list_data['state'][0])->get()->pluck('university','id')->prepend('Select university','');
					
					if($course_list_data['university'][0]!=0){
						$state_universities=University::where('country_id',$course_list_data['country'][0])->where('state_id',$course_list_data['state'][0])->where('id',$course_list_data['university'][0])->get()->pluck('university','id')->prepend('Select university','');
						if($course_list_data['campus'][0]!=0){
							$campuses=Campus::where('university_id',$course_list_data['university'][0])->where('id',$course_list_data['campus'][0])->where('country_id',$course_list_data['country'][0])->where('state_id',$course_list_data['state'][0])->get()->pluck('campus','id')->prepend('Select campus','');
						}else{
							$campuses=[''=>''];
						}
					}else{
						$state_universities=[''=>''];
						$campuses=[''=>''];
					}
				
				}else{
					$states=[''=>''];
					$state_universities=[''=>''];
					$campuses=[''=>''];
				}
				
			}else{
				$states=[''=>''];
				$state_universities=[''=>''];
				$campuses=[''=>''];
				$disciplines=Discipline::all();
			}
			
		}else{
			$states=[''=>''];
			$state_universities=[''=>''];
			$campuses=[''=>''];
			
			$disciplines=Discipline::all();
		}		
		
		$course_list_data['disciplines'][0]=trim(str_replace("innerlist","",$course_list_data['disciplines'][0]));
			//p($course_list_data['disciplines'][0]);
			//p($course_list_data);
					
			$query = BranchSpecialization::query();
				
		if(!empty($course_list_data)){			
			
			$filters = AppHelper::csfilters($course_list_data);
			//p($filters);
			/* if(!empty($filters['deadline_my']))
				$dateym=explode("-",$filters['deadline_my']);
			else
				$dateym=null; */
				
			//p($dateym[1]);
			
			$hasFilters = !empty($filters);

			$query->when(isset($filters['disciplines']['specializations']), function($q) use ($filters) {
				$q->where('discipline_id', $filters['disciplines'][0]);
				$q->whereIn('specialization_id', $filters['disciplines']['specializations']);
				
				$q->when(isset($filters['semisters']), function($q) use ($filters) {
						
			
					$q->whereHas('university', function($q) use ($filters){
						
						$q->whereHas('semisters', function($q) use ($filters){
						
							$q->where('semister','like', "%{$filters['semisters'][0]}%");
							
						});
						
					})->whereDoesntHave('spc_semisters',function($q) use ($filters){
						$q->where('semister','like', "%{$filters['semisters'][0]}%");
					});  
					
					/* $q->whereHas('spc_semisters', function($q) use ($filters){
						$q->where('semister','like', "%{$filters['semisters'][0]}%");
					}); */
					
				});
				
				
				
			
			});

			$query->when(isset($filters['disciplines'][0]), function($q) use ($filters) {
				$q->where('discipline_id', $filters['disciplines'][0]);
			});

			$query->when(isset($filters['duration']), function($q) use ($filters) {
				$q->where('duration_id', $filters['duration']);
			});
			
			/* $query->when(isset($dateym), function($q) use ($dateym) {
				$q->whereYear('apply_deadline', $dateym[0])->whereMonth('apply_deadline', $dateym[1]);
			}); */
			
			$query->when(isset($filters['programs']), function($q) use ($filters) {
				$q->where('program_id', $filters['programs']);
			});
							
			$query->when(isset($filters['attendances']), function($q) use ($filters) {
				$q->where('attendance_id', $filters['attendances']);
			});
							
			$query->when(isset($filters['ratings']), function($q) use ($filters) {
				$q->where('course_rating','>=', $filters['ratings']);
			});
							
			
			$query->when(isset($filters['formats']), function($q) use ($filters) {
				$formats = $filters['formats'];
				$q->whereHas('branch_specialization_fees', function($q) use ($formats){
					$q->whereIn('format_id', $formats);
				});
				
			});
			
			/* $query->when(isset($filters['semisters'][0]), function($q) use ($filters) {
			
				$q->whereHas('spc_semisters', function($q) use ($filters){
				  	$q->where('semister','like', "%{$filters['semisters'][0]}%");
				});
				
			}); */
		
			/* $query->when(isset($filters['semisters']), function($q) use ($filters) {
				$semisters = $filters['semisters'];
				$q->whereHas('spc_semisters', function($q) use ($filters){
					$q->where('semister','like', "%{$filters['semisters'][0]}%");
				});
				$q->orWhereHas('university', function($q) use ($filters){
					
					$q->whereHas('semisters', function($pq) use ($filters){
					
						$pq->where('semister','like', "%{$filters['semisters'][0]}%");
						
					});
					
				});
			}); */
			
			
			
			$query->when(isset($filters['country']), function($q) use ($filters) {
				
				$q->whereHas('university', function($q) use ($filters){
					
					
						$q->when(isset($filters['country']), function($q) use ($filters) {
							$q->whereIn('country_id', $filters['country']);
						});
					
						$q->when(isset($filters['state']), function($q) use ($filters) {
							$q->whereIn('state_id', $filters['state']);
						});
						
					   $q->when(isset($filters['semisters'][0]), function($q) use ($filters) {
        					$q->whereHas('semisters', function($q) use ($filters){
        						$q->where('semister','like', "%{$filters['semisters'][0]}%");
        					});
    					});  
					
				});
			
			
				$q->whereHas("campus", function($oq) use ($filters) {
					$oq->when(isset($filters['country']), function($q) use ($filters) {
						$q->where('country_id', $filters['country']);
					});
					
					$oq->when(isset($filters['state']), function($q) use ($filters) {
						$q->where('state_id', $filters['state']);
					});	
					$oq->when(isset($filters['university']), function($q) use ($filters) {
						$q->where('university_id', $filters['university']);
					});

					$oq->when(isset($filters['campus']), function($q) use ($filters) {
						$q->where('id', $filters['campus']);
					});	
				});
			});
			
			
			$query->when(isset($filters['fees']), function($q) use ($filters) {
				$formats = $filters['fees'];
				$q->whereHas('branch_specialization_fees', function($q) use ($formats){
					$q->where('fees','<=', $formats);
				});
			});
			
			$query->when(isset($filters['gre_score']), function($p) use ($filters,$reqId) {
				$formats2 = $filters['gre_score'][0];
				$p->whereHas('branch_specialization_requirements', function($q) use ($formats2,$reqId){
					$q->where('requirement_id',$reqId)->where('score','<=', $formats2);
				});
			}); 
			
			//p($filters['semisters']);
			/*
			$query->when(isset($filters['semisters']), function($q) use ($filters) {
				$semisters = $filters['semisters'];
				$q->whereHas('spc_semisters', function($q) use ($semisters){
					$q->where('semister','like', '%'.$semisters[0].'%');
				});
				$q->orWhereHas('university', function($q) use ($semisters){
					
					$q->whereHas('semisters', function($pq) use ($semisters){
					
						$pq->where('semister','like', '%'.$semisters[0].'%');
						
					});
					
				});
			});
			*/
			
			/* $query->when(isset($filters['user_status']), function($q) use ($filters) {
				$userStatus = $filters['user_status'];
				$q->whereHas('user', function($q) use ($userStatus){
					$q->where('status', $userStatus);
				});
			}); */
			
		}		
			
		//$disciplines=Discipline::all();
			//echo"<pre>";print_r($course_list_data);echo"</pre>";die();
			
		$programs=Program::all();
		$courses=$query->where('course_id','<>',null) ->orderByRaw('apply_deadline DESC')->paginate(100);

		$total_specializations=$courses->count();
        return view('courses.course-list',compact(['course_list_data','states','courses','campuses','state_universities','disciplines','programs','total_specializations']));
    }
		
		
	/**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$specialization=Specialization::findOrFail($id);
        return view('courses.index',compact(['specialization']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$specialization=Specialization::findOrFail($id);
        return view('courses.create',compact(['specialization']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
		try{
			$specialization=Specialization::findOrFail($id);
			$course = new Course();		
			$course->course=$request->course;
			$course->code=$request->code;		
			$course->description=$request->description;
			$course->specialization_id=$specialization->id;		
			$course->discipline_id=$specialization->discipline_id;		
			$course->branch_id=$specialization->branch_id;		
			$course->save();
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('courses.index',$specialization->id))->with(['error' => 'Record already existed!!']);
			}
		}
		//var_dump($course->specialization);die();
		return redirect(route('courses.index',$specialization->id))->with(['success'=>'Course inserted successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course=Course::findOrFail($id);
        return view('courses.show',compact(['course']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course=Course::findOrFail($id);
        return view('courses.edit',compact(['course']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
			$course = Course::findOrFail($id);						
			$course->course=$request->course;
			$course->code=$request->code;
			$course->description=$request->description;
			$course->save();		
		} catch (\Exception $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				return redirect(route('courses.index',$course->specialization->id))->with(['error' => 'Record already existed!!']);
			}
		}
		return redirect(route('courses.index',$course->specialization->id))->with(['success'=>'Course updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course=Course::findOrFail($id);
		if($course->branch_specializations->count()){
				return redirect(route('courses.index',$course->specialization->id))->with('error','Sorry not able to delete, it has many relations!');
		}
		$course->delete();
		return redirect(route('courses.index',$course->specialization->id))->with(['success'=>'Course deleted successfully']);
    }	
		
		
	public function reportScreenShot(Request $request)
    {
		
		$screenshot = new ScreenShot();
		
		//return $request->all();
		
         if ($request->has('image')) {
            // Decode the base64 image data
            $image_data = $request->input('image');
            $image_data = str_replace('data:image/png;base64,', '', $image_data);
            $image_data = str_replace(' ', '+', $image_data);
            $decoded_image = base64_decode($image_data);

            // Create a unique filename for the screenshot
            $filename = 'screenshot_' . time() . '.png';
			
			// Save the image to the public storage (so it can be publicly accessible)
            $filePath = 'screenshots/' . $filename;
            Storage::disk('public')->put($filePath, $decodedImage);
			
			$screenshot->screenshot=$filePath;
			$screenshot->save();
            // Return the public URL of the saved screenshot
            $url = asset('storage/' . $filePath);


            return response()->json(['status' => 'success', 'url' => asset($url)]);
        }

        return response()->json(['status' => 'error', 'message' => 'No image received.']);
    }

}
