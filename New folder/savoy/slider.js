 
  var slide = document.querySelectorAll('.slide');
  var current = 0;
  
  function slider(count) {
    slide[current].classList.remove("active");
    current = (count + slide.length) % slide.length;
    slide[current].classList.add("active");
     
  }
  
  // Show the next slide
  function next() {
    slider(current + 1);
  }
  
  // Show the previous slide
  function prev() {
    slider(current - 1);
  }
  