 
    <div class="card card-bgcolor card-hover-color2 p-3">
      <img src="{{asset('storage/'.$discipline->disp_image)}}" class="card-img-top1 card-bg-setup" style="width:100%;height:200px;padding:10px;" alt="...">
      <div class="card-body bg-secondary1">
        <h6 class="card-title text-white">{{$discipline->discipline}}</h6>
     
        <small class="text-body-secondary1 text-white">Over {{$discipline->branch_specializations->count()}} Courses</small>
      </div>
    </div>

  <input type="text" name="course_list_data[disciplines][]" value="{{$discipline->id}}" hidden />