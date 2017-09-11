function encode_id(id){
	var encoded_id;
	$.ajax({
		type: "post",
		url: "/College/encode_id/"+id,
		cache: false,
		async:false,
		success: function(response)
		{
			 encoded_id = JSON.parse(response);
		}
	});

	return encoded_id.id;
}
