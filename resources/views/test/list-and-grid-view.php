<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px; 
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Style the buttons */
.glbtn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.glbtn:hover {
  background-color: #ddd;
}

.glbtn.active {
  background-color: #666;
  color: white;
}
</style>
<div class="container">
<h2>List View or Grid View</h2>

<p>Click on a button to choose list view or grid view.</p>

<div id="btnContainer">
  <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<br>

<div class="row">
  <div class="column" style="background-color:#fff;">
    <div class="card bg-info" style="border-radius: 15px; overflow: hidden;" >
		<div class="card-body">
			Column 1
		</div>
	</div>
  </div>
  <div class="column" style="background-color:#fff;">
   <div class="card bg-info">
		<div class="card-body">
			Column 2
		</div>
	</div>
  </div>
</div>

<div class="row">
  <div class="column" style="background-color:#fff"> 
    <div class="card bg-info">
		<div class="card-body">
			Column 3
		</div>
	</div>
  </div>
  <div class="column" style="background-color:#fff;">
   <div class="card bg-info">
		<div class="card-body">
			Column 4
		</div>
	</div>
  </div>
</div>
</div>

<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
