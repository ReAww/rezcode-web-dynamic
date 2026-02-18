# Deploying Rezcode for Free

Since Rezcode is a modern **Laravel 12** application with **Vite** (Node.js) and a **MySQL** database, "classic" free hosting (like 000webhost) often struggles.

Here are the two best paths for free deployment:

---

## Option 1: Fly.io (Recommended - Modern & Fast) ✨

**Best for:** Professional deployment, automated builds (Docker), easy updates.
**Requirement:** A credit card (for identity verification only — the free tier is generous).

### Steps:

1.  **Sign Up & Install CLI**
    - Sign up at [fly.io](https://fly.io)
    - Install the Fly CLI (PowerShell):
        ```powershell
        pwsh -Command "iwr https://fly.io/install.ps1 -useb | iex"
        ```
    - Restart your terminal.
    - Log in: `fly auth login`

2.  **Launch the App**
    - Run inside your project folder:
        ```bash
        fly launch
        ```
    - Follow the prompts:
        - **Name:** `rezcode-web` (or unique name)
        - **Region:** Choose one close to you (e.g., `sin` for Singapore)
        - **Database:** Yes, set up a **Redis** (optional) and **MySQL** database.
            - _Note: Fly's free tier for MySQL is limited. You might prefer sticking to SQLite for a simpler free project._
        - **Deploy now?** No (we need to check config first).

3.  **Configure for Free Tier**
    - Open `fly.toml` generated in your folder.
    - Ensure `vm.size` is `shared-cpu-1x` and `256mb` RAM (free tier limits).

4.  **Deploy**
    ```bash
    fly deploy
    ```

    - Fly will build your Docker image remotely and deploy it.

---

## Option 2: Render.com (Alternative - No Credit Card)

**Best for:** If you don't have a credit card.
**Limitation:** The free database spins down/deletes after 90 days, and the web service spins down after inactivity.

1.  **Push Code to GitHub**: Make sure your code is in a public/private GitHub repo.
2.  **Create Web Service**: Connect your repo on [render.com](https://render.com).
3.  **Environment**: Select **Docker**.
4.  **Database**: Create a free **PostgreSQL** database on Render and link it (update `.env` variables in Render dashboard).

---

## Option 3: InfinityFree (Classic Shared Hosting)

**Best for:** "Old school" cPanel hosting.
**Warning:** Harder with Laravel 12. requires modifying `public/.htaccess`.

1.  **Build Locally**:
    ```bash
    npm run build
    ```
2.  **Upload Files**:
    - Upload ALL files to the host (except `node_modules`).
    - Move contents of `public/` to `htdocs/`.
    - Move the rest of the app to a folder _outside_ `htdocs` (e.g., `laravel/`).
    - Edit `htdocs/index.php` to point to the new paths:
        ```php
        require __DIR__.'/../laravel/vendor/autoload.php';
        $app = require __DIR__.'/../laravel/bootstrap/app.php';
        ```
3.  **Database**:
    - Export your local XAMPP database (phpMyAdmin -> Export).
    - Import it to InfinityFree's MySQL.
    - Update `.env` with InfinityFree's DB credentials.

---

## Recommendation

**Go with Fly.io** if possible. It natively supports Laravel's modern features and gives you a professional URL (`https://rezcode-web.fly.dev`).
