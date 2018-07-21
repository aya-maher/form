<?php
?>
<a href="view.php" id="link">Link</a>



  <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<!-- <script type="text/javascript">
        $(document).ready(function() {
	
	$("#link").click(function() {
            $.get( this.href, {} , function(msg));
             
	});

});
        </script>-->
  
  <script type="text/javascript">
    $(document).ready(function () {
        $("#link").click(function (e) {
      
            e.preventDefault();
       
             $.get( this.href );
                   
              $.ajax({
                url: this.href , 
                data: {},
                success: function (msg) {
                     alert(msg);
                }
            });
        });

    });
</script>   