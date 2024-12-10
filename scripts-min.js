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

function resetFilter() {
    const recipeCards = document.querySelectorAll(".recipeCard");
    const recipeCount = document.querySelector("#resultsCount h4 span");
    recipeCards.forEach((card) => {
        card.style.display = "";
    })
    recipeCount.innerHTML = recipeCards.length.toString()
}

function filterMenu() {
    //collapse filter menu
    const filterButton = document.getElementById("filterButton");
    if (filterButton) {
        // document.getElementById('filterResults').style.display = "none"
        filterButton.addEventListener("click", () => {
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
        });

        //filter buttons functionality
        const filters = document.querySelectorAll(".searchFilter");
        filters.forEach((selectedFilterButton) => {
            selectedFilterButton.addEventListener("click", () => {
                toggleFilterButton(selectedFilterButton);
                const recipeCards = document.querySelectorAll(".recipeCard");
                const recipeCount = document.querySelector("#resultsCount h4 span");
                if (selectedFilterButton.classList.contains("active")) {
                    const filterName = selectedFilterButton.id.replace("Filter", "");
                    let newCount = 0;
                    recipeCards.forEach((card) => {
                        if (!(card.classList.contains(filterName))) {
                            card.style.display = 'none';
                            newCount++;
                        }
                    })
                    recipeCount.innerHTML = (parseInt(recipeCount.innerHTML) - newCount).toString();
                }
                else {
                    resetFilter();
                }
                /*
                    No need to have files talk to each other
                    make sure each recipe has the tags as classes
                    use js to d:n or hidden:true elements that don't match
                        update results count (or remove entirely)
                */
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