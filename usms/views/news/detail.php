<article class="post-listing post-11 post type-post status-publish format-standard has-post-thumbnail hentry category-business category-photography category-sports category-world tag-article tag-author tag-post tag-video" id="the-post">
  <div class="post-inner">
  <h1 class="name post-title entry-title">
    <span style ="color: #3F7BAD;" itemprop="name"><?=(isset($title)?$title:"")?></span>
  </h1>
  <p class="post-meta">
    <span class="post-meta-author"><i class="fa fa-user"></i><a <?=(isset($user_id)?'href="teacher.php/'.slug((isset($user)?$user:"")).'-gv'.$user_id.'/profile.html'.'"':"")?> ><span class="fn"> <?=(isset($user)?$user:"")?> </span></a></span>
    <span class="tie-date"><i class="fa fa-clock-o"></i><?=(isset($time_create)?date('H:i d/m/y',$time_create):"")?></span>
    <span class="post-cats"><i class="fa fa-folder"></i><a rel="tag"><?=(isset($cate_title)?$cate_title:"")?></a></span>
    <span class="post-comments"><i class="fa fa-comments"></i><a href="<?=curPageURL()?>#comments">Bình luận</a></span>
    <?php
     if (isset($checklog)&&!empty($checklog)&&($checklog->id==$user_id))
      { 
        echo '<span class="pull-right"><a href="'.base_url().'teacher.php/post/edit/'.$id.'"><i class="fa fa-edit"></i> Chỉnh Sửa</a>&nbsp;
        <a href="'.base_url().'teacher.php/post/del/'.$id.'" class="DelPost"><i class="fa fa-remove"></i>Xóa</a></span>'; 
      }
    ?>
  </p>
  <div class="clear"></div>
  <div class="entry">
    <?=(isset($detail)?printText($detail):"Nội dung bài viết trống!")?>
	
<?php
	if(isset($file) && is_array($file) && count($file)){
		?>
		<table style = "width:100%;">
			<caption style = "font-size: 110%; font-weight: bold; text-align: left; margin: 5px 0; padding-top: 8px; padding-bottom: 8px; color: #E87A02;">File đính kèm:</caption>
			<tbody>
		<?php
		foreach($file as $key => $val){
		?>
		<tr>
			<td><a class="at_url" href="<?php echo $this->config->base_url().'attachment/download?file='.base64_encode($val['value']);?>"><?php echo $val['value'];?></a>
			</td>
		</tr>
		<?php
		}
		?>
		</tbody>
	</table>
		<?php
	}
