<?php
// implement responsive images

// define multiple image sizes
$responsive_sizes = [
  'nano'=>[
    'width'=>5,
    'height'=>5
  ],
  'small'=>[
    'width'=>600,
    'height'=>375
  ],
  'medium'=> [
    'width'=>1024,
    'height'=>600
  ],
  'large'=> [
    'width'=>1280,
    'height'=>800
  ],
  'wide'=> [
    'width'=>1600,
    'height'=>1000
  ]
];

// set wordpress image sizes
if ( ! function_exists( 'responsive_post_thumbnail_format' ) ) :
function responsive_post_thumbnail_format() {
  global $responsive_sizes;
  $responsive_sizes['set'] = [
    'width'=>1600,
    'height'=>1000
  ];
  foreach ($responsive_sizes as $responsive_size_name => $responsive_size_values) {
    add_image_size( 'responsive-'.$responsive_size_name, $responsive_size_values['width'], $responsive_size_values['height'], true );
  }
}
endif;
add_action( 'after_setup_theme', 'responsive_post_thumbnail_format' );

// helper for nano image format to get realpath to encode
function get_attachment_image_realpath($attachment_id, $size = 'thumbnail') {
  $file = get_attached_file($attachment_id, true);
  if (empty($size) || $size === 'full') {
    return realpath($file);
  }
  if (!wp_attachment_is_image($attachment_id) ) {
    return false;
  }
  $info = image_get_intermediate_size($attachment_id, $size);
  if (!is_array($info) || ! isset($info['file'])) {
    return false;
  }
  return realpath(str_replace(wp_basename($file), $info['file'], $file));
}

// generate html source for responsive image from attachement id
function responsive_post_thumbnail_attachement ($image_id, $class="", $alt="") {
  global $responsive_sizes;
  $html = '<span class="media picture '.$class.' test">';
  foreach ($responsive_sizes as $responsive_size_name => $responsive_size_values) {
    if($responsive_size_name=="nano") {
      $src_nano = get_attachment_image_realpath($image_id, 'responsive-'.$responsive_size_name);
      if ($src_nano) {
        $src_nano_binary = fread(fopen($src_nano, "r"), filesize($src_nano));
        $src_nano_64 = base64_encode($src_nano_binary);
        $html .= '<span class="nano" style="background-image:url(data:image/jpeg;base64,'.$src_nano_64.');"></span>';
      }
    }
    else if($responsive_size_name=="set") {
      $responsive_image_url = wp_get_attachment_image_src($image_id,'responsive');
      $html .= '<noscript><img itemprop="photo" src="'.$responsive_image_url[0].'" alt="'.$alt.'" class="'.$class.'"></noscript>';
    }
    else {
      $responsive_image_url = wp_get_attachment_image_src($image_id,'responsive-'.$responsive_size_name);
      $html .= '<span class="'.$responsive_size_name.'"><span style="background-image:url('.$responsive_image_url[0].')"></span></span>';
    }
  }
  $html .= '</span>';
  return $html;
}

// upgrade post_thumbnail_html function
function responsive_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
  global $responsive_sizes;
  // get attachement id
  // from attachement id
  if(intval($post_thumbnail_id)>0) {
		$id=intval($post_thumbnail_id);
	}
  // from defined post id
  else if ($post_id>0) {
		$id = get_post_thumbnail_id($post_id);
	}
  // from loop post id
  else {
		$id = get_post_thumbnail_id();
	}

  // get attachement alternate text
	$alt = get_the_title($id);
  // get attachement classes
	$class = ((is_array($attr)&&isset($attr['class']))?$attr['class']:"");
  // responsive size and image exists
	if($size=="responsive" && strlen($html)>0) {
    return responsive_post_thumbnail_attachement($id,$class,$alt);
	}
  // lazy size and image exists
  else if($size=="lazy" && strlen($html)>0) {
		$src = wp_get_attachment_image_src($id,'responsive');
		return '<span class="media directimg lazy"><img data-src="'.$src[0].'" alt="'.$alt.'" class="'.$class.'"></span>';
	}
  // no format : raw image and image exists
  else if(strlen($html)>0) {
		$src = wp_get_attachment_image_src($id, $size);
    return '<span class="media directimg"><img src="'.$src[0].'" alt="'.$alt.'" class="'.$class.'"></span>';
	}
  // no format neither image
  else {
		return '<span class="media nopicture"></span>';
	}
}
add_filter('post_thumbnail_html', 'responsive_post_thumbnail_html', 99, 5);


?>
