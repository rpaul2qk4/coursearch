
<style>
div.sideNav{
	position:relative;
	width:100%;
	top:80px;	
	/* padding:10px;
	border-radius:15px; 
	background:rgba(0,0,0,0.1);*/	
	box-shadow:2px 2px 10px rgba(0,0,0,.1);
}


div.sideNav ul{	
	left:0px;
	position:relative;
	list-style:none;
	padding:0;
	margin:0;	
}

div.sideNav ul li a{
	display:flex;
	align-items:center;
	font-family:arial;
	font-size:1.15em;
	text-decoration:none;
	text-transform: capitalize;
	color:#000;
	padding:0px 30px;
	height:50px;
	transition:.1s ease;	
}

div.sideNav ul li a:hover{	
	background:rgb(0,0,0,0.7);
	border-radius:15px;
	color:#fff;
}

div.sideNav ul ul{
	position:absolute;
	left:350px;
	min-width:250px;
	top:0px;
	display:none; 
	background-image: linear-gradient(to left top, #e4fbe0, #c8f5e2, #aeeee9, #9be5f4, #96d9fc, #a1d6fe, #add4fe, #b8d1fd, #c4dafe, #d1e3fe, #dfecff, #edf5ff);
	border-radius:15px;	
	box-shadow:2px 2px 10px rgba(0,0,0,.1);
}

div.sideNav ul span{
	position:absolute;
	right:20px;
	font-size:1.5em;
}

div.sideNav ul .dropdown{
	position:relative;
	z-index:1;
}

div.sideNav ul .dropdown:hover > ul{
	display:initial;
}

div.sideNav ul .dropdown_two ul{
	position:absolute;
	left:245px;
	top:0;
	z-index:1;
}

div.sideNav ul .dropdown_two:hover> ul{
	display:initial;
}

div.sideNav ul .dropdown_two .split ul{
	position:relative;
	top:0px;
}

div.sideNav .btns{	
	width:100%;
	margin:5px;
	left:0px;
	border-radius:15px;
	background: linear-gradient( #007FFF,#F0F8FF 50% , #007FFF 100%);
}

.border-style{
	border-radius:15px;
}

input[type=checkbox] {
    margin: 4px 0 0;
    line-height: normal;
    width: 20px;
    height: 20px;
}
input[type=radio] {
    margin: 4px 0 0;
    line-height: normal;
    width: 20px;
    height: 20px;
}
</style>

	<div class="sideNav">

		<ul>
			<li class="dropdown btns">
				<div class="d-flex justify-content-between align-items-center p-5 ribbon-bg-lg-color" style="font-size:30px;width:100%">
					<div> Filters</div>
					<div><i class="fa fa-filter"></i></div>		
				</div>
			</li>
			<li class="dropdown btns"><a href="#">Discipline<span>&rsaquo;</span></a>
				<ul>
					<li class="dropdown_two split"><a href="#"><input type="radio" value="">&nbsp;&nbsp;new file<span>&rsaquo;</span></a>
						<ul>
						
							<li><a href="#"><input type="checkbox" value="">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#"><input type="checkbox" value="">link3</a></li>
							<li><a href="#"><input type="checkbox" value="">link4</a></li>
							
						</ul>
					</li>	
					<li class="dropdown_two split"><a href="#"><input type="radio" value="">&nbsp;&nbsp;new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					<li class="dropdown_two split"><a href="#"><input type="radio" value="">&nbsp;&nbsp;new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					<li class="dropdown_two split"><a href="#"><input type="radio" value="">&nbsp;&nbsp;new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					
				</ul>
			</li>
			
			<li class="dropdown btns"><a href="#">Country/State</a>
				<ul><li><a href="#">open file</a></li>							
					<li><a href="#">open folder</a></li>
					<li class="dropdown_two split"><a href="#">new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					
					<li><a href="#">save</a></li>
				</ul>
			</li>
			
			<li class="dropdown btns"><a href="#">Tution Fees</a>
				<ul><li><a href="#">open file</a></li>							
					<li><a href="#">open folder</a></li>
					<li class="dropdown_two split"><a href="#">new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					
					<li><a href="#">save</a></li>
				</ul>
			</li>
			
			<li class="dropdown btns"><a href="#">Duration</a>
				<ul><li><a href="#">open file</a></li>							
					<li><a href="#">open folder</a></li>
					<li class="dropdown_two split"><a href="#">new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					
					<li><a href="#">save</a></li>
				</ul>
			</li>
			
			<li class="dropdown btns"><a href="#">Program</a>
				<ul><li><a href="#">open file</a></li>							
					<li><a href="#">open folder</a></li>
					<li class="dropdown_two split"><a href="#">new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					
					<li><a href="#">save</a></li>
				</ul>
			</li>
			
			<li class="dropdown btns"><a href="#">Attendance</a>
				<ul><li><a href="#">open file</a></li>							
					<li><a href="#">open folder</a></li>
					<li class="dropdown_two split"><a href="#">new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					
					<li><a href="#">save</a></li>
				</ul>
			</li>
			
			<li class="dropdown btns"><a href="#">Degree Type</a>
				<ul><li><a href="#">open file</a></li>							
					<li><a href="#">open folder</a></li>
					<li class="dropdown_two split"><a href="#">new file<span>&rsaquo;</span></a>
						<ul>
							<li><a href="#">link1</a></li>
							<li><a href="#"><input type="checkbox" value="">link2</a></li>
							<li><a href="#">link3</a></li>
						</ul>
					</li>	
					
					<li><a href="#">save</a></li>
				</ul>
			</li>
			
			
		</ul>
	</div>
