<!DOCTYPE html>
<html>
<head>
  <title>Phlux Demo GUI</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .section { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
    button { margin: 5px; }
  </style>
  <script src="/test/phlux/public/phlux.min.js"></script>
</head>
<body>
  <h1>Phlux Demo for PHP Devs</h1>

  <div class="section">
    <h2>Use Case 1: Fetch User Profile</h2>
    <p>Logged in as: <span id="username"></span></p>
    <input type="number" id="userId" placeholder="Enter User ID">
    <button onclick="loadUser()">Load User</button>
  </div>

  <div class="section">
    <h2>Use Case 2: Display Blog Posts</h2>
    <div id="posts"></div>
    <button onclick="loadPosts()">Load Posts</button>
  </div>

  <div class="section">
    <h2>Use Case 3: Save a Comment</h2>
    <input type="number" id="postId" placeholder="Post ID">
    <input type="text" id="comment" placeholder="Your comment">
    <button onclick="saveComment()">Save Comment</button>
    <p id="commentStatus"></p>
  </div>

  <script src="/test/phlux/public/app.js"></script>
</body>
</html>
