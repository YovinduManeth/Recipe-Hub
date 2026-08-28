console.log("SCRIPT JS LOADED");

// ===========================
// POPULAR SEARCHES
// ===========================

const popularSearches = document.querySelectorAll(".popular-search");
const modalSearchInput = document.getElementById("modalSearchInput");

if (modalSearchInput) {
    popularSearches.forEach(function (item) {
        item.addEventListener("click", function () {
            modalSearchInput.value = item.textContent.trim();
        });
    });
}


// ===========================
// RECIPE SEARCH
// ===========================

const recipeSearchInput = document.getElementById("recipeSearch");

if (recipeSearchInput) {
    recipeSearchInput.addEventListener("input", function () {

        const searchValue = this.value.toLowerCase().trim();

        const recipeCards = document.querySelectorAll(".recipe-card");

        recipeCards.forEach(function (card) {

            const recipeNameElement =
                card.querySelector(".card-title");

            if (!recipeNameElement) {
                return;
            }

            const recipeName =
                recipeNameElement.textContent.toLowerCase();

            if (recipeName.includes(searchValue)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }

        });
    });
}





// ===========================
// DISPLAY FAVOURITES
// ===========================

const favouriteList =
    document.getElementById("favouriteList");

if (favouriteList) {

    const favourites =
        JSON.parse(localStorage.getItem("favourites")) || [];


    if (favourites.length === 0) {

        favouriteList.innerHTML =
            "<p>No favourite recipes added yet ❤️</p>";

    } else {

        /*
         * This section requires recipeData.js.
         * It will only run if recipeData exists.
         */

        if (typeof recipeData !== "undefined") {

            favourites.forEach(function (recipeId) {

                const recipe = recipeData[recipeId];

                if (recipe) {

                    favouriteList.innerHTML +=
`
<div class="col">

    <div class="card h-100">

        <img
            src="${recipe.image}"
            class="card-img-top"
            alt="${recipe.title}"
        >

        <div class="card-body">

            <h5 class="card-title">
                ${recipe.title}
            </h5>

            <a
                href="recipe-details.php?recipe=${recipeId}"
                class="btn btn-warning"
            >
                View Recipe
            </a>

            <button
                onclick="removeFavourite('${recipeId}')"
                class="btn btn-danger"
            >
                Remove
            </button>

        </div>

    </div>

</div>
`;

                    
                }

            });

        } else {

            favouriteList.innerHTML =
                "<p>Recipe data could not be loaded.</p>";
        }
    }
}


// ===========================
// REMOVE FAVOURITE
// ===========================

function removeFavourite(recipeId) {

    let favourites =
        JSON.parse(localStorage.getItem("favourites")) || [];


    favourites = favourites.filter(function (item) {
        return item !== recipeId;
    });


    localStorage.setItem(
        "favourites",
        JSON.stringify(favourites)
    );


    alert("Removed from favourites 💔");

    location.reload();
}


// ===========================
// LOGOUT
// ===========================

function logout() {

    window.location.href = "auth/logout.php";
}


// ===========================
// CONTACT FORM VALIDATION
// ===========================

document.addEventListener("DOMContentLoaded", function () {

    const contactForm =
        document.getElementById("contactForm");


    if (contactForm) {

        contactForm.addEventListener("submit", function (event) {

            event.preventDefault();


            const name =
                document.getElementById("contactName").value.trim();

            const email =
                document.getElementById("contactEmail").value.trim();

            const subject =
                document.getElementById("contactSubject").value.trim();

            const message =
                document.getElementById("contactMessage").value.trim();


            if (
                name === "" ||
                email === "" ||
                subject === "" ||
                message === ""
            ) {

                alert("Please fill all fields");

            } else {

                alert("Message sent successfully ❤️");

                contactForm.reset();
            }

        });
    }

});


// ===========================
// DARK MODE
// ===========================

document.addEventListener("DOMContentLoaded", function () {

    const modeButton =
        document.querySelector(".mode-icon");


    if (!modeButton) {
        return;
    }


    // Load saved mode

    if (
        localStorage.getItem("darkMode") === "enabled"
    ) {

        document.body.classList.add("dark-mode");

        modeButton.classList.remove("fa-moon");

        modeButton.classList.add("fa-sun");
    }


    // Toggle mode

    modeButton.addEventListener("click", function () {

        document.body.classList.toggle("dark-mode");


        if (
            document.body.classList.contains("dark-mode")
        ) {

            localStorage.setItem(
                "darkMode",
                "enabled"
            );


            modeButton.classList.remove(
                "fa-moon"
            );

            modeButton.classList.add(
                "fa-sun"
            );

        } else {

            localStorage.removeItem("darkMode");


            modeButton.classList.remove(
                "fa-sun"
            );

            modeButton.classList.add(
                "fa-moon"
            );
        }

    });

});


// ===========================
// SCROLL FADE-IN ANIMATION
// ===========================

const fadeElements =
    document.querySelectorAll(".fade-in");


