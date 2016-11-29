<?php

namespace BlogBundle\Entity;


class Comment
{
    /**
     * @param $id
     * @return string
     */
    public function get($id) {
        $file = fopen(sys_get_temp_dir()."/comment_$id.txt", "r") or die("Cannot open file: comment_$id.txt");
        if ($file)
        {
            $title = "";
            $content = "";
            while (!feof($file))
            {
                if ($title == "") {
                    $title = fgets($file, 999);
                }
                $content .= fgets($file, 999);
            }
            $record = array("id" => $id, "title" => substr($title, 0, strlen($title)-1), "content"=>$content);
        }
        fclose($file);
        return $record;
    }

    /**
     * @param $id
     * @param $idAuthor
     * @param $content
     * @return string
     */
    public function add($id, $idAuthor, $content) {
        $comment_file = fopen(sys_get_temp_dir()."/comment_$id.txt", "w");
        $hasWrite = fwrite($comment_file, $idAuthor."\n".$content);
        if ($hasWrite) {
            $msg = "Comment number $id has created";
        } else $msg = "Comment number $id hasn't created";
        return $msg;
    }

    /**
     * @param $id
     * @param $newContent
     * @return string
     */
    public function edit($id, $newContent) {
        $comment_file = fopen(sys_get_temp_dir()."/comment_$id.txt", "r+");
        if ($comment_file) {
            $idAuthor = fgets($comment_file, 99);
            $hasWrite = fwrite($comment_file, $idAuthor."\n".$newContent);
            if ($hasWrite) {
                $msg = "Comment number $id has updated";
            } else $msg = "Comment number $id hasn't update";
        }
        return $msg;
    }

    /**
     * @param $id
     * @return string
     */
    public function remove($id) {
        $hasDelete = unlink(sys_get_temp_dir()."/comment_$id.txt");
        if ($hasDelete) {
            $msg = "Comment number $id deleted";
        } else $msg = "Comment number $id hasn't delete";
        return $msg;
    }
}