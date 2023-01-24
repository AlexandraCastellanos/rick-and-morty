function see_details(data)
{
	console.log(data)
	$('#name').html(data.name)
	$('#image')[0].src = data.image
	$('#type').html(data.type)
	$('#gender').html(data.gender)
	$('#name_origin').html(data.name_origin)
	$('#url_origin').html(data.url_origin)

	$('#seedetail').modal('toggle')
}