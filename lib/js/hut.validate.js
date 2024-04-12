$(document).ready(function() { 
	$("#hut").validate({ 
		rules: { 
			name: "required", 
	        description: "required",
			price: {
				required: true,
				number: true
			},
			workers: "required",  
	    }, 
			
		messages: { 
			description: "Please enter a description." ,
	    } ,
	        
	}); 
}); 