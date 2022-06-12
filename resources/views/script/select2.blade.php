<script>
	function setSelect2(element, url, placeholder, _data = function (params) {
		return {
			input: $.trim(params.term),
		};
	}) {
		$(element).select2({
			placeholder: placeholder,
			allowClear: true,
			ajax: {
				url: url,
				dataType: 'json',
				data: _data,
				processResults: function (data) {
					return {
						results: data
					};
				},
				cache: true
			}
		});
	}

	function setSelectedSelect2(select, data, id = 'id', text = 'name') {
		if (Array.isArray(data)) {
			$.each(data, function(index, val) {
				$(select).append('<option value="'+val[id]+'" selected="selected">'+val[text]+'</option>');
			});
		}else{
			$(select).append('<option value="'+data[id]+'" selected="selected">'+data[text]+'</option>');
		}
	}
</script>