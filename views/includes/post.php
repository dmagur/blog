<div class="row">
    <div class="col-md-12">
        <h3>
            <?php if ($type=='short')
                print '<a href="/?action=post-details&id='.$data['post']['id'].'">';
                ?>

            <?php
            if ($data['post']['post_date'] == date("Y-m-d")) print "Today";
            else print date("d.m.Y",strtotime($data['post']['post_date']));

            $comments_num = (isset($data['post']['comments_num']) and $data['post']['comments_num']>0)?$data['post']['comments_num']:"";

            print ": ".$data['post']['title']." ".$comments_num;

            if ($type=='short')
                print '</a>';
            ?>
        </h3>
        <p>
            <?php
            print htmlspecialchars($data['post']['content']);
            ?>
        </p>
        <p>Author: <a href="/?action=author-posts&id=<?php echo $data['post']['user_id'];?>"><?php echo $data['post']['author']; ?></a></p>
    </div>
</div>