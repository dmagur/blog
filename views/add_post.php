<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="post">
            <div class="form-group">
                <label for="data[post_date]">Date*</label>
                <input type="text" name="data[post_date]" class="form-control" value="<?php echo date("d.m.Y");?>">
                <?php if (isset($data['errors']['post_date'])) echo '<small class="error">Field required</small>'; ?>
            </div>
            <div class="form-group">
                <label for="data[title]">Title*</label>
                <input type="text" name="data[title]" class="form-control">
                <?php if (isset($data['errors']['title'])) echo '<small class="error">Field required</small>'; ?>
            </div>
            <div class="form-group">
                <label for="data[content]">Content*</label>
                <textarea name="data[content]" class="form-control" rows="12"></textarea>
                <?php if (isset($data['errors']['content'])) echo '<small class="error">Field required</small>'; ?>
            </div>
            <button type="submit" class="btn btn-default" name="submit" value="1">Submit</button>
        </form>
    </div>
</div>