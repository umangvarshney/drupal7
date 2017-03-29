
jQuery('document').ready(function(){
	jQuery('#solr_text').on('keyup',function(e){
		var term = jQuery(this).val();
		if(term !== '' && typeof(term) !== 'undefined') {
			jQuery.ajax({
				'url':'/solr/callback/autocomplete?term='+term,
				'type':'GET',
				'datatype':'json',
				'success':function(value) {
					console.log(value);
				},
				'error':function(e) {
					console.log(e);
				}
			});
		}
	});
});