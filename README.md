# Dynamic Portfolio & Blog with Laravel

This is a full-stack, dynamic personal portfolio website built from the ground up using Laravel 10. The project features a complete, secure admin panel for managing all site content, a public-facing portfolio and blog, and a modern, responsive design.

## Key Features

### Public-Facing Site
- **Modern Home Page**: A fully responsive hero section with a profile picture, bio, and social media links.
- **Projects Showcase**: A dedicated page to display all projects, with the ability to filter them by tags/categories.
- **Blog System**: A clean, paginated blog index and individual post pages to share articles and tutorials.
- **Contact Form**: A working contact form with server-side validation that sends email notifications to the admin.
- **Dynamic SEO**: Meta titles and descriptions are dynamically generated for each page to improve search engine visibility.
- **Animations & Dark Mode**: Smooth on-scroll animations and a persistent dark mode toggle for an enhanced user experience.

### Admin Panel
- **Secure Dashboard**: An admin-only area protected by Laravel's authentication system.
- **Content Management (CRUD)**: Full Create, Read, Update, and Delete functionality for:
  - Projects (with image uploads and tag assignment)
  - Blog Posts (with a rich text editor and publishing status)
  - Tags
- **Profile Management**: Easily update personal info, profile photo, subtitle, social media links, and upload a CV/resume.
- **Responsive Design**: The admin panel is also responsive, with a hamburger menu for mobile devices.
- **Rich Text Editor**: Uses TinyMCE for a WYSIWYG experience when writing blog posts and project descriptions.

## Tech Stack
- **Backend**: Laravel 10, PHP 8+
- **Frontend**: Blade, Tailwind CSS, Alpine.js
- **Database**: MySQL (local), PostgreSQL (production)
- **Development Environment**: Vite
- **Deployment**: Configured for deployment on platforms like Render.

## Local Setup & Installation

To run this project on your local machine, follow these steps:

1. Clone the repository:
	```bash
	git clone https://github.com/your-username/your-repo-name.git
	cd your-repo-name
	```

2. Install dependencies:
	```bash
	composer install
	npm install
	```

3. Create your environment file:
	```bash
	cp .env.example .env
	```

4. Generate an application key:
	```bash
	php artisan key:generate
	```

5. Configure your `.env` file:  
   Update your database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) and any other necessary settings.

6. Run database migrations and seeders:  
   This will create the database schema and populate it with the admin user and initial tags.
	```bash
	php artisan migrate --seed
	```

7. Compile frontend assets:
	```bash
	npm run dev
	```

8. Create the storage link:
	```bash
	php artisan storage:link
	```

9. Serve the application:
	```bash
	php artisan serve
	```
	You can now access the application at [http://localhost:8000](http://localhost:8000). Log in to the admin panel at `/login` with the credentials from your UserSeeder (default is `admin@example.com` / `password`).

## License

This project is open-sourced software licensed under the MIT license.
