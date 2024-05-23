# My Awesome App

Welcome to My Awesome App! This is a simple web application built with Laravel, Vue.js and SQLite. It allows you to manage users and their skills. This is a fully working application :)

## Usage

To use this application, follow these steps:

1. **Install Dependencies**: Make sure you have [Composer](https://getcomposer.org/) and [Node.js](https://nodejs.org/) installed on your system. Then, open a terminal and navigate to the project directory. Run the following commands to install PHP and JavaScript dependencies:

    ```bash
    composer install
    npm install
    ```

2. **Environment Configuration**: Create a copy of the `.env.example` file named `.env`:

    ```bash
    cp .env.example .env
    ```

   Open the `.env` file in a text editor and configure it with your application settings.

3. **Generate Application Key**: Run the following command to generate the application key:

    ```bash
    php artisan key:generate
    ```

4. **Run Migrations**: Execute database migrations to create necessary tables:

    ```bash
    php artisan migrate
    ```

5. **Seed the Database (Optional)**: If you want to populate your database with sample data, you can run database seeding:

    ```bash
    php artisan db:seed --class=UserSeeder
    ```

6. **Build Assets (if necessary)**: If you have frontend assets (Vue.js components, CSS, etc.) that need to be compiled, run the appropriate npm script:

    ```bash
    npm run build
    ```

7. **Run the Application**: Start the Laravel development server:

    ```bash
    php artisan serve
    ```

   Now you can access the application in your web browser at [http://localhost:8000](http://localhost:8000).

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvement, feel free to open an issue or submit a pull request.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
