<?php
    function getAllNews($db){
        $article = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
        FROM news JOIN
            users USING (username) LEFT JOIN
            comments ON comments.news_id = news.id
        GROUP BY news.id, users.username
        ORDER BY published DESC');

        $article->execute();
        return $article->fetchAll();
    }

    function getComments($db, $id){
        $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    function editArticle($db, $id, $title, $introduction, $fulltext){
        $stmt = $db->prepare('UPDATE news SET title = ?, introduction = ?, fulltext = ? WHERE id = ?');
        $stmt->execute(array($title, $introduction, $fulltext, $id));
    }

    function insertArticle($db, $title, $introduction, $fulltext, $username, $tags, $date){
        $stmt = $db->prepare('INSERT INTO news (title, published, tags, username, introduction, fulltext) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($title, $date, $tags, $username, $introduction, $fulltext));
        return $db->lastInsertId();
    }

    function deleteArticle($db, $id){
        $stmt = $db->prepare('DELETE FROM news WHERE id = ?');
        $stmt->execute(array($id));
    }

    function insertComment($db, $news_id, $username, $date ,$comment){
        $stmt = $db->prepare('INSERT INTO comments (news_id, username, published, text) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($news_id, $username, $date, $comment));
    }
?>