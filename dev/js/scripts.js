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

const filters = document.querySelectorAll(".searchFilter");
const filterButton = document.getElementById("filterButton");
const recipeCards = document.querySelectorAll(".recipeCard");

//start with filter menu collapsed
document.getElementById("filterResults").style.display = "none"

function collapseFilters() {
    if (!filterButton.classList.contains("open")) {
        $('#filterResults').slideDown(500);
        filterButton.style.backgroundColor = "var(--orange)";
        filterButton.style.borderColor = 'var(--orange)';
        filterButton.classList.add("open");
    } else {
        $('#filterResults').slideUp(500);
        filterButton.style.backgroundColor = "var(--yellow)";
        filterButton.style.borderColor = 'black';
        filterButton.classList.remove("open");
    }
}

function toggleFilterButton(selected) {
    selected.classList.toggle("active")
    //ensure only 1 filter per type is active at once
    if (selected.classList.contains("cuisineFilter")) {
        const cuisineFilters = document.querySelectorAll(".cuisineFilter");
        cuisineFilters.forEach((filter) => {
            if (filter != selected && filter.classList.contains("active")) {
                filter.classList.remove("active");
            }
        })
    }
    else {
        const dietaryFilter = document.querySelectorAll(".dietaryFilter");
        dietaryFilter.forEach((filter) => {
            if (filter != selected && filter.classList.contains("active")) {
                filter.classList.remove("active");
            }
        })
    }
}

function applyFilters() {
    //reset all filters
    recipeCards.forEach((card) => {
        card.classList.remove("filteredCuisine", "filteredDiet");
    });

    //apply active filters
    filters.forEach((filter) => {     
        const filterType = (filter.classList.contains("cuisineFilter")) ? "Cuisine" : "Diet";
        const filterName = filter.id.replace("Filter", "");
        if (filter.classList.contains("active")) {
            recipeCards.forEach((card) => {
                if (!(card.classList.contains(filterName))) {
                    card.classList.add(`filtered${filterType}`);
                }
            });
        }
    })
}

function updateResultsCount() {
    let newCount = 0;
    recipeCards.forEach((card) => {
        if (!(card.classList.contains("filteredDiet")) && !(card.classList.contains("filteredCuisine"))) {
            newCount++;
        }
    })
    document.querySelector("#resultsCount h4 span").innerHTML = newCount.toString();
}

function filterMenu() {
    if (filterButton) {
        //collapse filter menu
        filterButton.addEventListener("click", collapseFilters, false);

        //filter buttons functionality
        filters.forEach((selectedFilterButton) => {
            selectedFilterButton.addEventListener("click", () => {
                toggleFilterButton(selectedFilterButton);
                applyFilters();
                updateResultsCount();
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