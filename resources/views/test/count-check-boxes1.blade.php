<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<form class="comp-specialization1">
  <input type="checkbox" name="box1">
  <input type="checkbox" name="box2">
  <input type="checkbox" name="box3">
  <input type="checkbox" name="box4">
  <input type="checkbox" name="box5">
  <input type="checkbox" name="box6">
  <input type="checkbox" name="box7">
  <input type="checkbox" name="box8">
  <input type="checkbox" name="box9">
</form>

<script>
	var userSelected = 0;
	var colorString = "color:red;font-weight:bold";
	$(".comp-specialization input[type=checkbox]").on('change',function(){
		userSelected = $(".comp-specialization input[type=checkbox]:checked").length;
		if( userSelected > 8) {
			$(this).prop("checked", false);
			alert("Selected specializations are exceeded");
		} else if ($(".comp-specialization input[type=checkbox]:checked").length === 0 ) {
			alert("please select specializations to compare");
		}else{
			colorString=(userSelected==8)?("color:green;font-weight:bold"):"color:red;font-weight:bold";
			$('#count-checked-checkboxes').html('<span style="'+colorString+'">'+ userSelected+'</span>');
		}
	});
</script>