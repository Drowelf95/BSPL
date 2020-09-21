<?php

namespace App\src\DAO;

use App\src\model\Article;
use App\config\Parameter;

class ArticleDAO extends DAO
{
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setChapter($row['chapter']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setImage($row['image']);
        $article->setAuthor($row['author']);
        $article->setCreatedAt($row['createdAt']);
        return $article;
    }

    public function getArticles()
    {
        $sql = 'SELECT id, chapter, title, content, image, author, createdAt FROM article WHERE deleted = 0 ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    public function getArticlesDeleted()
    {
        $sql = 'SELECT id, chapter, title, content, author, createdAt FROM article WHERE deleted = 1 ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $articles = [];
        foreach ($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $articles;
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT id, chapter, title, content, author, createdAt FROM article WHERE deleted= 0 AND id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    public function addArticle(Parameter $post)
    {
        $streapText = $post->get('mytextarea');
        $streapContent = strip_tags ($streapText);
        $sql = 'INSERT INTO article (chapter, title, content, image, createdAt, author) VALUES (?, ?, ?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('chapter'), $post->get('title'), $streapContent, $post->get('image'), $post->get('author')]);
    }

    public function editArticle(Parameter $post, $articleId)
    {
        $sql = 'UPDATE article SET chapter=:chapter, title=:title, content=:content, author=:author WHERE id=:articleId';
        $streapText = $post->get('mytextarea');
        $streapContent = strip_tags ($streapText);
        $this->createQuery($sql, [
            'chapter' => $post->get('chapter'),
            'title' => $post->get('title'),
            'content' => $streapContent,
            'author' => $post->get('author'),
            'articleId' => $articleId
        ]);
    }

    public function firstId()
    {
        $sql ='SELECT MIN(id) FROM article WHERE deleted= 0';
        $result = $this->createQuery($sql);
        $firstIdAv = $result->fetch();
        $result->closeCursor();
        return $firstIdAv;
    }

    
    public function nextId($articleId)
    {
        $sql ='SELECT chapter FROM article WHERE chapter = (SELECT MIN(chapter) FROM article WHERE chapter > ?)';
        $result = $this->createQuery($sql, [$articleId]);
        $nextIdAv = $result->fetch();
        $result->closeCursor();
        return $nextIdAv;
    }


    public function prevId($articleId)
    {
        $sql ='SELECT chapter FROM article WHERE chapter = (SELECT MIN(chapter) FROM article WHERE chapter < ?)';
        $result = $this->createQuery($sql, [$articleId]);
        $prevId = $result->fetch();
        $result->closeCursor();
        return $prevId;
    }

    public function maxID()
    {
        $sql ='SELECT MAX(chapter) FROM article WHERE deleted= 0';
        $result = $this->createQuery($sql);
        $lastID = $result->fetch();
        $result->closeCursor();
        return $lastID;
    }

    public function trashArticle($articleId)
    {
        $sql = 'UPDATE article SET deleted = ? WHERE id = ?';
        $this->createQuery($sql, [1, $articleId]);
    }

    public function untrashArticle($articleId)
    {
        $sql = 'UPDATE article SET deleted = ? WHERE id = ?';
        $this->createQuery($sql, [0, $articleId]);
    }

    public function deleteArticle($articleId)
    {
        $sql = 'DELETE FROM comment WHERE article_id = ?';
        $this->createQuery($sql, [$articleId]);
        $sql = 'DELETE FROM article WHERE id = ?';
        $this->createQuery($sql, [$articleId]);
    }
}