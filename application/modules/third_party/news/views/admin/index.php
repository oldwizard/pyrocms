<?php $this->load->helper('date');?>      
<?php echo form_open('admin/news/action');?>

<div class="box">

	<h3><?php echo lang('news_list_title');?></h3>				
	
	<div class="box-container">	
	
		<table border="0" class="table-list">    
			<thead>
				<tr>
					<th><?php echo form_checkbox('action_to_all');?></th>
					<th><?php echo lang('news_post_label');?></th>
					<th class="width-10"><?php echo lang('news_category_label');?></th>
					<th class="width-10"><?php echo lang('news_date_label');?></th>
					<th class="width-5"><?php echo lang('news_status_label');?></th>
					<th class="width-15"><span><?php echo lang('news_actions_label');?></span></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="6">
						<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php if (!empty($news)): ?>
					<?php foreach ($news as $article): ?>
						<tr>
							<td><?php echo form_checkbox('action_to[]', $article->id);?></td>
							<td><?php echo $article->title;?></td>
							<td><?php echo $article->category_title;?></td>
							<td><?php echo date('M d, Y', $article->created_on);?></td>
							<td><?php echo lang('news_'.$article->status.'_label');?></td>
							<td>
								<?php echo anchor('admin/news/preview/' . $article->id, lang($article->status == 'live' ? 'news_view_label' : 'news_preview_label'), 'rel="modal-large" class="iframe" target="_blank"') . ' | '; ?>
								<?php echo anchor('admin/news/edit/' . $article->id, lang('news_edit_label'));?> | 
								<?php echo anchor('admin/news/delete/' . $article->id, lang('news_delete_label'), array('class'=>'confirm')); ?>
							</td>
						</tr>
				<?php endforeach; ?>
			<?php else: ?>
					<tr>
						<td colspan="6"><?php echo lang('news_no_articles');?></td>
					</tr>
			<?php endif; ?>
			</tbody>	
		</table>
		
			<?php $this->load->view('admin/partials/table_buttons', array('buttons' => array('delete', 'publish') )); ?>

	</div>
</div>

<?php echo form_close();?>