# TaskMaster - Task Management System

TaskMaster is a modern, powerful task management system built with PHP and CodeIgniter. It provides an intuitive interface for managing tasks, similar to popular platforms like Monday.com.

## Features

- **Dashboard Overview**: Get a quick glance at your task statistics and upcoming deadlines
- **Kanban Board**: Visualize your workflow with a drag-and-drop task board
- **Calendar View**: See your tasks organized by due dates in a monthly calendar
- **Task Management**: Create, edit, assign, and track tasks with ease
- **Responsive Design**: Works on desktop, tablet, and mobile devices

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer (for dependencies)

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/taskmaster.git
   ```

2. Navigate to the project directory:
   ```
   cd taskmaster
   ```

3. Install dependencies:
   ```
   composer install
   ```

4. Create a database:
   ```
   CREATE DATABASE taskmaster;
   ```

5. Configure your database settings in `.env` file:
   ```
   database.default.hostname = localhost
   database.default.database = taskmaster
   database.default.username = root
   database.default.password = password
   database.default.DBDriver = MySQLi
   ```

6. Run migrations:
   ```
   php spark migrate
   ```

7. Run seeds (optional, for demo data):
   ```
   php spark db:seed DemoDataSeeder
   ```

8. Start the development server:
   ```
   php spark serve
   ```

9. Access the application at `http://localhost:8080`

## Project Structure

- `app/` - Contains the application code
  - `Controllers/` - Controller classes
  - `Models/` - Database models
  - `Views/` - Application views
  - `Config/` - Configuration files
- `public/` - Publicly accessible files
  - `css/` - CSS stylesheets
  - `js/` - JavaScript files
  - `img/` - Images
- `system/` - CodeIgniter system files
- `writable/` - Writable directory for logs, cache, etc.

## Usage

1. Register an account or use the demo credentials:
   - Email: demo@example.com
   - Password: password

2. Create a task by clicking the "New Task" button
3. Manage tasks through the board view or calendar view
4. Update task status by dragging tasks between columns

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments

- Built with [CodeIgniter](https://codeigniter.com/)
- UI components from [Bootstrap](https://getbootstrap.com/)
- Icons from [Font Awesome](https://fontawesome.com/) 