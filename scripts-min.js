function hamburger(){const e=document.getElementById("hamburger"),t=document.querySelector("header");e.addEventListener("click",(()=>{t.classList.contains("closed")?t.classList.replace("closed","open"):t.classList.replace("open","closed")}))}function filterMenu(){const e=document.getElementById("filterButton");if(e){document.getElementById("filterResults").style.display="none",e.addEventListener("click",(()=>{e.classList.contains("active")?($("#filterResults").slideUp(500),e.style.backgroundColor="var(--yellow)",e.style.borderColor="black",e.classList.remove("active")):($("#filterResults").slideDown(500),e.style.backgroundColor="var(--orange)",e.style.borderColor="var(--orange)",e.classList.add("active"))}));document.querySelectorAll(".searchFilter").forEach((e=>{e.addEventListener("click",(()=>{e.classList.toggle("active")}))}))}}function tagLink(){document.querySelectorAll(".cuisineTag").forEach((e=>{const t=e.children[0].innerHTML.toLowerCase();e.setAttribute("href",`search.php?cuisine=${t}`)}));document.querySelectorAll(".dietaryTag").forEach((e=>{const t=e.children[0].innerHTML.toLowerCase();e.setAttribute("href",`search.php?tag=${t}`)}))}hamburger(),filterMenu(),tagLink();const recipeError=document.getElementById("recipeError"),resultsHeaderHeight=document.getElementById("resultsHeader")?Math.ceil(document.getElementById("resultsHeader").offsetHeight):0;recipeError&&(recipeError.style.height=window.innerHeight-document.querySelector("header").offsetHeight-resultsHeaderHeight-document.querySelector("footer").offsetHeight-40+"px");