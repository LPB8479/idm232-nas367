function hamburger() {
    const burgerBtn = document.getElementById("hamburger");
    const header = document.querySelector("header");
    burgerBtn.addEventListener("click", () => {
        if(header.classList.contains("closed")) {
            header.classList.replace("closed", "open");
        } else{
            header.classList.replace("open", "closed")
        }
    })
}
hamburger();