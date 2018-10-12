<?php
include('header.php');
?>

<div class="container">
<div class="columns">
    <div class="column col-8 col-mx-auto">
<?php
$req = requ_db("SELECT * FROM post ORDER BY date");
$req->execute();
function show_post($req){
    $i = 0;
    while ($i < 10 && $res = $req->fetch())
    {
        echo '
            <div class="card" style="margin-bottom:10px">
                <div class="card-header">
                    <div class="card-title h5">'.$res['user_pseudo'].'</div>
                </div>
                <div class="card-body">'.$res['text'].'</div>
                <div class="card-image">
                    <img class="img-responsive" src="'.$res['pic'].'">
                </div>';
                if(isset($_SESSION['id']))
                {
                    $like = requ_db("SELECT * from likes WHERE user = ? AND post = ?");
                    $like->execute(array($_SESSION['id'], $res['post_id']));
                    if($like->fetch())
                    {
                        echo '<button onClick="unlike(this, '.$res['post_id'].')" class="btn btn-primary">UNLIKE</button>';
                    }
                    else
                    {
                    echo'
                        <button onClick="like(this, '.$res['post_id'].')" class="btn btn-primary">LIKE</button>';
                    }
                }
                else
                {
                    echo'
                    <button onClick="like(this, '.$res['post_id'].')" class="btn btn-primary">LIKE</button>';
                }
                echo'
                 <div class="card-footer">
                    <div class="form-group">
                        <input class="form-input" type="text" id="comment'.$res['post_id'].'">
                        <button class="btn btn-primary input-group-btn" onClick="comment()">comment</button>
                    </div>
                 </div>
                 </div>';
        $i++;
    }
}
show_post($req);
?>
    </div>
</div>
</div>