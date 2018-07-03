<?php 	 global $data; ?>
<?php if ( $data['ql_text1'] ) { ?>
<div class="content-body leftfloater">                    
<div class="borderino" style="padding-bottom:0px;">
<h2 class="page-title" style="margin-bottom:10px;"><strong  class="borderbottom2px" style="padding-bottom:12px;"><?php _e( 'Information','qns' )?></strong></h2>
<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
<div class="event-list-wrapper">				
<!-- BEGIN .event-prev -->
<div class="event-prev clearfix">
<ul>
<li><a href="<?php _e($data['ql_link1'],'qns'); ?>"><?php _e($data['ql_text1'],'qns'); ?></a></li>
<li><a href="<?php _e($data['ql_link2'],'qns'); ?>"><?php _e($data['ql_text2'],'qns'); ?></a></li>
<li><a href="<?php _e($data['ql_link3'],'qns'); ?>"><?php _e($data['ql_text3'],'qns'); ?></a></li>
<li><a href="<?php _e($data['ql_link4'],'qns'); ?>"><?php _e($data['ql_text4'],'qns'); ?></a></li>
<li><a href="<?php _e($data['ql_link5'],'qns'); ?>"><?php _e($data['ql_text5'],'qns'); ?></a></li>
</ul>
<!-- END .event-prev -->
</div>
</div>
</div>
</div><?php } ?>