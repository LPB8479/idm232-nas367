function hamburger() {
    const burgerBtn = document.getElementById("hamburger");
    const header = document.querySelector("header");
    burgerBtn.addEventListener("click", () => {
        if (header.classList.contains("closed")) {
            header.classList.replace("closed", "open");
        } else {
            header.classList.replace("open", "closed")
        }
    })
}
hamburger();

function filterMenu() {
    //collapse filter menu
    const filterButton = document.getElementById("filterButton");
    if (filterButton) {
        document.getElementById('filterResults').style.display = "none"
        filterButton.addEventListener("click", () => {
            if (!filterButton.classList.contains("active")) {
                $('#filterResults').slideDown(500);
                filterButton.style.backgroundColor = "var(--orange)";
                filterButton.style.borderColor = 'var(--orange)';
                filterButton.classList.add("active");
            } else {
                $('#filterResults').slideUp(500);
                filterButton.style.backgroundColor = "var(--yellow)";
                filterButton.style.borderColor = 'black';
                filterButton.classList.remove("active");
            }
        })

        //filter buttons
        const filters = document.querySelectorAll(".searchFilter");
        filters.forEach((filterButton) => {
            filterButton.addEventListener("click", () => {
                filterButton.classList.toggle("active");
            })
        })
    }
}
filterMenu();

//Fix height
const recipeError = document.getElementById("recipeError");
const resultsHeaderHeight = (document.getElementById("resultsHeader")) ? Math.ceil(document.getElementById("resultsHeader").offsetHeight) : 0;
if (recipeError) {
    recipeError.style.height = (window.innerHeight - document.querySelector("header").offsetHeight - resultsHeaderHeight - document.querySelector("footer").offsetHeight - 40) + 'px';
}