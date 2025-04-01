
# Phlux

Phlux is a lightweight, PHP-inspired frontend framework that combines the familiarity of PHP templating with modern JavaScript functionality. It enables developers to build dynamic, interactive web interfaces with minimal setup, leveraging a PHP backend for API logic and a JavaScript client for real-time updates.

## Features
- **PHP-like Syntax**: Write frontend logic using familiar `echo`, `if`, and `foreach` constructs (via session-driven rendering).
- **Session Management**: Persist data across page refreshes using `localStorage`.
- **API Integration**: Seamlessly connect to a PHP backend for data fetching and manipulation.
- **Real-time UI Updates**: Automatically re-render the UI when session data changes.
- **Simple Setup**: Minimal configuration required to get started.

## Demo Use Cases
1. **Fetch User Profile**: Enter a user ID to display "Logged in as: User_[ID]".
2. **Display Blog Posts**: Load and render a list of posts from the backend.
3. **Save a Comment**: Submit a comment for a post and display confirmation.

## Installation

### Prerequisites
- Apache web server with PHP 8.4+ (tested with Apache 2.4.63).
- A modern web browser (e.g., Chrome, Firefox).

### Setup
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/terrylan/phlux.git
   cd phlux
2. **Directory Structure**:
   ``` tree
   phlux/
   ├── .htaccess
   ├── api/
   │   └── data.php
   └── public/
       ├── index.php
       ├── phlux.min.js
       └── app.js
   ```
3. **Deploy to Server**:
    - Copy the `phlux` folder to your Apache document root (e.g., `/srv/http/` on Arch Linux).
    - Example path: `/srv/http/test/phlux/`.
4. **Set Permissions**:
   ```bash
   sudo chown -R http:http /srv/http/test/phlux
   sudo chmod -R 755 /srv/http/test/phlux
   ```
5. **Configure Apache**:
    - Ensure `.htaccess` is enabled in `/etc/httpd/conf/httpd.conf`:
    ```apache
    <Directory "/srv/http">
      AllowOverride All
      Require all granted
    </Directory>
    ```
    - Restart Apache:
    ```bash
    sudo systemctl restart httpd
    ```
6. **Access the App**:
    - `Open http://localhost/test/phlux/` in your browser.


## Usage

### Running the Demo

  - Use Case 1: Fetch User Profile
    - Enter a number (e.g., "123") in the "Enter User ID" field and click "Load User".
    - Expected: "Logged in as: User_123" appears in the UI.
  - Use Case 2: Display Blog Posts
    - Click "Load Posts".
    - Expected: Two posts ("Post 1: Hello from PHP!" and "Post 2: Phlux rocks!") render.
  - Use Case 3: Save a Comment
    - Enter a post ID (e.g., "1") and a comment (e.g., "Great post!") then click "Save Comment".
    - Expected: "Comment saved for Post 1" appears in the UI.

### How It Works
  - Frontend (phlux.min.js):
    - Manages session state and updates the DOM when data changes.
    - Fetches data from the PHP backend via an API scanning mechanism.
  - Backend (api/data.php):
    - Provides a simple JSON API with methods: getUser, getPosts, saveComment.
  - Routing (.htaccess):
    - Directs requests to public/index.php for the app and preserves /api/ for backend calls.
### Files

  - `.htaccess`: Apache rewrite rules to route requests.
  - `api/data.php`: PHP backend API with mock data and methods.
  - `public/index.php`: Main HTML entry point with UI structure.
  - `public/phlux.min.js`: Core JavaScript library for Phlux functionality.
  - `public/app.js`: Application logic for demo use cases.
### Development
#### Modifying the Backend

Edit api/data.php to add new API methods or connect to a real database:

    ``` PHP
    if (isset($_GET['phlux_scan'])) {
      echo json_encode(['methods' => ['getUser', 'getPosts', 'saveComment', 'yourNewMethod']]);
      exit;
    }
    function yourNewMethod($param) {
      return ['result' => "You sent: $param"];
    }
    ```
#### Extending the Frontend

Add new UI elements in index.php and update phlux.min.js’s updateDOM to render them:

    ``` JavaScript
    function updateDOM() {
      const newEl = document.getElementById('newElement');
      if (newEl) {
        newEl.innerHTML = escapeHtml(Session.get('newData') || 'Default');
      }
    }
    ```

#### Troubleshooting

 - UI Not Updating: Check Console for errors and ensure updateDOM logs session changes.
 - API Errors: Verify http://localhost/test/phlux/api/data.php?phlux_scan=1 returns JSON.
 - 404 Issues: Confirm .htaccess is correctly configured and files are in place.

#### Contributing

1. Fork the repository.
2. Create a feature branch (git checkout -b feature/your-feature).
3. Commit changes (git commit -m "Add your feature").
4. Push to the branch (git push origin feature/your-feature).
5. Open a Pull Request.


#### License

MIT License - feel free to use, modify, and distribute!

#### Acknowledgments

Built with ❤️ by Terrylan using xAI’s Grok for debugging assistance.
