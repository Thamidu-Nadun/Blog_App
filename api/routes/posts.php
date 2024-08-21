<?php
include('header.php');

// Fetch posts from the database
function getPosts($pdo)
{
    $statement = $pdo->prepare("SELECT * FROM page");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC); // Use associative array
}

// Handle GET requests to fetch posts
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $posts = getPosts($pdo);
    echo json_encode($posts);
    exit;
}

// Handle POST requests to create a new post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input data (assuming JSON input)
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['title']) && isset($input['content'])) {
        // Insert the new post into the database
        $statement = $pdo->prepare("INSERT INTO page (title, content, date, category, description, image_path, author, image_copyright)
                                     VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$statement->execute(
			array(
				$input['title'],
				$input['content'],
                $input['date'],
                $input['category'],
                $input['description'],
                $input['image_path'],
                $input['author'],
                $input['image_copyright'],
				
			)
		);

        // Get the newly created post
        $newPostId = $pdo->lastInsertId();
        $newPost = [
            'id' => $newPostId,
            'title' => $input['title'],
            'content' => $input['content'],
            'date'=> $input['date'],
            'category'=> $input['category'],
            'description'=> $input['description'],
            'views'=> $input['views'],
            'image_path'=> $input['image_path'],
            'image_copyright'=> $input['image_copyright'],
            'author' => $input['author']
        ];

        echo json_encode(['message' => 'Post created', 'post' => $newPost]);
        exit;
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Bad Request', 'message' => 'Title and content are required']);
        exit;
    }
}

// If the request method is not supported
http_response_code(405);
echo json_encode(['error' => 'Method Not Allowed']);
?>