# KTH Sadar Tani Muda

This project is a web application for managing products related to KTH Sadar Tani Muda, focusing on honey and herbal products. It utilizes the Filament admin panel for backend management.

## Project Structure

- **app/Filament/Resources/ProductResource**
  - **Pages**
    - `CreateProduct.php`: Defines the page for creating new products.
    - `EditProduct.php`: Defines the page for editing existing products.
    - `ListProducts.php`: Defines the page for listing all products.
  - `ProductResource.php`: Manages the product resource, including configuration for forms and tables.

- **database/migrations**
  - `2024_06_XX_create_products_table.php`: Migration file for creating the products table in the database.

- **app/Models**
  - `Product.php`: Represents the product model, including properties and relationships.

- **resources/views/filament/resources/product-resource**
  - `form.blade.php`: Blade template for the product form in the Filament admin panel.

## Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd kthsadartani
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment**
   Copy the `.env.example` file to `.env` and configure your database settings.
   ```bash
   cp .env.example .env
   ```

4. **Run Migrations**
   ```bash
   php artisan migrate
   ```

5. **Serve the Application**
   ```bash
   php artisan serve
   ```

## Usage

Access the admin panel at `/admin` to manage products. You can create, edit, and list products using the provided Filament resources.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request for any enhancements or bug fixes.