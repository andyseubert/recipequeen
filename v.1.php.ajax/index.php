
<?php
include 'head.html';
	//include all DAO files
	require_once('includes/include_dao.php');
		
// Vendor	Vendor part number	Quantity	Unit	Type	item Name	Description	Origin	Cost per unit
?>
<body>
    
<script type="text/javascript">
	//<![CDATA[

	//Send form if they hit enter.
	document.onkeypress = enter;
	function enter(e){
	if (e.which == 13){sendform()}
	}

	//Form to send
	function sendform(){
	document.forms["items"].submit();
	}
	//]]>
</script>

    <!-- build / refresh item list -->
<script>
	(function($)
	{
		$(document).ready(function()
		{
			$.ajaxSetup(
			{
				success: function() {
					$("#itemlist").show();
				}
			});
			var $container = $("#itemlist");
			$container.load("listitems.php");
		});
	})(jQuery);
</script>
  <!-- insert new item in items table -->
  <script type="text/javascript">
function addItem() {
    
    var name            = document.getElementsByName("name")[0].value;
    var vendor          = document.getElementsByName("vendor")[0].value;
    var vendorpartno    = document.getElementsByName("vendorpartno")[0].value;
    var type            = document.getElementsByName("type")[0].value;
    var origin          = document.getElementsByName("origin")[0].value;
    var cost            = document.getElementsByName("cost")[0].value;
    var unit            = document.getElementsByName("unit")[0].value;
    var quantity        = document.getElementsByName("quantity")[0].value;
    var description     = document.getElementsByName("description")[0].value;

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("response").innerHTML = xmlhttp.responseText;
            
            var $container = $("#itemlist");
            $container.load("listitems.php");
            document.getElementById("items").reset();
        }
    }
        xmlhttp.open("POST", "additem.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("name=" + name + "&vendor="+vendor+"&vendorpartno="+vendorpartno+"&type="+type+"&origin="+origin+"&cost="+cost+"&unit="+unit+"&quantity="+quantity+"&description="+description);
        
}
</script>
<div class="container-fluid">
    
<?php
include 'additemform.php';
?>

  <div id="itemlist"></div>
<!-- <img src="loading.gif" id="loading" alt="loading" style="display:none;" /> -->
<div id="response"></div>

<hr/>

</div>
</body>
</html>

