<?php
// aaaa
 ?>

/* js hit */
// get url and post with session id

(function($){

  // var pathname = window.location.pathname; // Returns path only
  var url      = window.location.href;     // Returns full URL

  $.ajax({
    type: "POST",
    url: "<?php echo $posturl ?>",
    data: {
      url   : url,
      absid : "<?php echo $absid ?>"
    }
    //,
    //success: success,
    //dataType: dataType
  });

})(jQuery);
 
