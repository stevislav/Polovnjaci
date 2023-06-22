
const modalButton = document.querySelector(".modal")
const modla1_button = document.querySelector(".modal1")
const overlay1 = document.getElementById("overlay1")
const overlay2 = document.getElementById("overlay2")
const cancel_btn = document.querySelector(".cancel-btn")
const cancel_btn1 = document.querySelector(".cancel-btn1")

overlay2.style.display = "none"

    modla1_button.addEventListener("click", function() {
        if (overlay2.style.display == "block") {
            overlay2.style.display = "none"
        } else {
            overlay2.style.display = "block"
        }
    });
    modalButton.addEventListener("click", function() {
                if (overlay1.style.display == "none") {
                    overlay1.style.display = "block"
                } else {
                    overlay1.style.display = "none"
                }
 });

 cancel_btn.addEventListener("click", function() {
    overlay1.style.display = "none"
})
cancel_btn1.addEventListener("click", function() {
    overlay2.style.display = "none"
})
// for (let i = 0; i < modalButtons.length; i++) {
//     modalButtons[i].addEventListener("click", function() {
//         if (overlay.style.display == "none") {
//             overlay.style.display = "flex"
//         } else {
//             overlay.style.display = "none"
//         }
//     })
// }