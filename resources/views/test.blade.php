<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<style>
.fields {
    display: flex;
    align-items: center;
    justify-content: space-around;
    height: 100%;
    position: relative;
}
.fields .value {
    position: absolute;
    font-size: 18px;
    color: #0a0a0a;
    font-weight: 600;
}

.fields input {
    flex: 1 1 auto;
}
</style>

<div class="fields">
    <div class="">0</div>
    <input id="rangeslider" type="range" min="0" max="100" value="50" steps="1" />
    <div class="">100</div>
</div>

<script>
$(document).ready(function(){
	
	$('#rangeslider').change(function(){
		alert($(this).val());
	});
	
});
</script>