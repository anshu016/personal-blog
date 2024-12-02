
# Personal Blog Platform

A simple PHP-based blog platform where users can create, view, like posts, and track views. It has a backend API and a simple frontend interface.

## Features
- Create new blog posts
- View individual blog posts
- Like posts
- Categories for posts

## Technologies Used
- Frontend: HTML, CSS, JavaScript
- Backend: PHP (REST API)
- Database: In-memory or a simple file-based storage (JSON)

## Setup Instructions

### Prerequisites
1. [XAMPP](https://www.apachefriends.org/index.html) for running the backend (Apache, MySQL).
2. PHP 8.2 or higher (XAMPP includes this).

### Running the Project Locally
1. Clone the repository:
   ```bash
   git clone https://github.com/anshu016/personal-blog.git
   cd personal-blog
   ```
2. Move the project folder to the `htdocs` directory in XAMPP (Usually located at `C:\xampp\htdocs` on Windows).
3. Open XAMPP and start the Apache server.
4. Open a browser and go to `http://localhost/personal-blog/frontend/index.html` to see the project in action.

## Directory Structure

```
personal-blog/
├── backend/
│   ├── api/
│   │   ├── posts.php      # Handles post CRUD operations
│   │   ├── categories.php # Handles category management
│   │   └── analytics.php  # Tracks views and likes
│   └── db/
│       └── database.json   # File-based data storage
├── frontend/
│   ├── assets/
│   │   ├── styles.css     # Styles for the blog
│   │   └── scripts.js     # JavaScript for frontend logic
│   ├── index.html         # Homepage
│   ├── create.html        # Page for creating new posts
│   └── post.html          # Page for viewing a single post
└── docs/
    └── README.md          # Documentation for the project
```

## Notes
- **In-memory or File Storage**: The blog uses file-based storage located in `backend/db/database.json` to store posts. This is a simple approach for demo purposes and may not be suitable for production-scale applications.
- **Post Creation**: To create a new blog post, navigate to the `/create.html` page, fill out the post title and content, and submit the form. This will add a new post to the blog.
- **No Database**: The blog does not use a traditional database (like MySQL) but instead stores data in a JSON file for simplicity.
- **Basic Authentication**: Authentication is not implemented for this project, making it open for all users to create posts and interact with the content.
- **Likes and Views**: Users can like posts and track views, but these features are managed within the application without user identification or advanced tracking.

## Contributing
Feel free to fork this repository, submit pull requests, or create issues to suggest improvements.


