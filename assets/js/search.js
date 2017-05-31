$(document).ready(function() {
  listFilter($("#search-list"));
  $("#search-input").blur(function(){
	  setTimeout(function(){
		  $("#search-list").hide();
	  }, 1000);
  }).focus(function(){
	  if( $(this).val().length > 0 ) {
			$("#search-list").show();
		}
  });
});

  // custom css expression for a case-insensitive contains()
  jQuery.expr[':'].Contains = function(a,i,m){
      return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
  };


  function listFilter(list) { // header is any element, list is an unordered list
    $(list).find("li").hide();
    $('.divider').hide();
    $('#search-input')
      .change( function () {
        var filter = $(this).val();
        if(filter) {
		  $(list).show();
          // this finds all links in a list that contain the input,
          // and hide the ones not containing the input while showing the ones that do
          $(list).find("a:not(:Contains(" + filter + "))").parent().slideUp();
          $(list).find("a:Contains(" + filter + ")").parent().slideDown();
          $('.divider').show();
        } else {
          $('.divider').hide();
          $(list).find("li").hide();
          $(list).hide();
        }
        return false;
      })
    .keyup( function () {
        // fire the above change event after every letter
        $(this).change();
        $( "#mainNav .child1" ).each(function() {
             if (($(this).hasClass('active') == true )) {
                $(this).slideUp().removeClass('active');
             }
        });
        $('.parent.active').removeClass('active');
    });
  }