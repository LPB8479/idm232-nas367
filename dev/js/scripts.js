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

function simulateSearch() {
    const searches = document.querySelectorAll(".search")
    searches.forEach((search) => {
        search.addEventListener("click", () => {
            window.location.href = 'results.html'
        })
    })
}
simulateSearch()