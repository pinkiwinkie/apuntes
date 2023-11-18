<?php
include "modelo.php";



$dbConn =  new bd();
$vector = json_decode(file_get_contents("php://input"), true);

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($vector['id'])) {
    //Mostrar un post
    $post = new Post($vector['id']);
    header("HTTP/1.1 200 OK");
    echo json_encode($post->buscar($dbConn->link));
    exit();
  } else {
    //Mostrar lista de post
    header("HTTP/1.1 200 OK");
    echo json_encode(Post::getall($dbConn->link));
    exit();
  }
}

// Crear un nuevo post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $post = new Post('', $vector['title'], $vector['status'], $vector['content'], $vector['user_id']);
  if ($postId = $post->insertar($dbConn->link)) {
    header("HTTP/1.1 200 OK");
    echo json_encode("Insertado el post numero $postId");
    exit();
  }
}

//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
  $post = new Post($vector['id']);
  $post->borrar($dbConn->link);
  header("HTTP/1.1 200 OK");
  echo json_encode("Borrado el post numero " . $vector['id']);
  exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')

  $id = array_shift($vector); {
  $post = new Post($id,);
  $post->modificar($dbConn->link, $vector);
  echo json_encode($post->buscar($dbConn->link));
  header("HTTP/1.1 200 OK");
  exit();
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
