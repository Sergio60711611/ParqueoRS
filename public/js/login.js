const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');


signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});


signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});


//jQuery time

  $(document).ready(function() {
    var current_fs, next_fs, previous_fs; //fieldsets
    var animating = false; //flag to prevent quick multi-click glitches

    $(".next").click(function() {
      if (animating) return false;
      animating = true;

      current_fs = $(this).parent();
      next_fs = $(this).parent().next();

      // Hide the current fieldset
      current_fs.hide();
      // Show the next fieldset
      next_fs.show();

	  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      animating = false;
    });

    $(".previous").click(function() {
      if (animating) return false;
      animating = true;

      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      // Hide the current fieldset
      current_fs.hide();
      // Show the previous fieldset
      previous_fs.show();

	  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	  
      animating = false;
    });
	
    // Hide all fieldsets except the first one
    $("fieldset:not(:first)").hide();
  });
