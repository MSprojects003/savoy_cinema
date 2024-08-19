
function style1(){
    var lists=document.querySelectorAll(".list");
 
    lists.forEach(function(list) {
     var details=list.querySelector(".details");
     var img = list.querySelector('.thumb img');
 
  list.addEventListener('mouseover',function(){
     details.classList.add("open-details");
     img.classList.add("open-img");
  });
  list.addEventListener('mouseleave',function(){
     details.classList.remove("open-details");
     img.classList.remove("open-img");
  });
    });
}

style1();
function style2(){
    
}
style2();