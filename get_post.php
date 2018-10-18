<?php
if (!isset($_SESSION))
{
    session_start();
    include('db.php');
}
$req = requ_db("SELECT * FROM post WHERE `date`  < '".$_SESSION['post_date']."' ORDER BY `date` DESC LIMIT 10");
$req->execute();
    while ($res = $req->fetch())
    {

        echo '
            <div class="card" style="margin-bottom:10px">
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
                    <form onSubmit="return false;">
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
                    </form>
                    </div>
                    </div>
                 </div>
                 </div>';
                    
        $_SESSION['post_date'] = $res['date'];
    }
?>