?>
  </div>
  <div class="share-post">
    <span class="share-text">Share</span>
    <ul class="flat-social">
      <li><a href="//www.facebook.com/sharer.php?u=<?=curPageURL()?>" class="social-facebook" rel="external" target="_blank"><i class="fa fa-facebook"></i> <span>Facebook</span></a></li>
      <li><a href="https://twitter.com/intent/tweet?url=<?=curPageURL()?>" class="social-twitter" rel="external" target="_blank"><i class="fa fa-twitter"></i> <span>Twitter</span></a></li>
      <li><a href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=<?=curPageURL()?>" class="social-google-plus" rel="external" target="_blank"><i class="fa fa-google-plus"></i> <span>Google +</span></a></li>
      <li><a href="//www.stumbleupon.com/submit?url=<?=curPageURL()?>" class="social-stumble" rel="external" target="_blank"><i class="fa fa-stumbleupon"></i> <span>Stumbleupon</span></a></li>
      <li><a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?=curPageURL()?>" class="social-linkedin" rel="external" target="_blank"><i class="fa fa-linkedin"></i> <span>LinkedIn</span></a></li>
      <li><a href="//pinterest.com/pin/create/button/?url=<?=curPageURL()?>" class="social-pinterest" rel="external" target="_blank"><i class="fa fa-pinterest"></i> <span>Pinterest</span></a></li>
    </ul>
    <div class="clear"></div>
  </div> <div class="clear"></div>
  </div>
  <div id="commentform" class="comment-form">
  <div id="comments" class="row">
    <?php
      if (isset($list_comment)&&!empty($list_comment)) {
        foreach ($list_comment as $key => $val) {
          echo '<div class="author-bio"> 
                <div class="author-avatar"> 
                <img alt="" src="'.imgExist().'" class="avatar avatar-90 photo tie-appear" height="40" width="40"> 
                </div> 
                  <div class="author-description">
                  <p><b>'.printText($val['name']).'</b> (<i>'.printText($val['email']).'</i>)</p>
                  <p>'.printText($val['detail']).'</p>
                  </div> 
                <div class="clear"></div>
                <hr>
                </div>';
        }
      }
    ?>
  </div>
  <hr>
  <script>
    var base_url = "<?=base_url()?>";
    var post_id = "<?=isset($id)?$id:0?>";
    $('.DelPost').click(function(event) {
      res = confirm('Bạn có chắc muốn xóa bài viết này không?');
      if (res) return true
        else return false;
    });
  </script>
    <p class="comment-form-author"><label for="author">Họ Tên <span class="required">*</span></label>
      <input id="name_comment" name="name" type="text" class="form-control" placeholder="Nhập họ tên..." required="required">
    </p>
    <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label>
      <input id="email_comment" name="email" type="email" class="form-control" placeholder="Nhập email..." required="required">
    </p>
    <p class="comment-form-comment"><label for="comment">Câu hỏi <span class="required">*</span></label>
    <textarea name="detail" id="detail_comment" class="form-control" rows="4" placeholder="Nhập câu hỏi..." required="required"></textarea>
    </p>
    <!-- <p><label for="captcha">Captcha <span class="required">*</span> <img src="teacher.php/question/captcha" id="imgCaptcha"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEwAACxMBAJqcGAAAAXpJREFUSIm1lbFLXEEQh7/vcscF0gVEBANJYTDaimgpCJYhTVJZp42QP0CwUAshRZoQOLC2EisVQTvxD0h7BBWJgsEUBgz6LHwHj2V97jsvAwNv9/3mm9llmIX/bE+6iHkLDALtHtcCQE29Vm/UFaDR6wR1NSv4PvDysdBhdV7dUn8ECTL1N/CuG/CAupZfRwiN+UIV+Jj6KxHc8aNU+JB6XhH+E5hIgdfUg3sge+pyZH8deJ5a/fsI4BCY7AgK+1fAXCq4E7wVwC+BN4HmUG0D45Xg3PX43yDBl4juGdCsCgd4FV4PMNMNqGj1wnesqosERlNdAoby9VmWZR+Bq1DYFznBbEKCD5G4wahSPQ7Euw/R1e0g5rRM/DVSzecS/qdIW38vK+i1+i8StAqMFHTDaiuiuwZGHzryYslI+KNelPxfKYXnVlc3Ks6iTN2kwgPUUL9VgLeAp6nwok2pO8bfhJu8y6bLACYm6uduHL/IY46AfeCkm6p7arfkXryfRye0UwAAAABJRU5ErkJggg==" title="Làm mới captcha" id="reCaptcha"></label>
      <input id="comment_captcha" type="text" style="max-width:40%" name="captcha" placeholder="Nhập captcha..." required="required">
    </p> -->
    <p class="form-submit">
      <button id="form_comment" type="submit" data-loading-text="Xin chờ..." class="btn btn-primary">Gửi Bình Luận</button>
    </p>
  </div> 
</article>
<script>
  $(document).ready(function(){
  $("#form_comment").click(function(){
    var email = $("#email_comment").val();
    var name = $("#name_comment").val();
    var detail = $("#detail_comment").val();
    if (name.trim() == "") {
      alert("Bạn chưa nhập họ tên");
      $("#name_comment").focus();
      return (false);
    }

    if (email.trim() == "") {
      alert("Bạn chưa nhập email");
      $("#email_comment").focus();
      return (false);
    }

    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (!re.test(email)) {
      alert("Email không hợp lệ");
      $("#email_comment").focus();
      return false;
    }

    if (detail.trim() == "") {
      alert("Bạn chưa nhập nội dung bình luận");
      $("#detail_comment").focus();
      return (false);
    }
    $.ajax({
          type: "POST",
          url: base_url+'comment/add',
          dataType: 'text',
          data: {email:email, name:name,detail:detail, site_id : 0, post_id:post_id},
          success: function(res) {
              if (res)
              {
                  alert(res);
              }
          }
          });
  });
});
</script>
<!-- <div class="blog-pager" id="blog-pager">
  <span id="blog-pager-newer-link">
    <a <?=(isset($post_next)?'href="teacher.php/bai-viet/'.slug($post_next['title']).'-a'.$post_next['id'].'.html"':'style="display:none;"')?> class="blog-pager-newer-link btn btn-danger waves-effect waves-teal" title="Newer Post">
    <i class="fa fa-long-arrow-left"></i>
    </a>
  </span>
  <span id="blog-pager-older-link">
  <a <?=(isset($post_prev)?'href="teacher.php/bai-viet/'.slug($post_prev['title']).'-a'.$post_prev['id'].'.html"':'style="display:none;"')?> class="blog-pager-older-link btn btn-danger waves-effect waves-teal" title="Older Post">
  <i class="fa fa-long-arrow-right"></i>
  </a>
  </span>
</div> -->