console.log("SCRIPT JS LOADED");

const popularSearches = document.querySelectorAll(".popular-search");

const modalSearchInput = document.getElementById("modalSearchInput");


if(modalSearchInput){


    popularSearches.forEach(function(item){


        item.addEventListener("click", function(){


            modalSearchInput.value = item.textContent.trim();


        });


    });


}


// RECIPE SEARCH 


const searchInput = document.getElementById("recipeSearch");


if(searchInput){


    searchInput.addEventListener("input", function(){


        let searchValue = this.value.toLowerCase();


        const recipeCards = document.querySelectorAll(".recipe-card");


        recipeCards.forEach(function(card){


            const recipeName = card
            .querySelector(".recipe-name")
            .textContent
            .toLowerCase();



            if(recipeName.includes(searchValue)){


                card.style.display = "";


            }

            else{


                card.style.display = "none";


            }


        });


    });


}


// ADD / REMOVE FAVOURITES


const favouriteButton = document.getElementById("addFavouriteBtn");


if(favouriteButton){


    const selectedRecipe = new URLSearchParams(window.location.search)
    .get("recipe");


    let favourites = JSON.parse(localStorage.getItem("favourites")) || [];



    function updateFavouriteButton(){


        if(favourites.includes(selectedRecipe)){


            favouriteButton.textContent = "💔 Remove Favourite";


        }

        else{


            favouriteButton.textContent = "❤️ Add Favourite";


        }


    }



    updateFavouriteButton();



    favouriteButton.addEventListener("click", function(){



        if(favourites.includes(selectedRecipe)){


            favourites = favourites.filter(function(item){


                return item !== selectedRecipe;


            });


            alert("Recipe removed from favourites 💔");


        }


        else{


            favourites.push(selectedRecipe);


            alert("Recipe added to favourites ❤️");


        }



        localStorage.setItem(
            "favourites",
            JSON.stringify(favourites)
        );



        updateFavouriteButton();



    });


}

// DISPLAY FAVOURITES 


const favouriteList = document.getElementById("favouriteList");


if(favouriteList){


    const favourites = JSON.parse(localStorage.getItem("favourites")) || [];


    if(favourites.length === 0){


        favouriteList.innerHTML =
        `
        <p>No favourite recipes added yet ❤️</p>
        `;


    }

    else{


        favourites.forEach(function(recipeId){


            const recipe = recipeData[recipeId];


            if(recipe){


                favouriteList.innerHTML +=
                `

                <div class="col">


                    <div class="card h-100">


                        <img src="${recipe.image}"
                        class="card-img-top">


                        <div class="card-body">


                            <h5 class="card-title">
                            ${recipe.title}
                            </h5>


                            <p class="card-text">
                            ${recipe.description}
                            </p>


                            <a href="recipe-details.php?recipe=${recipeId}"
                                class="btn btn-warning">

                                    View Recipe

                            </a>


                                <button onclick="removeFavourite('${recipeId}')"
                                    class="btn btn-danger">

                                    Remove

                                </button>


                        </div>


                    </div>


                </div>


                `;


            }


        });


    }


}

function removeFavourite(recipeId){


    let favourites = JSON.parse(localStorage.getItem("favourites")) || [];


    favourites = favourites.filter(function(item){

        return item !== recipeId;

    });


    localStorage.setItem(
        "favourites",
        JSON.stringify(favourites)
    );


    alert("Removed from favourites 💔");


    location.reload();


}

function logout(){

    window.location.href="auth/logout.php";

}

// CONTACT FORM VALIDATION 

document.addEventListener("DOMContentLoaded", function(){


    const contactForm = document.getElementById("contactForm");


    if(contactForm){


        contactForm.addEventListener("submit", function(event){


            event.preventDefault();


            const name = document.getElementById("contactName").value.trim();

            const email = document.getElementById("contactEmail").value.trim();

            const subject = document.getElementById("contactSubject").value.trim();

            const message = document.getElementById("contactMessage").value.trim();



            if(name === "" || email === "" || subject === "" || message === ""){


                alert("Please fill all fields");


            }

            else{


                alert("Message sent successfully ❤️");


                contactForm.reset();


            }


        });


    }


});