if ("IntersectionObserver" in window) {

    const observer =
        new IntersectionObserver(
            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add("show");

                    }

                });

            },
            {
                threshold: 0.2
            }
        );


    fadeElements.forEach(function (element) {

        observer.observe(element);

    });

}


// ===========================
// SHARE RECIPE
// ===========================

const shareButton =
    document.getElementById("shareRecipeBtn");


if (shareButton) {

    shareButton.addEventListener("click", function () {

        const urlParams =
            new URLSearchParams(window.location.search);


        const recipeId =
            urlParams.get("recipe");


        /*
         * Do not depend on recipeData.js here.
         * The recipe details are now loaded from PHP/database.
         */

        const recipeTitleElement =
            document.getElementById("recipeTitle");

        const recipeDescriptionElement =
            document.getElementById("recipeDescription");


        const recipeTitle =
            recipeTitleElement
                ? recipeTitleElement.textContent.trim()
                : "Recipe Hub Recipe";


        const recipeDescription =
            recipeDescriptionElement
                ? recipeDescriptionElement.textContent.trim()
                : "Check out this recipe from Recipe Hub.";


        const shareData = {

            title: recipeTitle,

            text: recipeDescription,

            url: window.location.href

        };


        if (navigator.share) {

            navigator.share(shareData)

                .then(function () {

                    console.log(
                        "Recipe shared successfully"
                    );

                })

                .catch(function () {

                    console.log(
                        "Sharing cancelled"
                    );

                });

        } else if (navigator.clipboard) {

            navigator.clipboard
                .writeText(window.location.href)

                .then(function () {

                    alert(
                        "Recipe link copied! Share it with others ❤️"
                    );

                })

                .catch(function () {

                    alert(
                        "Unable to copy recipe link."
                    );

                });

        } else {

            alert(
                "Sharing is not supported on this browser."
            );
        }

    });
}

// ===========================
// RECIPE SEARCH SUGGESTIONS
// ===========================

document.addEventListener("DOMContentLoaded", function () {

    const searchInput =
        document.getElementById("searchInput");

    const searchSuggestions =
        document.getElementById("searchSuggestions");


    if (
        searchInput &&
        searchSuggestions &&
        typeof recipeData !== "undefined"
    ) {

        searchInput.addEventListener(
            "input",
            function () {

                const value =
                    searchInput.value
                        .toLowerCase()
                        .trim();


                searchSuggestions.innerHTML = "";


                if (value === "") {
                    return;
                }


                let foundRecipe = false;


                Object.keys(recipeData).forEach(
                    function (recipeId) {

                        const recipe =
                            recipeData[recipeId];


                        if (
                            recipe &&
                            recipe.title &&
                            recipe.title
                                .toLowerCase()
                                .includes(value)
                        ) {

                            foundRecipe = true;


                            const suggestion =
                                document.createElement("div");


                            suggestion.classList.add(
                                "suggestion-item"
                            );


                            suggestion.textContent =
                                recipe.title;


                            suggestion.addEventListener(
                                "click",
                                function () {

                                    window.location.href =
                                        "recipe-details.php?recipe=" +
                                        recipeId;

                                }
                            );


                            searchSuggestions.appendChild(
                                suggestion
                            );

                        }

                    }
                );


                // Show message when no recipe matches
                if (!foundRecipe) {

                    const noResult =
                        document.createElement("div");

                    noResult.classList.add(
                        "suggestion-item"
                    );

                    noResult.textContent =
                        "No recipes found.";

                    searchSuggestions.appendChild(
                        noResult
                    );

                }

            }
        );
    }

});



// ===========================
// LOGIN PASSWORD SHOW / HIDE
// ===========================

document.addEventListener("DOMContentLoaded", function () {

    const loginPassword =
        document.getElementById("password");


    const toggleLoginPassword =
        document.getElementById(
            "toggleLoginPassword"
        );


    const loginEye =
        document.getElementById("loginEye");


    if (
        loginPassword &&
        toggleLoginPassword &&
        loginEye
    ) {

        toggleLoginPassword.addEventListener(
            "click",
            function () {

                if (
                    loginPassword.type === "password"
                ) {

                    loginPassword.type = "text";


                    loginEye.classList.remove(
                        "fa-eye"
                    );


                    loginEye.classList.add(
                        "fa-eye-slash"
                    );


                    toggleLoginPassword.setAttribute(
                        "aria-label",
                        "Hide password"
                    );

                } else {

                    loginPassword.type = "password";


                    loginEye.classList.remove(
                        "fa-eye-slash"
                    );


                    loginEye.classList.add(
                        "fa-eye"
                    );


                    toggleLoginPassword.setAttribute(
                        "aria-label",
                        "Show password"
                    );
                }

            }
        );
    }

});

// ===========================
// PROFILE PASSWORD SHOW / HIDE
// ===========================

function togglePassword(inputId, eyeIcon) {

    const passwordInput = document.getElementById(inputId);

    if (!passwordInput) {
        return;
    }

    if (passwordInput.type === "password") {

        passwordInput.type = "text";

        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");

    } else {

        passwordInput.type = "password";

        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");

    }
}