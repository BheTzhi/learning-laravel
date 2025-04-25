# Task Management Application

## 🌟 Overview
A simple Laravel-based web application for managing personal or small team tasks, featuring full CRUD operations and social login using OAuth.

## 🎯 Project Goals
This project aims to help users manage tasks efficiently with the following features:

- Full task CRUD (Create, Read, Update, Delete)
- Task categorization (e.g., work, personal, shopping)
- Status tracking (e.g., not started, in progress, completed)
- Setting due dates
- Optional task prioritization
- Social login via GitHub, Facebook, Google, and X (Twitter)

## 🛠️ Tech Stack
- **Backend:** Laravel (PHP)
- **Frontend:** Blade (with optional JavaScript)
- **OAuth:** Laravel Socialite
- **Database:** MySQL or PostgreSQL (configurable)
- **Tools:** Composer, Artisan CLI

## ⚙️ Installation
To install and run the project locally:

1. Clone the repository:
    ```bash
    git clone https://github.com/BheTzhi/learning-laravel
    cd learning-laravel
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Copy and configure the environment file:
    ```bash
    cp .env.example .env
    nano .env  # Edit your DB and OAuth credentials
    ```

    Configure these values in `.env` for each provider you want to use:
    ```env
    GITHUB_CLIENT_ID=your_github_client_id
    GITHUB_CLIENT_SECRET=your_github_client_secret
    GITHUB_REDIRECT_URI=http://localhost:8000/auth/github/callback

    FACEBOOK_CLIENT_ID=your_facebook_client_id
    FACEBOOK_CLIENT_SECRET=your_facebook_client_secret
    FACEBOOK_REDIRECT_URI=http://localhost:8000/auth/facebook/callback

    GOOGLE_CLIENT_ID=your_google_client_id
    GOOGLE_CLIENT_SECRET=your_google_client_secret
    GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

    TWITTER_CLIENT_ID=your_twitter_client_id
    TWITTER_CLIENT_SECRET=your_twitter_client_secret
    TWITTER_REDIRECT_URI=http://localhost:8000/auth/twitter/callback
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Run database migrations and seeders:
    ```bash
    php artisan migrate --seed
    ```

6. Serve the application:
    ```bash
    php artisan serve
    ```
    Access the app at [http://localhost:8000](http://localhost:8000)

## 🚀 Usage
- Register/login using any supported social account
- Create and manage categorized tasks
- Assign status and due dates to tasks

## 🤝 Contributing
To contribute:
- Fork this repository
- Create a branch
- Submit a pull request

## 📄 License
This project is under the [MIT License](LICENSE).

## 🙏 Acknowledgements
Thanks to the Laravel community and contributors to Laravel Socialite.

