function initAutocomplete() {
$(function(){
$('#prod-name').typeahead({
        ajax: { 
                url: '/api/front.php',
                triggerLength: 1 
              }
    });
         
});
}

function changeHomeSel(search_type) {
if (search_type!=1)  { $('#prod-name').addClass('hidden');$('#prod').removeClass('hidden'); } else {
	$('#prod-name').removeClass('hidden');
	$('#prod').addClass('hidden');
	}
}