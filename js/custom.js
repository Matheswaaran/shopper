// JavaScript Document
function viewProduct(pid){
	$.ajax({                                      
      url: 'product_detail.php',
      data: "pid="+pid,
	  type:"POST",                        
      success: function(data){
		  window.location = "product_detail.php";
	  }
    });
}