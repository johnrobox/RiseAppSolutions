

<?php echo $this->session->flashdata('success'); ?>
<button class="btn btn-primary" id="addFaqButton">ADD</button>

<?php if ($faqs) { ?>
<div class="dataTable_wrapper">
    <table class="table table-hovered table-bordered" id="faqs-datatable">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($faqs as $faq) { ?>
        <?php $id = $faq->id; ?>
        <tr class="<?php echo ($faq->status) ? 'white-bg' : 'eee-bg';?>" id="faqTr<?php echo $id; ?>">
            <td><?php echo $faq->faq_question;?></td>
            <td><?php echo $faq->faq_answer;?></td>
            <td>
                <button class="btn btn-primary btn-xs showFaqInfo" value="<?php echo $id;?>">Show</button>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } else { ?>
<div class="alert alert-info">No Inquiry Items </div>
<?php } ?>

<script>
    $(document).ready(function(){
        $('#faqs-datatable').DataTable({
            responsive: true
        });
    });
</script>