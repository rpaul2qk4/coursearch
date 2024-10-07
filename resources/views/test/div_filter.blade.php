

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<input id="filter" type="text">



<div id="results">
  <div class="results1">
    <p>1</p>
    <p>Toyota</p>
    <p>C 200</p>
    <p>114</p>
  </div>
  <div class="results1">
    <p>2</p>
    <p>Mercedes</p>
    <p>C 220</p>
    <p>144</p>
  </div>
</div>


<script>
 $("#filter").keyup(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('#results div').each(function() {


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