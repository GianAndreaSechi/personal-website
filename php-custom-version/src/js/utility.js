/* return to top funtion */
var btn = $('#btnTop'); /* get btnTop */
btn.removeClass('show'); /* removing class show for the firt load */
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show'); /* show button when scroll is more than 300*/
  } else {
    btn.removeClass('show'); /* hide button when scroll is less than 300*/
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300'); /* animating scrolling to the top on click button */
});


/*Used to smoothing the page's scroll*/
$(document).ready(function(){
  //get the name of the page
  if(document.location.pathname == '/'){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  }else{
    var page_name=(document.location.pathname.match(/[^\/]+$/)[0]);
    //check if i'm in home and enable smooth scroll
    if (page_name=='index'){
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    }
  }
});
