<?php

/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/14/2017
 * Time: 1:08 PM
 */
class Comment
{

    public static function Render_comment_form($user_name,$user_email){
        echo "<section id='comment_section'>
            <h2>Vas komentar na ovo</h2>
            <form action='#' method='post'>
                <table>
                    <tr>
                        <td colspan='3'>
                            <textarea id='question' placeholder='Your comment...' name='user_comm' required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type='text' name='tb_name' id='fname' placeholder='Name' value='{$user_name}' required readonly>
                        </td>
                        <td><input type='email' name='tb_email' id='email' placeholder='your@email.com' value='{$user_email}' required readonly>
                        </td>
                        <td>
                            <input type='url' name='site' id='site' placeholder='www.yoursite.net'>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td >
                            <input type='submit' name='submit' id='kli' value='Send'>
                        </td>
                    </tr>

                </table>
            </form>
        </section>";
    }

    public static function InsertComment($db,$user_id,$vest_id){
        if(isset($_POST['submit'])){

            if(isset($_POST['user_comm']) && isset($_POST['tb_name']) && isset($_POST['tb_email'])){

                $comment = str_replace("'","",$_POST['user_comm']);
                $comment = str_replace("<","",$comment);
                $comment = str_replace(">","",$comment);
                if (empty($comment)){
                    die('You must input comment');
                }
                mysqli_query($db, "INSERT INTO comments (id,korisnik_id,comment,vest_id) VALUES (null,'{$user_id}','{$comment}','{$vest_id}')");
            }
            else{
                die('Nisu unesene vrednosti');
            }
        }
        else{
        }
    }

    public static function getAllComments($db, $vest_id, $user_id,$admin=0){
        $rez = mysqli_query($db, "SELECT korisnici.name, korisnici.admin, comments.comment, comments.time, comments.korisnik_id, comments.id FROM comments JOIN korisnici ON comments.korisnik_id = korisnici.id WHERE vest_id = '{$vest_id}'");
        $commet_array = array();
        while($row = mysqli_fetch_object($rez, get_called_class())){
            $commet_array[] = $row;
        }
        foreach($commet_array as $comment){
            print_r($comment);
            echo "<section class='comment'>

            <img src='resources/img/index.png' alt='slika'>";

            if( ($admin) || $user_id == $comment->korisnik_id){
                    echo "<a href=\"modules/delete/delete.php?id={$user_id}&aid={$vest_id}&comid={$comment->id}\">Remove</a>";
                    echo "<h3>{$comment->name}</h3>
                    <span>{$comment->time}</span>
                    <p>{$comment->comment}</p>
                    </section>";
                }else{
                echo "<h3>{$comment->name}</h3>
                    <span>{$comment->time}</span>
                    <p>{$comment->comment}</p>
                    </section>";
            }

        }
    }

    public static function deleteComment($db, $comment_id, $vest_id){
        mysqli_query($db, "DELETE FROM comments WHERE id = {$comment_id}");
        header("Location: ../../index.php?aid={$vest_id}");
    }
}