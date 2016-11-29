actions PostController:

GET posts/show/{id}
POST posts/create/{id}/{title}/{content}
PUT posts/update/{id}/{newTitle}/{newContent}
DELETE posts/delete/{id}

actions CommentController:

GET comments/show/{id}
POST comments/create/{id}/{idAuthor}/{content}
PATCH comments/update/{id}/{newContent}
DELETE comments/delete/{id}

actions UserController:

POST users/create/{id}/{username}/{password}
POST users/login/{id}/{username}/{password}
