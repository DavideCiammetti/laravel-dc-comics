import "./bootstrap";
//inclusione del css nel progetto
import "~resources/scss/app.scss";

// Import all of Bootstrap's JS
import * as bootstrap from "bootstrap";

//process images
import.meta.glob(["../img/**"]);

for(let i = 0; i < 20; i++){
const button = document.querySelector('.button-annulla-'+i);
let formContainer = document.querySelector('.form-container-'+i);
const deleteButton = document.querySelector('.js-delete-'+i);


    // mostra alert
deleteButton.addEventListener('click', function(){
    console.log(1);
    formContainer.classList.remove("d-none");
    formContainer.style.display = "block";
});
// nascondi alert
button.addEventListener('click', function(){
    console.log(2);
    formContainer.classList.add("d-none");
});
}