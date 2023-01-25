function edit_character(data)
{
	$('#idedit').val(data.id)
	$('#api_idedit').val(data.api_id)
	$('#nameedit').val(data.name)
	$('#statusedit').val(data.status)
	$('#speciesedit').val(data.species)
	$('#imageedit').val(data.image)
	$('#typeedit').val(data.type)
	$('#genderedit').val(data.gender)
	$('#name_originedit').val(data.name_origin)
	$('#url_originedit').val(data.url_origin)

	$('#editcharacter').modal('toggle')
}

function validate_url(e)
{
	value = $(e).val()
	if (!value.match(/^http(s?):\/\//))
	{
		$(e).val('https//:'+value)
	}
}