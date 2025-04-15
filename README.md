# Raquel WordPress Theme Project

## Description
Custom WordPress theme based on Bones starter theme, utilizing SASS for styling and Advanced Custom Fields (ACF) for enhanced content management.

## Tech Stack
- WordPress
- Bones Theme Framework
- SASS/SCSS
- Advanced Custom Fields (ACF)

## Project Structure
```
raquel/
├── app/
│   └── public/          # WordPress core files
│       ├── wp-content/
│       │   ├── themes/
│       │   └── plugins/
│       └── wp-includes/
```

## Requirements
- WordPress 6.0+
- PHP 7.4+
- MySQL 5.7+ or MariaDB
- Node.js (for SASS compilation)
- Local development environment (Local by Flywheel recommended)

## Features
- Custom WordPress theme based on Bones
- Responsive design
- SASS/SCSS for maintainable styling
- Advanced Custom Fields integration
- Mobile-first approach

## Development Setup
1. Ensure you have Local by Flywheel installed
2. Clone this repository to your Local Sites directory
3. Start the local server through Local
4. Access the WordPress admin at `http://raquel.local/wp-admin`

### SASS Development
To work with SASS files:
1. Navigate to the theme directory
2. Run `npm install` to install dependencies
3. Use `npm run watch` for development
4. Use `npm run build` for production

## Plugins
### Required Plugins
- Advanced Custom Fields (ACF)
- [List any other essential plugins]

## Theme Customization
The theme is built on Bones and can be customized through:
- SASS files in the theme's `scss/` directory
- Template files in the theme root
- ACF fields for content management

## Contributing
1. Create a new branch for your feature
2. Make your changes
3. Test thoroughly
4. Submit a pull request

## Backup
Remember to regularly backup:
- Database
- Uploads directory
- Theme files
- ACF field configurations

## License
[Specify your license]
