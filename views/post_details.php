<div class="row">
    <div class="col-md-12">
        <h3>
        <?php
            if ($data['post']['post_date'] == date("Y-m-d")) print "Today";
            else print date("d.m.Y",strtotime($data['post']['post_date']));

            print ": ".$data['post']['title'];
        ?>
        </h3>
        <p>
            <?php
            print htmlspecialchars($data['post']['content']);
            ?>
        </p>
        <p>Author: <?php echo $data['post']['author']; ?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h4>
        <?php
        if (!isset($data['post']['comments_num']) or !$data['post']['comments_num']) echo 'No';
        else echo $data['post']['comments_num'];
        ?>
        comments yet
    </h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <ol>
<?php

    foreach ($data['comments'] as $c){
        ?>
        <li>
        <?php
            if ($c['url']) $c['url'] = "(<a href='".$c['url']."' target='_blank'>".$c['url']."</a>)";
            echo $c['name']." ".$c['url']." said: (".date("d.m.Y",strtotime($c['post_date'])).")<br>";
            echo $c['comment'];
        ?>
        </li>
<?php
    }
?>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h4>Leave a comment</h4>
        <form method="post">
            <div class="form-group">
                <label for="name">Name*</label>
                <input type="text" name="comment[name]" class="form-control" value="">
                <?php if (isset($data['errors']['name'])) echo '<small class="error">Field required</small>'; ?>
            </div>
            <div class="form-group">
                <label for="comment[email]">Mail</label>
                <input type="text" name="comment[email]" class="form-control">
                <?php if (isset($data['errors']['email'])) echo '<small class="error">Field required</small>'; ?>
            </div>
            <div class="form-group">
                <label for="comment[url]">URL</label>
                <input type="text" name="comment[url]" class="form-control">
                <?php if (isset($data['errors']['url'])) echo '<small class="error">Field required</small>'; ?>
            </div>
            <div class="form-group">
                <label for="comment[comment]">Remark*</label>
                <textarea name="comment[comment]" class="form-control" rows="12"></textarea>
                <?php if (isset($data['errors']['comment'])) echo '<small class="error">Field required</small>'; ?>
            </div>
            <button type="submit" class="btn btn-default" name="submit" value="1">Submit</button>
        </form>
    </div>
</div>