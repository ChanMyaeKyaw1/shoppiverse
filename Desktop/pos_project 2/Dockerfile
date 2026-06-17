# Copy project files
WORKDIR /var/www/html
COPY . .

# Run installation and build commands
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# --- ADD THIS LINE RIGHT HERE TO CREATE THE SQLITE DATABASE ---
RUN touch database/database.sqlite

# Set permissions for Laravel storage and the database file
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

EXPOSE 80
