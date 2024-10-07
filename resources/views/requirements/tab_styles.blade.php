
  <style>
    /* Custom CSS for rounded border */
    .rounded-tabs .nav-tabs .nav-link {
      border-radius: 20px 20px 0 0;  
	  border: 1px solid black;
	  border-bottom:none;
    }

    .rounded-tabs .tab-content {
      border-radius: 0 0 20px 20px;	
      border: 0px solid dark;
      border-top: none;
      padding: 0px;
    }
	
	.nav:after,
	.nav:before {
	  content:"";
	  display: table;
	} 
	.nav:after {
	  clear:both;
	  overflow:hidden;
	}
	.nav {
	  zoom: 1;
	  margin-left: 20px;
		  padding-bottom: 3px;
	}
	.nav li {
	  list-style: none outside none;
	  float: left;
	  position: relative;
	}
	.nav .active {
	  z-index: 3;
	}
	.nav li:before,
	.nav li:after,
	.nav  a:before,
	.nav  a:after {
	  content:"";
	  position: absolute;
	  bottom:0;

	}

	.nav a {
	  float: left;
	  padding: 10px 40px;
	  text-decoration: none;
	  color: #fff;
	  background: #7ce4a3;
	  border-radius: 5px 5px 0 0;
	  -webkit-transform: perspective(30) rotateX(10deg);
	}
	.nav .active a {
	  background: #F66599;
	  color:#BE3569;
	  -webkit-transform: perspective(30) rotateX(10deg);
	}

	.nav  a:before {
	  left:-20px; 
	}
	.nav  a:after {
	  right: -20px;
	}

	.nav .active:before,
	.nav .active:after {
	  z-index: 1;
	  background: #F66599;
	}

	.nav li:first-child a:before,
	.nav li:last-child a:after {
	  background-color: #fff;
	}
	.tab-content {
	  background: rgba(60, 118, 61, 0.17);
	  color:#444444;
	  padding: 10px;
	}
	.tab-pane {
	  display: none;
	}
	.tab-pane.active {
	  display: block;
	  background:#fff;
	}
	
  </style>

  <div class="container">
    <div class="row mt-3">
      <div class="">
        <div class="rounded-tabs">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#sop">SOP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#scholorship">Scholorship</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#visa_processing">Visa Processing</a>
            </li>    
			<li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#loans">Loans</a>
            </li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane fade show active p-3" id="sop">
              <h3>SOP Content</h3>
              <p>This is the content of tab sop.</p>
            </div>
            <div class="tab-pane fade p-3" id="scholorship">
              <h3>Scholorship Content</h3>
              <p>This is the content of tab scholorship.</p>
            </div>
            <div class="tab-pane fade p-3" id="visa_processing">
              <h3>Visa Processing Content</h3>
              <p>This is the content of tab Visa Processing.</p>
            </div>
			 <div class="tab-pane fade p-3" id="loans">
              <h3>Loans Content</h3>
              <p>This is the content of tab loans.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
