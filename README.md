# client-hub.app

## Clone the Repository
```bash
git clone git@github.com:adkriPrasanna/client-hub.app.git
```

## Setup Backend

01. Navigate to the backend directory of cloned repository.
```bash
cd backend
```
02. Make a copy of **.env.example** file and rename it to **.env**
```bash
cp .env.example .env
```
03. Install dependencies
```bash
composer install
```
04. Generate Application Key
```bash
php artisan key:generate --ansi
```
05. Run Migrations
```bash
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"

php artisan migrate --graceful --ansi
```
06. Run the application
```bash
php artisan serve
```

## Setup Frontend

01. Navigate to the frontend directory
```bash
cd frontend
```

02. Make a copy of **.env.example** file and rename it to **.env**. This setup takes **localhost:8000** as backend endpoint. Configure it according to your need.
```bash
cp .env.example .env
```

03. Install Vue CLI Service
```bash
npm install @vue/cli-service --save-dev
```

03. Run the application
```bash
npm run serve
```

## Laravel as a Service
The **php artisan install:api** command has been utilized to configure Laravel as an API service provider. This setup is crucial for enabling the application to function as a RESTful API, facilitating the creation of endpoints that can be consumed by client applications.

## Axios

Axios is a powerful and flexible HTTP client that simplifies making HTTP requests in JavaScript applications. Its support for promises, error handling, and automatic data transformation makes it a preferred choice for many developers. By implementing Axios in your frontend application, you can easily communicate with backend services and handle data efficiently.

## GitHub Workflow for Running Tests
When code is pushed to the repository, a GitHub workflow, which is configured within the **.github/workflows** directory, automatically triggers the execution of Laravel tests. The code can only be merged if the tests pass successfully. This process ensures that the code meets the required quality standards before it is integrated into the main branch.

## STYLE CI
Style CI can be integrated with GitHub for the purpose of formatting code. Style CI picks **.styleci.yml** file for configuration.

### Enable STYLECLI
1. Logged in to [styleci.io](https://styleci.io/) using GitHub account.
2. Navigated to the settings (clicking on gear icon).
3. Clicked on **Repos** tab.
4. Clicked on **SYNC WITH GITHUB** button.
5. After getting GitHub repo in list, clicked the button **ENABLE STYLECI**.

### Implement Auto Fixing
1. Goto **Settings** (**Gear Icon**) on top of the page after logging in.
2. Goto **Repos** tab
3. Click **SHOW ANALYSES** button for the related GitHub Repository
4. There is **Settings** button (**Gear Icon**) right to **ANALYZE NOW**. Click the **Gear Icon**.
5. Select radio button for **Automatically send fixes as pull requests only** under **Automation Level**.


## Docker Setup
From within the client-hub.app directory. Run the following command:
```bash
docker-compose up -d
```
  **Note:** This command may vary according to OS