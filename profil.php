<?php
include('header.php');
$req = requ_db("SELECT *  FROM post WHERE user = ?");
$req->execute(array($_SESSION['id']));
?>
<div class="columns" style="margin:15px">
    <div class="column col-8">
        <div class="columns">
    <?php 
        while ($res = $req->fetch())
        {
            echo '
                <div class="column col-3" style="margin:5px;border:solid 1px grey">
                <a href="supp.php?post='.$res['post_id'].'"><button class="btn btn-primary"><i class="icon icon-delete"></i></button></a>
                <a href="'.$res['post_id'].'"><img class="img-responsive" src="'.$res['pic'].'"></a>
                </div>
            ';
        }
    ?>
        </div>
    </div>
        <div class="column col-4">
        <div class="form-group">
            <form action="param.php">
                <label class="form-label" for="password2">Change password</label>
                <input id="password2" class="form-input" type="password" placeholder="password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one 
			uppercase and lowercase letter, and at least 8 or more characters">
                <label class="form-label" for="password">Confirm password</label>
                <input onInput="check(this)" id="password" class="form-input" type="password" placeholder="password">
                <label class="form-switch">
                <input type="checkbox">
                <i class="form-icon"></i> Recevoir un email quand on commente mes photos
                </label>
                <button class="btn btn-primary input-group-btn" type="submit">submit</button>
            </form>
        </div>
        </div>
    </div>
</div>