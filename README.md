# Farmington - Laravel Plant Selling Website 🌱🌿
Welcome to Farmington, a Laravel-based project that serves as a plant selling website. This project allows users to explore plant information, read plant-related blogs, and engage in the community by creating their own blogs. The system is equipped with two login panels: Admin Panel and User Panel.

## Features 🌐
### Public Features
- **Plant Information**: Users can explore a wide variety of plants with detailed information.
- **Plant-Related Blog**: Engage with plant enthusiasts through plant-related blogs.

### User Panel 🧑‍💻
- **User Authentication**: Secure user authentication for personalized experiences.
- **Create and Manage Blogs**: Users can create, edit, and delete their own plant-related blogs.
- **Plant Likes/Dislikes**: Users can express their preferences by liking or disliking plants.
- **Testimonial Management**: Users can submit testimonials, and admins can manage them.


### Admin Panel 👨‍💼
- **Plant Management**: Admins can add, edit, and delete plants along with their details.
- **Category Management**: Create, edit, and delete plant categories for better organization.
- **Blog Management**: Monitor and manage plant-related blogs created by users.
- **User Management**: Admins can manage user accounts, roles, and handle user notifications.
- **Testimonial Management**: Admins can oversee and manage user-submitted testimonials.
- **Email Verification**: Admins can monitor and manage user email verification status.
- **Inquiry Management**: Admins can handle user inquiries and respond to them.
- **Multilingual Support**: Both admin and user panels support multiple languages for a global audience.
- **Government Scheme** Management: Admins can manage government-related schemes through the admin panel.

## Installation 🚀
1. Clone the repository:
```shell
git clone https://github.com/riteshporiya/farmington.git
```
2. Navigate to the project directory:
```shell
cd farmington 
```
3. Install dependencies:
```shell
composer install
```
4. Create a copy of the `.env.example` file and rename it to `.env`. Update the database and other necessary configurations.
```shell
cp .env.example .env
```
5. Generate application key:
```shell
php artisan key:generate
```
6. Run database migrations and seed:
```shell
php artisan migrate --seed
```
7. Start the development server:
```shell
php artisan serve
```
8. Visit `http://localhost:8000` in your browser to access Farmington.

## License 📄
Farmington is open-source software licensed under the [MIT License](LICENSE).

Happy gardening with Farmington! 🌱🌿



