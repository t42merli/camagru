<?php
include('header.php');
$req = requ_db("SELECT * FROM post WHERE post_id = ?");
$req->execute(array($_GET['post']));
if (!$res = $req->fetch())
{
    http_response_code(404);
    echo '<div class="empty">
    <div class="empty-icon">
      <i class="icon icon-photo"></i>
    </div>
    <p class="empty-title h5">Error 404</p>
    <p class="empty-subtitle">Photo introuvable</p>
  </div>';
  die();
}
?>
<div class="container">
    <div class="columns">
        <div id="post" class="column col-8 col-mx-auto">
            <?php
                echo '<div class="card" style="margin-bottom:10px">
                <div id="toast'.$res['post_id'].'" class="toast toast-success" style="display:none">
                    <button class="btn btn-clear float-right" onclick="this.parentNode.style.display = `none`">
                     </button>
                    Commentaire envoyé.
                 </div>
                    <div class="card-header">
                        <div class="card-title h5">'.$res['user_pseudo'].'</div>
                    </div>
                    <div class="card-body">'.$res['text'].'</div>
                    <div class="card-image">
                        <a href="post.php?post='.$res['post_id'].'"><img class="img-responsive" src="'.$res['pic'].'"></a>
                    </div>
                    <div class="container" id="nb_likes'.$res['post_id'].'">';
                    $nb_likes = requ_db("SELECT COUNT(*) FROM likes WHERE post = ?");
                $nb_likes->execute(array($res['post_id']));
                $nb_likes = $nb_likes->fetch();
                echo $nb_likes[0].' like(s)</div>
                <div class="card-footer">
                <div class="columns">
                <div class="column col-2">';
                if(isset($_SESSION['id']))
                {
                    $like = requ_db("SELECT * from likes WHERE user = ? AND post = ?");
                    $like->execute(array($_SESSION['id'], $res['post_id']));
                    if($like->fetch())
                    {
                        echo '<button onClick="unlike(this, '.$res['post_id'].','.$_SESSION['id'].')" class="btn btn-primary">UNLIKE</button>';
                    }
                    else
                    {
                    echo'
                        <button onClick="like(this, '.$res['post_id'].','.$_SESSION['id'].')" class="btn btn-primary">LIKE</button>';
                    }
                }
                else
                {
                    echo'
                    <a href="connexion.php"><button class="btn btn-primary">LIKE</button></a>';
                }
                echo'
                    </div>
                    <div class="column col-8">
                        <input onInput="this.setCustomValidity(``)" class="form-input" type="text" id="comment'.$res['post_id'].'">
                    </div>
                    <div class="column col-2">';
                    if(!isset($_SESSION['id']))
                    {
                        echo'<a href="connexion.php"><button type="submit" class="btn btn-primary input-group-btn">
                        <i class="icon icon-message"></i>
                        </button></a>';
                    }
                    else
                    {
                        echo'<button type="submit" class="btn btn-primary input-group-btn"
                         onClick="comment('.$res['post_id'].','.$_SESSION['id'].')">
                        <i class="icon icon-message"></i>
                        </button>';
                    }
                    echo'
                    </div>
                    </div>
                    ';
                    $req = requ_db("SELECT * FROM comments WHERE post = ?");
                    $req->execute(array($_GET['post']));
                    while($res = $req->fetch())
                    {
                        $pseudo = requ_db("SELECT pseudo FROM users WHERE id = ?");
                        $pseudo->execute(array($res['user']));
                        $pseudo = $pseudo->fetch();
                        echo '<div class="container" style="margin-top:10px;border:solid grey 1px">
                            '.$pseudo['pseudo'].':<br>
                            '.$res['content'].'
                      </div>';
                    }
            ?>
            </div>
            </div>
        </div>
    </div>
</div>