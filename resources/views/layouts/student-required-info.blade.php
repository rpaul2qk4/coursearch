		
<style>
* {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  background-color: green;
  transition: transform .2s;
  margin: 0 auto;
  cursor:pointer;
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
</style>
<div class=" py-3 mx-auto">
	<div class="d-flex  text-center">
	  <div class="p-2 col-4 flex-fill bg-info m-2 zoom">Scholorships</div>
	  <div class="p-2 col-4 flex-fill bg-primary m-2 zoom">Loans</div>
	  <div class="p-2 col-4 flex-fill bg-secondary m-2 zoom">VISA Processing</div>
	</div>
</div>
