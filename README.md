# RATP Station Data Search Application

This is a Symfony-based application designed to search and display RATP station data extracted from a CSV file. The application allows users to search for specific stations by name and view details such as the line logo, whether the station is a terminus, and potential connections to other lines.

## Features

- **CSV Data Extraction**: Extracts station data from a CSV file.
- **Search Functionality**: Search stations by name using a search bar with autocompletion.
- **Data Display**: Displays station information such as the station name, line logo, whether the station is a terminus, and connections to other lines.
- **Unit Tests**: Includes PHPUnit tests to verify the functionality of the search controller.

## Prerequisites

- PHP 8.0 or higher
- Composer
- Symfony CLI (optional but recommended)
- A web server (e.g., Apache, Nginx)

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://gitlab.com/NNMC/ratp-test.git
    cd ratp-test
    ```

2. **Install dependencies**:
    ```bash
    composer install
    ```

3. **Configure the environment**:
    - Copy the `.env.example` file to `.env`:
    ```bash
    cp .env.example .env
    ```
    

4. **Start the Symfony server**:
    ```bash
    symfony server:start
    ```

5. **Ensure the CSV file is in place**:
    Place the `emplacement-des-gares-idf.csv` file in the `public/uploads/` directory of the project.

6. **Access the application**:
    The application will be accessible at:
    ```
    http://localhost:8000/search
    ```

## Usage

1. **Search for a station**:
    - Enter the name of a station in the search bar on the homepage. The application will display matching stations from the CSV data.

2. **View station details**:
    - Each station result will display the following information:
        - Station name
        - Line logo
        - Whether the station is a terminus
        - Connections to other lines (if available)

### Example

- **Station**: Châtillon-Montrouge
- **Line logo**: ![Line Logo](https://example.com/logo.png)
- **Terminus**: Yes
- **Connections**: Line 13, Tram 6

## Running Tests

The project includes PHPUnit tests to verify the search functionality.

1. **Run the tests**:
    ```bash
    php bin/phpunit
    ```

2. **Test coverage**:
    - The tests cover the station search functionality, ensuring correct behavior for valid and invalid search queries.

## Project Structure

- **src/Controller/StationController.php**: The main controller responsible for handling station search and CSV data extraction.
- **src/Entity/Station.php**: The entity representing a station.
- **templates/station/search.html.twig**: The template used to render the station search page.
- **tests/Controller/StationControllerTest.php**: Unit tests for the station controller.

## Technologies Used

- **Symfony 6.1.12**: A PHP framework used to handle the application logic.
- **PHPUnit**: For unit testing the controller functionality.
- **Twig**: For rendering HTML templates.
- **Bootstrap**: Used for styling the frontend.

## Future Enhancements

- **Improve error handling**: Add more detailed error messages when a station is not found.
- **Google Maps integration**: Display the station location on a map based on its coordinates.
- **Data caching**: Implement caching to improve performance on repeated searches.

## License

This project is licensed under the MIT License.
