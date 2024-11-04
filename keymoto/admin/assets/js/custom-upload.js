jQuery(document).ready(function($) {
  frame = 
   // wp.media({
   //      title: 'Select Image',
   //      button: {
   //          text: 'Select image',
   //      },
   //      library: {
   //              filterable: 'all',
   //              editable: true,
   //              type: 'image/*',
   //              contentUserSetting: false
   //          },
   //      states: [
   //              new wp.media.controller.Library({
   //                  id:         'library',
   //                  title:      'Select Images',
   //                  priority:   40,
   //                  filterable: 'all',
   //                  multiple:   'no',
   //                  editable:   false,
   //                  contentUserSetting: false,
   //                  library:  wp.media.query( _.defaults({
   //                      type: 'image'
   //                  }, {} ) )
   //              }),
   //              new wp.media.controller.EditImage({model: {}})
   //          ],
   //      multiple: false
   //  });
wp.media({
        title: 'Insert movie',
        library: {type: 'video/MP4'},
        multiple: false,
        button: {text: 'Insert'}
    });
   
    thumbnail_id = jQuery('#_thumbnail_id')

    jQuery('#clear_gallery').click(function() {
        jQuery('#pixad_auto_gallery_ids').val('-1');
        jQuery(this).siblings('.gallery').html('');
    });
    jQuery('#clear_thumbnail_id').click(function() {
        thumbnail_id.val('-1');
        jQuery(this).siblings('.gallery').html('');
    });


    jQuery('#manage_gallery').click(function() {
        var gallerysc = '[gallery ids="' + jQuery('#pixad_auto_gallery_ids').val() + '"]';
        wp.media.gallery.edit(gallerysc).on('update', function(g) {
            var id_array = [];
            $.each(g.models, function(id, img) { id_array.push(img.id); });
            jQuery('#pixad_auto_gallery_ids').val(id_array.join(","));
        });
    });
    jQuery('#manage_thumbnail_id').click(function() {
        frame.on( 'select', function() {
          var attachment = frame.state().get('selection').first().toJSON();
          thumbnail_id.val(attachment.id);
        });
        frame.open();
    });

// video
    // jQuery('#clear_gallery_video').click(function() {
    //     jQuery('#pixad_auto_gallery_video').val('-1');
    //     jQuery(this).siblings('.wp-playlist').html('');
    // });
    // jQuery('#manage_gallery_video').click(function() {
    //     var playlistsc = '[playlist type="video" ids="' + jQuery('#pixad_auto_gallery_video').val() + '"]';
    //     console.log(wp);
    //     console.log(wp.media);
    //     wp.media.playlist.edit(playlistsc).on('update', function(g) {
    //         var id_array = [];
    //         jQuery.each(g.models, function(id, img) { id_array.push(img.id); });
    //         jQuery('#pixad_auto_gallery_video').val(id_array.join(","));
    //     });
    // });

	
});

