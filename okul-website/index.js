let contact = document.getElementById("contact");
let mevcutDurum = document.getElementById("mevcut");
let ulasim = document.getElementById("ulasim");
let school = document.getElementById("school");

mevcutDurum.addEventListener("click", function(e){

    document.querySelector(".mevcut-durum").classList.remove("d-none");
    document.querySelector(".mevcut-durum").classList.add("d-flex");
    
    document.querySelector(".contact-table").classList.remove("d-block");
    document.querySelector(".contact-table").classList.add("d-none");

    document.querySelector(".ulasim").classList.remove("d-block");
    document.querySelector(".ulasim").classList.add("d-none");

    document.querySelector(".okul-table").classList.remove("d-block");
    document.querySelector(".okul-table").classList.add("d-none");

    e.preventDefault();
});

ulasim.addEventListener("click", function(e){

    document.querySelector(".ulasim").classList.remove("d-none");
    document.querySelector(".ulasim").classList.add("d-block");

    document.querySelector(".okul-table").classList.remove("d-block");
    document.querySelector(".okul-table").classList.add("d-none");

    document.querySelector(".contact-table").classList.remove("d-block");
    document.querySelector(".contact-table").classList.add("d-none");

    document.querySelector(".mevcut-durum").classList.remove("d-flex");
    document.querySelector(".mevcut-durum").classList.add("d-none");

    e.preventDefault();
});

school.addEventListener("click",function(e){

    document.querySelector(".okul-table").classList.remove("d-none");
    document.querySelector(".okul-table").classList.add("d-block");

    document.querySelector(".ulasim").classList.remove("d-block");
    document.querySelector(".ulasim").classList.add("d-none");

    document.querySelector(".contact-table").classList.remove("d-block");
    document.querySelector(".contact-table").classList.add("d-none");

    document.querySelector(".mevcut-durum").classList.remove("d-flex");
    document.querySelector(".mevcut-durum").classList.add("d-none");

    e.preventDefault();
});


contact.addEventListener("click", function (e){

    document.querySelector(".contact-table").classList.remove("d-none");
    document.querySelector(".contact-table").classList.add("d-block");

    document.querySelector(".mevcut-durum").classList.remove("d-flex");
    document.querySelector(".mevcut-durum").classList.add("d-none");

    document.querySelector(".okul-table").classList.remove("d-block");
    document.querySelector(".okul-table").classList.add("d-none");

    document.querySelector(".ulasim").classList.remove("d-block");
    document.querySelector(".ulasim").classList.add("d-none");
    

    e.preventDefault();    
});



// function createItem(text){
//     let li = document.createElement("li");
//     li.className = "links";
//     li.appendChild(document.createTextNode(text));
// }

// function addNewItem(e){
//     if(confirm.value === ""){
//         alert ("Add New Task");
//     }

//     createItem(confirm.value);
// }


// let menuOpen = document.querySelector(".nav .icon");
// let menuClose = document.querySelector(".carpi");
// let navLink = document.querySelector(".nav .container");

// let haberTitle = document.querySelector(".haberler .title")


// menuOpen.addEventListener("click" , ()=>{
//     navLink.style.left = "0";
//     haberTitle.classList.remove("d-block")
//     haberTitle.classList.add("d-none")
    
// });

// menuClose.addEventListener("click",()=>{
//     navLink.style.left = "-100%";
//     haberTitle.classList.remove("d-none")
//     haberTitle.classList.add("d-block")
// });