@extends('layouts.search_app')
@section('course-content')
<!-- Card -->
@include('common.flash')

<style>
.custom-control-label {
    color: #ffffff!important;
}
.list-unstyled.list-group.list-checkbox.show-hide{
    background-color:#000!important;
}
#attendanceFilter{
     -webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
    background-color: #bbbbbb !important;
    border-radius: 10px;
}
#degreeTypeFilter{
     -webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
    background-color: #bbbbbb !important;
    border-radius: 10px;
}
#formatFilter{
     -webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
    background-color: #bbbbbb !important;
    border-radius: 10px;
}
#durationFilter{
     -webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
    background-color: #bbbbbb !important;
    border-radius: 10px;
}
#tutionFeeFilter small{
    color:#fff;
}
#tutionFeeFilter{
    -webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
    background-color: #bbbbbb !important;
    border-radius: 10px;
}
#greScoreFilter{
    -webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
    background-color: #bbbbbb !important;
    border-radius: 10px;
}
#UniversityTypeFilter{
    -webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
   background-color: #bbbbbb !important;
    border-radius: 10px;
}
#countryTypeFilter{
    	-webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
    background-color: #bbbbbb !important;
    border-radius: 10px;
}
#disciplineFilter {
	-webkit-animation-name: fadeOutRightBig;
	animation-name: fadeOutRightBig;
	-webkit-animation-duration: 0.4s;
	animation-duration: 0.4s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both;
	position: absolute;
    z-index: 999999;
    background-color: #bbbbbb !important;
    border-radius: 10px;
}
@-webkit-keyframes fadeOutRightBig {
	from {
		opacity: 1
	}
	to {
		opacity: 1;
		-webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 360deg);
		transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 360deg)
	}
}
@keyframes fadeOutRightBig {
	from {
		opacity: 1
	}
	to {
		opacity: 1;
		-webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 360deg);
		transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 360deg)
	}
}
.#disciplineFilter {
	-webkit-animation-name: rollIn;
	animation-name: rollIn;
	-webkit-animation-duration: 0.3s;
	animation-duration: 0.3s;
	-webkit-animation-fill-mode: both;
	animation-fill-mode: both
}
@-webkit-keyframes rollIn {
	from {
		opacity: 0;
		-webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -220deg);
		transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -220deg)
	}
	to {
		opacity: 1;
		-webkit-transform: none;
		transform: none
	}
}
@keyframes rollIn {
	from {
		/*opacity: 0;*/
		-webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -220deg);
		transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -220deg)
	}
	to {
		opacity: 1;
		-webkit-transform: none;
		transform: none
	}
}



* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {	
  float: left;
  width: 50%;
  padding: 5px;  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the buttons */
.glbtn {
  border:none;
  border-radius:15px;
  padding: 10px 14px;
  cursor: pointer;
  background-color: #97d8a1;
  color:#fff;
}

.glbtn:hover {
 background-image: linear-gradient(to left top, #ccf5c6, #aff3d6, #99eee8, #92e7f7, #9bddff, #9bdbf9, #9bd9f3, #9cd7ed, #a0d9da, #b2d8c8, #c6d5be, #d6d2bd);
}

.glbtn.active {
  background-image: linear-gradient(to left top, #ccf5c6, #aff3d6, #99eee8, #92e7f7, #9bddff, #9bdbf9, #9bd9f3, #9cd7ed, #a0d9da, #b2d8c8, #c6d5be, #d6d2bd);
  color: white;
}

.card-bg-setup:hover{
	background-image: linear-gradient(to left top, #e4fbe0, #c8f5e2, #aeeee9, #9be5f4, #96d9fc, #a1d6fe, #add4fe, #b8d1fd, #c4dafe, #d1e3fe, #dfecff, #edf5ff);
}
.card-body {
    -webkit-box-flex: 1;
    flex: 1 1 auto;
    padding: 0.5rem 1rem !important;
}

.cart-collaterals .h2, .cart-collaterals h2, .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: -1.5rem;
    font-weight: 500;
    line-height: 1;
    color: #2f2d51;
}

.card-footer {
	margin-top:-0.5rem;
	background-color: rgba(22, 28, 45, .05);
    border-top: 0 solid #e7e7ec;
}

</style>

<div class="card1 border1 shadow1 p-1 lift1 sk-fade mb-3 flex-md-row align-items-center row gx-0" style="background-color1:#F5F5F5">
	
	<div class="row d-flex justify-content-between align-items-center">
		<div id="btnContainer col-auto">
			<button class="glbtn btn-primary1" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
			<button class="glbtn btn-primary1 active" onclick="gridView()" id="toggleWidth"><i class="fa fa-th-large"></i> Grid</button>
		</div>
		<div class="col-auto py-3">
			Selected specializations : <span id="count-checked-checkboxes" style="color:red" >0</span> out of <span style="color:green;font-weight:bold">8</span>
		</div>	
		<div class="col-auto col-lg-4 pt-2 pb-1"></div>	
		<div class="col-auto col-lg-4 pt-2 pb-1">	
			<input id="filter" placeholder="Search..." type="text" style="background-color:#F5F5F5;width:100%;border-radius:15px">
		</div>	
	</div>	
	
</div> 

<div class="body-bg-lg-color" style="padding:10px;border-radius:30px;" id="results" >

@include('courses.list-and-grid')
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionToggles = document.querySelectorAll('.collapse-accordion-toggle');
    
        accordionToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const target = this.getAttribute('data-bs-target');
                const targetElement = document.querySelector(target);
    
                // Hide all other open popups
                const allCollapseDivs = document.querySelectorAll('.show1.collapse');
                allCollapseDivs.forEach(div => {
                    if (div.id !== target.substring(1)) { // exclude the current target
                        div.classList.remove('show');
                    }
                });
    
                // Toggle the visibility of the target popup div
                targetElement.classList.toggle('show');
            });
        });
    });

</script>
<script>
	$(document).ready(function () {
	
	    $('#disciplineFilter').popup({
	        pagecontainer: '.container',
	        transition: 'all 0.5s',
	        color: '#000'
	    });
	
	});
</script>
	
	
	<script>
		function alertFun(){
			var msg='1. Please register\n2. If already register please login';
			alert(msg);
		}
		function alertStaffFun(){
			var msgs='1. Sorry, if you are Admin/Agent you dont have the access to this feature';
			alert(msgs);
		}
		</script>	
<script>
	var userSelected = 0;
	var colorString = "color:red;font-weight:bold";
	$(".custom-control-input1 input[type=checkbox]").on('change',function(){
		userSelected = $(".custom-control-input1 input[type=checkbox]:checked").length;
		if( userSelected > 8) {
			$(this).prop("checked", false);
			alert("Selected specializations are exceeded");
		} else if ($(".custom-control-input1 input[type=checkbox]:checked").length === 0 ) {
			userSelected=0;
			$('#count-checked-checkboxes').html('<span style="'+colorString+'">'+ userSelected+'</span>');
			alert("please select specializations to compare");
			
		}else{
			colorString=(userSelected==8)?("color:green;font-weight:bold"):"color:red;font-weight:bold";
			$('#count-checked-checkboxes').html('<span style="'+colorString+'">'+ userSelected+'</span>');
		}
	});
</script>
<script>
 $("#filter").keyup(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('#results div.results').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }

      });

    });
</script>


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
var btns = container.getElementsByClassName("glbtn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

<script>
    
    //PRELOADER
setTimeout(function(){$("#preloader").fadeOut("slow"),$("body").delay(700).css({"overflow-y":"visible"})},2000);

//TOOLTIP BOOTSTRAP
$(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()}),
  
