# Deploying Rezcode (Free Tier)

Since Rezcode is a modern **Laravel 12** application with **Vite** (Node.js) and a **MySQL** database, we need a platform that supports **Docker** containers.

**Current Setup:**

- **Docker Config:** Located in `.docker/` (nginx & supervisord)
- **Dockerfile:** Ready for production (PHP 8.2 + Nginx)

---

## Option 1: Render.com (Recommended - No Credit Card) ✨

**Best for:** Easy start, no credit card required.
**Limitation:** Free web services spin down after inactivity (slow first request).

### Steps:

1.  **Push Code to GitHub**
    - Create a repository on GitHub.
    - Push your `rezcode-web` code to it.

2.  **Create Database (PostgreSQL)**
    - Go to [dashboard.render.com](https://dashboard.render.com) -> New -> **PostgreSQL**.
    - **Name:** `rezcode-db`
    - **Region:** Southeast Asia (Singapore)
    - **Plan:** Free
    - **Create Database.**
    - _Copy the `Internal DB URL` specific for internal use._

3.  **Create Web Service**
    - Go to Dashboard -> New -> **Web Service**.
    - Connect your GitHub repo.
    - **Name:** `rezcode-web`
    - **Region:** Same as DB (Singapore).
    - **Runtime:** **Docker** (Important!).
    - **Plan:** Free.

4.  **Environment Variables (Advanced)**
    - In the Web Service settings, add these variables:
        - `APP_KEY`: (Copy from your local .env)
        - `APP_URL`: `https://rezcode-web.onrender.com` (your Render URL)
        - `DB_CONNECTION`: `pgsql` (Render uses Postgres for free tier)
        - `DB_HOST`: (Hostname from Internal DB URL)
        - `DB_PORT`: `5432`
        - `DB_DATABASE`: (Database name from Internal DB URL)
        - `DB_USERNAME`: (User from Internal DB URL)
        - `DB_PASSWORD`: (Password from Internal DB URL)
        - `LOG_CHANNEL`: `stderr`

5.  **Deploy**
    - Click **Create Web Service**.
    - Render will build your Docker image and deploy automatically.

---

## Option 2: Fly.io (Alternative - Faster)

**Best for:** Performance, faster spin-up.
**Requirement:** Credit card for verification.

1.  **Install CLI**: `pwsh -Command "iwr https://fly.io/install.ps1 -useb | iex"`
2.  **Launch**: `fly launch` (choose Dockerfile builder).
3.  **Deploy**: `fly deploy`.

---
