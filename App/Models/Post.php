<?php

namespace App\Models;

use PDO; // not using here
use Illuminate\Database\Eloquent\Model as ORM;

class Post extends ORM {

	protected $table = 'posts';

	protected $fillable = [
		'title',
		'content',
		'created_at',
	];	
	/*
	public static function getAll(){

		try {
			$db = static::getDB();

			$stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			return $results;
		} 
		catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	public static function add(){

		//  create
		try {
			$db = static::getDB();

			$stmt = $db->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':content', $content);

			// insert one row
			$title = 'one';
			$content = 1;
			$stmt->execute();

			// insert another row with different values
			$title = 'two';
			$content = 2;
			$stmt->execute();
		} 
		catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	public static function edit($id, $values=[]){

		//  update
		try {
			$db = static::getDB();

			$title = $values["title"];
			$content = $values["content"];

			$stmt = $db->prepare("UPDATE posts SET title=:title,content=:content WHERE id=:id");
			$stmt->bindParam(':title', $title, PDO::PARAM_STR);
			$stmt->bindParam(':content', $content, PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
		} 
		catch (PDOException $e){
			echo $e->getMessage();
		}		
	}

	public static function delete($id){
		//  delete
		try {
			$db = static::getDB();

			$stmt = $db->prepare("DELETE FROM posts WHERE id=:id");
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
		} 
		catch (PDOException $e){
			echo $e->getMessage();
		}				
	}

	*/
}