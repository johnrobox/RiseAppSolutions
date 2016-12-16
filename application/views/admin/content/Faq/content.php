
<?php
echo $this->session->flashdata('success'); 
$add_button = array(
    'class' => 'btn btn-primary',
    'id' => 'addFaqButton',
    'content' => 'ADD'
);
echo form_button($add_button);
?>
<div class="alert" id="faqMessageAlert"></div>
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
        <?php 
        foreach ($faqs as $faq) { 
            $status = $faq->status;
            if ($status) { 
                $button_class = 'warning';
                $button_text = 'Disable';
            } else {
                $button_class = 'default';
                $button_text = 'Enable';
            }
            $id = $faq->id; 
        ?>
        <tr class="<?php echo ($status) ? 'white-bg' : 'eee-bg';?>" id="faqTr<?php echo $id; ?>">
            <td><?php echo $faq->faq_question;?></td>
            <td><?php echo $faq->faq_answer;?></td>
            <td>
                <?php
                // show button
                $show_faq_button = array(
                    'class' => "btn btn-primary btn-xs showFaqInfo",
                    'value' => $id,
                    'content' => 'Show'
                );
                echo form_button($show_faq_button);
                
                // delete button
                $delete_faq_button = array(
                    'class' => 'btn btn-danger btn-xs deleteFaqButton',
                    'value' => $id,
                    'content' => 'Delete'
                );
                echo form_button($delete_faq_button);
                
                ?>
                <button class="btn btn-<?php echo $button_class; ?> btn-xs changeStatusButton" id="changeStatusButton<?php echo $id;?>" value="<?php echo $id;?>" status="<?php echo $status;?>">
                    <span id="text<?php echo $id;?>"><?php echo $button_text; ?></span>
                    <img src="<?php echo base_url();?>images/admin/loading/loading8.gif" id="changeStatusLoading<?php echo $id;?>" class="img-responsive center-block" style="height: 20px; width: 20px; display: none;"/>
                </button>
                <?php
                // update button
                $update_faq_button = array(
                    'class' => 'btn btn-success btn-xs updateFaqButton',
                    'value' => $id,
                    'content' => 'Update'
                );
                echo form_button($update_faq_button);
                ?>
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