<div class="d-flex">
  <div>
    <h4>API Form</h4>
  </div>
  <div class="ms-auto">
    <button id="testApi" class="btn btn-primary disabled">Test API</button>
  </div>
</div>

<form class="form-api" id="form-login" method="POST" action="/api/login">
  <label class="text-warning">POST</label>
  <span>/api/login</span> <em class="blockquote-footer">Login User</em>
  <div class="form-group mt-2">
    <label for="login-email">Email Address</label>
    <input name="email" type="email" class="form-control" id="login-email" placeholder="Enter email">
  </div>
  <div class="form-group mt-2">
    <label for="login-password">Password</label>
    <input name="password" type="password" class="form-control" id="login-password" placeholder="Enter Password">
  </div>
</form>

<form class="form-api" id="form-logout" method="GET" action="/api/logout">
  <label class="text-warning">POST</label>
  <span>/api/logout</span> <em class="blockquote-footer">Logout User</em>
  <div class="form-group mt-2">
    <label for="logout-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="logout-token" placeholder="Enter Token">
  </div>
</form>

<form class="form-api" id="form-register" method="POST" action="/api/register">
  <label class="text-warning">POST</label>
  <span>/api/register</span> <em class="blockquote-footer">Create new account</em>
  <div class="form-group mt-2">
    <label for="register-firstname">First Name</label>
    <input name="firstname" type="text" class="form-control" id="register-firstname" placeholder="Enter First Name">
  </div>
  
  <div class="form-group mt-2">
    <label for="register-lastname">Last Name</label>
    <input name="lastname" type="email" class="form-control" id="register-lastname" placeholder="Enter Last Name">
  </div>

  <div class="form-group mt-2">
    <label for="register-email">Email Address</label>
    <input name="email" type="email" class="form-control" id="register-email" placeholder="Enter email">
  </div>

  <div class="form-group mt-2">
    <label for="register-password">Password</label>
    <input name="password" type="password" class="form-control" id="register-password" placeholder="Enter Password">
  </div>
</form>

<form class="form-api" id="form-users" method="GET" action="/api/users">
  <label class="text-success">GET</label>
  <span>/api/users</span> <em class="blockquote-footer">Get all users</em>
  <div class="form-group mt-2">
    <label for="users-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="users-token" placeholder="Enter Token">
  </div>
</form>

<form class="form-api" id="form-users-show" method="GET" action="/api/user/:id">
  <label class="text-success">GET</label>
  <span>/api/user/<span id="users-show-id-span">{id}</span></span> <em class="blockquote-footer">Get user by ID</em>
  <div class="form-group mt-2">
    <label for="users-show-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="users-show-token" placeholder="Enter Token">
  </div>

  <div class="form-group mt-2">
    <label for="users-show-id">User ID</label>
    <input name="id" type="number" class="form-control idChange" id="users-show-id" placeholder="Enter User ID">
  </div>
</form>

<form class="form-api" id="form-users-delete" method="DELETE" action="/api/user">
  <label class="text-danger">DELETE</label>
  <span>/api/user</span> <em class="blockquote-footer">Delete user by token</em>
  <div class="form-group mt-2">
    <label for="users-delete-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="users-delete-token" placeholder="Enter Token">
  </div>
</form>

<form class="form-api" id="form-users-edit" method="PUT" action="/api/user">
  <label class="text-info">PUT</label>
  <span>/api/user</span> <em class="blockquote-footer">Update user by token</em>
  <div class="form-group mt-2">
    <label for="users-edit-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="users-edit-token" placeholder="Enter Token">
  </div>

  <div class="form-group mt-2">
    <label for="users-edit-firstname">First Name</label>
    <input name="firstname" type="text" class="form-control" id="users-edit-firstname" placeholder="Enter First Name">
  </div>
  
  <div class="form-group mt-2">
    <label for="users-edit-lastname">Last Name</label>
    <input name="lastname" type="email" class="form-control" id="users-edit-lastname" placeholder="Enter Last Name">
  </div>

  <div class="form-group mt-2">
    <label for="users-edit-email">Email Address</label>
    <input name="email" type="email" class="form-control" id="users-edit-email" placeholder="Enter email">
  </div>

  <div class="form-group mt-2">
    <label for="users-edit-password">Password</label>
    <input name="password" type="password" class="form-control" id="users-edit-password" placeholder="Enter Password">
  </div>
</form>

<form class="form-api" id="form-post" method="POST" action="/api/post">
  <label class="text-warning">POST</label>
  <span>/api/post</span> <em class="blockquote-footer">Create new Post</em>
  <div class="form-group mt-2">
    <label for="form-post-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="form-post-token" placeholder="Enter Token">
  </div>

  <div class="form-group mt-2">
    <label for="form-post-post">Post</label>
    <input name="post" type="text" class="form-control" id="form-post-post" placeholder="Enter Post">
  </div>
</form>

<form class="form-api" id="form-posts" method="GET" action="/api/posts">
  <label class="text-success">GET</label>
  <span>/api/posts</span> <em class="blockquote-footer">Get all Posts</em>
  <div class="form-group mt-2">
    <label for="form-posts-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="form-posts-token" placeholder="Enter Token">
  </div>
</form>

<form class="form-api" id="form-post-show" method="GET" action="/api/post/:id">
  <label class="text-success">GET</label>
  <span>/api/post/<span id="form-post-show-id-span">{id}</span></span> <em class="blockquote-footer">Get Post by ID</em>
  <div class="form-group mt-2">
    <label for="form-post-show-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="form-post-show-token" placeholder="Enter Token">
  </div>

  <div class="form-group mt-2">
    <label for="form-post-show-id">Post ID</label>
    <input name="id" type="number" class="form-control idChange" id="form-post-show-id" placeholder="Enter Post ID">
  </div>
</form>

<form class="form-api" id="form-post-edit" method="PUT" action="/api/post/:id">
  <label class="text-info">PUT</label>
  <span>/api/post/<span id="form-post-edit-id-span">{id}</span></span> <em class="blockquote-footer">Update Post by ID</em>
  <div class="form-group mt-2">
    <label for="form-post-edit-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="form-post-edit-token" placeholder="Enter Token">
  </div>

  <div class="form-group mt-2">
    <label for="form-post-edit-id">Post ID</label>
    <input name="id" type="number" class="form-control idChange" id="form-post-edit-id" placeholder="Enter Post ID">
  </div>

  <div class="form-group mt-2">
    <label for="form-post-edit-post">Post</label>
    <input name="post" type="text" class="form-control" id="form-post-edit-post" placeholder="Enter Post">
  </div>
</form>

<form class="form-api" id="form-post-delete" method="DELETE" action="/api/post/:id">
  <label class="text-danger">DELETE</label>
  <span>/api/post/<span id="form-post-delete-id-span">{id}</span></span> <em class="blockquote-footer">Delete Post by ID</em>
  <div class="form-group mt-2">
    <label for="form-post-delete-token">Bearer Token</label>
    <input name="token" type="text" class="form-control" id="form-post-delete-token" placeholder="Enter Token">
  </div>

  <div class="form-group mt-2">
    <label for="form-post-delete-id">Post ID</label>
    <input name="id" type="number" class="form-control idChange" id="form-post-delete-id" placeholder="Enter Post ID">
  </div>
</form>