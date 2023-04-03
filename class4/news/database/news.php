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
?>