<form id="contact-form">
	<input type="text">
	<button type="button" onclick="x()">button</button>
</form>
<script>
    function x() { 
  		console.log("button clicked")
		setTimeout(function(){ 
      		window.location.reload();
    	}, 5000);
	}
</script>
