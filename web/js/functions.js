function initAutocomplete() {
  $(function(){
 $('#prod').typeahead({
        ajax: { 
                url: '/api/front.php',
                triggerLength: 1 
              }
    });
         
});
}