// modalx.min.js
    function(t) {
        var e, i, o = t(window),
            n = {},
            a = [],
            s = [],
            p = null,
            d = "_open",
            l = "_close",
            c = [],
            r = null,
            u = /(iPad|iPhone|iPod)/g.test(navigator.userAgent),
            f = "a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex], *[contenteditable]",
            h = {
                _init: function(e) {
                    var i = t(e),
                        o = i.data("popupoptions");
                    s[e.id] = !1, a[e.id] = 0, i.data("popup-initialized") || (i.attr("data-popup-initialized", "true"), h._initonce(e)), o.autoopen && setTimeout(function() {
                        h.show(e, 0)
                    }, 0)
                },
                _initonce: function(i) {
                    var o, n, a = t(i),
                        s = t("body"),
                        l = a.data("popupoptions");
                    if (p = parseInt(s.css("margin-right"), 10), r = void 0 !== document.body.style.webkitTransition || void 0 !== document.body.style.MozTransition || void 0 !== document.body.style.msTransition || void 0 !== document.body.style.OTransition || void 0 !== document.body.style.transition, l.backgroundactive && (l.background = !1, l.blur = !1, l.scrolllock = !1), l.scrolllock) {
                        var c, f;
                        "undefined" == typeof e && (c = t('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"), f = c.children(), e = f.innerWidth() - f.height(99).innerWidth(), c.remove())
                    }
                    if (a.attr("id") || a.attr("id", "j-popup-" + parseInt(1e8 * Math.random(), 10)), a.addClass("popup_content"), l.background && !t("#" + i.id + "_background").length) {
                        s.append('<div id="' + i.id + '_background" class="popup_background"></div>');
                        var b = t("#" + i.id + "_background");
                        b.css({
                            opacity: 0,
                            visibility: "hidden",
                            backgroundColor: l.color,
                            position: "fixed",
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0
                        }), l.setzindex && !l.autozindex && b.css("z-index", "100000"), l.transition && b.css("transition", l.transition)
                    }
                    s.append(i), a.wrap('<div id="' + i.id + '_wrapper" class="popup_wrapper" />'), o = t("#" + i.id + "_wrapper"), o.css({
                        opacity: 0,
                        visibility: "hidden",
                        position: "absolute"
                    }), u && o.css("cursor", "pointer"), "overlay" == l.type && o.css("overflow", "auto"), a.css({
                        opacity: 0,
                        visibility: "hidden",
                        display: "inline-block"
                    }), l.setzindex && !l.autozindex && o.css("z-index", "100001"), l.outline || a.css("outline", "none"), l.transition && (a.css("transition", l.transition), o.css("transition", l.transition)), a.attr("aria-hidden", !0), "overlay" == l.type && (a.css({
                        textAlign: "left",
                        position: "relative",
                        verticalAlign: "middle"
                    }), n = {
                        position: "fixed",
                        width: "100%",
                        height: "100%",
                        top: 0,
                        left: 0,
                        textAlign: "center"
                    }, l.backgroundactive && (n.position = "absolute", n.height = "0", n.overflow = "visible"), o.css(n), o.append('<div class="popup_align" />'), t(".popup_align").css({
                        display: "inline-block",
                        verticalAlign: "middle",
                        height: "100%"
                    })), a.attr("role", "dialog");
                    var v = l.openelement ? l.openelement : "." + i.id + d;
                    t(v).each(function(e, i) {
                        t(i).attr("data-popup-ordinal", e), i.id || t(i).attr("id", "open_" + parseInt(1e8 * Math.random(), 10))
                    }), a.attr("aria-labelledby") || a.attr("aria-label") || a.attr("aria-labelledby", t(v).attr("id")), "hover" == l.action ? (l.keepfocus = !1, t(v).on("mouseenter", function(e) {
                        h.show(i, t(this).data("popup-ordinal"))
                    }), t(v).on("mouseleave", function(t) {
                        h.hide(i)
                    })) : t(document).on("click", v, function(e) {
                        e.preventDefault();
                        var o = t(this).data("popup-ordinal");
                        setTimeout(function() {
                            h.show(i, o)
                        }, 0)
                    }), l.closebutton && h.addclosebutton(i), l.detach ? a.hide().detach() : o.hide()
                },
                show: function(n, d) {
                    var u = t(n);
                    if (!u.data("popup-visible")) {
                        u.data("popup-initialized") || h._init(n), u.attr("data-popup-initialized", "true");
                        var f = t("body"),
                            v = u.data("popupoptions"),
                            g = t("#" + n.id + "_wrapper"),
                            m = t("#" + n.id + "_background");
                        if (b(n, d, v.beforeopen), s[n.id] = d, setTimeout(function() {
                                c.push(n.id)
                            }, 0), v.autozindex) {
                            for (var y = document.getElementsByTagName("*"), _ = y.length, k = 0, w = 0; _ > w; w++) {
                                var x = t(y[w]).css("z-index");
                                "auto" !== x && (x = parseInt(x, 10), x > k && (k = x))
                            }
                            a[n.id] = k, v.background && a[n.id] > 0 && t("#" + n.id + "_background").css({
                                zIndex: a[n.id] + 1
                            }), a[n.id] > 0 && g.css({
                                zIndex: a[n.id] + 2
                            })
                        }
                        v.detach ? (g.prepend(n), u.show()) : g.show(), i = setTimeout(function() {
                            g.css({
                                visibility: "visible",
                                opacity: 1
                            }), t("html").addClass("popup_visible").addClass("popup_visible_" + n.id), g.addClass("popup_wrapper_visible")
                        }, 20), v.scrolllock && (f.css("overflow", "hidden"), f.height() > o.height() && f.css("margin-right", p + e)), v.backgroundactive && u.css({
                            top: (o.height() - (u.get(0).offsetHeight + parseInt(u.css("margin-top"), 10) + parseInt(u.css("margin-bottom"), 10))) / 2 + "px"
                        }), u.css({
                            visibility: "visible",
                            opacity: 1
                        }), v.background && (m.css({
                            visibility: "visible",
                            opacity: v.opacity
                        }), setTimeout(function() {
                            m.css({
                                opacity: v.opacity
                            })
                        }, 0)), u.data("popup-visible", !0), h.reposition(n, d), u.data("focusedelementbeforepopup", document.activeElement), v.keepfocus && (u.attr("tabindex", -1), setTimeout(function() {
                            "closebutton" === v.focuselement ? t("#" + n.id + " ." + n.id + l + ":first").focus() : v.focuselement ? t(v.focuselement).focus() : u.focus()
                        }, v.focusdelay)), t(v.pagecontainer).attr("aria-hidden", !0), u.attr("aria-hidden", !1), b(n, d, v.onopen), r ? g.one("transitionend", function() {
                            b(n, d, v.opentransitionend)
                        }) : b(n, d, v.opentransitionend)
                    }
                },
                hide: function(e, o) {
                    var n = t.inArray(e.id, c);
                    if (-1 !== n) {
                        i && clearTimeout(i);
                        var a = t("body"),
                            d = t(e),
                            l = d.data("popupoptions"),
                            u = t("#" + e.id + "_wrapper"),
                            f = t("#" + e.id + "_background");
                        d.data("popup-visible", !1), 1 === c.length ? t("html").removeClass("popup_visible").removeClass("popup_visible_" + e.id) : t("html").hasClass("popup_visible_" + e.id) && t("html").removeClass("popup_visible_" + e.id), c.splice(n, 1), u.hasClass("popup_wrapper_visible") && u.removeClass("popup_wrapper_visible"), l.keepfocus && !o && setTimeout(function() {
                            t(d.data("focusedelementbeforepopup")).is(":visible") && d.data("focusedelementbeforepopup").focus()
                        }, 0), setTimeout(function() {
                            u.css({
                                visibility: "hidden",
                                opacity: 0
                            }), d.css({
                                visibility: "hidden",
                                opacity: 0
                            }), l.background && f.css({
                                visibility: "hidden",
                                opacity: 0
                            })
                        }, 300), t(l.pagecontainer).attr("aria-hidden", !1), d.attr("aria-hidden", !0), b(e, s[e.id], l.onclose), r && "0s" !== d.css("transition-duration") ? d.one("transitionend", function(t) {
                            d.data("popup-visible") || (l.detach ? d.hide().detach() : u.hide()), l.scrolllock && setTimeout(function() {
                                a.css({
                                    overflow: "visible",
                                    "margin-right": p
                                })
                            }, 10), b(e, s[e.id], l.closetransitionend)
                        }) : (l.detach ? d.hide().detach() : u.hide(), l.scrolllock && setTimeout(function() {
                            a.css({
                                overflow: "visible",
                                "margin-right": p
                            })
                        }, 10), b(e, s[e.id], l.closetransitionend))
                    }
                },
                toggle: function(e, i) {
                    t(e).data("popup-visible") ? h.hide(e) : setTimeout(function() {
                        h.show(e, i)
                    }, 0)
                },
                reposition: function(e, i) {
                    var o = t(e),
                        n = o.data("popupoptions"),
                        a = t("#" + e.id + "_wrapper");
                    t("#" + e.id + "_background");
                    i = i || 0, "overlay" == n.type && (n.horizontal ? a.css("text-align", n.horizontal) : a.css("text-align", "center"), n.vertical ? o.css("vertical-align", n.vertical) : o.css("vertical-align", "middle"))
                },
                addclosebutton: function(e) {
                    var i;
                    i = t(e).data("popupoptions").closebuttonmarkup ? t(n.closebuttonmarkup).addClass(e.id + "_close") : '<button class="popup_close ' + e.id + '_close" title="Close" aria-label="Close"><span aria-hidden="true">×</span></button>', t(e).data("popup-initialized") && t(e).append(i)
                }
            },
            b = function(e, i, o) {
                var n = t(e).data("popupoptions"),
                    a = n.openelement ? n.openelement : "." + e.id + d,
                    s = t(a + '[data-popup-ordinal="' + i + '"]');
                "function" == typeof o && o.call(t(e), e, s)
            };
        t(document).on("keydown", function(e) {
            if (c.length) {
                var i = c[c.length - 1],
                    o = document.getElementById(i);
                t(o).data("popupoptions").escape && 27 == e.keyCode && h.hide(o)
            }
        }), t(document).on("click", function(e) {
            if (c.length) {
                var i = c[c.length - 1],
                    o = document.getElementById(i),
                    n = t(o).data("popupoptions").closeelement ? t(o).data("popupoptions").closeelement : "." + o.id + l;
                t(e.target).closest(n).length && (e.preventDefault(), h.hide(o)), t(o).data("popupoptions").blur && !t(e.target).closest("#" + i).length && 2 !== e.which && t(e.target).is(":visible") && (t(o).data("popupoptions").background ? (h.hide(o), e.preventDefault()) : h.hide(o, !0))
            }
        }), t(document).on("keydown", function(e) {
            if (c.length && 9 == e.which) {
                var i = c[c.length - 1],
                    o = document.getElementById(i),
                    n = t(o).find("*"),
                    a = n.filter(f).filter(":visible"),
                    s = t(":focus"),
                    p = a.length,
                    d = a.index(s);
                0 === p ? (t(o).focus(), e.preventDefault()) : e.shiftKey ? 0 === d && (a.get(p - 1).focus(), e.preventDefault()) : d == p - 1 && (a.get(0).focus(), e.preventDefault())
            }
        }), t.fn.popup = function(e) {
            return this.each(function() {
                var i = t(this);
                if ("object" == typeof e) {
                    var o = t.extend({}, t.fn.popup.defaults, i.data("popupoptions"), e);
                    i.data("popupoptions", o), n = i.data("popupoptions"), h._init(this)
                } else "string" == typeof e ? (i.data("popupoptions") || (i.data("popupoptions", t.fn.popup.defaults), n = i.data("popupoptions")), h[e].call(this, this)) : (i.data("popupoptions") || (i.data("popupoptions", t.fn.popup.defaults), n = i.data("popupoptions")), h._init(this))
            })
        }, t.fn.popup.defaults = {
            type: "overlay",
            autoopen: !1,
            background: !0,
            backgroundactive: !1,
            color: "#000",
            opacity: "0.35",
            horizontal: "center",
            vertical: "middle",
            offsettop: 0,
            offsetleft: 0,
            escape: !0,
            setzindex: !0,
            autozindex: !1,
            scrolllock: !1,
            closebutton: !1,
            closebuttonmarkup: null,
            keepfocus: !0,
            focuselement: null,
            focusdelay: 50,
            outline: !1,
            pagecontainer: null,
            detach: !1,
            openelement: null,
            closeelement: null,
            transition: null,
            tooltipanchor: null,
            beforeopen: null,
            onclose: null,
            onopen: null,
            opentransitionend: null,
            closetransitionend: null
        }
    }(jQuery);
    
</script>
</div>   
<div class="py-3">
{{ $courses->appends(['course_list_data'=>$course_list_data,'states'=>$states,'courses'=>$courses,'campuses'=>$campuses,'state_universities'=>$state_universities,'disciplines'=>$disciplines,'programs'=>$programs,'total_specializations'=>$total_specializations])->links() }}
</div>

@endsection	
