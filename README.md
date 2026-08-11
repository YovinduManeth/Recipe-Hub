 ## Recipe Hub

## Phase 1 – Project Proposal & Wireframes

Recipe Hub is a web application designed to help users discover, search, and save traditional Sri Lankan recipes. The project aims to provide a simple and user-friendly platform where users can explore recipes by category, view detailed cooking instructions, and manage their favourite recipes.

This repository has been created for the **Web Application Development** module and currently contains the Phase 1 deliverables.



 Project Information

**Project Title:** Recipe Hub – Sri Lankan Recipe Sharing Web Application

**Theme:** Food & Cooking

**Project Phase:** Phase 1 – Proposal & Wireframes



 ## Objectives

- Create an easy-to-use recipe sharing platform.
- Promote traditional Sri Lankan cuisine.
- Allow users to search recipes efficiently.
- Organize recipes into categories.
- Enable users to save favourite recipes.


## Planned Features

- User Registration and Login
- Recipe Search
- Recipe Categories
- Recipe Details Page
- Favourite Recipes
- Share Recipes



## Technology Stack

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL
- Git & GitHub
- Figma


## Wireframes

The following wireframes have been designed using Figma:

- Login Page
- Home Page
- Recipe Details Page



## Current Status

✅ Phase 1 Completed

- Project Proposal
- Wireframes
- GitHub Repository Setup



## Future Development

The next phases of the project will include:

- Frontend Development
- Backend Development
- Database Design
- User Authentication
- Recipe Management
- Testing and Deployment

## Phase 2 – Frontend Layout & Design

## Features

🏠 Home Page
- Introduction to Recipe Hub
- Featured recipes
- Recipe categories

🍛 Recipe Details
- Recipe image
- Description
- Ingredients list
- Step-by-step cooking instructions
- Preparation and cooking time

❤️ Favourite Recipes
- Users can save favourite recipes
- Favourite recipes are stored using browser Local Storage

🔗 Recipe Sharing
- Users can share recipes using the share button

🌙 Dark Mode
- Toggle between light and dark themes

👤 User Registration
- Simple registration system
- User information stored using Local Storage

📩 Contact Form
- Form validation for user messages

📱 Responsive Design
- Works on desktop, tablet, and mobile devices


### Recipe Sharing Feature

A recipe sharing feature was implemented to allow users to share their favourite recipes easily. When the user clicks the share button, the system generates a share option using the browser sharing functionality, allowing users to share recipe links with others.

## JavaScript Features Implemented


📖 Dynamic Recipe Details Loading

- Recipe information is loaded dynamically based on the selected recipe.
- Displays recipe name, image, description, ingredients, instructions, preparation time, cooking time, and servings.

❤️ Favourite Recipe Management

- Users can add recipes to their favourites.
- Favourite recipes are stored using browser Local Storage and displayed on the Favourite page.

🔗 Recipe Sharing Functionality

- Users can share recipe details using the built-in share button.

🌙 Dark Mode Toggle

- Allows users to switch between light mode and dark mode.
- User preference is saved using Local Storage.

👤 User Registration and Profile Management

- Handles user registration form validation.
- Stores user information using Local Storage and displays profile details.

📩 Contact Form Validation

- Validates contact form fields before submission.
- Provides success and error messages to improve user experience.

✨ Scroll Fade-in Animation

- Adds smooth animation effects when elements appear while scrolling

## Bootstrap 5 Components Used

The project uses Bootstrap 5 components to create a responsive and user-friendly interface.

- **Navbar** - Used to create a consistent navigation bar across web pages.
- **Carousel** - Implemented on the home page to display food images in an interactive slider.
- **Cards** - Used to display recipe categories, recipe lists, and favourite recipes in an organized layout.
- **Modal** - Used in the Favourite section to display popup content and provide an interactive user experience.


## Current Status

✅ Phase 2 Completed

- Developed responsive web pages using HTML5, CSS3, and Bootstrap 5
- Implemented Bootstrap components (Navbar, Carousel, Cards, Modal)
- Created recipe categories and recipe details pages
- Added dynamic recipe loading using JavaScript
- Implemented recipe search with autocomplete suggestions
- Added Add to Favourites functionality using Local Storage
- Implemented recipe sharing feature
- Added dark mode functionality
- Added contact form validation
- Implemented user registration using Local Storage
- Added scroll fade-in animations
- Updated README documentation
- Pushed all Phase 2 work to GitHub with meaningful commit messages


## Phase 3 – PHP & MySQL Integration (Final Submission)


## Development Progress

### Authentication System (Completed)

#### User Registration Module
- Converted the registration page from HTML to PHP.
- Connected the registration system with MySQL database using PHP PDO.
- Implemented user data insertion into the database.
- Added password encryption using PHP password hashing.
- Added password confirmation validation.
- Added Terms and Conditions checkbox validation.
- Added professional success and error message notifications.
- Fixed JavaScript conflicts between frontend registration logic and PHP backend processing.

### Files Updated
- `auth/Register.php`
- `includes/db.php`
- `css/style.css`
- `js/script.js`

### Current Features
✅ User registration with database storage  
✅ Secure password hashing  
✅ Form validation  
✅ Error handling messages  
✅ Responsive registration interface


## User Authentication System
- Implemented user registration and login functionality.
- Added password encryption using PHP `password_hash()`.
- Added password verification using `password_verify()`.
- Implemented secure session management.
- Added `session_regenerate_id(true)` after successful login to improve session security.
- Added logout functionality with session destruction.

## Password Reset Feature
- Added forgot password functionality.
- Users can reset their password using their registered email address.
- Added password confirmation validation.
- Added show/hide password eye toggle feature for password fields.

## Contact System
- Converted the Contact Us page into a PHP-based page.
- Added contact message submission functionality.
- Connected the contact form with MySQL database.
- Created `messages` table to store:
  - User name
  - Email
  - Message
  - Created date
- Added successful message notification after sending a message.

## Navigation Updates
- Updated navigation links to match PHP pages.
- Fixed page redirection issues after converting HTML pages.

- Added many recipes to the MySQL recipes table.
- Added recipe details such as ingredients, instructions, preparation time, cooking time, total time, and servings.
- Added/updated traditional recipe categories.
- Added recipes such as Brinjal Curry, Pumpkin Curry, Jackfruit Curry, Vegetable Biriyani, Chicken Fried Rice, Paneer Rice, Prawn Masala, Dunthel Bath, Fish Ambul Thiyal, Tuna Curry, Sailfish Curry, Chicken Curry, Beef Curry, and others.
- Added festive categories such as Avurudu Recipes, Thai Pongal, Ramadan, and Christmas.
- Connected recipe cards to recipe-details.php using recipe_key.
- Updated recipes.php to display the selected main recipes.
- Added duplicate Fish Ambul Thiyal database entry with a separate recipe_key for testing.
- Worked on the recipe-details page and database integration.
- Fixed the recipe-key issue where ambulthiyal2 was mistakenly written as ambulthiyal12.
- Continued testing the Recipe Hub pages and GitHub project.

## Developers

**M.A.Y. Maneth - ITT/2024/066**

**W.M.D.R. Dayarathna - ITT/2024/028**

ICT Undergraduates

Faculty of Technology

Rajarata University of Sri Lanka

Web Application Development Module

2026
