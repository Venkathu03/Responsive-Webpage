function reveal() {
	var reveals = document.querySelectorAll(".reveal");
  
	for (var i = 0; i < reveals.length; i++) {
	  var windowHeight = window.innerHeight;
	  var elementTop = reveals[i].getBoundingClientRect().top;
	  var elementVisible = 150;
  
	  if (elementTop < windowHeight - elementVisible) {
		reveals[i].classList.add("active");
	  } else {
		reveals[i].classList.remove("active");
	  }
	}
  }
  
  window.addEventListener("scroll", reveal);

//   function contact() {
// 	var contact = document.querySelectorAll(".contact-page");
  
// 	for (var i = 0; i < contact.length; i++) {
// 	  var windowHeight = window.innerHeight;
// 	  var elementTop = contact[i].getBoundingClientRect().top;
// 	  var elementVisible = 20;
  
// 	  if (elementTop < windowHeight - elementVisible) {
// 		contact[i].classList.add("active");
// 	  } else {
// 		contact[i].classList.remove("active");
// 	  }
// 	}
//   }
  
//   window.addEventListener("scroll", contact);