// DARK MODE 


document.addEventListener("DOMContentLoaded", function(){


    const modeButton = document.querySelector(".mode-icon");


    if(!modeButton) return;



    // Load saved mode

    if(localStorage.getItem("darkMode") === "enabled"){


        document.body.classList.add("dark-mode");


        modeButton.classList.remove("fa-moon");

        modeButton.classList.add("fa-sun");


    }



    modeButton.addEventListener("click", function(){



        document.body.classList.toggle("dark-mode");



        if(document.body.classList.contains("dark-mode")){


            localStorage.setItem(
                "darkMode",
                "enabled"
            );


            modeButton.classList.remove("fa-moon");

            modeButton.classList.add("fa-sun");


        }

        else{


            localStorage.removeItem("darkMode");


            modeButton.classList.remove("fa-sun");

            modeButton.classList.add("fa-moon");


        }



    });



});






// SCROLL FADE-IN ANIMATION


const fadeElements = document.querySelectorAll(".fade-in");


const observer = new IntersectionObserver((entries)=>{


    entries.forEach(entry=>{


        if(entry.isIntersecting){

            entry.target.classList.add("show");

        }


    });


},
{
    threshold:0.2
});



fadeElements.forEach(element=>{

    observer.observe(element);

});

// SHARE RECIPE FUNCTION

const shareButton = document.getElementById("shareRecipeBtn");


if(shareButton){

    shareButton.addEventListener("click", function(){

        const urlParams = new URLSearchParams(window.location.search);

        const recipeId = urlParams.get("recipe");

        const recipe = recipeData[recipeId];


        if(recipe){


            const shareData = {

                title: recipe.title,

                text: recipe.description,

                url: window.location.href

            };


            // Mobile and supported browsers

            if(navigator.share){


                navigator.share(shareData)

                .then(()=>{

                    console.log("Recipe shared successfully");

                })

                .catch((error)=>{

                    console.log("Sharing cancelled");

                });


            }


            // For browsers without share support

            else{


                navigator.clipboard.writeText(window.location.href);


                alert("Recipe link copied! Share it with others ❤️");


            }


        }


    });


}

// ===========================
// RECIPE SEARCH SUGGESTIONS
// ===========================

document.addEventListener("DOMContentLoaded", function(){

    const searchInput = document.getElementById("searchInput");
    const searchSuggestions = document.getElementById("searchSuggestions");


    if(searchInput && searchSuggestions){


        searchInput.addEventListener("input", function(){


            const value = searchInput.value.toLowerCase().trim();


            searchSuggestions.innerHTML = "";


            if(value === ""){
                return;
            }


            Object.keys(recipeData).forEach(function(recipeId){


                const recipe = recipeData[recipeId];


                if(recipe.title.toLowerCase().includes(value)){


                    const suggestion = document.createElement("div");


                    suggestion.classList.add("suggestion-item");


                    suggestion.textContent = recipe.title;


                    suggestion.onclick = function(){

                        window.location.href =
                        "recipe-details.php?recipe=" + recipeId;

                    };


                    searchSuggestions.appendChild(suggestion);


                }


            });


        });


    }


});


// ===========================
// LOGIN PASSWORD SHOW / HIDE
// ===========================

const loginPassword = document.getElementById("password");
const toggleLoginPassword = document.getElementById("toggleLoginPassword");
const loginEye = document.getElementById("loginEye");

if (loginPassword && toggleLoginPassword && loginEye) {

    toggleLoginPassword.addEventListener("click", function () {

        if (loginPassword.type === "password") {

            loginPassword.type = "text";

            loginEye.classList.remove("fa-eye");
            loginEye.classList.add("fa-eye-slash");

            toggleLoginPassword.setAttribute(
                "aria-label",
                "Hide password"
            );

        } else {

            loginPassword.type = "password";

            loginEye.classList.remove("fa-eye-slash");
            loginEye.classList.add("fa-eye");

            toggleLoginPassword.setAttribute(
                "aria-label",
                "Show password"
            );

        }

    });

}
```