let menuOpen = document.querySelector(".nav .icon");
let menuClose = document.querySelector(".carpi");
let navLink = document.querySelector(".nav .container");

let haberTitle = document.querySelector(".haberler .title")




menuOpen.addEventListener("click" , ()=>{
    navLink.style.left = "0";
    haberTitle.classList.remove("d-block")
    haberTitle.classList.add("d-none")
    
});

menuClose.addEventListener("click",()=>{
    navLink.style.left = "-100%";
    haberTitle.classList.remove("d-none")
    haberTitle.classList.add("d-block")
});