<?= $this->Html->css('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', ['block' => true]) ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Show/Edit Question</h1>
    </div>
</div>
<div class="row">
    <?php if ($question == null): ?>
    <p class="text-danger">Question not found!</p>
    <?php else: ?>
    <form role="form" method="post" action="<?= $this->Url->build([
        "action" => "update",
        $question->_id
    ]); ?>">
        <div class="form-group">
            <label class="control-label">Question</label>
            <input type="text" name="question" class="form-control" disabled value="<?= $question->question ?>">
        </div>
        <div class="form-group">
            <label>Answer</label>
            <textarea class="form-control" name="answer" rows="3" disabled><?= $question->answer ?></textarea>
        </div>
        <div class="form-group">
            <label>Keywords</label>
            <input type="text" name="keywords" class="form-control" id="keywords" disabled>
            <div class="keywords-used">
                <?php foreach ($question->keywords as $key => $keyword): ?>
                <button type="button" class="btn btn-info btn-xs">
                    <?= $keyword->name ?> <i class="fa fa-times"></i>
                    <input type="hidden" name="keywords[]" value="<?= $keyword->_id ?>">
                </button>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="show-buttons">
            <button type="button" id="btnEdit" class="btn btn-primary">Edit</button>
            <a href="<?= $this->Url->build([
                "action" => "delete",
                $question->_id
            ]); ?>" id="btnDelete" class="btn btn-danger">Delete</a>
        </div>
        <div class="edit-buttons" style="display: none;">
            <button type="button" id="btnCancel" class="btn btn-danger">Cancel</button>
            <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
        </div>
    </form>
    <?php endif; ?>
</div>

<?= $this->Html->script('//code.jquery.com/ui/1.11.4/jquery-ui.js', ['block' => true]) ?>
<?= $this->Html->script('autocomplete-keywords.js', ['block' => true]) ?>
<?= $this->Html->script('buttons-handlers', ['block' => true]) ?>
