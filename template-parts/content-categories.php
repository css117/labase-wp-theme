<?php
foreach  ($categories as $category) {
  $thumbnail_array = get_field('category_thumbnail','category_'.$category->cat_ID) ;
  $html.= '
<li class="category">
  <a href="'.get_category_link($category->cat_ID).'" title="'.$category->name.'">' ;
  $category_color = get_field('category_color','category_'.$category->cat_ID);
  if (sizeOf($category_color)>0) {
    $html.= '<span class="cover" style="background-color:'.$category_color.'"></span>' ;
  }
  if(sizeOf($thumbnail_array)>0) {
    // specific  function instead of wp_get_attachment_image    
    $html.= responsive_post_thumbnail_attachement($thumbnail_array['id']);
  }
  $html.= '<span class="name">'.$category->name.'</span>';
  $html.= '
  </a>
</li>';
}
if ($html!='') {
  $html = '<ul class="categories-list">'.$html.'</ul>';
}
?>
